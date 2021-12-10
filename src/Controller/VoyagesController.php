<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use App\Repository\VisiteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Description of VoyagesController
 *
 * @author Djeyson
 */
class VoyagesController extends AbstractController {
    
     /**
     * @Route("/voyages", name="voyages")
     * @return Response
     */
    public function index(): Response{
        $visites = $this->repository->findAll();
                return $this->render("pages/voyages.html.twig", [
                    'visites'=> $visites
        ]);
    }
    
   
    /**
     * @Route("/voyages/tri/{champ}/{ordre}", name="voyages.sort")
     * @param type $champ
     * @param type $ordre 
     * @return Response
     */
    public function sort($champ, $ordre): Response{
        
        $visites = $this->repository->findAllOrderBy($champ, $ordre);
                return $this->render("pages/voyages.html.twig", [
                    'visites'=> $visites
        ]);
    }

    /**
    * 
    * @var VisiteRepository
    */
    private $repository;
    
    /**
     * 
     * @param VisiteRepository $repository
     */
    public function __construct(VisiteRepository $repository) {
        
        $this->repository = $repository;
        
    }
            
}

