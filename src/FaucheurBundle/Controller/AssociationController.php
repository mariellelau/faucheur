<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Association;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Association controller.
 *
 */
class AssociationController extends Controller
{
    /**
     * Lists all association entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $associations = $em->getRepository('FaucheurBundle:Association')->findAll();

        return $this->render('@Faucheur/association/index.html.twig', array(
            'associations' => $associations,
        ));
    }

    /**
     * Creates a new association entity.
     *
     */
    public function newAction(Request $request)
    {
        $association = new Association();
        $form = $this->createForm('FaucheurBundle\Form\AssociationType', $association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($association);
            $em->flush();

            return $this->redirectToRoute('association_show', array('id' => $association->getId()));
        }

        return $this->render('@Faucheur/association/new.html.twig', array(
            'association' => $association,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a association entity.
     *
     */
    public function showAction(Association $association)
    {
        $deleteForm = $this->createDeleteForm($association);

        return $this->render('@Faucheur/association/show.html.twig', array(
            'association' => $association,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing association entity.
     *
     */
    public function editAction(Request $request, Association $association)
    {
        $deleteForm = $this->createDeleteForm($association);
        $editForm = $this->createForm('FaucheurBundle\Form\AssociationType', $association);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('association_edit', array('id' => $association->getId()));
        }

        return $this->render('@Faucheur/association/edit.html.twig', array(
            'association' => $association,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a association entity.
     *
     */
    public function deleteAction(Request $request, Association $association)
    {
        $form = $this->createDeleteForm($association);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($association);
            $em->flush();
        }

        return $this->redirectToRoute('association_index');
    }

    /**
     * Creates a form to delete a association entity.
     *
     * @param Association $association The association entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Association $association)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('association_delete', array('id' => $association->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
