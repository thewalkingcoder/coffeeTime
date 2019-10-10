<?php

namespace App\Controller;

use App\Entity\Coffee;
use App\Entity\CommandCoffee;
use App\Repository\CommandCoffeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AppController extends AbstractController
{

    /**
     * @var CommandCoffeeRepository
     */
    private $coffeeRepository;

    public function __construct(CommandCoffeeRepository $coffeeRepository)
    {
        $this->coffeeRepository = $coffeeRepository;
    }

    /**
     * @Route("/", name="app")
     */
    public function index(Request $request)
    {


        return $this->render('app/index.html.twig');
    }

    /**
     * @Route("/new-command", name="app_new_command")
     */
    public function newCommand(Request $request, SerializerInterface $serializer)
    {
        sleep('1');
        $coffeeJson = $request->request->get('coffeeSelect');
        $sugar = $request->request->get('sugarSelect');
        $coffee = $serializer->deserialize($coffeeJson, Coffee::class, 'json');
        $commandeCoffee = new CommandCoffee($coffee->name);
        $commandeCoffee->addSugar($sugar);
        $this->coffeeRepository->add($commandeCoffee);

        $numeroCommand = str_pad($commandeCoffee->getId(), 5, "0", STR_PAD_LEFT);
        return new JsonResponse(['resultat' => $numeroCommand]);
    }

}
