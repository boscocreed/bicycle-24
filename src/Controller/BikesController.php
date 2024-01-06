<?php

namespace App\Controller;

use App\Entity\Bike;
use App\Form\BikeFormType;
use App\Repository\BikeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BikesController extends AbstractController
{
    private $em;
    public function __construct(BikeRepository $em)
    {
        $this->em = $em;
    }

    #[Route('/bikes', name: 'bikes')]
    public function index(): Response
    {
        $bikes = $this->em->findAll();

        $bike = new Bike();
        $form = $this->createForm(BikeFormType::class, $bike);

        return $this->render('bikes/index.html.twig',[
            'bikes' => $bikes,
            'form' => $form
        ]);
    }

    #[Route('/bike/create', name: 'create_bike')]
    public function create(): Response
    {
        
        

        return $this->render('bikes/index.html.twig', [
            'bike' => $bike
        ]);
    }

    #[Route('/bike/{id}', name: 'bike')]
    public function show($id): Response
    {
        $bike = $this->em->find($id);

        return $this->render('bikes/index.html.twig',[
            'bike' => $bike
        ]);
    }
}
