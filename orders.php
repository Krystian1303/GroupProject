<?php
	require_once "classOrder.php";
	session_start();
	function addToOrder($id_pizza, $name, $description, $price){
		//echo "<script>console.log('$id_pizza, $name, $description, $price'); </script>";
		if(!isset($_SESSION['order']))
			$_SESSION['order'] = new Order($id_pizza, $name, $description, $price);
		else 
			$_SESSION['order']->addPizza($id_pizza, $name, $description, $price);

		showOrder();
		
	}

	function showOrder(){
		$_SESSION['order']->show();
	}

	function createPizza(){

	}

?>