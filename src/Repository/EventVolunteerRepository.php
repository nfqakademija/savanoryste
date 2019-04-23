<?php

namespace App\Repository;

use App\Entity\EventVolunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EventVolunteer|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventVolunteer|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventVolunteer[]    findAll()
 * @method EventVolunteer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventVolunteerRepository extends ServiceEntityRepository
{
    /**
     * EventVolunteerRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EventVolunteer::class);
    }
}
