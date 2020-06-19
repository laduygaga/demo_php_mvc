<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');

class PostsController extends BaseController
{
    function __construct()
    {
        $this->folder = 'posts';
    }

    public function index()
    {
        $posts = Post::all();
        $data = array('posts' => $posts);
        $this->render('index', $data);
    }

    public function page()
    {
        // $offset = intval($offset);
        // $page * 5;
        $posts = Post::page($_GET['offset']);
        // var_dump($_GET['offset']);
        $data = array('posts' => $posts);
        $this->render('index', $data);
    }

    public function show()
    {
        $post = Post::find($_GET['id']);
        $data = array('post' => $post);
        $this->render('show', $data);
    }

    public function add() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $status = $_POST["status"];
            $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
            $create_at = date('Y-m-d H:i:s');
            Post::insert($title, $description, $status, $image, $create_at);
            header('Location: '.constant('URL').'index.php?controller=posts');
        }
        require_once('views/posts/insert.php');
    }
    public function edit() {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $post = Post::find($_GET['id']);
            require_once('views/posts/update.php');
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id= $_POST['id'];
            $title = $_POST['title'];
            $status= $_POST['status'];
            $description = $_POST['description'];
            $update_at= date('Y-m-d H:i:s');
            Post::edit($id, $title, $status, $description, $update_at );
            header('Location: '.constant('URL').'index.php?controller=posts');
        }
    }
    public function _delete() {
        $id= $_GET['id'];
        Post::_delete($id);
        header('Location: '.constant('URL').'index.php?controller=posts');
    }


}
