<?php

namespace App\Controller\Admin;

use App\Entity\Property;
use App\Repository\PropertyRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminPropertyController extends AbstractController
{

    private $repository;


    public function __construct(PropertyRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/admin", name="admin.property.index")
     */
    public function index()
    {
        $properties = $this->repository->findAll();
        // dd($properties);
        return $this->render('admin/index.html.twig', [
            'properties' => $properties
        ]);
    }

    /**
     * @Route("/admin/edit/{id}", name="admin.property.edit")
     */
    public function edit(Property $property)
    {
        //dd($property);
        return $this->render('admin/property/edit.html.twig', [
            'property' => $property
        ]);
    }
}
