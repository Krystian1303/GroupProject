<?php 

	require_once "classPizza.php";

	class Order{
		private $pizzas;

		function __construct(int $id, string $name, string $description, float $price){
			$this->pizzas = array(new Pizza($id, $name, $description, $price));
		}

		function addPizza(int $id, string $name, string $description, float $price){
			// Trzeba przejœæ po tablicy $pizzas i wywo³aæ funkcjê ifTheSame z classPizza.
			// Jeœli jakaœ pizza zwróci true dla tej funkcji to trzeba jej $amount zwiêkszyæ o jeden zamiast dodawaæ
			// kolejn¹ pizzê do tablicy.
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