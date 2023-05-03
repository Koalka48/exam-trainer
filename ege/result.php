<?php
// Получение ответов и проверка результатов
$total_questions = isset($_POST['total_questions']) ? $_POST['total_questions'] : 0;
$answered_questions = 0;
$correct_answers = 0;
for ($index = 0; $index < $total_questions; $index++) {
    $user_answer = isset($_POST["answer_$index"]) ? $_POST["answer_$index"] : '';
    $correct_answer = isset($_POST["correct_answer_$index"]) ? $_POST["correct_answer_$index"] : '';
    if (!empty($user_answer)) {
        $answered_questions++;
        if ($user_answer == $correct_answer) {
            $correct_answers++;
        }
    }
}
// Вычисление процента правильных ответов
$percent_correct = $answered_questions > 0 ? round($correct_answers / $answered_questions * 100) : 0;
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результаты</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<body text="#ffffff" bgcolor="#000000">
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cormorant+Garamond&display=swap" rel="stylesheet">
	<style>
	table {
		border-collapse: collapse;
		font-size: 16px;
		font-weight: normal;
	}
	th {
		font-weight: bold;
		padding: 5px;
		border: 1px solid black;
	}
	td {
		font-weight: bold;
		padding: 5px;
		border: 1px solid black;
	}
	td.correct {
		background-color: rgb(0,255,0,0.3);
	}

	td.incorrect {
		background-color: rgb(255,0,0,0.3)
	}
	</style>
</head>
<body>
	<header>
	<!-- Шапка страницы -->
		<div class="header_que2">
		</div>
	</header>
	<main>
		<!-- Основное содержимое -->
		<div class="result_text">
			<br>
			<h1>Результаты</h1>
			<h3>Вы ответили правильно на <?= $correct_answers ?> из <?= $answered_questions ?> вопросов (<?= $percent_correct ?>%).</h3>
			<table>
				<tr>
					<th>№</th>
					<th>Вопрос</th>
					<th>Ваш ответ</th>
					<th>Правильный ответ</th>
				</tr>
				<?php for ($index = 0; $index < $total_questions; $index++): ?>
					<?php
					$user_answer = isset($_POST["answer_$index"]) ? $_POST["answer_$index"] : '';
					$correct_answer = isset($_POST["correct_answer_$index"]) ? $_POST["correct_answer_$index"] : '';
					if (!empty($user_answer)) {
						$is_correct = $user_answer == $correct_answer;
						?>
						<tr>
							<td><?= $index+1?></td>
							<td><?= isset($_POST["question_$index"]) ? $_POST["question_$index"] : '' ?></td>
							<td class="<?= $is_correct ? 'correct' : 'incorrect' ?>"><?= $user_answer ?></td>
							<td><?= $correct_answer ?></td>
						</tr>
						<?php
						$answered_questions--;
					}
					?>
				<?php endfor; ?>
			</table>
			<br><br><br>
			<div class="footer_but">
				<a href="number_topic.php" target="_blank">Завершить</a>
			</div>
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
