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

use Mini\Model\Category;

use Mini\Core\Auth;

use Mini\Core\Functions;

class CategoryController extends Controller
{

    public function index(){

        Auth::checkAuth("Alumno");

        $category = new Category();
        $categories = $category->getCategories();

        $this->view->addData(["titulo"=>"category" , "categories" => $categories]);
        echo $this->view->render("categories/index");


    }
     public function adminCategories(){

        Auth::checkAuth("Administrador");

        $categories = new Category();
        $categories = $categories->getCategories();

        $this->view->addData(["titulo"=>"category" , "categories" => $categories]);
        echo $this->view->render("categories/index");


    }

    public function show($slug)
    {

        Auth::checkAuth("Alumno");
        $category = new Post();
        $category = $category->getPost($slug);

         $this->view->addData(["titulo"=>"category" , "category" => $category]);
        echo $this->view->render("Categories/show");

    }

    public function create(){

        Auth::checkAuth("Administrador");
  
        $this->view->addData(["titulo"=>"category"]);
        echo $this->view->render("categories/create");

    }

    public function store(){

        Auth::checkAuth("Administrador");
        $_POST["slug"] = Functions::slug($_POST["name"]);
        $category = new Category();
       // $category = $category->create($_POST);

        if($category->create($_POST)) {
            
           header("Location: /category/adminCategories");
        } else {

            $this->create();

        }

    }

    public function edit($slug){

        Auth::checkAuth("Administrador");
        $category = new Category();
        $category = $category->getCategory($slug);

        
        $this->view->addData(["titulo"=>"category", "category"=>$category]);
        echo $this->view->render("categories/edit");


    }


    public function update(){

            Auth::checkAuth("Administrador");

            $_POST["slug"] = Functions::slug($_POST["name"]);
            $category = new Category();

            var_dump($_POST);


            if($category->update($_POST)) {

            header("Location: /category/");

            } else {

            header("Location: /error/");

            }
    }

    public function delete($id){

    	  Auth::checkAuth("Administrador");

    	  $category = new Category();

    	   if($category->delete($id)) {

            header("Location: /category/");

            } else {

            header("Location: /error/");

            }

    }


       
}
