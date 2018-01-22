<?php

namespace AppBundle\EventListener;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use AppBundle\Entity\Product;
use AppBundle\Entity\User;

class ProductSubscriber implements EventSubscriber
{
	private $mailer;

	public function __construct(\Swift_Mailer $mailer)
	{
		$this->mailer = $mailer;
	}

	public function postPersist(LifecycleEventArgs $args)
	{
		$product = $args->getObject();
		if($product instanceof Product)
		{
			$user = $product->getUser();
			if($user instanceof User)
			{
				$message = (new \Swift_Message('Hello Email'))
					->setFrom('Echo@Echo.fr')
					->setTo('SavinYann@hotmail.com')
					->setBody('Le produit '.$product->getTitle().' a été ajouté.');
				$result = $this->mailer->send($message);
				if($result == 0)
				{
					throw new \Exception("Impossible d'envoyer le mail à  ".$user->getEmail());
				}
			}
		}
	}

	public function postUpdate(LifecycleEventArgs $args)
	{
		if($product = $args->getObject() instanceof Product)
		{
			if($user = $product->getUser() instanceof User)
			{
				$message = (new \Swift_Message('Hello Email'))
					->setFrom('Echo@Echo.fr')
					->setTo('SavinYann@hotmail.com')
					->setBody('Le produit '.$product->getTitle().' a été modifié.');
				$result = $this->mailer->send($message);
				if($result == 0)
				{
					throw new \Exception("Impossible d'envoyer le mail à  ".$user->getEmail());
				}
			}
		}
	}

	public function getSubscribedEvents()
	{
		return array('postPersist', 'postUpdate');
	}
}

?>