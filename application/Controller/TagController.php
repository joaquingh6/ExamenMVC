<?php

/**
 * Class HomeController
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */

namespace Mini\Controller;

use Mini\Model\Tag;

use Mini\Core\Auth;

use Mini\Core\Functions;


class TagController extends Controller
{

    public function index(){

        Auth::checkAuth("Alumno");

        $tags = new Tag();
        $tags = $tags->getTags();

        $this->view->addData(["titulo"=>"tag" , "tags" => $tags]);
        echo $this->view->render("tags/index");


    }

    public function show($slug)
    {

        Auth::checkAuth("Alumno");
        $post = new Tag();
        $post = $post->getTag($slug);

         $this->view->addData(["titulo"=>"tag" , "post" => $post]);
        echo $this->view->render("tags/show");

    }

     public function create(){

        Auth::checkAuth("Administrador");
  
        $this->view->addData(["titulo"=>"tag"]);
        echo $this->view->render("tags/create");

    }

    public function store(){

        Auth::checkAuth("Administrador");
        $_POST["slug"] = Functions::slug($_POST["name"]);
        $tag = new Tag();
       // $category = $category->create($_POST);

        if($tag->create($_POST)) {
         
           header("Location: /tag/");
        } else {

            $this->create();

        }

    }

       
    public function edit($slug){

        Auth::checkAuth("Administrador");
        $tag = new Tag();
        $tag = $tag->getTag($slug);

        
        $this->view->addData(["titulo"=>"tag", "tag"=>$tag]);
        echo $this->view->render("tags/edit");


    }
    public function update(){

            Auth::checkAuth("Administrador");

            $_POST["slug"] = Functions::slug($_POST["name"]);
            $tag = new Tag();


            if($tag->update($_POST)) {

            header("Location: /tag/");

            } else {

            $tag->update($_POST);

            }
    }

    
    public function delete($id){

          Auth::checkAuth("Administrador");

          $tag = new Tag();

           if($tag->delete($id)) {

            header("Location: /tag/");

            } else {

            header("Location: /error/");

            }

    }

    


   
}
