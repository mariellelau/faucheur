<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Militant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MilitantController extends Controller
{
    /**
     * Lists all militant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $militants = $em->getRepository('FaucheurBundle:Militant')->findAll();

        return $this->render('@Faucheur/militant/index.html.twig', array(
            'militants' => $militants,
        ));
    }

    /**
     * Creates a new militant entity.
     *
     */
    public function newAction(Request $request)
    {
        $militant = new Militant();
        $form = $this->createForm('FaucheurBundle\Form\MilitantType', $militant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($militant);
            $em->flush();

            return $this->redirectToRoute('militant_show', array('id' => $militant->getId()));
        }

        return $this->render('@Faucheur/militant/new.html.twig', array(
            'militant' => $militant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a militant entity.
     *
     */
    public function showAction(Militant $militant)
    {
        $deleteForm = $this->createDeleteForm($militant);

        return $this->render('@Faucheur/militant/show.html.twig', array(
            'militant' => $militant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing militant entity.
     *
     */
    public function editAction(Request $request, Militant $militant)
    {
        $deleteForm = $this->createDeleteForm($militant);
        $editForm = $this->createForm('FaucheurBundle\Form\MilitantsType', $militant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('militant_edit', array('id' => $militant->getId()));
        }

        return $this->render('@Faucheur/militant/edit.html.twig', array(
            'militant' => $militant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a militant entity.
     *
     */
    public function deleteAction(Request $request, Militant $militant)
    {
        $form = $this->createDeleteForm($militant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($militant);
            $em->flush();
        }

        return $this->redirectToRoute('militant_index');
    }

    /**
     * Creates a form to delete a militant entity.
     *
     * @param Militant $militant The militant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Militant $militant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('militant_delete', array('id' => $militant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
