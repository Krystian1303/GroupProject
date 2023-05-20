<?php

	class Pizza{
		private $amount;
		private $id, $name, $description, $price;

		function __construct(int $id, string $name, string $description, float $price){
			$this->id = $id;
			$this->name = $name;
			$this->description = $description;
			$this->price = $price;
			$this->amount = 1;
		}

		function show(){
			return sprintf("%s | %s | %s | %0.2f | %s", $this->id, $this->name, $this->description, $this->price, $this->amount);
		}

		function incrementAmount(){
			$this->amount++;
		}

		function getAmount(){
			return $this->amount;
		}

		function ifTheSame(int $id, string $name, string $description, float $price){
			return 
				$this->id == $id &&
				$this->name == $name &&
				$this->description == $description &&
				$this->price == $price;
		}
	}

?>