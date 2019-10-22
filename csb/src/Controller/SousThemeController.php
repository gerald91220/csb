<?php

namespace App\Controller;

use App\Entity\SousTheme;
use App\Form\SousThemeType;
use App\Repository\SousThemeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sous/theme")
 */
class SousThemeController extends AbstractController
{
    /**
     * @Route("/", name="sous_theme_index", methods={"GET"})
     */
    public function index(SousThemeRepository $sousThemeRepository): Response
    {
        return $this->render('admin/sous_theme/index.html.twig', [
            'sous_themes' => $sousThemeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sous_theme_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
      
        $sousTheme = new SousTheme();
          
        $form = $this->createForm(SousThemeType::class, $sousTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sousTheme);
            $entityManager->flush();

            return $this->redirectToRoute('sous_theme_index');
        }

        return $this->render('admin/sous_theme/new.html.twig', [
            'sous_theme' => $sousTheme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sous_theme_show", methods={"GET"})
     */
    public function show(SousTheme $sousTheme): Response
    {
        return $this->render('admin/sous_theme/show.html.twig', [
            'sous_theme' => $sousTheme,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sous_theme_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SousTheme $sousTheme): Response
    {
        $form = $this->createForm(SousThemeType::class, $sousTheme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sous_theme_index');
        }

        return $this->render('admin/sous_theme/edit.html.twig', [
            'sous_theme' => $sousTheme,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sous_theme_delete", methods={"DELETE"})
     */
    public function delete(Request $request, SousTheme $sousTheme): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sousTheme->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sousTheme);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sous_theme_index');
    }
}
