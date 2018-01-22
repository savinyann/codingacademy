<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Aside controller
 *
 */
class AsideController extends Controller
{
	/**
	 * Render aside category
	 */
	public function getCategoryAction()
	{
		$em = $this->getDoctrine()->getManager();
		$categories = $em->getRepository("AppBundle:Category")->findAll();
		return $this->render('skeleton/nav.html.twig', array('categories' => $categories));
	}
}