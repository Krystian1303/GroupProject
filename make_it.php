<!DOCTYPE html>
<html lang="pl">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Healthy&Hungry</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Open+Sans:wght@300;700&display=swap"
		rel="stylesheet" />
	<script src="https://kit.fontawesome.com/90c6c7efdc.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" href="./css/main.css" />
	<link rel="stylesheet" href="./css/make_it.css" />

	<?php
		require_once "classPizza.php";
		require_once "orders.php";
		$igredients = (array)null;

		foreach($_POST as $id => $name){
			if(strcmp($id, 'submitButton') != 0){
				$ingredients[$id] = $name;
				//echo "<script>console.log('$id => $name'); </script>";
			}
				
		}

		if(isset($_POST['submitButton']) && empty($ingredients)) // Za mało składników - wyświetlanie błędu
			echo "<script>console.log('Wybierz składniki aby zamówić pizzę'); </script>";
		else if(isset($_POST['submitButton']) && count($ingredients) > 7) // Wyświetlanie błędu gdy ktoś doda za dużo składników
			echo "<script>console.log('Za dużo składników. Maksymalna ilość składników to 7'); </script>";
		else if(isset($_POST['submitButton'])){
			$iterator = 1;
			$description = 'ciasto, ';
			foreach($ingredients as $name){
				$str = $name;
				$str .= ($iterator != count($ingredients)) ? ', ' : '';
				$description .= $str;
				$iterator++;
			}

			require_once "connection.php";
			$conn = makeConnection();
			$pizza_id = '';
			if($result = $conn->query("INSERT INTO pizza VALUES(null, '" . Pizza::DEFAULT_PIZZA_NAME . "', '$description', " . Pizza::DEFAULT_PIZZA_PRICE . ", null);")){
				if($result = $conn->query("SELECT LAST_INSERT_ID() AS id;")){
					$row = $result->fetch_assoc();
					$pizza_id = $row['id'];
				}	
			}

			foreach($ingredients as $ingredient_id => $name){
				$conn->query("INSERT INTO pizza_sklad VALUES(null, $pizza_id, $ingredient_id);");
			}

			// Wyświetlić komunikat o udanym dodaniu pizzy do zamówienia
			addToOrder($pizza_id, Pizza::DEFAULT_PIZZA_NAME, $description, Pizza::DEFAULT_PIZZA_PRICE);
			echo "<script>console.log('Udalo sie dodac pizze zrob to sam do zamowien.'); </script>";
			$conn->close();
		}

	?>
</head>

<body>
	<button class="burger-btn">
		<div class="burger-btn__box">
			<div class="burger-btn__bars"></div>
		</div>
	</button>
	<nav class="nav">
		<div class="nav__items">
			<a href="index.html" class="nav__item">H&H</a>
			<a href="menu.php" class="nav__item">Menu</a>
			<a href="make_it.php" class="nav__item">Make it!</a>
			<a href="contact.php" class="nav__item">Kontakt</a>
		</div>
	</nav>
	<header class="header section">
		<h1 class="header__heading">Healthy&Hungry</h1>
		<p class="header__text">Pizza nie musi być niezdrowa!</p>
	</header>

	<main class="main">
		<section class="dreams section-padding section white-section">
			<div class="wrapper">
				<h2 class="section-heading">Stwórz swoją pizze!*</h2>



				<form action = "#" method = "post">
					<div class="create">
						<div class="create__heading">
							<p class="create__heading-text">składniki</p>
						</div>


						<?php
					
							require_once "listFunct.php";

							echo listIngredients();
					
						?>

						<button type="submit" class="create__submit" name = "submitButton">Zamów!</button>

						<!--<div class="create__body">
							<p class="create__body-ingridient">Ser</p>
							<label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">
								<input type="checkbox" unchecked>
								<span class="checkmark"></span>
								<span class="label"></span>
							</label>
						</div>




						<div class="create__body">
							<p class="create__body-ingridient">Szynka</p>
							<label class="custom-checkbox" tab-index="0" aria-label="Checkbox Label">
								<input type="checkbox" unchecked>
								<span class="checkmark"></span>
								<span class="label"></span>
							</label>
						</div>
						 <div class="create__body">
						<p class="create__body-ingridient">Szynka</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Kurczak</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Pieczarki</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Boczek</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Cebula</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Szczypiorek</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Rukola</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Jalapeno</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Salami</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Tabasco</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Pomidor</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Kukurydza</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Ananas</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div>
					<div class="create__body">
						<p class="create__body-ingridient">Gruszka</p>
						<button class="create__body-btn">Dodaj</button>
						<br />
						<hr />
					</div> -->
					</div>
				</form>
			</div>
		</section>
	</main>

	<footer class="footer">
		<div class="wrapper">
			<div class="footer__boxes">
				<div class="footer__box">
					<h3 class="footer__box-title">Healthy&Hungry</h3>
					<p>Pizzeria dla twojego serca!</p>
					<div class="footer__box-social">
						<a href="#" class="footer__box-link">
							<i class="fab fa-twitter-square"></i>
						</a>
						<a href="#" class="footer__box-link">
							<i class="fab fa-facebook-square"></i>
						</a>
						<a href="#" class="footer__box-link">
							<i class="fab fa-instagram-square"></i>
						</a>
					</div>
				</div>

				<div class="footer__box footer__box-desktop">
					<h3 class="footer__box-title">Pizze</h3>
					<ul class="footer__box-list">
						<li class="footer__box-list-item">
							<a href="menu.html">Margharitta</a>
						</li>
						<li class="footer__box-list-item">
							<a href="menu.html">Capriciossa</a>
						</li>
						<li class="footer__box-list-item">
							<a href="menu.html">Diavola</a>
						</li>
						<li class="footer__box-list-item">
							<a href="menu.html">Pozostałe Pizze</a>
						</li>
					</ul>
				</div>
				<div class="footer__box footer__box-desktop">
					<h3 class="footer__box-title">O firmie</h3>
					<ul class="footer__box-list">
						<li class="footer__box-list-item"><a href="#">O nas</a></li>
						<li class="footer__box-list-item"><a href="#">Zarząd</a></li>
						<li class="footer__box-list-item"><a href="#">Kariera</a></li>
						<li class="footer__box-list-item"><a href="#">FAQ</a></li>
					</ul>
				</div>
			</div>
		</div>
		<hr />
		<p class="footer__bottom-text">
			&copy;
			<span class="footer__year"></span>
			Healthy&Hungry
		</p>
	</footer>
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	<script src="js/slick.js"></script>
	<script src="js/main.js"></script>
</body>

</html>