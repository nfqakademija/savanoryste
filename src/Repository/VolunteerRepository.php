<?php

namespace App\Repository;

use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DBALException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Volunteer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Volunteer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Volunteer[]    findAll()
 * @method Volunteer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VolunteerRepository extends ServiceEntityRepository
{
    /**
     * VolunteerRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Volunteer::class);
    }


    /**
     * @return array|null
     */
    public function filterByEventTotalCount() :?array
    {
        return $this->getEntityManager()->getRepository(Volunteer::class, 'v')
            ->createQueryBuilder('e')
            ->addSelect('COUNT(v.id) AS attendance_count')
            ->innerJoin('e.events', 'v')
            ->groupBy('e')
            ->orderBy('attendance_count', 'DESC')
            ->getQuery()
            ->getResult();
    }


    /**
     * @return null|string
     */
    public function getParticipantCount() :?string
    {
        $conn = $this->getEntityManager()->getConnection();
        try {
            $stmt = $conn->prepare(
                'SELECT COUNT(v.id) + (SELECT COUNT(o.id) from organisation o) AS partCount FROM volunteer v'
            );
        } catch (DBALException $e) {
            return null;
        }
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_COLUMN);
    }
}
