<?php

namespace App\LanguageBundle\Model;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

class LanguageManager {

    protected $session = null;
    protected $securityContext = null;
    protected $languageList = array();
    protected $localeList = array();

    public function __construct(Session $session, $securityContext, $localeList, $defaultLocale)
    {
        $this->session = $session;
        $this->securityContext = $securityContext;
        $this->localeList = $localeList;
        $this->languageList = array_flip($localeList);
        $this->defaultLocale = $defaultLocale;
    }

    /**
     * @return Session $session
     */
    public function getSession() {
        return $this->session;
    }

    public function getLocaleList() {
        return $this->localeList;
    }

    public function getLanguageList() {
        return $this->languageList;
    }

    public function getCurrentLocale()
    {
        return $this->session->get('_locale');
    }

    public function getCurrentLanguage()
    {
        return $this->languageList[$this->session->get('_locale')];
    }

    public function onKernelRequest(GetResponseEvent $event)
    {

        if (HttpKernelInterface::MASTER_REQUEST !== $event->getRequestType()) {
            return;
        }

        $request = $event->getRequest();
        $session = $request->getSession();
        $attributes = $request->attributes;

        if ($locale = $request->attributes->get('_locale')) {
            $request->getSession()->set('_locale', $locale);
        } else {
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }


        $lang = $attributes->get('lang', null);
        if(in_array($lang, $this->languageList)) {
            $session->set('_locale', $this->localeList[$lang]);
        }
        if (!in_array($session->get('_locale'), $this->localeList)) {
            $session->set('_locale', $request->getPreferredLanguage(array_values($this->localeList)));
        }





        setlocale(LC_TIME, $session->get('_locale', $this->defaultLocale));
    }
}

?>
