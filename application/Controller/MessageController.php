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


class MessageController extends Controller
{

    public function create($id)
    {

        Auth::checkAuth("Alumno");

        $users = new User();

        $users = $users->getUsers();
       

        $this->view->addData(["titulo"=>"messages" , "users" => $users , "id" => $id]);
        echo $this->view->render("messages/index");


    }



    public function store(){

        $users = $_POST['users'];

        Auth::checkAuth("Administrador");

        $message = new Message();

        if($id = $message->create($_POST)) {

            $message->messageUser($id, $users);
         
            header("Location: /user/index");

        } else {

            header("Location: /error/");

        }

    }

    /*

       
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

    }

    */


   
}
