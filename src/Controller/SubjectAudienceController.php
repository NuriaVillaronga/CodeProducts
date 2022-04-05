<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use App\Form\SubjectAudienceFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class SubjectAudienceController extends AbstractController   
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/subject_audience", name="subject_audience", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function dataSubjectAudience(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Request $request): Response 
    {
        $form = $this->createForm(SubjectAudienceFormType::class, $product);  
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {  
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->render('updateAddTemplates/subjectAudience.html.twig', [
            'formSA' => $form->createView(),
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
