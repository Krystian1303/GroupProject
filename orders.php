<?php
	require_once "classOrder.php";
	session_start();

	function addToOrder($id_pizza, $name, $description, $price, $whichMessage){
		//echo "<script>console.log('$id_pizza, $name, $description, $price'); </script>";
		if(!isset($_SESSION['order']))
			$_SESSION['order'] = new Order($id_pizza, $name, $description, $price, $whichMessage);
		else 
			$_SESSION['order']->addPizza($id_pizza, $name, $description, $price, $whichMessage);

		showOrder();
		
	}

	function showOrder(){

		//unset($_SESSION['order']);

		$items  = '<div class="menu__item">';
		$items .= '	<div class="menu__item-desc">';
		$items .= '		<p class="menu__item-desc-one">Koszyk pusty.</p>';
		$items .= '	</div>';
		$items .= '</div>';

		if(isset($_SESSION['order'])){
			$items = $_SESSION['order']->show();
		}

		return $items;
		return "";
	}

	function removeFromOrder($whichPizza){
		$_SESSION['order']->removePizza($whichPizza);
	}

?>