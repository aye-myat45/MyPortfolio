<?php
	$id=$_POST['id'];
	$date=$_POST['date'];
	$title=$_POST['title'];
	$amount=$_POST['amount'];

	$expense=array(
				'date'=>$date,
				'title'=>$title,
				'amount'=>$amount);

	$expenselist=file_get_contents('expenselist.json');
	$expenselistarray=json_decode($expenselist, true);
	$expenselistarray[$id]=$expense;
	file_put_contents('expenselist.json', json_encode($expenselistarray,JSON_PRETTY_PRINT));
	header("location: index.php?status=2");


?>