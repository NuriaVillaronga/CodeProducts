<?php

namespace App\Repository;

use App\Entity\CodeList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CodeList|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeList|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeList[]    findAll()
 * @method CodeList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CodeList::class);

    }

    //Obtener pares clave valor de los componentes leidos desde controladores
    public function getKVE($resultSelectQuery) {
        $array = $resultSelectQuery;

        foreach ($array as $elementoArray) {
            $nuevoArray[$elementoArray['value']] = $elementoArray['value']." - ".$elementoArray['definition'];
        }
        return $nuevoArray;
    }

    //Obtener pares clave valor de los componentes leidos desde FormTypes
    public function getKV($resultSelectQuery) {
        $array = $resultSelectQuery;

        foreach ($array as $elementoArray) {
            $nuevoArray[$elementoArray['value']." - ".$elementoArray['definition']] = $elementoArray['value'];
        }
        return $nuevoArray;
    }

    public function findByTag(string $tag)
    {
        return $this->createQueryBuilder('codeList')
            ->select('codeList.value','codeList.definition','codeList.tag')
            ->andWhere('codeList.tag = :tagCode')
            ->setParameter('tagCode', $tag) 
            ->orderBy('codeList.value', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return CodeList[] Returns an array of CodeList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CodeList
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
