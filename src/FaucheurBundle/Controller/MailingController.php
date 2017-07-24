<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Mailing;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Mailing controller.
 *
 */
class MailingController extends Controller
{
    /**
     * Lists all mailing entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $mailings = $em->getRepository('FaucheurBundle:Mailing')->findAll();

        return $this->render('@Faucheur/mailing/index.html.twig', array(
            'mailings' => $mailings,
        ));
    }

    /**
     * Creates a new mailing entity.
     *
     */
    public function newAction(Request $request)
    {
        $mailing = new Mailing();
        $form = $this->createForm('FaucheurBundle\Form\MailingType', $mailing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($mailing);
            $em->flush();

            return $this->redirectToRoute('mailing_show', array('id' => $mailing->getId()));
        }

        return $this->render('@Faucheur/mailing/new.html.twig', array(
            'mailing' => $mailing,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mailing entity.
     *
     */
    public function showAction(Mailing $mailing)
    {
        $deleteForm = $this->createDeleteForm($mailing);

        return $this->render('@Faucheur/mailing/show.html.twig', array(
            'mailing' => $mailing,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mailing entity.
     *
     */
    public function editAction(Request $request, Mailing $mailing)
    {
        $deleteForm = $this->createDeleteForm($mailing);
        $editForm = $this->createForm('FaucheurBundle\Form\MailingType', $mailing);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mailing_edit', array('id' => $mailing->getId()));
        }

        return $this->render('@Faucheur/mailing/edit.html.twig', array(
            'mailing' => $mailing,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a mailing entity.
     *
     */
    public function deleteAction(Request $request, Mailing $mailing)
    {
        $form = $this->createDeleteForm($mailing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($mailing);
            $em->flush();
        }

        return $this->redirectToRoute('mailing_index');
    }

    /**
     * Creates a form to delete a mailing entity.
     *
     * @param Mailing $mailing The mailing entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Mailing $mailing)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mailing_delete', array('id' => $mailing->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
