<?php 
$dir_tests = __DIR__ . '/json_tests';
$test_list = glob("$dir_tests/*.json");

if (isset($_GET['test_number'])) {
	$test_number = $_GET['test_number'];
	$testArray = json_decode(file_get_contents($test_list[$test_number]), 1);
	$test_title = $testArray['test_name'];

	echo '<pre>';
	print_r($testArray);
}
else {
	echo '<p style="font-size: 20px;">Вы не выбрали тест на предыдущем шаге</p>';
	echo '<p><a href="list.php">Вернуться к списку тестов</a></p>';
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$test_title?></title>
</head>
<body>
	<h1><?=$test_title?></h1>

	<form action="">
		<?php
		foreach ($testArray[questions] as $questions_list) {
			# code...
		}
		?>
	</form>
</body>
</html>