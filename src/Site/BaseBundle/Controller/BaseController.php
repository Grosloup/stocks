<?php
/**
 * Date: 21/06/13
 * Time: 10:39
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\BaseBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends Controller
{
    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEm()
    {
        return $this->getDoctrine()->getManager();
    }

    /**
     * @param $name
     * @return \Doctrine\ORM\EntityRepository
     */
    protected function getRepo($name)
    {
        return $this->getEm()->getRepository($name);
    }

    protected function getContent(Request $request)
    {
        $params = [];

        $content = $request->getContent();
        if($content){
            $params = json_decode($content, true);
        }
        return $params;
    }
}
