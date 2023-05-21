<?php 

	require_once "classPizza.php";

	class Order{
		private $pizzas;
		private $amount;

		function __construct(int $id, string $name, string $description, float $price){
			$this->pizzas = array(new Pizza($id, $name, $description, $price));
			$this->amount = 1;
		}

		function addPizza(int $id, string $name, string $description, float $price){
			$this->amount++;

			// Tu ustawiæ b³¹d dodawania pizzy - zmienna sesyjna
			if($this->amount >= 4){
				$this->amount--;
				echo "<script>console.log('Mo¿esz zamówiæ maksymalnie 3 produkty.'); </script>";
				return;
			}

			foreach($this->pizzas as &$pizza){
				if($pizza->ifTheSame($id, $name, $description, $price)){
					$pizza->incrementAmount();
					return;
				}
			}

			$this->pizzas[] = new Pizza($id, $name, $description, $price);
		}

		function removePizza($whichPizza){
			unset($this->pizzas);
		}

		function show(){
			$items  = '<div class="menu__item">';
			$items .= '	<div class="menu__item-desc">';
			$items .= '		<p class="menu__item-desc-one">Brak zamowien.</p>';
			$items .= '	</div>';
			$items .= '</div>';

			$counter = 1;
			foreach($this->pizzas as $pizza){
				if($counter == 1)
					$items = '';

				$items .= '<div class="menu__item">';
                $items .= '   <div class="menu__item-desc">';
                $items .= '        <p class="menu__item-desc-one">' . $counter . '. ' . $pizza->getName() . '</p>';
                $items .= '        <p class="menu__item-desc-two">' . $pizza->getDescription() . '</p>';
                $items .= '        <p class="menu__item-desc-three">Cena: ' . $pizza->getPrice() . '</p>';
                $items .= '    </div>';
                $items .= '    <div class="menu__item-prices">';
                $items .= '        <form action = "orders.php" method = "post">';
                $items .= '            <button type="submit" class="slice three">Usun</button>';
                $items .= '            <input type="hidden" name="whichToDelete" value = "' . $counter . '"/>';
                $items .= '        </form>';
                $items .= '    </div>';
                $items .= '</div>';

				$counter++;

				echo "<script>console.log('" . $pizza->show() . "'); </script>";
			}

			return $items;
		}
	}

?>