<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Healthy&Hungry</title>
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Open+Sans:wght@300;700&display=swap"
			rel="stylesheet"
		/>
		<script
			src="https://kit.fontawesome.com/90c6c7efdc.js"
			crossorigin="anonymous"
		></script>

		<link rel="stylesheet" href="./css/main.css" />
		<link rel="stylesheet" href="./css/menu.css" />
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
				<a href="contact.html" class="nav__item">Kontakt</a>
			</div>
		</nav>
		<header class="header section">
			<h1 class="header__heading">Healthy&Hungry</h1>
			<p class="header__text">Pizza nie musi być niezdrowa!</p>
		</header>

		<main class="main">
			<div class="wrapper">
				<section class="menu section-padding section white-section">
					<h2 class="section-heading">MENU</h2>

					<div class="menu__heading">
						<p class="menu__heading-one">Nazwa pizzy</p>
						<p class="menu__heading-two">Składniki</p>
						<p class="menu__heading-three">Ø32cm</p>
						<p class="menu__heading-four">Ø42cm</p>
					</div>
					<hr />


					<?php
					
						require_once "listFunct.php";

						echo listPizza();
					
					?>


					<!--<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">1. Margharitta</p>
							<p class="menu__item-desc-two">Sos pomidorowy, ser</p>
						</div>

						<div class="menu__item-prices">
							<form action="test.php" method="post">
								<button class="slice one" disabled>
									<input type="radio" value="29.90" name="cena" /> 29,90 zł
								</button>
								<button class="slice two" disabled>
									<input type="radio" value="38.90" name="cena" /> 38,90 zł
								</button>
								<button type="submit" class="slice three">Dodaj</button>
								<input type="hidden" name="idPizzy" />
							</form>
						</div>
					</div>
					<hr />-->

					<!-- <div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">2. Funghi</p>
							<p class="menu__item-desc-two">Sos pomidorowy, ser, pieczarki</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="32.90">32,90 zł</button>
							<button class="slice" value="41.90">41,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">3. Salami</p>
							<p class="menu__item-desc-two">Sos pomidorowy, ser, salami</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="35.90">35,90 zł</button>
							<button class="slice" value="43.90">43,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">4. Capriciosa</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser, pieczarki, szynka
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="37.90">37,90 zł</button>
							<button class="slice" value="45.90">45,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">5. Wegetariańska</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser, cebula, pieczarki, papryka, pomidor,
								brokuły, oliwki
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="35.90">35,90 zł</button>
							<button class="slice" value="43.90">43,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">7. Diavola</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser, ostre salami, papryka jalapeno, oliwki
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="34.90">34,90 zł</button>
							<button class="slice" value="42.90">42,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">8. Prosciutto</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser mozarella, szynka parmeńska, pomidorki
								koktajlowe, rukola, parmezan
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="35.90">35,90 zł</button>
							<button class="slice" value="43.90">43,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">8. Tonno</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser, pieczarki, oliwki, tuńczyk
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="40.90">40,90 zł</button>
							<button class="slice" value="48.90">48,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">9. Quatro Stagioni</p>
							<p class="menu__item-desc-two">Sos pomidorowy, ser, salami</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="42.90">42,90 zł</button>
							<button class="slice" value="50.90">50,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr />
					<div class="menu__item">
						<div class="menu__item-desc">
							<p class="menu__item-desc-one">10. Don Vito</p>
							<p class="menu__item-desc-two">
								Sos pomidorowy, ser, boczek, cebula, pieczarki
							</p>
						</div>
						<div class="menu__item-prices">
							<button class="slice" value="40.90">40,90 zł</button>
							<button class="slice" value="48.90">48,90 zł</button>
							<button type="submit" class="slice">Dodaj</button>
						</div>
					</div>
					<hr /> -->
				</section>
			</div>
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
		<script
			type="text/javascript"
			src="//code.jquery.com/jquery-1.11.0.min.js"
		></script>
		<script
			type="text/javascript"
			src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
		></script>
		<script
			type="text/javascript"
			src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
		></script>
		<script src="js/slick.js"></script>
		<script src="js/main.js"></script>
	</body>
</html>
