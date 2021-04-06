<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    private $repository;

    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("/biens", name="properties")
     */
    public function index(): Response
    {
        $properties = $this->repository->findAll();
        // dd($properties);
        return $this->render('property/index.html.twig', [
            'properties' => '$properties'
        ]);
    }

    /**
     * @Route("/biens/{slug}", name="property_show")
     */
    public function show($slug)
    {
        // dd($this->repository);
        $property = $this->repository->findOneBySlug($slug);
        //dd($property);
        if (!$property || $property->getSlug() !== $slug) {
            return $this->redirectToRoute('home');
        }
        //dd($property);
        return $this->render('property/show.html.twig', [
            'property' => $property
        ]);
    }
}
