<?php

namespace AppBundle\EventListener;

use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\RouterInterface;


class RedirectAfterEditSubscriber implements EventSubscriberInterface
{

    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router=$router;
    }
    public function onEditSuccess (FormEvent $event)
    {
        $url = $this->router->generate('homepage');
        $response = new RedirectResponse($url);
        $event->setResponse($response);
    }

    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::PROFILE_EDIT_SUCCESS => 'onEditSuccess'
        ];
    }
}