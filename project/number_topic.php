<!DOCTYPE html>
<html lang="ru">
<head> 
	<!-- Служебная информация -->
	<title>Выбор варианта подготовки</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<body text="#ffffff" bgcolor="#000000">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
</head> 
<body>
	<header>
	<!-- Шапка страницы -->
		<div class="header_variants">
			<p>ЕСТЬ ДВА ПУТИ, ВОИН, И ВСЕ ОНИ НЕПРОСТЫ...<p>
			<br>
			<h1>Как готовить тебя будем?<h1>
		</div>
	</header>
	<main>
	<!-- Основное содержимое -->
		<br>
		<div class="variant_box">
			<p>Ты думал, что я шучу про два пути?</p>
			<p>А вот не шучу!</p>
			<br>
			<p>Необходимо выбрать способ подготовки.</p>
			<p>Ты можешь выбрать определенную тему и решать задания разных типов, связанных с ней, 
			а можешь выбрать номер определенного задания и решать его на разные темы. </p>
			<p>Запутался? А зря, ведь это ещё цветочки, ягодки впереди</p>
		</div>
		<h3>Выбор только за тобой, джедай......</h3>
		<!-- Кнопки выбора варианта подготовки -->
		<nav>
			<form action="select.php" method="post">
				<button class="glow-button" name="selection" value="numbers">По номерам</button>
				<button class="glow-button" name="selection" value="topics">По темам</button>
			</form>
		</nav>
	</main>
	<!-- Подвал страницы -->
	<footer>
		<nav>
			<!-- Ссылки футера -->
			<div class="footer_but">
				<a href="number_topic.php" target="_blank">Главная</a>
			</div>
		</nav>
		<!-- Картинка-ссылка -->
		<div class="logo">
			<a href="index.php" target="_blank"><img class="graficlogo" src="img/footer.png" alt=""></a>
		</div>
		<p> Мы пытались, а вы пытайтесь не судить </p>
		<p> © 2023</p>		
	</footer>
</body>
</html>
