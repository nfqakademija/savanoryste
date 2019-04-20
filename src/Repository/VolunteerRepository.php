<?php

namespace App\Repository;

use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Volunteer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Volunteer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Volunteer[]    findAll()
 * @method Volunteer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolunteerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Volunteer::class);
    }


    /**
     * @return array|null
     */
    public function AllVolunteers() :?array{
        return $this->createQueryBuilder('v')
            ->select('v.id','v.firstname', 'v.lastname', 'v.phone', 'v.email', 'v.job_type')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function SingleVolunteer(int $id) :?array{
        return $this->createQueryBuilder('v')
            ->select('v.id','v.firstname', 'v.lastname', 'v.phone', 'v.email', 'v.job_type')
            ->where('v.id = :id')
            ->setParameter(':id', $id)
            ->getQuery()
            ->getResult();
    }

}
