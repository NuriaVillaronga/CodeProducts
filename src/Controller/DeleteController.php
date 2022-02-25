<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Contributor;
use App\Entity\File;
use App\Entity\Price;
use App\Entity\Prize;
use App\Entity\Product;
use App\Entity\Supplier;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\UserServices\UserService;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class DeleteController extends UserService
{
    /**
     * @Route("/delete/{user_id}/catalog/{id}", name="delete_catalog", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "user_id"})
     * @ParamConverter("catalog", options={"id" = "id"})
     */
    public function deleteCatalog(User $user, Catalog $catalog, EntityManagerInterface $em): Response
    {
        $this->userCheckCredentials($user);

        $this->catalogRemoveService($catalog, $em);

        return $this->redirectToRoute('view_catalog', ['id' => $catalog->getId(), 'user_id'=> $user->getId()]);
    }

    /**
     * @Route("/delete/product/{id_product}/user/{id_user}/catalog/{id_catalog}", name="delete_product", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function deleteProduct(Catalog $catalog, Product $product, User $user, EntityManagerInterface $em): Response
    {
        $this->userCheckCredentials($user);
        
        $this->deleteProductService($product, $em);

        return $this->redirectToRoute('view_product', ['id_user' => $user->getId(), 'id_catalog' => $catalog->getId(), 'id_product' => $product->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/delete_supplier/{id_supplier}", name="delete_supplier", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("supplier", options={"id" = "id_supplier"})
    */
    public function deleteSupplier(Product $product, Supplier $supplier, Catalog $catalog, User $user, EntityManagerInterface $em): Response
    {
        $em->remove($supplier);
        $em->flush();

        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/delete_contributor/{id_contributor}", name="delete_contributor", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("contributor", options={"id" = "id_contributor"})
    */
    public function deleteContributor(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Contributor $contributor): Response
    {
        $em->remove($contributor);
        $em->flush();

        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/delete_prize/{id_prize}", name="delete_prize", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("prize", options={"id" = "id_prize"})
    */
    public function deletePrize(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Prize $prize): Response
    {
        $em->remove($prize);
        $em->flush();

        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }
    
    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/delete_price/{id_price}", name="delete_price", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("price", options={"id" = "id_price"})
    */
    public function deletePrice(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em, Price $price): Response
    {
        $em->remove($price);
        $em->flush();

        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

} 