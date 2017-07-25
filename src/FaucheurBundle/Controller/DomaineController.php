<?php

namespace FaucheurBundle\Controller;

use FaucheurBundle\Entity\Domaine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Domaine controller.
 *
 */
class DomaineController extends Controller
{
    /**
     * Lists all domaine entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $domaines = $em->getRepository('FaucheurBundle:Domaine')->findAll();

        return $this->render('domaine/index.html.twig', array(
            'domaines' => $domaines,
        ));
    }

    /**
     * Creates a new domaine entity.
     *
     */
    public function newAction(Request $request)
    {
        $domaine = new Domaine();
        $form = $this->createForm('FaucheurBundle\Form\DomaineType', $domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($domaine);
            $em->flush();

            return $this->redirectToRoute('domaine_show', array('id' => $domaine->getId()));
        }

        return $this->render('domaine/new.html.twig', array(
            'domaine' => $domaine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a domaine entity.
     *
     */
    public function showAction(Domaine $domaine)
    {
        $deleteForm = $this->createDeleteForm($domaine);

        return $this->render('domaine/show.html.twig', array(
            'domaine' => $domaine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing domaine entity.
     *
     */
    public function editAction(Request $request, Domaine $domaine)
    {
        $deleteForm = $this->createDeleteForm($domaine);
        $editForm = $this->createForm('FaucheurBundle\Form\DomaineType', $domaine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('domaine_edit', array('id' => $domaine->getId()));
        }

        return $this->render('domaine/edit.html.twig', array(
            'domaine' => $domaine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a domaine entity.
     *
     */
    public function deleteAction(Request $request, Domaine $domaine)
    {
        $form = $this->createDeleteForm($domaine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($domaine);
            $em->flush();
        }

        return $this->redirectToRoute('domaine_index');
    }

    /**
     * Creates a form to delete a domaine entity.
     *
     * @param Domaine $domaine The domaine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Domaine $domaine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('domaine_delete', array('id' => $domaine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
