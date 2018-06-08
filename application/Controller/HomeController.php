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

class HomeController extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index()
    {
        // load views
        $posts = new Post();
        $posts = $posts->getPosts();

        $this->view->addData(["titulo"=>"HOME" , "posts" => $posts]);
        echo $this->view->render("home/index");
    }

    public function show($slug)
    {

        $post = new Post();
        $post = $post->getPost($slug);

         $this->view->addData(["titulo"=>"show" , "post" => $post]);
        echo $this->view->render("posts/show");

    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        $this->view->addData(["titulo"=>"HOME"]);
        echo $this->view->render("home/example_one.php");

    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        $this->view->addData(["titulo"=>"HOME"]);
        echo $this->view->render("home/example_two.php");
    }
}
