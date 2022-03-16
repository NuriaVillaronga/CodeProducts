<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\File;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UploadFilesType;
use App\Service\FileUploader;
use App\UserServices\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class UploadFileController extends UserService
{   
    /**
     * @Route("/upload/{id_user}/catalog/{id_catalog}", name="upload_onix", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id": "id_user"})
     * @ParamConverter("catalog", options={"id": "id_catalog"})
     */
    public function index(Catalog $catalog, Request $request, User $user, FileUploader $fileUploader, string $brochures_directory, EntityManagerInterface $em): Response
    {
        $file = new File();
        $this->userCheckCredentials($user);
        $form = $this->createForm(UploadFilesType::class, $file);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $brochureFile = $form->get('files')->getData();

            if ($brochureFile) {
                
                $fileExtension = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_EXTENSION);

                if ($fileExtension !== "onix" && $fileExtension !== "xml") {
                    throw new Exception("The file extension is not onix");
                }
                
                else {
                    $brochureFileName = $fileUploader->upload($brochureFile);
                    $file->setFile($brochureFileName);
                    $this->fileUploadService($file, $em);
                    $this->productLoadService($user, $file, $catalog, $brochures_directory, $em);
                    $this->addFlash('messageUpload', 'The file has been uploaded successfully');
                }
            }

            return $this->redirectToRoute('view_product', ['id_user' => $user->getId(), 'id_catalog' => $catalog->getId()]);
        }

        return $this->render('upload.html.twig', ['form' => $form->createView()]);
    }
} 
