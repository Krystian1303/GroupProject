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

		function show(){
			foreach($this->pizzas as $pizza){
				echo "<script>console.log('" . $pizza->show() . "'); </script>";
			}
		}
	}

?>