<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User_Comment;
use AppBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User_comment controller.
 *
 * @Route("user_comment")
 */
class User_CommentController extends Controller
{
    /**
     * Lists all user_Comment entities.
     *
     * @Route("/", name="user_comment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user_Comments = $em->getRepository('AppBundle:User_Comment')->findAll();

        return $this->render('user_comment/index.html.twig', array(
            'user_Comments' => $user_Comments,
        ));
    }

    /**
     * Creates a new user_Comment entity.
     *
     * @Route("/new/{userid}", name="user_comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $userid)
    {
        if($userid == $this->getUser()->getId())
        {
            $this->addFlash("Forbidden", "You can not comment yourself.");
            return $this->redirectToRoute('user_show', array('id' => $userid));
        }
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneById($userid);

        $user_Comment = new User_comment();
        $user_Comment->setAuthor($this->getUser());
        $user_Comment->setUser($user);
        $form = $this->createForm('AppBundle\Form\User_CommentType', $user_Comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($user_Comment);
            $em->flush();
            $this->addFlash("Done", "Your comment has been added. Thanks for sharing your feels.");

            return $this->redirectToRoute('user_show', array('id' => $userid));
        }

        return $this->render('user_comment/new.html.twig', array(
            'user_Comment' => $user_Comment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a user_Comment entity.
     *
     * @Route("/{id}", name="user_comment_show")
     * @Method("GET")
     */
    public function showAction(User_Comment $user_Comment)
    {
        $deleteForm = $this->createDeleteForm($user_Comment);

        return $this->render('user_comment/show.html.twig', array(
            'user_Comment' => $user_Comment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user_Comment entity.
     *
     * @Route("/{id}/edit", name="user_comment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, User_Comment $user_Comment)
    {
        $deleteForm = $this->createDeleteForm($user_Comment);
        $editForm = $this->createForm('AppBundle\Form\User_CommentType', $user_Comment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_comment_edit', array('id' => $user_Comment->getId()));
        }

        return $this->render('user_comment/edit.html.twig', array(
            'user_Comment' => $user_Comment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user_Comment entity.
     *
     * @Route("/{id}", name="user_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, User_Comment $user_Comment)
    {
        $form = $this->createDeleteForm($user_Comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user_Comment);
            $em->flush();
        }

        return $this->redirectToRoute('user_comment_index');
    }

    /**
     * Creates a form to delete a user_Comment entity.
     *
     * @param User_Comment $user_Comment The user_Comment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(User_Comment $user_Comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_comment_delete', array('id' => $user_Comment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
