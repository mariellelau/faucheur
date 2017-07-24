<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Proximite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Proximite controller.
 *
 */
class ProximiteController extends Controller
{
    /**
     * Lists all proximite entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $proximites = $em->getRepository('FaucheurBundle:Proximite')->findAll();

        return $this->render('proximite/index.html.twig', array(
            'proximites' => $proximites,
        ));
    }

    /**
     * Creates a new proximite entity.
     *
     */
    public function newAction(Request $request)
    {
        $proximite = new Proximite();
        $form = $this->createForm('FaucheurBundle\Form\ProximiteType', $proximite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($proximite);
            $em->flush();

            return $this->redirectToRoute('proximite_show', array('id' => $proximite->getId()));
        }

        return $this->render('proximite/new.html.twig', array(
            'proximite' => $proximite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a proximite entity.
     *
     */
    public function showAction(Proximite $proximite)
    {
        $deleteForm = $this->createDeleteForm($proximite);

        return $this->render('proximite/show.html.twig', array(
            'proximite' => $proximite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing proximite entity.
     *
     */
    public function editAction(Request $request, Proximite $proximite)
    {
        $deleteForm = $this->createDeleteForm($proximite);
        $editForm = $this->createForm('FaucheurBundle\Form\ProximiteType', $proximite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('proximite_edit', array('id' => $proximite->getId()));
        }

        return $this->render('proximite/edit.html.twig', array(
            'proximite' => $proximite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a proximite entity.
     *
     */
    public function deleteAction(Request $request, Proximite $proximite)
    {
        $form = $this->createDeleteForm($proximite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($proximite);
            $em->flush();
        }

        return $this->redirectToRoute('proximite_index');
    }

    /**
     * Creates a form to delete a proximite entity.
     *
     * @param Proximite $proximite The proximite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Proximite $proximite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('proximite_delete', array('id' => $proximite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
