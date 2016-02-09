<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>Ravis Supermarket</title>


   <link rel="stylesheet" href= "style.css">
	<link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">

  <meta name="description" content="">
  <meta name="author" content="Anonymous">

  <meta name="viewport" content="width=device-width; initial-scale=1.0">

  <!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
  <link rel="shortcut icon" href="/favicon.ico">
  <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
<script src="jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>

    <script src="dynamicTable.js"></script>
     <script>$( ".button" ).button();</script>
        <script>$( ".accordion" ).accordion();</script>

<link rel="stylesheet" href="jQueryTheme.css">
   
<script> 
    
$(document).ready(function(){
$(".sidebar").hide();
    var x=0;
    $("#slideLeft").click(function(){
        if(x%2==0){
        $("#slideLeft").attr('src',"slideRight.png");
        }
        else{
                    $("#slideLeft").attr('src',"slideLeft.png");
        }
        $(".sidebar").animate({
            width: 'toggle'
        });
        x++;
    });
});
</script> 
    <script>
        
$(document).ready(function(){
    var x= 1;
    $("#leg1").click(function(){
        x=x+1;
        if(x%2==0){
        $("#sliderMenu1").slideUp();
        }
        else{
                $("#sliderMenu1").slideDown();
        }
    });
   
});
</script>
   
    
        <script>
$(document).ready(function(){
    var x= 1;
    $("#leg2").click(function(){
        x=x+1;
        if(x%2==0){
        $("#sliderMenu2").slideUp();
        }
        else{
                $("#sliderMenu2").slideDown();
        }
    });
   
});
</script>
    
        
</head>
<body>
    <div class="sidebar" >
<h2>Contact Us</h2>
        <img src="contact.png" height="130px" class="sideBarImg">
        <p>Email- anonymous@info.com</p>
        
<h2>Location</h2>
 <img src="location.png" height="130px" class="sideBarImg">
        <p>We are located at the heart of Silicon Valley</p>
        
<h2>Powered By</h2>
        <img src="mysql.png" height="100px" class="sideBarImg">
        
</div>
         
      <img id="slideLeft" src="slideLeft.png" style="float:right" width="50" height="50">

      <p class="intro">
      Anonymous provides leading database services to the small businesses. Helping maintain your business in an efficient manner. 
        
      </p>
      
    <p>
        <h1 class="hOne">Products</h1>
          <div id="outputTable">
         <?php
class Item{
            private $item_id;
            private $item_name;
            private $item_price;
            private $item_quantity;

            public function getID(){return $this->item_id;}
            public function getName(){return $this->item_name;}
            public function getPrice(){return $this->item_price;}
            public function getQuantity(){return $this->item_quantity;}
            
        }
			
    try{
    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
		
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $q="select item_id,item_name,item_price,item_quantity from item";
        $result = $con->query($q);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print "<table border=\"10\">\n";
		print "<tr>\n";
		
		foreach ($row as $field => $value) {
			print "<th>$field</th>\n";
		}
        $query = "SELECT * from item";
        $psPrintResult = $con->prepare($query);
        $psPrintResult->execute();
        $psPrintResult->setFetchMode(PDO::FETCH_CLASS,"Item");
        while ($item = $psPrintResult->fetch()) {
                print "        <tr>\n";
                print "            <td>" . $item->getID()     . "</td>\n";
                print "            <td>" . $item->getName()  . "</td>\n";
                print "            <td>" . $item->getPrice()   . "</td>\n";
                print "            <td>" . $item->getQuantity() . "</td>\n";
                print "        </tr>\n";
            }
            
            print "    </table>\n";
        }
	
	catch(PDOException $e){
		print "Error";
	}
		?>
          </div>

    </p>
    <br/>
    <br/>
    <p>
        <h1 class="hTwo">Options</h1>
    </p>
    <script src="hiding.js"></script>

<div class="accordion">
    <h3>Edit Supermarket Database</h3>
    <div id="accOne">
        <form id="myForm" action="db.php" 
        method="post">
            <fieldset id="editSupermarket">

                    
                    <select class=""name="operation" id="mySelect" onchange="checkOp()" onload="checkOp()">
                        <option  value="add" >Add an Item</option>
                        <option  value="delete">Delete an Item</option>
                        <option  value="view" selected>View Database</option>
                    </select>
                    <label id="itemIDLabel">Item ID</label>
                    <input type="text" name="itemID" id="itemI" placeholder="Enter Item ID"/>
                    <label id="itemNameLabel">Name</label>
                    <input type="text" name="itemName"id="itemN" placeholder="Enter Item Name" />
                    <label id="itemPriceLabel">Price</label>
                    <input type="text" name="itemPrice" id="itemP"placeholder="Enter Item Price" />
                    <label id="itemQuanLabel">Quantity</label>
                    <input type="text" name="itemQuantity"id="itemQ" placeholder="Enter Item Quantity" />
                    <p>
                        <Button id="dynamicButton"class="button">Submit</Button>


                    </p>

            </fieldset>
        </form>
	    </div>
    			<h3>Make Transaction</h3>

	<div id="accTwo">
        
		<form id="myFormSix"  action="db.php" method="post">
		<fieldset>
			<label>Transaction Type</label>
			<input type="radio"
                       name="transaction"
                       value="purchase" 
                       checked /> Purchase
			<input type="radio"
                       name="transaction"
                       value="return" /> Return
			<p>
			<label>Item ID</label>
                 <input type="text" name="id" placeholder="Enter Item ID"/>
			<label>Quantity</label>
				<input type="text" name="quantity" placeholder="Enter quantity"/>
                <br>
                <br>
                      <input id="opButton"class="button" type="submit" value="Submit" />
			</p>	
		</fieldset>
		</form>

    </div>
</div>
  

</body>

    <footer>
     <p>&copy; Copyright  by Anonymous</p>
    </footer>
