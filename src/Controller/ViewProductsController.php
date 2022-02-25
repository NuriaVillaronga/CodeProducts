<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\File;
use App\Entity\User;
use App\Repository\ProductRepository;
use App\UserServices\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewProductsController extends UserService
{
    public $products_per_page;

    /**
    * @Route("/view/{id_user}/catalog/{id_catalog}/products", name="view_product", methods={"GET","POST"})
    * 
    * @ParamConverter("user", options={"id" = "id_user"})
    * @ParamConverter("catalog", options={"id" = "id_catalog"})
    */
    public function viewProducts(User $user, Catalog $catalog, PaginatorInterface $paginator, ProductRepository $productRepository, Request $request): Response
    {
        $this->userCheckCredentials($user);

        $products_per_page = $request->query->getInt('productsPerPage', 5); //Si no seleccionas nada, muestra 5 productos

        $pageNumber = max(1, $request->query->getInt('pageNumber', 1));
        $query = $productRepository->queryPaginator($user);
        $pagination = $paginator->paginate($query, $request->query->getInt('page', $pageNumber), $products_per_page);

        return $this->render('listProducts.html.twig', [
            'catalog' => $catalog,
            'user' => $user,
            'pagination' => $pagination,
            'productsPerPage' => $products_per_page,
            'firstPage' => 1,
            'previous' => abs($pageNumber - 1),
            'next' => $pageNumber + 1 
        ]);
    }
}

