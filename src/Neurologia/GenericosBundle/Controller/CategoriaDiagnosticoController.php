<?php

namespace Neurologia\GenericosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Neurologia\BDBundle\Entity\CategoriaDiagnostico;
use Neurologia\GenericosBundle\Form\CategoriaDiagnosticoType;

/**
 * CategoriaDiagnostico controller.
 *
 */
class CategoriaDiagnosticoController extends Controller
{

    /**
     * Lists all CategoriaDiagnostico entities.
     *
     */
    public function indexAction($error=null, $msj=null)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('NeurologiaBDBundle:CategoriaDiagnostico')->findAll();

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:index.html.twig', array(
            'entities' => $entities,
			'error'=>$error,
			'msj'=>$msj,
        ));
    }
    /**
     * Creates a new CategoriaDiagnostico entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new CategoriaDiagnostico();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            try {
				$em->flush();
			}
			catch (\Doctrine\DBAL\DBALException $e) {
				if ($e->getCode() == 0){
					if ($e->getPrevious()->getCode() == 23000){
						return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('error'=>'Error de clave duplicada'));
					}
					else{
						throw $e;
					}
				}
				else{
					throw $e;
				}
			}
			return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('msj'=>'Registro creado satisfactoriamente'));
            //return $this->redirect($this->generateUrl('categoriadiagnostico_show', array('id' => $entity->getId())));
        }

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a CategoriaDiagnostico entity.
     *
     * @param CategoriaDiagnostico $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(CategoriaDiagnostico $entity)
    {
        $form = $this->createForm(new CategoriaDiagnosticoType(), $entity, array(
            'action' => $this->generateUrl('categoriadiagnostico_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Crear', 'attr' => array('class' => 'btn btn-success',)));

        return $form;
    }

    /**
     * Displays a form to create a new CategoriaDiagnostico entity.
     *
     */
    public function newAction()
    {
        $entity = new CategoriaDiagnostico();
        $form   = $this->createCreateForm($entity);

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a CategoriaDiagnostico entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NeurologiaBDBundle:CategoriaDiagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaDiagnostico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing CategoriaDiagnostico entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NeurologiaBDBundle:CategoriaDiagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaDiagnostico entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a CategoriaDiagnostico entity.
    *
    * @param CategoriaDiagnostico $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CategoriaDiagnostico $entity)
    {
        $form = $this->createForm(new CategoriaDiagnosticoType(), $entity, array(
            'action' => $this->generateUrl('categoriadiagnostico_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Actualizar', 'attr' => array('class' => 'btn btn-success',)));

        return $form;
    }
    /**
     * Edits an existing CategoriaDiagnostico entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('NeurologiaBDBundle:CategoriaDiagnostico')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaDiagnostico entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            try {
				$em->flush();
			}
			catch (\Doctrine\DBAL\DBALException $e) {
				if ($e->getCode() == 0){
					if ($e->getPrevious()->getCode() == 23000){
						return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('error'=>'Error de clave duplicada'));
					}
					else{
						throw $e;
					}
				}
				else{
					throw $e;
				}
			}
			return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('msj'=>'Registro modificado satisfactoriamente'));
            //return $this->redirect($this->generateUrl('categoriadiagnostico_edit', array('id' => $id)));
        }

        return $this->render('NeurologiaGenericosBundle:CategoriaDiagnostico:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a CategoriaDiagnostico entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('NeurologiaBDBundle:CategoriaDiagnostico')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CategoriaDiagnostico entity.');
            }
			$em->remove($entity);
			
			try {	
				$em->flush();
				
			} catch (\Doctrine\DBAL\DBALException $e) {
				if ($e->getCode() == 0){
					if ($e->getPrevious()->getCode() == 23000){ 	//Error de integridad referencial
						return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('error'=>'Imposible eliminar por integridad referencial'));
					}
					else{
						throw $e;
					}
				}
				else{
					throw $e;
				}
			}				
		}

        return $this->forward('NeurologiaGenericosBundle:CategoriaDiagnostico:index', array('msj'=>'Registro eliminado satisfactoriamente'));
    }

    /**
     * Creates a form to delete a CategoriaDiagnostico entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriadiagnostico_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Borrar', 'attr' => array('class' => 'btn btn-danger',)))
            ->getForm()
        ;
    }
}
