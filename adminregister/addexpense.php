<?php
	$date=$_POST['date'];
	$title=$_POST['title'];
	$amount=$_POST['amount'];

	$expense=array('date'=>$date,
					'title'=>$title,
					'amount'=>$amount);
	//print_r($student);
	$expenselist=file_get_contents('expenselist.json');
	$expensearray=json_decode($expenselist,true);
	array_push($expensearray, $expense);

	file_put_contents('expenselist.json', json_encode($expensearray,JSON_PRETTY_PRINT));
	header("location:index.php?status=1")
?>	