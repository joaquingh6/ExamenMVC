<?php

namespace Mini\Controller;

use Mini\Model\Post;

use Mini\Core\Auth;

class AdminController extends Controller
{

   public function index(){

        Auth::checkAuth("Administrador");

   
        $this->view->addData(["titulo"=>"ADMIN"]);
        echo $this->view->render("admin/index");


    }


   
}
