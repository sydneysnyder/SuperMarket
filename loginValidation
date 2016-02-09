<?php
session_start();

?>
    
    
<!DOCTYPE html>
<html lang="en">
    <style>
    
    html{
    background-image: url(bg.jpg);

    background-repeat: no-repeat;
    background-size: cover;
     width:100%;
    height:100%;
    margin:0;
    padding:0;

}
    </style>
<head>
    
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Ravis Supermarket</title>
  <meta name="description" content="">
  <meta name="author" content="Anonymous">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
<link rel= "stylesheet" href="style2.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="login.js"></script>
    <script src="accountCreatedSuccess.js"></script>

<script>function x(){
 $("#f1").hide();
 $("#f1").stop();
 
}</script>
</head>
<body onload="x()" onunload="x()">
   
    <p>
   <center><form action="loginValidation.php" method="post" class="login"> 
        <legend>Login:</legend>
       <br>
        <label>Employee ID: </label>
       <br>
       <img src="profile.png" width="20px" height="20px"><input type="text" name="empID"> 
        <br>
       <label>Password: </label>
       <br>
       <img src="password.png" width="20px" height="20px">
        <input type="password" name="empPW"> 
        <br>
       <input type="image" id="imgButton"src="loginButton.png"  width="120px" height="40px">
       
         <p id="loginFailed" style="color:red;font-family:verdana "></p>

</a>
     </form>
        
        
    </center>
    <center><img src="signUp.png" width="100px" height="100px" onclick="drop()"></center>

    <center><form action="" id="f1" method="post" class="signup"> 
        <label>First Name: </label>
        <input type="text" name="firstName" placeholder=" Enter First Name" value="" id="fName" oninput="checkFirstName(this.value)"> <img id="checkOne" src="">
        <br>
        <label>Last Name: </label>
        <input type="text" name="lastName" placeholder=" Enter Last Name" id="lName"value="" oninput="checkLastName(this.value)"> <img id="checkTwo" src="">
        <br>
        <label>Email: </label>
        <input type="email" name="email" placeholder=" Enter Valid Email" value="" oninput="checkEmail(this.value)"><img id="checkThree" src=""> 
        <br>
        <label>Phone Number: </label>
        <input type="text" name="phoneNum"placeholder=" Enter Phone Number" value="" oninput="checkPhone(this.value)"><img id="checkFour" src=""> 
        <br>
         <label>Password: </label>
        <input type="password" name="setPassword" placeholder=" Enter Valid Password" id="pw"> 
        <br>
         <label>Confirm Password: </label>
         <input type="password" name="checkPassword"id="checkPw" placeholder=" Re-type Password to confirm."value="" oninput="checkInputedPW(this.value)"> <img id="check" src="">
<br>
       <input id="signUpButton" type="image" src="signUpLogo.png" width="50px" height="50px"onclick="createAccount();checkFirstName(document.getElementById('fName').value);checkLastName(document.getElementById('lName').value);">
       <div id="accCreatedDiv"></div>
       <br>

</a>
     </form>
    </center>
    
        </p>    
    </body>
<div id="myFooter"><center><p id="slogan">A Simple, Organized and Efficient Way to Track Your Business.</p></center>
 </div>

<p>

</p>
<?php


      try{

    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $employeeID = filter_input(INPUT_POST,"empID");
        $employeePW = filter_input(INPUT_POST,"empPW");

        $query = "SELECT * from employee where employee_ID= :employee_ID";
        $ps = $con->prepare($query);
        $ps->execute(array(':employee_ID'=>$employeeID));
          $pwMatches=false;
          $pw="";
   
          $data=$ps->fetchAll(PDO::FETCH_ASSOC);
        $loginSuccessful="";
	
          	foreach ($data as $row ) {
			foreach ($row as $name => $value) {
                $loginSuccessful.= "$value ";
            }
		}
          if($loginSuccessful!=NULL){
             $split=explode(" ",$loginSuccessful);
              $pw=$split[3];
              if($pw==$employeePW){
              $pwMatches=true;
              }
          }
          if($loginSuccessful!=NULL&&$pwMatches){
              print"<script type=\"text/javascript\">window.location.assign(\"http://localhost/group/finalProject/assignmentOne.php\") </script>";
              $fullName="";
              $splitLoginInfo=explode(" ",$loginSuccessful);
              $fullName=$splitLoginInfo[1]." ".$splitLoginInfo[2];
              $_SESSION["user"] = $fullName;

          }
          
          else if($employeeID!=NULL and (($loginSuccessful==NULL)||(!$pwMatches))){
               print"<script type=\"text/javascript\">document.getElementById(\"loginFailed\").innerHTML=\"Login Failed: Employee ID does not exist or incorrect password, please try again.\" </script>";
          }
          
          
      }
	
	catch(PDOException $e){
		print "";
	}
		?>
