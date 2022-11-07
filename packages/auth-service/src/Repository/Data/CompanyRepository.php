<?php

namespace App\Repository\Data;

use App\Entity\Data\Company;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Company>
 *
 * @method Company|null find($id, $lockMode = null, $lockVersion = null)
 * @method Company|null findOneBy(array $criteria, array $orderBy = null)
 * @method Company[]    findAll()
 * @method Company[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Company::class);
    }

    public function add(Company $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Company $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @return Company[]
     */
   public function findByNameOrRegNumber($data) : array
   {
    $qb = $this->createQueryBuilder('c')
    ->select("c.regNumber as value, c.name as label, c.regNumberAlt")
    ->where('c.regNumber = :data')
    ->setParameter('data', $data);
    $result = $qb->getQuery()->execute();

    if(count($result) === 0)
    {
        $qb = $this->createQueryBuilder('c')
        ->select("c.regNumber as value, c.name as label, c.regNumberAlt")
        ->where('MATCH_AGAINST (c.name) AGAINST (:name boolean)>0')
        ->setParameter('name',"%".$data."%")
        ->setMaxResults(100);
        $result = $qb->getQuery()->execute();
    }
    return $result;

   }
}
