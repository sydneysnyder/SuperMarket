<?php

    try{
    	$con = new PDO("mysql:host=localhost; dbname=ravi4","root","");
		
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		
		$fromDate = filter_input(INPUT_POST,"fromDate");
        $toDate = filter_input(INPUT_POST,"toDate");
        $reformattedFromArray=explode("/",$fromDate);
        $reformattedToArray=explode("/",$toDate);
        $reformattedFrom="".$reformattedFromArray[2]."-".$reformattedFromArray[0]."-".$reformattedFromArray[1];
        $reformattedTo="".$reformattedToArray[2]."-".$reformattedToArray[0]."-".$reformattedToArray[1];
        $earnings="";

        $q="select sum(trans_total) from transactions where date(time_stamp) >= '$reformattedFrom' and date(time_stamp) <= '$reformattedTo'";
        $ps = $con->prepare($q);
        $ps->execute();
        $result = $con->query($q);
        $data=$ps->fetchAll(PDO::FETCH_ASSOC);

        foreach ($data as $row ) {
			foreach ($row as $name => $value) {
                $earnings.= "$value ";
            }
		}
        $earningsRounded= floatval($earnings);
        $outputEarnings = round($earningsRounded,2);
        print "<p style=\"font-size:2em; font-weight:bolder;color:black;\">Ravi's Supermarket Earnings from $reformattedFrom to $reformattedTo are";
        print"</p>";
         print "<p style=\"font-size:3em; font-weight:bolder;color:green;\">$";
           print $outputEarnings;
           print"</p>";
        
           
    }
		
	catch(PDOException $e){
		print "Error";
	}

?>
