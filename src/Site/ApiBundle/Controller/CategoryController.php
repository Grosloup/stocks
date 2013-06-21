<?php
/**
 * Date: 21/06/13
 * Time: 10:36
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\ApiBundle\Controller;


use Site\BaseBundle\Controller\BaseController;

class CategoryController extends BaseController
{
    public function indexAction()
    {
        return $this->render("ApiBundle:Category:index.html.twig");
    }
}
