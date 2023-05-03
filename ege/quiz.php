<?php
$selection = $_POST['selection'];
$theme_id = $_POST['theme_id'];

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ege";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Получение вопросов
if ($selection == "numbers") {
    $query = "SELECT * FROM task WHERE id_number = '$theme_id'";
} else {
    $query = "SELECT task.question,task.answer FROM task JOIN task_topic ON task.id_task = task_topic.id_task WHERE task_topic.id_topic = '$theme_id'";
}
$result = $conn->query($query);
$questions = $result->fetch_all(MYSQLI_ASSOC);
// Получение названия темы
if ($selection == "numbers") {
    $query = "SELECT name_number FROM number WHERE id_number = '$theme_id'";
} else {
    $query = "SELECT name_topic FROM topic WHERE id_topic = '$theme_id'";
}
$result = $conn->query($query);
$theme_name = null;
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $theme_name = $row['name_number'] ?? $row['name_topic'];
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <!-- Служебная информация -->
	<title>Задания</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<body text="#ffffff" bgcolor="#000000">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
    <style>
        .question-container {
            display: none;
        }

        .question-container.active {
            display: block;
        }
    </style>
    <script>
        function showNextQuestion() {
            const questionContainers = document.querySelectorAll('.question-container');
            let activeIndex = -1;

            questionContainers.forEach((container, index) => {
                if (container.classList.contains('active')) {
                    container.classList.remove('active');
                    activeIndex = index;
                }
            });

            if (activeIndex < questionContainers.length - 1) {
                questionContainers[activeIndex + 1].classList.add('active');
            } else {
                document.getElementById('quiz-form').submit();
            }
        }
		function finishQuiz() {
            document.getElementById('quiz-form').submit();
        }
    </script>
</head>
<body>
	<header>
	<!-- Шапка страницы -->
		<div class="header_que2">
		</div>
	</header>
	<main>
	<!-- Основное содержимое -->
		<br>
		<div class="variant_box">
			<p>Тема: <?=$theme_name?> </p>
		</div>
		<div class="question_text">
			<form id="quiz-form" action="result.php" method="post">
				<?php foreach ($questions as $index => $question): ?>
					<div class="question-container<?= $index === 0 ? ' active' : '' ?>">
						<h3>Вопрос <?= $index+1?></h3>
						<h3><?= $question['question'] ?></h3>
						<input type="text" name="answer_<?= $index ?>" required>
						<input type="hidden" name="question_<?= $index ?>" value="<?= $question['question'] ?>">
						<input type="hidden" name="correct_answer_<?= $index ?>" value="<?= $question['answer'] ?>">
					</div>
				<?php endforeach; ?>
				<input type="hidden" name="total_questions" value="<?= count($questions) ?>">
				<br>
				<button class="glow-button" onclick="showNextQuestion()">Ответить</button>
				<br>
				<button class="glow-button" onclick="finishQuiz()">Завершить</button>
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

