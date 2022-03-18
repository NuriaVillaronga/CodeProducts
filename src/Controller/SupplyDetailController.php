<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class SupplyDetailController extends AbstractController
{
    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/supply_detail", name="supply_detail", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function viewSupply(Product $product, Catalog $catalog, User $user): Response
    {
        $suppliers = $product->getSuppliers();
       
        return $this->render('updateAddTemplates/supplyDetail.html.twig', [
            'suppliers' => $suppliers,
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user,
        ]);
    }
}