<?php
	$id=$_POST['id'];
	$expenselist=file_get_contents('expenselist.json');
	$expenselistarray=json_decode($expenselist,true);
	$expense=$expenselistarray[$id];
	echo json_encode($expense);	
?>