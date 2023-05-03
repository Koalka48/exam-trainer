<?php
$selection = $_POST['selection'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ege";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($selection == "numbers") {
    $sql = "SELECT * FROM number";
	$id = 'id_number';
	$name = 'name_number';
} else {
    $sql = "SELECT * FROM topic";
	$id = 'id_topic';
	$name = 'name_topic';
}

$result = $conn->query($sql);
$topics = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="ru">
<head> 
	<!-- Служебная информация -->
	<title>Выбор номера задания</title>
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
		<div class="header_que">
		</div>
	</header>
	<main>
	<!-- Основное содержимое -->
		<div class="selectic">
			<h2>Ну что, на какой блатной номерочек сегодня замахнёмся?</h2>
			<!-- Выпадающий список -->
			<form action="quiz.php" method="post">
				<input type="hidden" name="selection" value="<?php echo $selection; ?>">
				<select class="dropdown" name="theme_id">
					<?php foreach ($topics as $topic): ?>
						<option value="<?= $topic[$id] ?>"><?= $topic[$id] ?>. <?= $topic[$name] ?></option>
					<?php endforeach; ?>
				</select>
				<br> 
				<button class="glow-button">Погналиии</button>
			</form>
		</div>	
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
