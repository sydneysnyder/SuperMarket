<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Ravi's Supermarket</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	
	<p>
		
		<?php

    try{
    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
		
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$operation =filter_input(INPUT_POST, 'operation');
		$itemName = filter_input(INPUT_POST, "itemName");
		$itemPrice = filter_input(INPUT_POST,"itemPrice");
		$itemQuantity = filter_input(INPUT_POST,"itemQuantity");
		$itemID = filter_input(INPUT_POST,"itemID");
		$transaction = filter_input(INPUT_POST, "transaction");
		$id = filter_input(INPUT_POST,"id");
		$quantity = filter_input(INPUT_POST, "quantity");
		$query;
        $query2;
        $psTwo;
        $ps;
        
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
        
        
		if ($operation=="add") {
			$query="insert into item VALUES(null,:itemName,:itemPrice,:itemQuantity)";
                    $ps = $con->prepare($query);
$ps->bindParam(':itemName',$itemName);
            $ps->bindParam(':itemPrice',$itemPrice);
$ps->bindParam(':itemQuantity',$itemQuantity);

            print"<p class=\"addStatement\">This is the content of the current database which depicts the inventory of the supermarket after adding an elemnt                      into the database.</p>";

		} 
		if($operation=="delete") {
			$query="DELETE from item WHERE item_id = :itemID";
                                $ps = $con->prepare($query);
$ps->bindParam(':itemID',$itemID);

             print"<p>This is the content of the database which depicts the inventory of the supermarket after deleting an element                           from the database.</p>";

		}
		
		if($operation=="view"){
			$query = "SELECT * from item";
            $ps = $con->prepare($query);

            print"<p>This is the content of the current database which depicts the inventory of the supermarket.</p>";
		}
		
		if($transaction=="purchase"){
					$query="UPDATE item
							SET item_quantity = item_quantity - :quantity
							WHERE item_ID = :id";
             $ps = $con->prepare($query);
            $ps->bindParam(':quantity',$quantity);
            $ps->bindParam(':id',$id);

            
             $query2="INSERT INTO transactions(trans_type,trans_total)VALUES('purchase',(select item_price from item where                          item_ID=:id)*:quantity)";
            $psTwo = $con->prepare($query2);
            $psTwo->bindParam(':quantity',$quantity);
            $psTwo->bindParam(':id',$id);
            $psTwo->execute();
            
		}
		if($transaction=="return"){
					$query="UPDATE item
							SET item_quantity = item_quantity + :quantity
							WHERE item_ID = :id";
             $ps = $con->prepare($query);
            $ps->bindParam(':quantity',$quantity);
            $ps->bindParam(':id',$id);

            
             $query2="INSERT INTO transactions(trans_type,trans_total)VALUES('return',(select item_price from item where       item_ID=:id)*:quantity*-1)";
            $psTwo = $con->prepare($query2);
            $psTwo->bindParam(':quantity',$quantity);
            $psTwo->bindParam(':id',$id);
                            $psTwo->execute();
  
           
		}
	            $ps->execute();
                
        $psPrintResult = $con->prepare("select * from item");
        $psPrintResult->execute();
        $psPrintResult->setFetchMode(PDO::FETCH_CLASS,"Item");
        print "    <table border=\"10\">\n";
        
            $row = $psPrintResult->fetch(PDO::FETCH_ASSOC);
            
            // Construct the header row of the HTML table.
            print "            <tr>\n";
            foreach ($row as $field => $value) {
                    print "                <th>$field</th>\n";
            }
            print "            </tr>\n";
        
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
		
		
	</p>
	
	
</body>
