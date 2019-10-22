<?php

namespace App\Controller;

use App\Entity\Partenaires;
use App\Form\PartenairesType;
use App\Repository\PartenairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/partenaires")
 */
class PartenairesController extends AbstractController
{
    /**
     * @Route("/", name="partenaires_index", methods={"GET"})
     */
    public function index(PartenairesRepository $partenairesRepository): Response
    {
        return $this->render('admin/partenaires/index.html.twig', [
            'partenaires' => $partenairesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="partenaires_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $partenaire = new Partenaires();
        $form = $this->createForm(PartenairesType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partenaire);
            $entityManager->flush();

            return $this->redirectToRoute('partenaires_index');
        }

        return $this->render('admin/partenaires/new.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="partenaires_show", methods={"GET"})
     */
    public function show(Partenaires $partenaire): Response
    {
        return $this->render('admin/partenaires/show.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="partenaires_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Partenaires $partenaire): Response
    {
        $form = $this->createForm(PartenairesType::class, $partenaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partenaires_index');
        }

        return $this->render('admin/partenaires/edit.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="partenaires_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Partenaires $partenaire): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partenaire->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partenaire);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partenaires_index');
    }
}
