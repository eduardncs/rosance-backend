<?php

namespace App\Entity\Ro;

use Doctrine\ORM\Mapping as ORM;
use Gesdinet\JWTRefreshTokenBundle\Document\RefreshToken as BaseRefreshToken;
/**
 * RefreshTokens
 *
 * @ORM\Table(name="refresh_tokens", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_9BACE7E1C74F2195", columns={"refresh_token"})})
 * @ORM\Entity(repositoryClass="App\Repository\Ro\RefreshTokensRepository")
 */
class RefreshTokens extends BaseRefreshToken
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="refresh_token", type="string", length=128, nullable=false)
     */
    protected $refreshToken;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=false)
     */
    protected $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="valid", type="datetime", nullable=false)
     */
    protected $valid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefreshToken(): ?string
    {
        return $this->refreshToken;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function getValid(): ?\DateTimeInterface
    {
        return $this->valid;
    }

}
