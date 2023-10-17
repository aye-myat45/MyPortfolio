<?php
	$studentarray=array(
		'0'=>array(
				'name'=>'Yan',
				'email'=>'yan@gmail.com',
				'address'=>'Yangon'
			),
		'1'=>array(
				'name'=>'MgMg',
				'email'=>'mgmg@gmail.com',
				'address'=>'Monywa'),
	);

	print_r($studentarray);
	echo "<br>Json:".json_encode($studentarray,JSON_PRETTY_PRINT);

	$mystring=json_encode($studentarray,JSON_PRETTY_PRINT);
	echo "<br>String: $mystring";
	$myarray=json_decode($mystring);
	echo "<br>Array:";
	print_r($myarray);
?>