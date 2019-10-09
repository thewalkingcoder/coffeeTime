<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandCoffeeRepository")
 */
class CommandCoffee
{

    const STATUT_EN_ATTENTE = 0;
    const STATUT_EN_PREPARATION = 1;
    const STATUT_DISPONIBLE = 2;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $coffee;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCommand;

    /**
     * @ORM\Column(type="integer")
     */
    private $statut;



    public function __construct($coffee, ?\DateTime $dateCommand = null)
    {
        $this->coffee = $coffee;
        $this->dateCommand = $dateCommand ?? new \DateTime('now');
        $this->statut = self::STATUT_EN_ATTENTE;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoffee(): ?string
    {
        return $this->coffee;
    }

    /**
     * @return int
     */
    public function getStatut(): int
    {
        return $this->statut;
    }

    /**
     * @param int $statut
     */
    public function setStatut(int $statut): void
    {
        $this->statut = $statut;
    }


    public function setCoffee(string $coffee): self
    {
        $this->coffee = $coffee;

        return $this;
    }

    public function getDateCommand(): ?\DateTimeInterface
    {
        return $this->dateCommand;
    }

    public function setDateCommand(\DateTimeInterface $dateCommand): self
    {
        $this->dateCommand = $dateCommand;

        return $this;
    }

    public function addSugar(int $sugar)
    {
        $this->sugar = $sugar;
    }
}
