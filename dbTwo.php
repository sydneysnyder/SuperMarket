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
		$operationOne =filter_input(INPUT_POST, "operationOne");
        $operationTwo =filter_input(INPUT_POST, "operationTwo");
        $operationThree =filter_input(INPUT_POST, "operationThree");
		$searchPrice = filter_input(INPUT_POST, "searchPrice");
		$searchQuantity = filter_input(INPUT_POST,"searchQuantity");
		$itemID = filter_input(INPUT_POST,"itemID");
		$transaction = filter_input(INPUT_POST, "transaction");
		$id = filter_input(INPUT_POST,"id");
		$quantity = filter_input(INPUT_POST, "quantity");
        $searchSupplier = filter_input(INPUT_POST,"searchSupplier");
        $transactionOperation = filter_input(INPUT_POST,"transactions");
		$query;
        $ps;
        $psTwo;
        $psThree;
		if ($operationOne=="lessThan") {
			$query="select * from item where item_price < :searchPrice-.01";
                         $ps = $con->prepare($query);
                        $ps->bindParam(':searchPrice',$searchPrice);

            print"<p class=\"addStatement\">This table displays the items with a price less than $searchPrice.</p>";
                    $ps->execute();


		}
        	if ($operationOne=="greaterThan") {
$query="select * from item where item_price > :searchPrice+.01";
                             $ps = $con->prepare($query);
                        $ps->bindParam(':searchPrice',$searchPrice);
                print"<p class=\"addStatement\">This table displays the items with a price greater than $searchPrice.</p>";
        $ps->execute();
       

		}
        	if ($operationOne=="equalTo") {
		$query="select * from item where item_price >= :searchPrice-.01 and item_price<= :searchPrice+.01";
                             $ps = $con->prepare($query);
                        $ps->bindParam(':searchPrice',$searchPrice);
                
             print"<p class=\"addStatement\">This table displays the items with a price equal to $searchPrice.</p>";
        $ps->execute();

		}
        	if ($operationTwo=="lessThan") {
			$query="select * from item where item_quantity < :searchQuantity";
                             $ps = $con->prepare($query);
                                        $ps->bindParam(':searchQuantity',$searchQuantity);

             print"<p class=\"addStatement\">This table displays the items with a quantity less than $searchQuantity.</p>";
        $ps->execute();
    

		}
        	if ($operationTwo=="greaterThan") {
$query="select * from item where item_quantity > :searchQuantity";
                             $ps = $con->prepare($query);
                                        $ps->bindParam(':searchQuantity',$searchQuantity);
                print"<p class=\"addStatement\">This table displays the items with a quantity greater than $searchQuantity.</p>";
                        $ps->execute();
      

		}
        	if ($operationTwo=="equalTo") {
$query="select * from item where item_quantity = :searchQuantity";
                             $ps = $con->prepare($query);
                                        $ps->bindParam(':searchQuantity',$searchQuantity);
                print"<p class=\"addStatement\">This table displays the items with a quantity equal to $searchQuantity.</p>";
                        $ps->execute();
      

		}
		
        if ($searchSupplier!=NULL) {
			$query="select * from supplier join item where supplier.item_id=item.item_id and item_name=:searchSupplier";
            $psTwo = $con->prepare($query);
            $psTwo->bindParam(':searchSupplier',$searchSupplier);
              print"<p class=\"addStatement\">This table displays the supplier information for $searchSupplier.</p>";
            $psTwo->execute();
            
            
		}
		if($operationThree=="viewAll"){
    $query="select * from supplier join item where supplier.item_id=item.item_id";
               print"<p>The table below displays Supplier information</p>";

            $psTwo = $con->prepare($query);
                        $psTwo->execute();

  
        }
        if($transactionOperation=="viewAll"){
            $query="select * from transactions";
            print"<p>The table below displays all the transactions information</p>";

            $psThree = $con->prepare($query);
            $psThree->execute();
            
        }
        if($transactionOperation=="purchases"){
            $query="select * from transactions where trans_type = 'purchase'";
                        print"<p>The table below displays all purchases from  the transactions information</p>";

            $psThree =$con->prepare($query);
            $psThree->execute();

        }
        if($transactionOperation=="returns"){
            $query="select * from transactions where trans_type = 'return'";
                        print"<p>The table below displays all returns from the transactions information</p>";

            $psThree =$con->prepare($query);
            $psThree->execute();

        }
    }
        
    
	
	
	catch(PDOException $e){
		print "Error";
	}
        if($operationOne!=NULL||$operationTwo!=NULL){
        $q="select item_id,item_name,item_price,item_quantity from item";
        $result = $con->query($q);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print "<table border=\"10\">\n";
		print "<tr>\n";
		
		foreach ($row as $field => $value) {
			print "<th>$field</th>\n";
		}
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
        $ps->setFetchMode(PDO::FETCH_CLASS,"Item");
        while ($item = $ps->fetch()) {
                print "        <tr>\n";
                print "            <td>" . $item->getID()     . "</td>\n";
                print "            <td>" . $item->getName()  . "</td>\n";
                print "            <td>" . $item->getPrice()   . "</td>\n";
                print "            <td>" . $item->getQuantity() . "</td>\n";
                print "        </tr>\n";
            }
            
            print "    </table>\n";
        }
if($transactionOperation!=NULL){
    class Transaction{
            private $transaction_id;
            private $transaction_type;
            private $transaction_total;
            private $time_stamp;

            public function getID(){return $this->trans_id;}
           public function getType(){return $this->trans_type;}
            public function getTotal(){return $this->trans_total;}
            public function getTime(){return $this->time_stamp;}
            
        }
        $q="select * from transactions";
        $result = $con->query($q);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print "<table border=\"10\">\n";
		print "<tr>\n";
		
		foreach ($row as $field => $value) {
			print "<th>$field</th>\n";
		}
	    print "</tr>\n";
    
        $psThree->setFetchMode(PDO::FETCH_CLASS,"Transaction");
        while ($trans = $psThree->fetch()) {
                print "        <tr>\n";
               print "            <td>" .$trans->getID()      . "</td>\n";
             print "            <td>" .$trans->getType()  . "</td>\n";
                print "            <td>" .$trans->getTotal()   . "</td>\n";
            print "            <td>" .$trans->getTime() . "</td>\n";
                print "        </tr>\n";
            }
            
            print "    </table>\n";
        }
    
if($operationThree!=NULL || $searchSupplier!=NULL){
    class Supplier{
            private $supplier_name;
            private $phone_num;
            private $item;

            public function getName(){return $this->supplier_name;}
            public function getPhone(){return $this->phone_num;}
            public function getItem(){return $this->item_name;}
            
        }
    $q="select supplier_name,phone_num,item_name from supplier join item where supplier.item_id=item.item_id";
		$result = $con->query($q);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		print "<table border=\"10\">\n";
		print "<tr>\n";
		
		foreach ($row as $field => $value) {
			print "<th>$field</th>\n";
		}
	    print "</tr>\n";
		
		
		
        $psTwo->setFetchMode(PDO::FETCH_CLASS,"Supplier");
        while ($supplier = $psTwo->fetch()) {
                print "        <tr>\n";
               print "            <td>" .$supplier->getName()      . "</td>\n";
             print "            <td>" .$supplier->getPhone()  . "</td>\n";
                print "            <td>" .$supplier->getItem()   . "</td>\n";
                print "        </tr>\n";
            }
            
            print "    </table>\n";
    
    

}


?>
		
		
	</p>
	
	
</body>
