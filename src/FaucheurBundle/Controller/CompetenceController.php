<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Competence;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Competence controller.
 *
 */
class CompetenceController extends Controller
{
    /**
     * Lists all competence entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competences = $em->getRepository('FaucheurBundle:Competence')->findAll();

        return $this->render('@Faucheur/competence/index.html.twig', array(
            'competences' => $competences,
        ));
    }

    /**
     * Creates a new competence entity.
     *
     */
    public function newAction(Request $request)
    {
        $competence = new Competence();
        $form = $this->createForm('FaucheurBundle\Form\CompetenceType', $competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competence);
            $em->flush();

            return $this->redirectToRoute('competence_show', array('id' => $competence->getId()));
        }

        return $this->render('@Faucheur/competence/new.html.twig', array(
            'competence' => $competence,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competence entity.
     *
     */
    public function showAction(Competence $competence)
    {
        $deleteForm = $this->createDeleteForm($competence);

        return $this->render('@Faucheur/competence/show.html.twig', array(
            'competence' => $competence,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competence entity.
     *
     */
    public function editAction(Request $request, Competence $competence)
    {
        $deleteForm = $this->createDeleteForm($competence);
        $editForm = $this->createForm('FaucheurBundle\Form\CompetenceType', $competence);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competence_edit', array('id' => $competence->getId()));
        }

        return $this->render('@Faucheur/competence/edit.html.twig', array(
            'competence' => $competence,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a competence entity.
     *
     */
    public function deleteAction(Request $request, Competence $competence)
    {
        $form = $this->createDeleteForm($competence);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competence);
            $em->flush();
        }

        return $this->redirectToRoute('competence_index');
    }

    /**
     * Creates a form to delete a competence entity.
     *
     * @param Competence $competence The competence entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Competence $competence)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competence_delete', array('id' => $competence->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
