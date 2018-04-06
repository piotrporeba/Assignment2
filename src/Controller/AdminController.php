<?php
/**
 * Admin controller file
 * @package App\Controller
 * @author Piotr Poreba
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class AdminController
 * @package App\Controller
 */
class AdminController extends Controller
{
    /**
     * function index
     * @Route("/admin", name="admin")
     * @Security("has_role('ROLE_ADMIN')")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $template = 'admin/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
