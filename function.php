<?php 
function sum($a, $b)
{
    return $a + $b;
}


$Huy = array(
    'username' => 'huyle',
    'password' => '123'
);

$users = array($Huy);


function findUserByUserID($username)
{
    global $db;
    $stmt = $db->query("SELECT * FROM User;");
    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    //global $users;
    for($i = 0; $i < sizeof($data); $i++)
    {   
        $user = $data[$i];
        if($user['email'] == $username)
        {
            return $user;
        }
    }
    return null;
}