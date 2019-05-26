<?php

namespace App\Repository;

use App\Entity\Review;
use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Review|null find($id, $lockMode = null, $lockVersion = null)
 * @method Review|null findOneBy(array $criteria, array $orderBy = null)
 * @method Review[]    findAll()
 * @method Review[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Review::class);
    }

    /**
     * @return array|null
     */
    public function filterByRating() :?array
    {
        return $this->createQueryBuilder('r')
            ->select('r','AVG(r.review_rating) AS rating_average')
            ->leftJoin(Volunteer::class,'v', Join::WITH, 'v.id = r.volunteer_id')
            ->having('rating_average > 8')
            ->groupBy('v')
            ->orderBy('rating_average', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
