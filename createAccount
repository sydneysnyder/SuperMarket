<?php

    try{
    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
		
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$fName =filter_input(INPUT_POST, 'firstName');
		$lName = filter_input(INPUT_POST, "lastName");
		$eMail = filter_input(INPUT_POST,"email");
		$phoneNum = filter_input(INPUT_POST,"phoneNum");
		$password = filter_input(INPUT_POST,"checkPassword");
		$query;
        $ps;
        
             $query="INSERT INTO employee(first_name,last_name,password,email,phone_num)VALUES('$fName','$lName','$password','$eMail','$phoneNum')";
        $ps = $con->prepare($query);

            $ps->bindParam(':fistName',$fName);
            $ps->bindParam(':lastName',$lName);
        $ps->bindParam(':password',$password);
        $ps->bindParam(':email',$eMail);
        $ps->bindParam(':phoneNum',$phoneNum);

        $ps->execute();
  print"<script type=\"text/javascript\">window.location.assign(\"http://localhost/group/finalProject/loginValidation.php\") </script>";
        
           
		}
		
	catch(PDOException $e){
		print "Error";
	}

?>
