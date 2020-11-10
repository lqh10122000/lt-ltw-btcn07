<?php

session_start();


ini_set ('display_errors', 1);
ini_set ('display_startup_errors', 1);
error_reporting(E_ALL);



$db = new PDO('mysql:host=localhost;dbname=login;charset=utf8', 'root', 'admin');
$stmt = $db->query("SELECT * FROM user");
// Lấy hết toàn bộ dữ liệu
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($data);
// hoặc lấy từng dòng
// while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//   echo $row['field1'] . ' ' . $row['field2']; 
// }



if(isset($_POST['emailSU']) && isset($_POST['passwordSU']))
	{
       global $db;
		$email = $_POST['emailSU'];
        $passwordSU = $_POST['passwordSU'];
        
        $hashPassword = password_hash($passwordSU, PASSWORD_DEFAULT);
        $result = $db->prepare("INSERT INTO User(email, Password) VALUES(?, ?);");
        $result->execute(array($email, $hashPassword));
        // Lấy ID mới nhất
        // $insertId = $db->lastInsertId();
    }
    

    

