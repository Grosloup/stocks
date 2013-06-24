<?php
/**
 * Date: 21/06/13
 * Time: 10:36
 * @author Nicolas Canfrere <nico.canfrere at gmail.com>
 */

namespace Site\ApiBundle\Controller;


use Site\BaseBundle\Controller\BaseController;
use Site\DBBundle\Entity\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends BaseController
{
    public function indexAction()
    {
        return $this->render("ApiBundle:Category:index.html.twig");
    }

    public function listAction(Request $request)
    {
        if($request->isXmlHttpRequest()){
            $entities = $this->getRepo("DBBundle:Category")->findAllToArray();

            $response = [];
            if(!$entities){
                $response["status"] = "error";
                $response["message"] = "no datas";
            }else{
                $response["status"] = "ok";
                $response["message"] = "ok";
                $response["datas"] = $entities;
            }
            return new JsonResponse($response);
        }
    }

    public function createAction(Request $request)
    {
        if($request->isXmlHttpRequest() && $request->isMethod("POST")){
            $datas = $this->getContent($request);
            $category = new Category();
            $category->setName($datas["name"]);
            if($datas["parent_id"] != null){
                $parent = $this->getRepo("DBBundle:Category")->find($datas["parent_id"]);
                if($parent){
                    $category->setParent($parent);
                }
            }
            $em = $this->getEm();
            $em->persist($category);
            $em->flush();
            return new JsonResponse(["message"=>"catégorie enregistrée.","last_id"=>$category->getId()]);
        }
    }
}
