<?php


    function Filter(array $text){

        $filterArray = [];

        foreach ($text as $t){
            $newT = htmlspecialchars($t);
            array_push($filterArray,$newT);
        }

        return $filterArray;
    }

    function CheckUser(string $u_name,string $u_email){

        include "db.php";

        $query = 'SELECT COUNT(*) as counter FROM users WHERE u_username = :username || u_email = :email';

        $pd = $connect->prepare($query);

        $pd->execute([":username"=>$u_name,":email"=>$u_email]);

        $isExist = $pd->fetch()["counter"];

        return $isExist;
    }


    function Register(string $u_name,string $u_email,string $u_passwd){
        include "db.php";

        $query = "INSERT INTO users(u_username,u_email,u_passwd) VALUES(:username,:email,:passwd)";

        $pd = $connect->prepare($query);

        $pd->execute([":username"=>$u_name,":email"=>$u_email,":passwd"=>$u_passwd]);

        return $connect->lastInsertId();
    }


    function MessageFunc(string $message,string $color,string $path){
        $_SESSION["message"] = $message;
        $_SESSION["color"] = $color;

        header("Location:".$path);
        exit();
    }

    function Login(string $u_nameEmail,string $u_passwd){
        include "db.php";

        $query = "SELECT COUNT(*) as Count,users.u_id,users.u_isAdmin FROM users WHERE u_username = :username OR u_email = :email AND u_passwd = :passwd";

        $pd = $connect->prepare($query);

        $pd->execute([":username"=>$u_nameEmail,":email"=>$u_nameEmail,":passwd"=>$u_passwd]);

        $result = $pd->fetch();

        return $result;
    }

    function GetAdminInfo(int $userId){
        include "db.php";

        $query = "SELECT * FROM users WHERE u_id = :id";

        $pd = $connect->prepare($query);

        $pd->execute([":id"=>$userId]);
    
        $userInfo = $pd->fetch();
        
        return $userInfo;
    }

    function GetUsers(int $adminId){
        include "db.php";

        $query = "SELECT * FROM users ORDER BY u_registerDate DESC";

        $pd = $connect->prepare($query);

        $pd->execute();
    
        $userInfos = $pd->fetchAll();

        return $userInfos;
    }

    function GetBlogs(){
        include "db.php";

        $query = "SELECT * FROM blogs INNER JOIN users ON users.u_id = blogs.b_author ORDER BY b_createdDate DESC";

        $pd = $connect->prepare($query);

        $pd->execute();
    
        $blogsInfo = $pd->fetchAll();

        return $blogsInfo;
    }

    function TextSplit(string $content,int $id,string $path){
        include "db.php";

        $strlen = strlen($content);

        if($strlen > 200){
            $split = str_split($content,"200")[0] . "..."."<a class='links' href='".$path."?id=".$id."'> devamı</a>";
            return $split;
        }

        return $content. "<a class='links' href='blog.php?id=".$id."'> okuyun</a>";
    }

    function GetSpecBlog(int $id){
        include "db.php";

        $query = "SELECT * FROM blogs INNER JOIN users ON users.u_id = blogs.b_author WHERE b_id = :blogId";

        $pd = $connect->prepare($query);
    
        $pd->execute([":blogId"=>$id]);

        $result = $pd->fetch();

        return $result;
    }

    function LiveCheck(int $id){
        include "db.php";

        $query = "SELECT u_isAdmin FROM users WHERE u_id = :id";

        $pd = $connect->prepare($query);

        $pd->execute([":id"=>$id]);

        $result = $pd->fetch();

        return $result;
    }

    function AddBlogs(int $userId,string $title,string $content,string $image){
        include "db.php";

        $query = "INSERT INTO blogs(b_author,b_title,b_content,b_image) VALUES(:author,:title,:content,:image)";

        $pd = $connect->prepare($query);

        $pd->execute([":author"=>$userId,":title"=>$title,":content"=>$content,":image"=>$image]);
    }

?>