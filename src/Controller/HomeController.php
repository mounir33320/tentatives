<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $annonces = $this->getDoctrine()->getRepository(Annonce::class)->findAll();

        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($annonce);
            $entityManager->flush();

        }
        return $this->render('home/index.html.twig', [
            'annonces' => $annonces,
            'form' => $form->createView(),
        ]);
    }
}
