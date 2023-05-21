<?php

	class Pizza{
		const DEFAULT_PIZZA_NAME = "zrob to sam";
		const DEFAULT_PIZZA_PRICE = 37.00;
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

		function getId(){
			return $this->id;
		}

		function getName(){
			return $this->name;
		}

		function getDescription(){
			return $this->description;
		}

		function getPrice(){
			return $this->price;
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