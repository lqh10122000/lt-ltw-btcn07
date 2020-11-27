<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'init.php';
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
    $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM users;");
    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //global $users;
    for($i = 0; $i < sizeof($data); $i++)
    {   
        $user = $data[$i];
        if($user['email'] == $username)
        {
            $username = $user['email'];
            return $user;
        }
    }
    return null;
}

function findUserById($id)
{
    $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    $stmt = $db->query("SELECT * FROM users;");
    // lấy toàn bộ data
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //global $users;
    for($i = 0; $i < sizeof($data); $i++)
    {   
        $user = $data[$i];
        if($user['ID'] == $id)
        {
            return $user;
        }
    }
    return null;
}
function activeUser($id)
{
    $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    $stmt = $db->prepare("UPDATE users set code = NULL where ID = ?;");
    $stmt->execute(array( $id));
}
function createUser($email, $username, $password, $code)
{
    $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (username, email, PASSWORD, code) VALUES(?, ?, ?, ?);");
    $stmt->execute(array( $username, $email, $hashPassword, $code));
}
function sendEmail($to, $subject, $content)
{
    // Load Composer's autoloader
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'lqh101220@gmail.com';                     // SMTP username
        $mail->Password   = 'lph10122000';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;      
        
        $mail->CharSet = "UTF-8";
        // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('lqh10122000@gmail.com', 'LTW1 K18');
        $mail->addAddress($to, 'Quang Huy');     // Add a recipient


        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $content;
        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>