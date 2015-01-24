<?php

namespace Lesnictwo\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Lesnictwo\UserBundle\Entity\Uzytkownik;
use Lesnictwo\UserBundle\Form\UzytkownikType;

/**
 * Uzytkownik controller.
 *
 */
class UzytkownikController extends Controller
{

    /**
     * Lists all Uzytkownik entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('LesnictwoUserBundle:Uzytkownik')->findAll();

        return $this->render('LesnictwoUserBundle:Uzytkownik:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Uzytkownik entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Uzytkownik();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('users_show', array('uzytkownikId' => $entity->getuzytkownikId())));
        }

        return $this->render('LesnictwoUserBundle:Uzytkownik:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Uzytkownik entity.
     *
     * @param Uzytkownik $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Uzytkownik $entity)
    {
        $form = $this->createForm(new UzytkownikType(), $entity, array(
            'action' => $this->generateUrl('users_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Dodaj'));

        return $form;
    }

    /**
     * Displays a form to create a new Uzytkownik entity.
     *
     */
    public function newAction()
    {
        $entity = new Uzytkownik();
        $form   = $this->createCreateForm($entity);

        return $this->render('LesnictwoUserBundle:Uzytkownik:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Uzytkownik entity.
     *
     */
    public function showAction($uzytkownikId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LesnictwoUserBundle:Uzytkownik')->find($uzytkownikId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uzytkownik entity.');
        }

        $deleteForm = $this->createDeleteForm($uzytkownikId);

        return $this->render('LesnictwoUserBundle:Uzytkownik:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Uzytkownik entity.
     *
     */
    public function editAction($uzytkownikId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LesnictwoUserBundle:Uzytkownik')->find($uzytkownikId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uzytkownik entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($uzytkownikId);

        return $this->render('LesnictwoUserBundle:Uzytkownik:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Uzytkownik entity.
    *
    * @param Uzytkownik $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Uzytkownik $entity)
    {
        $form = $this->createForm(new UzytkownikType(), $entity, array(
            'action' => $this->generateUrl('users_update', array('uzytkownikId' => $entity->getUzytkownikId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Aktualizuj'));

        return $form;
    }
    /**
     * Edits an existing Uzytkownik entity.
     *
     */
    public function updateAction(Request $request, $uzytkownikId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('LesnictwoUserBundle:Uzytkownik')->find($uzytkownikId);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Uzytkownik entity.');
        }

        $deleteForm = $this->createDeleteForm($uzytkownikId);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('users_edit', array('uzytkownikId' => $uzytkownikId)));
        }

        return $this->render('LesnictwoUserBundle:Uzytkownik:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Uzytkownik entity.
     *
     */
    public function deleteAction(Request $request, $uzytkownikId)
    {
        $form = $this->createDeleteForm($uzytkownikId);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('LesnictwoUserBundle:Uzytkownik')->find($uzytkownikId);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Uzytkownik entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('users'));
    }

    /**
     * Creates a form to delete a Uzytkownik entity by id.
     *
     * @param mixed $uzytkownikId The entity uzytkownikId
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($uzytkownikId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('users_delete', array('uzytkownikId' => $uzytkownikId)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Usuń'))
            ->getForm()
        ;
    }
}
