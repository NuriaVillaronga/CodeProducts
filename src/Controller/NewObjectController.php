<?php

namespace App\Controller;

use App\Entity\Catalog;
use App\Entity\Contributor;
use App\Entity\Price;
use App\Entity\Prize;
use App\Entity\Product;
use App\Entity\Supplier;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class NewObjectController extends AbstractController
{
    private function indexNumber($arrayObject): int {
        $contador = 1;
        for ($i = 0; $i < count($arrayObject); $i++) {
            $contador++;
        }
        return $contador;
    }

    private function saveChanges($object, $em) {
        $em->persist($object);
        $em->flush();
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/new_supplier", name="new_supplier", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function newSupplier(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em): Response
    {
        $supplier = new Supplier();
        $supplier->setSupplierName("New supplier ".$this->indexNumber($product->getSuppliers()));
        $supplier->setId($product->getId());

        $this->saveChanges($supplier, $em);
        $product->addSupplier($supplier);
        $this->saveChanges($product, $em);
       
        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/new_contributor", name="new_contributor", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function newContributor(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em): Response
    {
        $contributor = new Contributor();
        $contributor->setId($product->getId());

        $this->saveChanges($contributor, $em);
        $product->addContributor($contributor);
        $this->saveChanges($product, $em);
       
        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/new_prize", name="new_prize", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     */
    public function newPrize(Product $product, Catalog $catalog, User $user, EntityManagerInterface $em): Response
    {
        $prize = new Prize();
        $prize->setId($product->getId());

        $this->saveChanges($prize, $em);
        $product->addPrize($prize);
        $this->saveChanges($product, $em);
       
        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }

    /**
     * @Route("user/{id_user}/catalog/{id_catalog}/update/product/{id_product}/supplier/{id_supplier}/new_price", name="new_price", methods={"GET","POST"})
     * 
     * @ParamConverter("user", options={"id" = "id_user"})
     * @ParamConverter("catalog", options={"id" = "id_catalog"})
     * @ParamConverter("product", options={"id" = "id_product"})
     * @ParamConverter("supplier", options={"id" = "id_supplier"})
     */
    public function newPrice(Product $product, Catalog $catalog, User $user, Supplier $supplier, EntityManagerInterface $em): Response
    {
        $price = new Price();
        $price->setId($supplier->getId());

        $this->saveChanges($price, $em);
        $supplier->addPrice($price);
        $this->saveChanges($supplier, $em);
        $product->addSupplier($supplier);
        $this->saveChanges($product, $em);
       
        return $this->redirectToRoute('update_product', ['id_product' => $product->getId(), 'id_catalog' => $catalog->getId(), 'id_user' => $user->getId()]);
    }
}
