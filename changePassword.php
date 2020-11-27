<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    .pass_show{position: relative} 

    .pass_show .ptxt { 

    position: absolute; 

    top: 50%; 

    right: 10px; 

    z-index: 1; 

    color: #f36c01; 

    margin-top: -10px; 

    cursor: pointer; 

    transition: .3s ease all; 

    } 

    .pass_show .ptxt:hover{color: #333333;} 

    .fontLabel
    { 
        color : black;
    }


</style>
<?php require_once 'header.php';
require_once 'function.php';
if(isset($_SESSION['username']))
{
    $user = findUserByUserID($_SESSION['username']);
    var_dump($user);
}
if(isset($_POST['newPassword']))
{
    // $currentPassword = $_POST['currentPassword'];
    // $user = findUserByUserID($_SESSION['email']);
    // var_dump($user);

    $usernameCP = $_POST['Username'];

    $emailCP = $_POST['Email'];

    $user = findUserByUserID($_SESSION['email']);

    if(!$user)
    {
        echo 'không tìm thấy user';
    }
    else
    {
        if($user['username'] != $_POST['Username'])
        {
            echo 'sai tên đăng nhập';
        }
        else
        {
            $newPassword = $_POST['newPassword'];
            $db = new PDO('mysql:host=localhost;dbname=ltw1_btcn;charset=utf8', 'root', 'admin');
            $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
            $result = $db->prepare("UPDATE users set PASSWORD = ? where email = ?;");
            $user = findUserByUserID($_SESSION['email']);
            $result->execute(array($hashPassword, $user['email']));
            require_once('changePassword.php');
        }
        

    }


    // if(!password_verify($currentPassword , $user['PASSWORD']) )
	// {
    //     $error = 'sai mật khẩu';
    //     echo $error;
	// }
	// else
	// {
    //     $newPassword = $_POST['newPassword'];
    //     $db = new PDO('mysql:host=localhost;dbname=ltw1_btcn;charset=utf8', 'root', 'admin');
    //     $hashPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    //     $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    //     $result = $db->prepare("UPDATE users set PASSWORD = ? where email = ?;");
    //     $user = findUserByUserID($_SESSION['email']);
    //     $result->execute(array($hashPassword, $user['email']));
    //     require_once('changePassword.php');


	// }
} 
?>
<div style="background-image: url('./images/home-bg.jpg')" class="container">
	<div style = "margin-left : 400px; margin-top : 200px;" class="row">
            <div class="col-sm-4">
                <form method = "POST">

                    <label class = "fontLabel">Tên Đăng Nhập</label>
                    <div class="form-group pass_show"> 
                        <input name = "Username" type="text" class="form-control" placeholder="username"> 
                    </div> 

                    <label class = "fontLabel">Email</label>
                    <div class="form-group pass_show"> 
                        <input name = "Email" type="email" class="form-control" placeholder="Email"> 
                    </div> 

                    <!-- <label class = "fontLabel">Current Password</label>
                    <div class="form-group pass_show"> 
                        <input name = "currentPassword" type="password" class="form-control" placeholder="Current Password"> 
                    </div>  -->


                    <label class = "fontLabel">New Password</label>
                    <div class="form-group pass_show"> 
                        <input name = "newPassword" type="password" class="form-control" placeholder="New Password"> 
                    </div> 
                    <label class = "fontLabel">Confirm Password</label>
                    <div class="form-group pass_show"> 
                        <input name = "confirmPassword" type="password" class="form-control" placeholder="Confirm Password"> 
                    </div> 
                    
                    <input style = "margin-left : 70px;" type = "submit" value ="Change"> 
                    
                </form> 

            </div> 
	</div>

    <script>
          
        $(document).ready(function(){
            $('.pass_show').append('<span class="ptxt">Show</span>');  
        });
        $(document).on('click','.pass_show .ptxt', function(){ 
            $(this).text($(this).text() == "Show" ? "Hide" : "Show"); 
            $(this).prev().attr('type', function(index, attr){return attr == 'password' ? 'text' : 'password'; }); 
        });  

    </script>
</div>