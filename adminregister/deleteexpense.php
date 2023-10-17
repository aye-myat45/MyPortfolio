<?php
	$id=$_POST['id'];

	$expenselist=file_get_contents('expenselist.json');
	$expenselistarray=json_decode($expenselist, true);
	unset($expenselistarray[$id]);

	$expenselistjson=json_encode($expenselistarray,JSON_PRETTY_PRINT);
	file_put_contents('expenselist.json', $expenselistjson);

	echo $expenselistjson;
?>