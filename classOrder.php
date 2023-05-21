<?php 

	require_once "classPizza.php";

	class Order{
		private $pizzas;
		private $amount;

		function __construct(int $id, string $name, string $description, float $price, string $whichMessage){
			$this->pizzas = array(new Pizza($id, $name, $description, $price));
			$this->amount = 1;
			$_SESSION[$whichMessage] = 'Dodano pizze do zamowienia.';
			$_SESSION[$whichMessage . 'Type'] = false;
		}
		
		function getPizza($whichPizza){
			return $this->pizzas[$whichPizza];
		}

		function getAmount(){
			return $this->amount;
		}

		function getPizzasCount(){
			return count($this->pizzas);
		}

		function addPizza(int $id, string $name, string $description, float $price, string $whichMessage){
			$this->amount++;

			// Tu ustawiæ b³¹d dodawania pizzy - zmienna sesyjna
			if($this->amount >= 4){
				$this->amount--;
				$_SESSION[$whichMessage] = 'Mo¿esz zamówiæ maksymalnie 3 produkty.';
				$_SESSION[$whichMessage . 'Type'] = true;
				return;
			}

			foreach($this->pizzas as &$pizza){
				if($pizza->ifTheSame($id, $name, $description, $price)){
					$pizza->incrementAmount();
					$_SESSION[$whichMessage] = 'Dodano pizze do zamowienia.';
					$_SESSION[$whichMessage . 'Type'] = false;
					return;
				}
			}

			$_SESSION[$whichMessage] = 'Dodano pizze do zamowienia.';
			$_SESSION[$whichMessage . 'Type'] = false;
			$this->pizzas[] = new Pizza($id, $name, $description, $price);
		}

		function removePizza($whichPizza){
			if($this->pizzas[$whichPizza - 1]->getAmount() != 1)
				$this->pizzas[$whichPizza - 1]->decrementAmount();
			else{
				unset($this->pizzas[$whichPizza - 1]);
				$this->pizzas = array_values($this->pizzas);
			}

			$this->amount--;
		}

		function show(){
			$items  = '<div class="menu__item">';
			$items .= '	<div class="menu__item-desc">';
			$items .= '		<p class="menu__item-desc-one">Koszyk pusty.</p>';
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
                $items .= '        <p class="menu__item-desc-three">Cena: ' . $pizza->getPrice() . 'zl ilosc: ' . $pizza->getAmount() . '</p>';
                $items .= '    </div>';
                $items .= '    <div class="menu__item-prices">';
                $items .= '        <form action = "summary.php" method = "post">';
                $items .= '            <button type="submit" class="slice three">Usun</button>';
                $items .= '            <input type="hidden" name="whichToDelete" value = "' . $counter . '"/>';
                $items .= '        </form>';
                $items .= '    </div>';
                $items .= '</div>';

				$counter++;

				
				//echo "<script>console.log('" . $pizza->show() . "'); </script>";

			}

			return $items;
		}
	}

?>