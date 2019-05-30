<?php

namespace App\Repository;

use App\Entity\Organisation;
use App\Entity\User;
use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    /**
     * UserRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }


    /**
     * @param int $userId
     * @return array|null
     */
    public function getVolunteerProfile(int $userId) :?array
    {
        return $this->createQueryBuilder('u')
            ->select('v')
            ->innerJoin(Volunteer::class, 'v', Join::WITH, 'u.profile_id = v.id')
            ->where('u.profile_id = :id')
            ->setParameter('id', $userId)
            ->getQuery()
            ->getResult();
    }


    /**
     * @param int $userId
     * @return array|null
     */
    public function getOrganisationProfile(int $userId) :?array
    {
        return $this->createQueryBuilder('u')
            ->select('v')
            ->innerJoin(Organisation::class, 'v', Join::WITH, 'u.profile_id = v.id')
            ->where('u.profile_id = :id')
            ->setParameter('id', $userId)
            ->getQuery()
            ->getResult();
    }
}
