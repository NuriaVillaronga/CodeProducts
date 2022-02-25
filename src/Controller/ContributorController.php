<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Product;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ContributorController extends AbstractController
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/contributor", name="contributor", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function viewContributor(Product $product, Catalog $catalog, User $user): Response 
    {
        $contributors = $product->getContributors();
       
        return $this->render('updateAddTemplates/contributor.html.twig', [
            'contributors' => $contributors,
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}
