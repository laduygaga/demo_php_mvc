<?php
class Post
{
    public $id;
    public $title;
    public $description;
    public $image;
    public $status;
    public $create_at;
    public $update_at;
    // public $offset;

    function __construct($id, $title, $description, $image, $status, $create_at, $update_at)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->status = $status;
        $this->create_at = $create_at;
        $this->update_at = $update_at;
        // $this->offset = $offset;
    }

    static function all()
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query('SELECT * FROM posts');

        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
        }

        return $list;
    }

    static function page($offset)
    {
        $list = [];
        $db = DB::getInstance();
        $req = $db->query("SELECT * FROM posts LIMIT 5 OFFSET $offset");
        // $req->execute(array('offset' => $offset));

        foreach ($req->fetchAll() as $item) {
            $list[] = new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
        }

        return $list;
    }
    static function find($id)
    {
        $db = DB::getInstance();
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');
        $req->execute(array('id' => $id));

        $item = $req->fetch();
        if (isset($item['id'])) {
            return  new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
        }
        return null;
    }


    static function insert($title, $description, $status, $image, $create_at) {
        $db = DB::getInstance();
        //        $sql= "INSERT INTO posts (title, description,  status, image, create_at) VALUES ('$title', '$description', $status, '$image', '$create_at')";
        //        $db->exec($sql);
        $req = $db->prepare('INSERT INTO posts SET description = :description, title = :title, status = :status, image = :image, create_at = :create_at');
        $data = array(
            ":description" => htmlspecialchars(strip_tags($description)),
            ":title" => htmlspecialchars(strip_tags($title)),
            ":status" => htmlspecialchars(strip_tags($status)),
            ":image" => htmlspecialchars(strip_tags($image)),
            ":create_at" => htmlspecialchars(strip_tags($create_at))
        );

        if ($req->execute($data)){
            Post::uploadImage($image);
            header('Location: '.constant('URL')."posts/insert/success");
        } else {
            header('Location: '.constant('URL')."posts/insert/error");
        }

    }
    static function edit($id, $title, $status, $description, $update_at) {
        $db = DB::getInstance();
        $sql = "UPDATE posts SET title= '$title', status=$status, description= '$description', update_at= '$update_at' WHERE id=$id";
        $db->exec($sql);
    }

    static function _delete($id) {
        $db = DB::getInstance();
        $sql = "DELETE FROM posts WHERE id=$id";
        $db->exec($sql);
    }
    static function uploadImage($image) {
        if($image){

            $target_directory = "uploads/";
            $target_file = $target_directory . $image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            $file_upload_error_messages="";

            $check = getimagesize($_FILES["image"]["tmp_name"]);

            if($check!==false){
            } else {
                $file_upload_error_messages.="<div>Files is not image.</div>";
            }

            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Allow only JPG, JPEG, PNG i GIF.</div>";
            }

            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>This image is exist. Try rename</div>";
            }

            if($_FILES['image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>Image file size can not greater  than 1 MB</div>";
            }

            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }


            if(empty($file_upload_error_messages)){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                    $result_message.="<div>Cannot update image.</div>";
                    $result_message.="</div>";
                }
            }

            else{
                $result_message.="<div class='alert alert-danger'>";
                $result_message.="{$file_upload_error_messages}";
                $result_message.="</div>";
            }
        }
    }

}
