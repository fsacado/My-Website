<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Identity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Identity controller.
 *
 * @Route("identity")
 */
class IdentityController extends Controller
{
    /**
     * Lists all identity entities.
     *
     * @Route("/", name="identity_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $identity = $em->getRepository('AppBundle:Identity')->findOneById(1);

        return $this->render('identity/show.html.twig', array(
            'identity' => $identity,
        ));
    }

    /**
     * Creates a new identity entity.
     *
     * @Route("/new", name="identity_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $identity = new Identity();
        $form = $this->createForm('AppBundle\Form\IdentityType', $identity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($identity);
            $em->flush();

            return $this->redirectToRoute('identity_show', array('id' => $identity->getId()));
        }

        return $this->render('identity/new.html.twig', array(
            'identity' => $identity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a identity entity.
     *
     * @Route("/{id}", name="identity_show")
     * @Method("GET")
     */
    public function showAction(Identity $identity)
    {
        $deleteForm = $this->createDeleteForm($identity);

        return $this->render('identity/show.html.twig', array(
            'identity' => $identity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing identity entity.
     *
     * @Route("/{id}/edit", name="identity_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Identity $identity)
    {
        $deleteForm = $this->createDeleteForm($identity);
        $editForm = $this->createForm('AppBundle\Form\IdentityType', $identity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('identity_edit', array('id' => $identity->getId()));
        }

        return $this->render('identity/edit.html.twig', array(
            'identity' => $identity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a identity entity.
     *
     * @Route("/{id}", name="identity_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Identity $identity)
    {
        $form = $this->createDeleteForm($identity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($identity);
            $em->flush();
        }

        return $this->redirectToRoute('identity_index');
    }

    /**
     * Creates a form to delete a identity entity.
     *
     * @param Identity $identity The identity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Identity $identity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('identity_delete', array('id' => $identity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
