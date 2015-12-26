<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AppBundle\Entity\ChefProjet;
use AppBundle\Form\ChefProjetType;

/**
 * ChefProjet controller.
 *
 */
class ChefProjetController extends Controller
{
    /**
     * Lists all ChefProjet entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $chefProjets = $em->getRepository('AppBundle:ChefProjet')->findAll();

        return $this->render('AppBundle:chefprojet:index.html.twig', array(
            'chefProjets' => $chefProjets,
        ));
    }

    /**
     * Creates a new ChefProjet entity.
     *
     */
    public function newAction(Request $request)
    {
        $chefProjet = new ChefProjet();
        $form = $this->createForm('AppBundle\Form\ChefProjetType', $chefProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chefProjet);
            $em->flush();

            return $this->redirectToRoute('chefprojet_show', array('id' => $chefprojet->getId()));
        }

        return $this->render('AppBundle:chefprojet:new.html.twig', array(
            'chefProjet' => $chefProjet,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ChefProjet entity.
     *
     */
    public function showAction(ChefProjet $chefProjet)
    {
        $deleteForm = $this->createDeleteForm($chefProjet);

        return $this->render('AppBundle:chefprojet:show.html.twig', array(
            'chefProjet' => $chefProjet,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ChefProjet entity.
     *
     */
    public function editAction(Request $request, ChefProjet $chefProjet)
    {
        $deleteForm = $this->createDeleteForm($chefProjet);
        $editForm = $this->createForm('AppBundle\Form\ChefProjetType', $chefProjet);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($chefProjet);
            $em->flush();

            return $this->redirectToRoute('chefprojet_edit', array('id' => $chefProjet->getId()));
        }

        return $this->render('AppBundle:chefprojet:edit.html.twig', array(
            'chefProjet' => $chefProjet,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ChefProjet entity.
     *
     */
    public function deleteAction(Request $request, ChefProjet $chefProjet)
    {
        $form = $this->createDeleteForm($chefProjet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($chefProjet);
            $em->flush();
        }

        return $this->redirectToRoute('chefprojet_index');
    }

    /**
     * Creates a form to delete a ChefProjet entity.
     *
     * @param ChefProjet $chefProjet The ChefProjet entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ChefProjet $chefProjet)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('chefprojet_delete', array('id' => $chefProjet->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
