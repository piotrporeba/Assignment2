<?php
/**
 * controller file
 * @package App\Controller
 * @author Piotr Poreba
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends Controller
{
    /**
     * function login
     * @Route("/login", name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(Request $request, AuthenticationUtils $authUtils) { // get the login error if there is one $error = $authUtils->getLastAuthenticationError();

        // get the login error if there is one
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        $template = 'security/login.html.twig';
        $args = [
            'last_username' => $lastUsername,
            'error'         => $error,
        ];

        return $this->render($template, $args);
    }
}
