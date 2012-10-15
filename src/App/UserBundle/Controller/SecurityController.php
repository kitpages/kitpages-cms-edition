<?php

namespace App\UserBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\HttpFoundation\Response;

use FOS\UserBundle\Controller\SecurityController as BaseController;

class SecurityController extends BaseController
{
    public function loginAction()
    {
        $request = $this->container->get('request');
        $httpKernel = $this->container->get('http_kernel');
        $target_path = $request->getSession()->get('_security.target_path', null);
        $parseUrl = parse_url($target_path);
        if ($parseUrl !== false) {
            $router = $this->container->get('router');
            try {
                $targetRoute = $router->match($parseUrl['path']);
                if ($targetRoute['_route'] == 'AppSiteBundle_shop_displayOrder') {
                    return $httpKernel->forward('AppSiteBundle:PurchaseProcess:identification');
                }
            } catch (\Exception $e) {

            }
        }
        $response = parent::loginAction();
        return $response;
    }
}
