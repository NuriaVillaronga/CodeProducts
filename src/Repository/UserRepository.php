<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function queryPaginator()
    {
        return $this->createQueryBuilder('user')
        ->orderBy('user.id', 'DESC')
        ->getQuery()
        ;
    }

    //Al utilizar checker en security.yaml, no hace falta implementar aqui la UserLoaderInterface, por lo 
    //que no será necesario implementar el método loadUserByIdentifier()

    public function loadUserByUsername(string $username): ?User
    {    
        $queryBuilder = $this->createQueryBuilder('user');
        $queryBuilder->where('user.isActive = true');
        $queryBuilder->where('user.isDeleted = false');
        $queryBuilder->andWhere('user.email = :email');
        $queryBuilder->setParameter('email', $username);

        try{
            return $queryBuilder->getQuery()->getOneOrNullResult();
        }
        catch(\Exception $e){
            return null;
        }
    }
}
