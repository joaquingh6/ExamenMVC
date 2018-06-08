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

use Mini\Model\Post;

use Mini\Model\Tag;

use Mini\Model\Category;

use Mini\Core\Auth;

use Mini\Core\Functions;


class PostController extends Controller
{

    public function index()
    {

        $posts = new Post();
        $posts = $posts->getPosts();
        d($posts);
        $this->view->addData(["titulo"=>"post" , "posts" => $posts]);
        echo $this->view->render("posts/index");

    }


    public function postsAdmin()
    {

        Auth::checkAuth("Alumno");

        $posts = new Post();
        $posts = $posts->getPosts();

        $this->view->addData(["titulo"=>"post" , "posts" => $posts]);
        echo $this->view->render("posts/posts");

    }

    public function show($slug)
    {

        $post = new Post();
        $post = $post->getPost($slug);

        //IF para entrar en un post PRIVADO solo siendo a partir de Alumno. 

        if ($post->access == 'PRIVATE') {
            Auth::checkAuth("Alumno");
            $this->view->addData(["titulo"=>"show" , "post" => $post]);
            echo $this->view->render("posts/show");
        }

        $this->view->addData(["titulo"=>"show" , "post" => $post]);
        echo $this->view->render("posts/show");       

    }

     public function create()
     {

        Auth::checkAuth("Administrador");

        $tags = new Tag();
        $tags = $tags->getTags();

        $categories = new Category();
        $categories = $categories->getCategories();

  
        $this->view->addData(["titulo"=>"post" , "tags" => $tags , "categories" => $categories]);
        echo $this->view->render("posts/create");

    }

    public function store()
    {

         Auth::checkAuth("Administrador");
         $tags = $_POST['tags'];
         unset($_POST['tags']);

         $_POST["slug"] = Functions::slug($_POST["name"]);

         $post = new Post();

        if($id = $post->create($_POST)) {
                
            $post->postTag($id, $tags);

            if(isset($_FILES)) $this->file($_FILES['file'] , $id);

            header("Location: /post/postsAdmin");
        } else {

            header("Location: /error");

        }
    }

    public function file($datos , $id)
    {
        $post = new Post();

        $destino = "img/" . $id . "-imagenpost.". substr($datos['type'], 6);

        if (move_uploaded_file($datos['tmp_name'], $destino)) {
            
            $destino = "/" . $destino;

            if ($post->img($destino , $id)) {
                   
                   header("Location: /post/postsAdmin");

            }
        }
    }

    public function edit($slug){

        Auth::checkAuth("Administrador");
        $post = new Post();
        $post = $post->getPost($slug);
        $tags = new Tag();
        $tags = $tags->getTags();
        $categories = new Category();
        $categories = $categories->getCategories();

        
        $this->view->addData(["titulo"=>"post", "post"=>$post , "tags" => $tags , "categories" => $categories ]);
        echo $this->view->render("posts/edit");
    }

    public function update($id)
    {
        Auth::checkAuth("Administrador");

            $tags = $_POST['tags'];
            unset($_POST['tags']);

            $_POST["slug"] = Functions::slug($_POST["name"]);
            $post = new Post();


            if($post->update($id , $_POST)) {

                $post->deletePostTag($id);

                $post->postTag($id, $tags);

                if(isset($_FILES)) $this->file($_FILES['file'] , $id);

                header("Location: /post/postsAdmin");

            } else {

            header("Location: /error");

            }


    }

     public function delete($id){

          Auth::checkAuth("Administrador");

          $post = new Post();

           if($post->delete($id)) {

            $post->deletePostTag($id);

            header("Location: /post/postsAdmin");

            } else {

            header("Location: /error/");

            }

    }



   
}
