<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\RelatedProduct;
use App\Entity\User;
use App\Form\RelatedProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class CardRelatedProductController extends AbstractController
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/related_product/{id_rp}", name="card_related_product", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("rp", options={"id" = "id_rp"})   
    */
    public function dataRelatedProduct(Product $product, RelatedProduct $rp, EntityManagerInterface $em, Request $request, Catalog $catalog, User $user): Response
    {
        $form = $this->createForm(RelatedProductFormType::class, $rp); 
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($rp);
            $em->flush();

            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->render('updateAddTemplates/cardRelatedProduct.html.twig', [
            'formRP' => $form->createView(),
            'relatedProduct' => $rp, 
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
