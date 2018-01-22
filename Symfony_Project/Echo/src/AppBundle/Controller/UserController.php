<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("profile")
 */
class UserController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/index", name="profile_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:User')->findAll();

        return $this->render('user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('profile_show', array('id' => $user->getId()));
        }

        return $this->render('user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user entity.
     *
     * @Route("/show/{id}", name="user_show")
     * @Method("GET")
     */
    public function showAction(User $user)
    {
        $comments = $user->getUserComments();
        $deleteForm = $this->createDeleteForm($user);

        return $this->render('user/show.html.twig', array(
            'user' => $user,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/edit/{id}", name="user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User $user)
    {
        if(!in_array("ROLE_ADMIN", $this->getUser()->getRoles()))
        {
            $this->addFlash("Forbidden", "You are not allowed to be here, so you have been redirected.");
            return $this->redirectToRoute('homepage');
        }
        if(in_array("ROLE_ADMIN", $user->getRoles()))
        {
            $this->addFlash("Forbidden", "You can note edit or delete an admin account.");
            return $this->redirectToRoute('profile_index');
        }
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\UserType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash("Done", "User ".$user->getUsername()." has been updated");
            return $this->redirectToRoute('profile_index');
        }

        return $this->render('user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="profile_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User $user)
    {
        if(!in_array("ROLE_ADMIN", $this->getUser()->getRoles()))
        {
            $this->addFlash("Forbidden", "You are not allowed to delete this user, so you have been redirected.");
            return $this->redirectToRoute('homepage');
        }
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            if(in_array("ROLE_ADMIN", $user->getRoles()))
            {
                $this->addFlash("Forbidden", "You can not delete an administrator.");
            }
            else
            {
                $em = $this->getDoctrine()->getManager();
                $em->remove($user);
                $em->flush();
                $this->addFlash("Done", $user->getUsername()." has been deleted.");
            }
        }

        return $this->redirectToRoute('profile_index');
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/delete", name="profile_selfDelete")
     * @Method("GET")
     */
    public function selfDelete()
    {
        $user = $this->getUser();
        if(in_array("ROLE_ADMIN", $user->getRoles()))
        {
            $this->addFlash("Forbidden", "As an admin, you are not allowed to leave the site.");
            return $this->redirectToRoute("homepage");
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
            $this->addFlash("Done", "You account has been deleted.");
            return $this->redirectToRoute('fos_user_security_logout');
        }
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param User $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('profile_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
