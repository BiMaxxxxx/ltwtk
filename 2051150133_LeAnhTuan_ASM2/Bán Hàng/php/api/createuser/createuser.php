<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


    include_once('../../config/db.php');
    include_once('../../model/user.php');


    $db = new db();
    $connect = $db->connect();

    $user = new User($connect);

    $data = json_decode(file_get_contents("php://input"));

    $user->username = $data->username;
    $user->email = $data->email;
    $user->gender = $data->gender;
    $user->phone = $data->phone;
    $user->password = $data->password;
    $user->note = $data->note;
    if ($user->user()){
        echo json_encode(array("message","user created!"));
    }else{
        echo json_encode(array("message","user created false!"));

    }
?>