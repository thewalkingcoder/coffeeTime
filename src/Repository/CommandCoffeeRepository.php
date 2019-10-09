<?php

namespace App\Repository;

use App\Entity\CommandCoffee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CommandCoffee|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommandCoffee|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommandCoffee[]    findAll()
 * @method CommandCoffee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandCoffeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommandCoffee::class);
    }

    public function add(CommandCoffee $commandCoffee)
    {
        $this->_em->persist($commandCoffee);
        $this->_em->flush();

        return $commandCoffee;
    }
}
