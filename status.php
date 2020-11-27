<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<style>
    .inputStatus
    {
        display: flex;
        width : 700px;
        height: 80px;
        text-align: center;
    }

    .btn_post
    {
        margin-top : 40px;
        margin-left : 280px;
        width : 150px;
        height : 40px;
        background-color : #007bff;
        border-color : #007bff;
        border-radius : 5px;
        color : white;
    }

    .masthead
    {
        margin-top: 70px;
        margin-bottom: 50px;
        background: no-repeat center center;
        background-color: #868e96;
        background-attachment: scroll;
        position: relative;
        background-size: cover;

        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        background-color: #212529;
        opacity: 0.5;
    }

</style>


<?php

    require_once 'function.php';

  if(isset($_POST['statusComment']))
  {

    $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
    $result = $db->prepare("INSERT INTO status(username, email, COMMENT, dateComment) VALUES(?, ?, ?, ?);");
    $user = findUserById($_SESSION['userId']);
    $username = $user['username'];
    $email = $user['email'];
    $statusComment = $_POST['statusComment'];
    $dateComment = date("Y-m-d");
    // date("Y-m-d")
    $result->execute(array($username, $email, $statusComment, $dateComment));
  } 
          
  // $user = findUserByUserID($_SESSION['email']);

  include_once('header.php');

?>
<body>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('./images/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Status Blog</h1>
            <span class="subheading">A Blog For You Write All Thing You Have Been Through To Day</span>
          </div>
        </div>
      </div>
    </div>
  </header>


    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        
<?php
  $db = new PDO('mysql:host=localhost;dbname=btcn;charset=utf8', 'root', 'admin');
  $stmt = $db->query("SELECT * FROM status;");
    // lấy toàn bộ data

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      // echo $row['email'] . ' ' . $row['username']; 

      echo '
      <div class="post-preview">
          <h4 href="post.html">
            <h3 class="post-subtitle">
            '. $row['COMMENT'] .'
            </h3>
          </h4>
          <p class="post-meta">Posted by
            <a href="#">'.$row['username'].'</a>
            <p>'.$row['dateComment'].'</p>
        </div>';

    }
?>

         <!-- post status  -->
        <form  method = "POST">
            <div>
                <input class  = "inputStatus"   type = "text" name = "statusComment" />
                <button class = "btn_post" >POST</button>
            </div>
        </form>
        
       

        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>

  <hr>


  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->

</body>

</html>