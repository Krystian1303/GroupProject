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
    <link rel="stylesheet" href="./css/menu.css">

    <?php

    require_once "orders.php";
    if(isset($_POST['whichToDelete']))
		removeFromOrder($_POST['whichToDelete']);
    
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
            <a href="summary.php" class="nav__item">Koszyk</a>
            <a href="menu.php" class="nav__item">Menu</a>
            <a href="make_it.php" class="nav__item">Make it!</a>
            <a href="contact.php" class="nav__item">Kontakt</a>
        </div>
    </nav>
    <header class="header section">
        <h1 class="header__heading">Healthy&Hungry</h1>
        <p class="header__text">Pizza nie musi być niezdrowa!</p>
    </header>
    <main>
        <section class="section section-padding white-section summary contact">
            <h2 class="section-heading">Podsumowanie zamówienia</h2>
            <div class="wrapper">

                <?php
                    require_once "orders.php";

                    echo showOrder();
                ?>


                <!--<div class="menu__item">
                    <div class="menu__item-desc">
                        <p class="menu__item-desc-one">1. Margharitta</p>
                        <p class="menu__item-desc-two">Sos pomidorowy, ser</p>
                        <p class="menu__item-desc-three">Cena:</p>
                    </div>

                    <div class="menu__item-prices">
                        <form action="test.php" method="post">
                            <button type="submit" class="slice three">Usuń</button>
                            <input type="hidden" name="idPizzy" />
                        </form>
                    </div>
                </div>-->


                <form class="contact__form">
                    <div class="contact__form-top">
                        <label for="name" class="contact__form-label">Imię</label>
                        <input type="text" class="contact__form-input" id="name" />
                        <label for="name" class="contact__form-label">Nazwisko</label>
                        <input type="text" class="contact__form-input" id="nazwisko" />
                        <label for="email" class="contact__form-label">
                            Adres e-mail
                        </label>
                        <input type="text" class="contact__form-input" id="email" />
                        <label for="telephone" class="contact__form-label">Nr telefonu</label>
                        <input type="number" class="contact__form-input" id="telephone" />
                        <label for="street" class="contact__form-label">Ulica</label>
                        <input type="text" class="contact__form-input" id="street" />
                        <label for="houseNr" class="contact__form-label">Nr domu</label>
                        <input type="number" class="contact__form-input" id="houseNr" />
                        <label for="city" class="contact__form-label">Miejscowość</label>
                        <input type="text" class="contact__form-input" id="city" />
                        <label for="zipCode" class="contact__form-label">Kod pocztowy</label>
                        <input type="text" class="contact__form-input" id="zipCode" />
                    </div>
                    <button type="submit" class="contact__form-btn btn-special-animation">
                        Zamów!
                    </button>
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
    <script src="js/main.js"></script>
</body>

</html>