<?php

namespace App\Repository;

use App\Entity\Job;
use App\Entity\JobType;
use App\Entity\Volunteer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Job|null find($id, $lockMode = null, $lockVersion = null)
 * @method Job|null findOneBy(array $criteria, array $orderBy = null)
 * @method Job[]    findAll()
 * @method Job[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JobRepository extends ServiceEntityRepository
{
    /**
     * JobRepository constructor.
     * @param RegistryInterface $registry
     */
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Job::class);
    }

    /**
     * @param string $job_type
     * @return array|null
     */
    public function filterByJobType(string $job_type) :?array
    {
        return $this->createQueryBuilder('j')
            ->select('v')
            ->innerJoin(JobType::class, 'jt', Join::WITH, 'jt.id = j.job_type')
            ->innerJoin(Volunteer::class, 'v', Join::WITH, 'v.id = j.volunteer')
            ->andWhere('jt.job_type = :job_type')
            ->setParameter('job_type', $job_type)
            ->getQuery()
            ->getResult();
    }
}
