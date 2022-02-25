<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\User;
use App\Form\CatalogFormType;
use App\UserServices\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateCatalogController extends UserService
{
    /**
     * @Route("/create/catalog/{id}", name="create_catalog", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id": "id"})
     */
    public function index(Request $request, EntityManagerInterface $em, User $user): Response
    {
        $catalog = new Catalog();

        $this->userCheckCredentials($user);

        $form = $this->createForm(CatalogFormType::class, $catalog);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->addCatalog($catalog);
            $this->catalogService($catalog, $em);

            $this->addFlash('messageCatalog', 'The catalog has been created successfully');

            return $this->redirectToRoute('user_list');
        }

        return $this->render('create_catalog.html.twig', ['form' => $form->createView()]);
    }
}
