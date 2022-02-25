<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PrizeController extends AbstractController
{
    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/prize", name="prize", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"}) 
    */
    public function viewPrize(Product $product, Catalog $catalog, User $user): Response
    {
        $prizes = $product->getPrizes();
       
        return $this->render('updateAddTemplates/prize.html.twig', [
            'prizes' => $prizes,
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}