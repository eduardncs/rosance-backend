<?php

namespace App\Service;

use App\Entity\Data\Company;
use App\Repository\Data\CompanyRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


use Exception;

class CompanyService extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry) {
        $this->registry = $registry;
    }

    /**
     * Save user and send email
     *
     * @param string $search
     * @return bool
     */
    public function filterCompany(string $search)
    {
        try {

            $companies = $this->registry
            ->getRepository(Company::class,'data')
            ->findByNameOrRegNumber($search);
            return $companies;

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}