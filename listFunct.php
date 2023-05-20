<?php
	
	require_once "classPizza.php";
	function listPizza(){
		require_once "connection.php";
		$conn = makeConnection();

		$str = 'Nieprawid³owe po³¹czenie z baz¹ danych.';

		if($result = $conn->query("SELECT * FROM pizza WHERE nazwa != '" . Pizza::DEFAULT_PIZZA_NAME . "';")){
			$counter = 1;
			$str = '';
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$str .= '<div class="menu__item">';
				$str .= '	<div class="menu__item-desc">';
				$str .= '		<p class="menu__item-desc-one">' . $counter . '. ' . $row["nazwa"] . '</p>';
				$str .= '		<p class="menu__item-desc-two">' . $row["opis"] . '</p>';
				$str .= '	</div>';
				$str .= '	<div class="menu__item-prices">';
				$str .= '		<form action="#" method="post">';
				$str .= '			<button class="slice one" disabled>';
				$str .= '				<input type="radio" value="' . $row["cena_mala"] . '" name="cena" /> ' . $row["cena_mala"] . ' zl';
				$str .= '			</button>';
				$str .= '			<button class="slice two" disabled>';
				$str .= '				<input type="radio" value="' . $row["cena_duza"] . '" name="cena" /> ' . $row["cena_duza"] . ' zl';
				$str .= '			</button>';
				$str .= '			<button type="submit" class="slice three">Dodaj</button>';
				$str .= '			<input type = "hidden" name = "idPizzy" value = "' . $row["pizza_id"] . '" />';
				$str .= '		</form>';
				$str .= '	</div>';
				$str .= '</div><hr />';

				$counter++;
			}
		}

		$conn->close();
		return $str;
	}

	function listIngredients(){
		require_once "connection.php";
		$conn = makeConnection();

		$str = 'Nieprawid³owe po³¹czenie z baz¹ danych.';

		if($result = $conn->query("SELECT * FROM skladniki;")){
			$str = '';
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$str .= '<div class="create__body">';
				$str .= '	<p class="create__body-ingridient">' . $row["nazwa"] . '</p>';
				$str .= '	<label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">';
				$str .= '		<input type="checkbox" name = "' . $row["skladnik_id"] . '" value = "' . $row["nazwa"] . '" unchecked>';
				$str .= '		<span class="checkmark"></span>';
				$str .= '		<span class="label"></span>';
				$str .= '	</label>';
				$str .= '</div>';
			}
		}

		$conn->close();
		return $str;
	}

?>