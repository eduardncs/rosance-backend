<?php

namespace App\Entity\Ro;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserCompany
 *
 * @ORM\Table(name="user_company", indexes={@ORM\Index(name="user_id_company_id", columns={"user_id", "company_id"})})
 * @ORM\Entity
 */
class UserCompany
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $userId = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="company_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $companyId = '0';

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getCompanyId(): ?int
    {
        return $this->companyId;
    }

    public function setCompanyId(int $companyId): self
    {
        $this->companyId = $companyId;

        return $this;
    }


}
