<?php

namespace App\Controller;

use App\Entity\CodeList;
use App\Repository\CodeListRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ApiCodelistController extends AbstractController
{
    /**
     * @Route("/api/codelist/{tag}", name="app_api_codelist")
     */
    public function index(CodeListRepository $codeListRepository, string $tag): Response
    {
        $arrayRC = $codeListRepository->getKVE($codeListRepository->findByTag($tag));
        return new JsonResponse($arrayRC);
    }

    
}
