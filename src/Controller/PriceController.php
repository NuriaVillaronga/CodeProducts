<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\Supplier;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PriceController extends AbstractController 
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/supplier/{id_supplier}/price", name="price", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"}) 
     * @ParamConverter("supplier", options={"id" = "id_supplier"})
    */
    public function viewPrice(Supplier $supplier, Product $product, Catalog $catalog, User $user): Response  
    {
        $prices = $supplier->getPrices();
       
        return $this->render('updateAddTemplates/price.html.twig', [
            'prices' => $prices,
            'supplier' => $supplier,
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
