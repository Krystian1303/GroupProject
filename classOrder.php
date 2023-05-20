<?php 

	require_once "classPizza.php";

	class Order{
		private $pizzas;

		function __construct(int $id, string $name, string $description, float $price){
			$this->pizzas = array(new Pizza($id, $name, $description, $price));
		}

		function addPizza(int $id, string $name, string $description, float $price){
			// Trzeba przej�� po tablicy $pizzas i wywo�a� funkcj� ifTheSame z classPizza.
			// Je�li jaka� pizza zwr�ci true dla tej funkcji to trzeba jej $amount zwi�kszy� o jeden zamiast dodawa�
			// kolejn� pizz� do tablicy.
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