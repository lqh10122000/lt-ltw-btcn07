<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./style.css"  rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
</head>
<?php
    require_once 'init.php';

?>


<style>
    .button-bar
    {
        margin-left : 40px;
        margin-top : 20px;
        height: 60px;
        width : 120px; 
        flex-wrap: nowrap;
    }

    .bar-header
    {
        display: flex;
        flex-wrap: nowrap;
        height: 100px; 
        width = 1000px; 
        background-color : black;
    }
</style>

<body>
    

   <?php include_once("header.php"); ?>

<!-- 

    <div class = "bar-header ">
        
        <div>
            <form action = "sum.php" >
                <input  class = "button-bar" name="submit" type="submit" value = "sum">
            </from>
        </div>
        
        <div>
            <form action = "status.php">
                <input  class = "button-bar"  type="submit" value = "status"> 
            </from>
        </div>
        
        <div>
            <form action = "profile.php">
                <input  class = "button-bar" type="submit" value = "profile">  
            </from>
        </div>
        
        <div>
            <form action = "dangNhap.php">
                <input class = "button-bar" type="submit" value = "log out"> 
            </from>
        </div>
        

    </div> -->
    
    <div class="container masthead" style="background-image: url('./images/home-bg.jpg')">

        
        <div class="row">
            <div class="col cs1">

                <!-- <h1>Tính Tổng 1 Số</h1> -->
    
            </div>

            <div class="col cs">


                <h1>SUM</h1>

                <form action = "sum.php" method = "POST">       
                    <h3>NUMBER 1</h3>
                    <input class="number" name="number111" type="number" value = 0>
                    <h3>NUMBER 2</h3>
                    <input class="number" name="number222" type="number" value = 0>
                    <br/>
                    <input class="btnSubmit" name="submit" type="submit" value = "Submit">
                </form>

    
            </div>
            <div class="col cs2">

            <div class="result">

                <h2>Result</h2>
                <!-- <input type="text" class="number" name="result" value = "">   -->
                <h1>
                    <?php 
                        if(isset($_POST['number111']))
                        {
                            $s1 = $_POST['number111'];
                            $s2 = $_POST['number222'];
                            echo $s1 + $s2; 
                        }
                                                
                    ?>

                </h1>
               
                <form action ="dangNhap.php">
                    <input class="btnSubmit" name="submit" type="submit" value = "Log Out">

                </form>
                
            </div>
                
                
                <!-- <h1>Tính Tổng 1 Số</h1> -->
    
            </div>
    
            
        </div>


        

      

    </div>
    
</body>
</html>

