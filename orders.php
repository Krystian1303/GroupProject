<?php
	
	function addToOrder($id_pizza, $name, $description, $price){
		require_once "classOrder.php";
		//echo "<script>console.log('$id_pizza, $name, $description, $price'); </script>";
		if(!isset($_SESSION['order']))
			$_SESSION['order'] = new Order($id_pizza, $name, $description, $price);

		$infoTmp = $_SESSION['order']->show();
		echo "<script>console.log('$infoTmp'); </script>";
		

	}

	function showOrder(){

	}

	function createPizza(){

	}

?>