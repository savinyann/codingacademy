<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product_Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Product_comment controller.
 *
 * @Route("product_comment")
 */
class Product_CommentController extends Controller
{
    /**
     * Lists all product_Comment entities.
     *
     * @Route("/", name="product_comment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $product_Comments = $em->getRepository('AppBundle:Product_Comment')->findAll();

        return $this->render('product_comment/index.html.twig', array(
            'product_Comments' => $product_Comments,
        ));
    }

    /**
     * Creates a new product_Comment entity.
     *
     * @Route("/new/{productid}", name="product_comment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, $productid)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('AppBundle:Product')->findOneById($productid);
        if($product->getUser() == $this->getUser())
        {
            $this->addFlash("Forbidden", "You can not comment one of your product.");
            return $this->redirectToRoute('product_show', array('id'=> $productid));
        }
        $product_Comment = new Product_comment();
        $product_Comment->setAuthor($this->getUser());
        $product_Comment->setProduct($product);
        $form = $this->createForm('AppBundle\Form\Product_CommentType', $product_Comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($product_Comment);
            $em->flush();
            $this->addFlash("Done", "Your comment has been added. Thanks for sharing your feels.");
            return $this->redirectToRoute('product_show', array('id' => $productid));
        }

        return $this->render('product_comment/new.html.twig', array(
            'product_Comment' => $product_Comment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a product_Comment entity.
     *
     * @Route("/{id}", name="product_comment_show")
     * @Method("GET")
     */
    public function showAction(Product_Comment $product_Comment)
    {
        $deleteForm = $this->createDeleteForm($product_Comment);

        return $this->render('product_comment/show.html.twig', array(
            'product_Comment' => $product_Comment,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing product_Comment entity.
     *
     * @Route("/{id}/edit", name="product_comment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Product_Comment $product_Comment)
    {
        $deleteForm = $this->createDeleteForm($product_Comment);
        $editForm = $this->createForm('AppBundle\Form\Product_CommentType', $product_Comment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_comment_edit', array('id' => $product_Comment->getId()));
        }

        return $this->render('product_comment/edit.html.twig', array(
            'product_Comment' => $product_Comment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a product_Comment entity.
     *
     * @Route("/{id}", name="product_comment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Product_Comment $product_Comment)
    {
        $form = $this->createDeleteForm($product_Comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product_Comment);
            $em->flush();
        }

        return $this->redirectToRoute('product_comment_index');
    }

    /**
     * Creates a form to delete a product_Comment entity.
     *
     * @param Product_Comment $product_Comment The product_Comment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Product_Comment $product_Comment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_comment_delete', array('id' => $product_Comment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
