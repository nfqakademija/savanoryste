<?php

namespace App\Repository;

use App\Entity\Event;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Event|null find($id, $lockMode = null, $lockVersion = null)
 * @method Event|null findOneBy(array $criteria, array $orderBy = null)
 * @method Event[]    findAll()
 * @method Event[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Event::class);
    }

    /**
     * @param int $id
     * @return array|null
     */
    public function getEventsByVolunteerId(int $id) :?array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id', 'e.title', 'e.start_date', 'e.end_date', 'e.description')
            ->innerJoin('App\Entity\EventVolunteer', 'ev', Join::WITH, 'ev.event_id = e.id')
            ->innerJoin('App\Entity\Volunteer', 'v', Join::WITH, 'ev.volunteer_id = v.id')
            ->where('v.id = :id')
            ->setParameter('id' , $id)
            ->getQuery()
            ->getResult();
    }

    /**
     * @return array|null
     */
    public function getAllEvents() :?array
    {
        return $this->createQueryBuilder('e')
            ->select('e.id','e.title', 'e.start_date','e.end_date', 'e.description')
            ->getQuery()
            ->getResult();
    }
}
