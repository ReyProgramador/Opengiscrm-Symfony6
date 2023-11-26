<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->save($user, true);
    }

   //     public function findOneBySomeField($value): ?User
   // {
   //     return $this->createQueryBuilder('u')
   //         ->andWhere('u.exampleField = :val')
   //         ->setParameter('val', $value)
   //         ->getQuery()
   //         ->getOneOrNullResult()
   //     ;
   // }

     public function findCountryUserById(int $id): array
    {       

           // establecer la conexion para custom querys 
         $conn = $this->getEntityManager()->getConnection();       

          // $sql = '
          //   SELECT *
          //   FROM countrys as c
          //   LEFT JOIN users as u on u.country_id = c.id  
          //   WHERE u.country_id = :id
          //   ORDER BY c.country_id ASC
          //   ';

             $sql = '
            SELECT *
            FROM country as c
            LEFT JOIN user as u on u.country_id = c.id  
            -- WHERE u.country_id = :id
            -- ORDER BY c.country_id ASC
            ';

             $resultSet = $conn->executeQuery($sql);

        // $resultSet = $conn->executeQuery($sql, ['u.country_id' => $id]);

        // returns an array of arrays (i.e. a raw data set)
        return $resultSet->fetchAllAssociative();
    }

    // public function findCountryUserById(int $id): array
    // {
    //     $entityManager = $this->getEntityManager();

    //     $query = $entityManager->createQuery(
    //         'SELECT c
    //         FROM App\Entity\Country c
    //         LEFT JOIN App\Entity\User u on u.country_id = c.id  
    //         WHERE c.country_id = :id
    //         ORDER BY c.country_id ASC'            
    //     )->setParameter('country_id', $id);

    //     // returns an array of Product objects
    //     return $query->getResult();
    // }

//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
