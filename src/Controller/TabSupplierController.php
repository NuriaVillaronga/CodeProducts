<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\Supplier;
use App\Entity\User;
use App\Form\SupplierFormType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class TabSupplierController extends AbstractController
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/supplier/{id_supplier}", name="tab_supplier", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("supplier", options={"id" = "id_supplier"})
     */
    public function dataSupply(Product $product, Supplier $supplier, Catalog $catalog, User $user, EntityManagerInterface $em, Request $request): Response
    {
        $form = $this->createForm(SupplierFormType::class, $supplier);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($supplier);
            $em->flush();

            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->renderForm('updateAddTemplates/tabSupplier.html.twig', [
            'formSupplier' => $form,
            'supplier' => $supplier,
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
