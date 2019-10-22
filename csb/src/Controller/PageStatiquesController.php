<?php

namespace App\Controller;

use App\Entity\PageStatiques;
use App\Form\PageStatiquesType;
use App\Repository\PageStatiquesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PageStatiquesController extends AbstractController
{
    
    /**
     * @Route("/page/statiques/", name="page_statiques_index", methods={"GET"})
     */
    public function index(PageStatiquesRepository $pageStatiquesRepository): Response
    {
        return $this->render('admin/page_statiques/index.html.twig', [
            'page_statiques' => $pageStatiquesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/page/statiques/new", name="page_statiques_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $pageStatique = new PageStatiques();
        $form = $this->createForm(PageStatiquesType::class, $pageStatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($pageStatique);
            $entityManager->flush();

            return $this->redirectToRoute('page_statiques_index');
        }

        return $this->render('admin/page_statiques/new.html.twig', [
            'page_statique' => $pageStatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/page/statiques/{id}", name="page_statiques_show", methods={"GET"})
     */
    public function show(PageStatiques $pageStatique): Response
    {
        return $this->render('admin/page_statiques/show.html.twig', [
            'page_statique' => $pageStatique,
        ]);
    }

    /**
     * @Route("/page/statiques/{id}/edit", name="page_statiques_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, PageStatiques $pageStatique): Response
    {
        $form = $this->createForm(PageStatiquesType::class, $pageStatique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('page_statiques_index');
        }

        return $this->render('admin/page_statiques/edit.html.twig', [
            'page_statique' => $pageStatique,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/page/statiques/{id}", name="page_statiques_delete", methods={"DELETE"})
     */
    public function delete(Request $request, PageStatiques $pageStatique): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pageStatique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($pageStatique);
            $entityManager->flush();
        }

        return $this->redirectToRoute('page_statiques_index');
    }
}
