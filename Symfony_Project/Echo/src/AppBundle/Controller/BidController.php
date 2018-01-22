<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Bid controller
 *
 * @Route("bid")
 */
class BidController extends Controller
{
	/**
	 * Bid on a product
	 *
	 * @Route("/add/{id}", name="add_bid")
	 * @Method({"GET", "POST"})
	 */
	public function bid(Request $request, Product $product)
	{
		if($product->getEnded() < new \DateTime())
		{
			$this->addFlash("Forbidden", "This bidding is over.");
			return $this->redirectToRoute("product_show", array('id' => $product->getId()));
		}
		$currentbid = $product->getCurrentbid();
		$startingPrice = $product->getStartingPrice();
		$autobid = $product->getAutobid();
		$autobidder = $product->getAutobidder();

		if($currentbid >= $startingPrice)
		{
			$product->setCurrentbid($currentbid + $product->getMinbid());
		}
		else
		{
			$product->setCurrentbid($startingPrice);
		}
		$product->setAutobid($product->getCurrentbid() + $product->getMinbid());

		$formBid = $this->createForm('AppBundle\Form\BidType', $product);
		$formAutoBid = $this->createForm('AppBundle\Form\AutoBidType', $product);


		$em = $this->getDoctrine()->getManager();

		// FORMBID VALIDATION \\
		$formBid->handleRequest($request);

		if($formBid->isSubmitted() && $formBid->isValid())
		{
			if(($product->getCurrentbid() - ($currentbid + $product->getMinbid())) < 0)
			{
				$this->addFlash("Forbidden", "Your bid have to be greater than previous bid plus a minimum bid to be registered.");
			}
			else if($product->getCurrentbid() < $product->getStartingPrice())
			{
				$this->addFlash("Forbidden", "Your bid have to be greater than the starting Price to be registered");
			}
			else if($product->getCurrentbid() < $autobid)
			{
				$product->setCurrentbid($product->getCurrentbid() + $product->getMinbid());
				$product->setAutobid($autobid);
				$em->persist($product);
				$em->flush();
				$this->addFlash("Done", "Your bid has been registered.");
			}
			else
			{
				if($product->getPrice() && $product->getCurrentbid() > $product->getPrice())
				{
					$product->setCurrentbid($product->getPrice());
					$product->setEnded(new \DateTime());
					$this->addFlash("Done", "Product has been buyed.");
				}
				else
				{
					$this->addFlash("Done", "Your bid has been registered.");
				}
				$product->setAutobid($autobid);
				$product->setCurrentbuyer($this->getUser());
				$em->persist($product);
				$em->flush();
			}
			return $this->redirectToRoute("product_show", array('id' => $product->getId()));
		}



		// FORMAUTOBID VALIDATION \\
		$formAutoBid->handleRequest($request);

		if($formAutoBid->isSubmitted() && $formAutoBid->isValid())
		{
			$product->setCurrentbid($currentbid);
			if($product->getAutobid() <  $product->getCurrentbid())
			{
				$this->addFlash("Forbidden", "Autobid can not been activated with a maximum bid smaller than current bid + 2 times minimum bid.");
			}
			else if($product->getAutobid() > $product->getPrice())
			{
				$product->setAutobid($autobid);
				$this->addFlash("Forbidden", "Autobid can not been activated with a maximum bid bigger than actual price.");
			}
			else if($product->getAutobid() < ($autobid + $product->getMinbid()))
			{
				$product->setCurrentbid($product->getAutobid() + $product->getMinbid());
				$product->setAutobid($autobid);
				$this->addFlash("Done", "Autobid has been activated.");
			}
			else
			{
				$product->setAutobidder($this->getUser());
				$product->setCurrentbuyer($this->getUser());
				if($product->getCurrentbuyer() != $this->getUser())
				{
					$product->setCurrentbid($product->getCurrentbid() + $product->getMinbid());
				}
				$this->addFlash("Done", "Autobid has been activated.");
			}
			$em->persist($product);
			$em->flush();
			return $this->redirectToRoute("product_show", array('id' => $product->getId()));
		}

		return $this->render('bid/add.html.twig', array
		(
			'product' => $product,
			'formbid' => $formBid->createView(),
			'formautobid' => $formAutoBid->createView(),
		));
	}
	
	/**
	 * Purchase a product
	 *
	 * @Route("/purchase/{id}", name="product_purchase")
	 * @Method({"GET", "POST"})
	 */
	public function purchase(Request $request, Product $product)
	{
		if($product->getEnded() < new \DateTime() && $product->getCurrentbuyer())
		{
			$this->addFlash("Forbidden", "This product has already been sold.");
			return $this->redirectToRoute("product_show", array('id' => $product->getId()));
		}
		$product->setCurrentbid($product->getPrice());
		$product->setCurrentbuyer($this->getUser());
		$product->setEnded(new \DateTime());

		$em = $this->getDoctrine()->getManager();
		$em->persist($product);
		$em->flush();

		$this->addFlash("Done", "Product has been buyed");
		return $this->redirectToRoute('product_show', array('id' => $product->getId()));
	}
}