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
