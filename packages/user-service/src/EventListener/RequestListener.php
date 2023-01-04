<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class RequestListener implements EventSubscriberInterface {

    public function onKernelRequest(RequestEvent $event)
    {
        $request = $event->getRequest();
        $request->attributes->set('refresh_token', $request->cookies->get('refresh_token'));

        $request = $event->getRequest()->
        initialize($request->query->all(), 
            $request->request->all(), 
            $request->attributes->all(), 
            $request->cookies->all(), 
            $request->files->all(), 
            $request->server->all(), 
            $request->getContent()
        );

        return $request;
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [
                ['onKernelRequest', 0]
            ]
        ];
    }
}