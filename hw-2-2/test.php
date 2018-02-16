<?php 
$dir_tests = __DIR__ . '/json_tests';
$test_list = glob("$dir_tests/*.json");

if (isset($_GET['test_number'])) {
	$test_number = $_GET['test_number'];
	$testArray = json_decode(file_get_contents($test_list[$test_number]), 1);
	$test_title = $testArray['test_name'];
	$test_questions = $testArray['questions'];

	echo '<pre>';
	print_r($test_questions);
	echo '</pre>';
}
else {
	echo '<p style="font-size: 20px;">Вы не выбрали тест на предыдущем шаге</p>';
	echo '<p><a href="list.php">Вернуться к списку тестов</a></p>';
}

if (isset($_POST)) {

}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?=$test_title?></title>
	<style>
		form {
			display: inline-block;
		}
	</style>
</head>
<body>
	<h1><?=$test_title?></h1>

	<form method="POST" action="">
		<?php
		foreach ($test_questions as $key_question => $question) {
			$question_title = $question['question_title'];
			$input_type = $question['input_type'];
			$question_variants = $question['variants'];
		?>
		<fieldset>
			<legend><?=$question_title?></legend>
			<?php
			foreach ($question_variants as $key_variant => $variant) {
			?>
			<label>
				<?php
				if ($input_type == 'radio') { 
				?>
					<input name="<?=$key_question?>" value="<?=$variant?>" type="radio">
				<?php 
				}
				elseif($input_type == 'checkbox') {
				?>
					<input name="<?=$key_question . "[]"?>" value="<?=$variant?>" type="checkbox">		
				<?php 
				}
				?>		
					<?=$variant?>
			</label>
			<?php
			}
			?>
		</fieldset>
		<?php 	
		}
		?>
		<div style="margin-top: 20px">
			<input name="check_test" type="submit" value="Проверить тест">
		</div>
	</form>
</body>
</html>

<?php
echo '<pre>';
print_r($_POST);
?>