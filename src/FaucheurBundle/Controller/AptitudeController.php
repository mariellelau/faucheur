<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Aptitude;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Aptitude controller.
 *
 */
class AptitudeController extends Controller
{
    /**
     * Lists all aptitude entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $aptitudes = $em->getRepository('FaucheurBundle:Aptitude')->findAll();

        return $this->render('aptitude/index.html.twig', array(
            'aptitudes' => $aptitudes,
        ));
    }

    /**
     * Creates a new aptitude entity.
     *
     */
    public function newAction(Request $request)
    {
        $aptitude = new Aptitude();
        $form = $this->createForm('FaucheurBundle\Form\AptitudeType', $aptitude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($aptitude);
            $em->flush();

            return $this->redirectToRoute('aptitude_show', array('id' => $aptitude->getId()));
        }

        return $this->render('aptitude/new.html.twig', array(
            'aptitude' => $aptitude,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a aptitude entity.
     *
     */
    public function showAction(Aptitude $aptitude)
    {
        $deleteForm = $this->createDeleteForm($aptitude);

        return $this->render('aptitude/show.html.twig', array(
            'aptitude' => $aptitude,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing aptitude entity.
     *
     */
    public function editAction(Request $request, Aptitude $aptitude)
    {
        $deleteForm = $this->createDeleteForm($aptitude);
        $editForm = $this->createForm('FaucheurBundle\Form\AptitudeType', $aptitude);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aptitude_edit', array('id' => $aptitude->getId()));
        }

        return $this->render('aptitude/edit.html.twig', array(
            'aptitude' => $aptitude,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a aptitude entity.
     *
     */
    public function deleteAction(Request $request, Aptitude $aptitude)
    {
        $form = $this->createDeleteForm($aptitude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($aptitude);
            $em->flush();
        }

        return $this->redirectToRoute('aptitude_index');
    }

    /**
     * Creates a form to delete a aptitude entity.
     *
     * @param Aptitude $aptitude The aptitude entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Aptitude $aptitude)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('aptitude_delete', array('id' => $aptitude->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
