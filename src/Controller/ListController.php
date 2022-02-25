<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\UserServices\UserService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;


class ListController extends UserService
{   

    private const BEGGINIG_PAGINATION = 1;
    private const LIMIT_USERS_PAGE = 5;

    /**
     * @Route("/", name="default")
     * @Route("/list", name="user_list")
     */
    public function index(UserRepository $userRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $userRepository->queryPaginator();
        
        $pagination = $paginator->paginate( $query, $request->query->getInt('page', self::BEGGINIG_PAGINATION), self::LIMIT_USERS_PAGE );

        return $this->render('list.html.twig', ['pagination' => $pagination]);
    }
}