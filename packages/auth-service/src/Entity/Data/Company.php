<?php

namespace App\Entity\Data;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company", indexes={@ORM\Index(name="name", columns={"name"}), @ORM\Index(name="reg_number_alt", columns={"reg_number_alt"})})
 * @ORM\Entity(repositoryClass="App\Repository\Data\CompanyRepository")
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="reg_number", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $regNumber;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="timestamp_created", type="datetime", nullable=true, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestampCreated = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=2, nullable=false)
     */
    private $countryCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reg_number_alt", type="string", length=45, nullable=true)
     */
    private $regNumberAlt;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string|null
     *
     * @ORM\Column(name="county", type="string", length=255, nullable=true)
     */
    private $county;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_registered", type="integer", nullable=true)
     */
    private $yearRegistered;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_inactive", type="integer", nullable=true)
     */
    private $yearInactive;

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_fin_last_submitted", type="integer", nullable=true)
     */
    private $yearFinLastSubmitted;

    /**
     * @var int|null
     *
     * @ORM\Column(name="legal_status_valid", type="integer", nullable=true)
     */
    private $legalStatusValid = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="legal_status_name", type="string", length=45, nullable=true)
     */
    private $legalStatusName;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date_legal_status", type="date", nullable=true)
     */
    private $dateLegalStatus;

    /**
     * @var string|null
     *
     * @ORM\Column(name="authorisation_act", type="string", length=255, nullable=true)
     */
    private $authorisationAct;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var string|null
     *
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private $observations;

    public function getRegNumber(): ?string
    {
        return $this->regNumber;
    }

    public function getTimestampCreated(): ?\DateTimeInterface
    {
        return $this->timestampCreated;
    }

    public function setTimestampCreated(?\DateTimeInterface $timestampCreated): self
    {
        $this->timestampCreated = $timestampCreated;

        return $this;
    }

    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    public function setCountryCode(string $countryCode): self
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    public function getRegNumberAlt(): ?string
    {
        return $this->regNumberAlt;
    }

    public function setRegNumberAlt(?string $regNumberAlt): self
    {
        $this->regNumberAlt = $regNumberAlt;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getCounty(): ?string
    {
        return $this->county;
    }

    public function setCounty(?string $county): self
    {
        $this->county = $county;

        return $this;
    }

    public function getYearRegistered(): ?int
    {
        return $this->yearRegistered;
    }

    public function setYearRegistered(?int $yearRegistered): self
    {
        $this->yearRegistered = $yearRegistered;

        return $this;
    }

    public function getYearInactive(): ?int
    {
        return $this->yearInactive;
    }

    public function setYearInactive(?int $yearInactive): self
    {
        $this->yearInactive = $yearInactive;

        return $this;
    }

    public function getYearFinLastSubmitted(): ?int
    {
        return $this->yearFinLastSubmitted;
    }

    public function setYearFinLastSubmitted(?int $yearFinLastSubmitted): self
    {
        $this->yearFinLastSubmitted = $yearFinLastSubmitted;

        return $this;
    }

    public function getLegalStatusValid(): ?int
    {
        return $this->legalStatusValid;
    }

    public function setLegalStatusValid(?int $legalStatusValid): self
    {
        $this->legalStatusValid = $legalStatusValid;

        return $this;
    }

    public function getLegalStatusName(): ?string
    {
        return $this->legalStatusName;
    }

    public function setLegalStatusName(?string $legalStatusName): self
    {
        $this->legalStatusName = $legalStatusName;

        return $this;
    }

    public function getDateLegalStatus(): ?\DateTimeInterface
    {
        return $this->dateLegalStatus;
    }

    public function setDateLegalStatus(?\DateTimeInterface $dateLegalStatus): self
    {
        $this->dateLegalStatus = $dateLegalStatus;

        return $this;
    }

    public function getAuthorisationAct(): ?string
    {
        return $this->authorisationAct;
    }

    public function setAuthorisationAct(?string $authorisationAct): self
    {
        $this->authorisationAct = $authorisationAct;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getObservations(): ?string
    {
        return $this->observations;
    }

    public function setObservations(?string $observations): self
    {
        $this->observations = $observations;

        return $this;
    }


}
