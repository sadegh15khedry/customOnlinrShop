<?php


class DataBase{
    const HOST = 'localhost';
    const DB_NAME = 'my_shop';
    const USER = 'root';
    const PASS = '';
    const DSN = 'mysql:host=' . self::HOST . ';dbname=' . self::DB_NAME;

    private $connection = null;
    private static $instance = null;

    private function __construct(){
        try {
            $this->connection = new PDO(self::DSN, self::USER, self::PASS);
            $this->connection->query("SET NAMES UTF8");
        }
        catch (PDOException $e) {
            echo $e;
        }

    }

    public static function getInstance(){
        if (self::$instance == null) {
            self::$instance = new DataBase();
            return self::$instance;
        }
        else {
            return self::$instance;
        }
    }

    public function getCon(){
        return $this->connection;
    }

    public function closeConnection(){
        $this->connection = null;
    }



    public function login_check($email,$password){
        $databse = self::getInstance();
        $query_for_email = "select * from users WHERE user_email = '".$email."'";
        $full_query = "select * from users WHERE user_email = '".$email."'  and user_password = '".$password."'";
        $email_exist =$databse->connection->query($query_for_email);
        $full_result = $databse->connection->query($full_query);
        if ($full_result->rowCount()) {
            $userid = $databse->connection->query("select user_id from users WHERE user_email = '".$email."'");
            $row = $userid->fetch();
            return $row['user_id'];
        }
        else if ($email_exist->rowCount()){
            return "wrong password";
        }
        else
            return "wrong email and password";
    }





    public function signup($fname,$lname,$uname,$email,$password,$repassword){
        if ($password!=$repassword){
            return 'pass';
        }
        $databse = self::getInstance();
        $uname_query = "select * from users WHERE user_uname = '".$uname."'";
        $email_query = "select * from users WHERE user_email = '".$email."'";
        $full_query = "INSERT INTO users (user_id, user_fname, user_lname, user_uname, user_email, user_password) VALUES (NULL, '".$fname."', '".$lname."', '".$uname."', '".$email."', '".$password."');";

        $uname_results = $databse->connection->query($uname_query);
        $email_result =$databse->connection->query($email_query);
        if ($email_result->rowCount()){
            return "email";
        }
        else if ($uname_results->rowCount()){
            return "uname";
        }
        else {
         $databse->connection->query($full_query);
         $r = $databse->connection->query("select user_id from users WHERE user_email = '".$email."'");
         $row = $r->fetch();
         return $row['user_id'];
        }
    }
    public function addNewItem($seller_id, $seller_phone, $item_title, $item_cat, $item_des){

        $full_query = "INSERT INTO items (item_id, seller_id, seller_phone, item_cat, item_des, item_title) VALUES (NULL, '".$seller_id."', '".$seller_phone."', '".$item_cat."', '".$item_des."', '".$item_title."');";
        $databse = self::getInstance();
        $databse->connection->query($full_query);
        $r = $databse->connection->query("select item_id from items where seller_id='".$seller_id."' and seller_phone='".$seller_phone."' and item_cat='".$item_cat."' and item_des='".$item_des."' and item_title='".$item_title."'");
        $row = $r->fetch();
        return $row['item_id'];
    }


    public function getItem($item_id){
        $query = "select * from items WHERE item_id = '".$item_id."'";
        $databse = self::getInstance();
        $result = $databse->connection->query($query);
        return $result->fetch();
    }

    public function getSellerUname($seller_id){
        $query = "select * from users WHERE user_id = '".$seller_id."'";
        $databse = self::getInstance();
        $result = $databse->connection->query($query);
        return $result->fetch()['user_uname'];
    }






/*
    public function getUsernameById($user_id){
        $databse = self::getInstance();
        $row = $databse->connection->query("select user_uname from users WHERE user_id = '".$user_id."'");
        return $row->fetch()['user_uname'];
    }
*/
    public function getSectionContent($content_cat){
        $databse = self::getInstance();
        if ($content_cat=='0'){
            $query = "select * from items";
        }
        else{
            $query = "select * from items WHERE item_cat='".$content_cat."'";
        }
        $results = $databse->connection->query($query);
        return json_encode($results->fetchAll());
    }
}