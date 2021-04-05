<?php

namespace App\Controller;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PropertyController extends AbstractController
{
    /**
     * @Route("/property", name="property")
     */
    public function index(): Response
    {
        return $this->render('property/index.html.twig', [
            'controller_name' => 'PropertyController',
        ]);
    }

    /**
     * @Route("/biens/{slug}", name="property_show")
     */
    public function show(PropertyRepository $propertyRepository, $slug)
    {
        $property = $propertyRepository->findOneBySlug($slug);
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
