<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\Contributor;
use App\Entity\User;
use App\Form\ContributorFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TabContributorController extends AbstractController
{
    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/contributor/{id_contributor}", name="tab_contributor", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("contributor", options={"id" = "id_contributor"})
     */
    public function dataContributor(Product $product, Catalog $catalog, User $user, Contributor $contributor, EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(ContributorFormType::class, $contributor);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($contributor);
            $em->flush();

            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->render('updateAddTemplates/tabContributor.html.twig', [
            'formContributor' => $form->createView(),
            'contributor' => $contributor, 
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
