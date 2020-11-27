<?php
require_once 'init.php';
require_once 'function.php';
$id = $_GET['id']; 
$code = $_GET['code'];
var_dump($id);
var_dump($code);
$user = findUserById($id); 
var_dump($user);
if($user)
{
    if($user['CODE'])
    {
        if($user['CODE'] == $code)
        {
            activeUser($id);
            $_SESSION['userId'] = $id;
            header('Location:profile.php');
        }
        else
        {
            echo 'ma kích hoạt không hợp lệ';
        }
    }
    else
    {
        echo 'tài khoản đã được kích hoạt';
        // require_once 'profile.php';
    }
}
else
{
    echo 'tài khoản không tồn tại';
}
?>