<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Images;
use App\Entity\Product;
use App\Entity\User;
use App\Form\ImageFormType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Response;


class UploadImageController extends AbstractController
{

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/dropzone", name="dropzone", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"}) 
     */
    public function uploadImages(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Request $request, FileUploader $fileUploader): Response
    {
        $image = new Images();  
        $form = $this->createForm(ImageFormType::class, $image); 
        $form->handleRequest($request);

        //con $form->isValid() nunca entra en el if
        if ($form->isSubmitted()) {
            
            /**
             * @var UploadedFile $brochureFile
             */
            $brochureFile = $form->get('image')->getData();
            $fileExtension = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($fileExtension !== "jpg" && $fileExtension !== "png") {
                throw new Exception("The file extension is not jpg/png");
            }
            else {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $image->setImage($brochureFileName);
                $em->persist($image);
                $em->flush();
                
                $product->addImage($image);
                $em->persist($product);
                $em->flush();
            }

            var_dump($brochureFileName);
            return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
        }

        return $this->render('updateAddTemplates/dropzone.html.twig', [
            'formDZ' => $form->createView(),
            'product' => $product,
            'catalog' => $catalog,
            'user' => $user
        ]);
    }
}