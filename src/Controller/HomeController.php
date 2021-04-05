<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{

    private $repo;
    private $em;

    public function __construct(PropertyRepository $repo, EntityManagerInterface $em)
    {
        $this->repo = $repo;
        $this->em = $em;
    }

    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        //$repository = $this->getDoctrine()->getRepository(Property::class);
        //dd($repository);
        $properties = $this->repo->findAll();
        // $property[0]->setSold(true);
        $this->em->flush();
        //dd($property);
        return $this->render('home/index.html.twig', [
            'properties' => $properties
        ]);
    }
}
