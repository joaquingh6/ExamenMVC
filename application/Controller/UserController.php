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

use Mini\Model\Message;

use Mini\Model\User;

use Mini\Core\Auth;

use Mini\Core\Functions;


class UserController extends Controller
{

    public function index(){

        Auth::checkAuth("Alumno");

        $users = new User();
        $users = $users->getUsers();

        $this->view->addData(["titulo"=>"messages" , "users" => $users]);
        echo $this->view->render("users/index");


    }

    public function perfil(){

        Auth::checkAuth("Alumno");

        $id = $_SESSION['user_id'];

        $user = new User();
        $user = $user->getUser($id);

        $this->view->addData(["titulo"=>"USER" , "user" => $user]);
        echo $this->view->render("users/perfil");

    }

  /*  public function show($slug)
    {

        Auth::checkAuth("Alumno");
        $post = new Message();
        $post = $post->getMessage($slug);

         $this->view->addData(["titulo"=>"messages" , "post" => $post]);
        echo $this->view->render("messages/show");

    }

     public function create(){

        Auth::checkAuth("Administrador");
  
        $this->view->addData(["titulo"=>"messages"]);
        echo $this->view->render("messages/create");

    }

    public function store(){

        Auth::checkAuth("Administrador");
        $_POST["slug"] = Functions::slug($_POST["name"]);
        $tag = new Message();
       // $category = $category->create($_POST);

        if($tag->create($_POST)) {
         
           header("Location: /tag/");
        } else {

            $this->create();

        }

    }

       
    public function edit($slug){

        Auth::checkAuth("Administrador");
        $tag = new Message();
        $tag = $tag->getMessage($slug);

        
        $this->view->addData(["titulo"=>"messages", "tag"=>$tag]);
        echo $this->view->render("messages/edit");


    }
    public function update(){

            Auth::checkAuth("Administrador");

            $_POST["slug"] = Functions::slug($_POST["name"]);
            $tag = new Message();


            if($tag->update($_POST)) {

            header("Location: /tag/");

            } else {

            $tag->update($_POST);

            }
    }

    
    public function delete($id){

          Auth::checkAuth("Administrador");

          $tag = new Message();

           if($tag->delete($id)) {

            header("Location: /tag/");

            } else {

            header("Location: /error/");

            }

    }*/

    


   
}
