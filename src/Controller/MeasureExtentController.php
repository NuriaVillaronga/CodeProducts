<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use App\Form\MeasureExtentFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class MeasureExtentController extends AbstractController   
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/measure_extent", name="measure_extent", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function dataMeasureExtent(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Request $request): Response 
    {
        $form = $this->createForm(MeasureExtentFormType::class, $product);  
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {  
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->render('updateAddTemplates/measureExtent.html.twig', [
            'formME' => $form->createView(),
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
