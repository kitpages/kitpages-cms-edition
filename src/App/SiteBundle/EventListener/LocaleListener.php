<?php
namespace App\SiteBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class LocaleListener implements EventSubscriberInterface
{
    private $defaultLocale;

    public function __construct($defaultLocale = 'en')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }
        // on essaie de voir si la locale a été fixée dans le paramètre de routing _locale
        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {

            $locale = $request->getSession()->get('_locale', $this->defaultLocale);

            $request->setLocale($locale);
            $request->getSession()->set('_locale', $locale);

            // si aucune locale n'a été fixée explicitement dans la requête, on utilise celle de la session
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));

        }

//        echo $request->getSession()->get('_locale');

    }

    public static function getSubscribedEvents()
    {
        return array(
            // doit être enregistré avant le Locale listener par défaut
            KernelEvents::REQUEST => array(array('onKernelRequest', 17)),
        );
    }
}