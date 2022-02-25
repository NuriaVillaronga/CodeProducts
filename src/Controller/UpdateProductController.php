<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use App\Form\ProductFormType;
use App\UserServices\UserService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;


class UpdateProductController extends UserService
{
    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}", name="update_product", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function updateProduct(User $user, Catalog $catalog, Product $product): Response
    {
        $this->userCheckCredentials($user);

        return $this->render('updateAddProduct.html.twig', [
            'product' => $product, 
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
