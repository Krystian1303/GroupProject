
<?php

	function listPizza(){
		$conn = makeConnection();

		$str = 'Nieprawid³owe po³¹czenie z baz¹ danych.';

		if($result = $conn->query("SELECT * FROM pizza;")){
			$counter = 1;
			$str = '';
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$str .= '<div class="menu__item">';
				$str .= '	<div class="menu__item-desc">';
				$str .= '		<p class="menu__item-desc-one">' . $counter . '. ' . $row["nazwa"] . '</p>';
				$str .= '		<p class="menu__item-desc-two">' . $row["opis"] . '</p>';
				$str .= '	</div>';
				$str .= '	<div class="menu__item-prices">';
				$str .= '		<form action="test.php" method="post">';
				$str .= '			<button class="slice one" disabled>';
				$str .= '				<input type="radio" value="' . $row["cena_mala"] . '" name="cena" /> ' . $row["cena_mala"] . ' z³';
				$str .= '			</button>';
				$str .= '			<button class="slice two" disabled>';
				$str .= '				<input type="radio" value="' . $row["cena_duza"] . '" name="cena" /> ' . $row["cena_duza"] . ' z³';
				$str .= '			</button>';
				$str .= '			<button type="submit" class="slice three">Dodaj</button>';
				$str .= '			<input type = "hidden" name = "idPizzy" value = "' . $row["pizza_id"] . '" />';
				$str .= '		</form>';
				$str .= '	</div>';
				$str .= '</div><hr />';

				$counter++;
			}
		}

		return $str;
	}

	function listIngredients(){
		$conn = makeConnection();

		$str = 'Nieprawid³owe po³¹czenie z baz¹ danych.';

		if($result = $conn->query("SELECT * FROM skladniki;")){
			$str = '';
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				$str .= '<div class="create__body">';
				$str .= '	<p class="create__body-ingridient">' . $row["nazwa"] . '</p>';
				$str .= '	<label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">';
				$str .= '		<input type="checkbox" name = "' . $row["nazwa"] . '" value = "' . $row["skladnik_id"] . '" unchecked>';
				$str .= '		<span class="checkmark"></span>';
				$str .= '		<span class="label"></span>';
				$str .= '	</label>';
				$str .= '</div>';
			}
		}

		return $str;
	}

	function makeConnection(){
		require_once "connection.php";
		$conn = new mysqli($host, $db_user, $db_password, $db_name);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			return null;
		}

		return $conn;
	}
?>