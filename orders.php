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
		$items  = '<div class="menu__item">';
		$items .= '	<div class="menu__item-desc">';
		$items .= '		<p class="menu__item-desc-one">Brak zamowien.</p>';
		$items .= '	</div>';
		$items .= '</div>';

		if(isset($_SESSION['order'])){
			$items = $_SESSION['order']->show();
		}

		return $items;
	}

	function removeFromOrder($whichPizza){
		unset($_SESSION['order']->removePizza($whichPizza));
	}

	if(isset($_POST['whichToDelete']))
		removeFromOrder($_POST['whichToDelete']);

?>