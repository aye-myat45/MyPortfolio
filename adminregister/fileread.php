<?php
	$myfile=fopen('expense.txt', 'r');
	while (!feof($myfile)) {
		$mystring=fgets($myfile);//read 1 line
		//$mystring=fgetc($myfile); //read 1 word
		$myarray=explode(',', $mystring);
		print_r($myarray);
		echo $myarray[0]."=>".$myarray[1]."=>".$myarray[2];
		echo " $mystring <br>";
	}

	/*readfile('expense.txt');
	$myfile=file_get_contents('expense.txt');
	//echo "<br>Get Contents".$mytext;
	echo "<br><br>Read file:".$myfile;

	file_put_contents('expense.txt', 'Hello File');*/




?>