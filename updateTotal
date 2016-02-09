<?php

    try{
    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
		
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$itemID = filter_input(INPUT_POST,"draggedItemID");
		$query;
     $q="select item_price from item where item_name = '$itemID'";
                                 $ps = $con->prepare($q);
        	            $ps->execute();

        $result = $con->query($q);
		$row = $result->fetch(PDO::FETCH_ASSOC);
	
            class Item{
            private $item_price;

            public function getPrice(){return $this->item_price;}
            
        }
        $ps->setFetchMode(PDO::FETCH_CLASS,"Item");
        while ($item = $ps->fetch()) {
                print "            <p>" . $item->getPrice()   . "</p>\n";
            }
            
           
    }
		
	catch(PDOException $e){
		print "Error";
	}

?>
		
