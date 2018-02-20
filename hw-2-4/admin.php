<?php
$info_style = '';
$info_text = '';
$dir_tests = __DIR__ . '/json_tests';
$test_list = glob("$dir_tests/*.json");
$test_count = count($test_list);
$test_correct_keys = ['test_name', 'sum_points', 'questions'];
$host = $_SERVER['HTTP_HOST'];
$uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$list_file_name = 'list.php';

if (isset($_FILES['test_file']) && !empty($_FILES['test_file']['name'])) {
	$file = $_FILES['test_file'];
	$file_name = ($test_count + 1) . '.json';
	$test_array = json_decode(file_get_contents($file['tmp_name']), 1);
	$test_array_keys = array_keys($test_array);

	if ($file['type'] !== 'application/json') {
		$info_style = 'color: red';
		$info_text = 'Файл не загружен, т.к. он не имеет формат JSON';
	}
	elseif ($file['size'] > 3145728) {
		$info_style = 'color: red';
		$info_text = 'Файл не загружен, превышен максимальный размер в 3 МБ';
	}
	elseif ($test_array_keys !== $test_correct_keys) {
		$info_style = 'color: red';
		$info_text = 'Файл не загружен, т.к. имеет не правильную структуру';
	}
	elseif ($file['error'] !== UPLOAD_ERR_OK) {
		$info_style = 'color: red';
		$info_text = 'Произошла ошибка загрузки файла, попробуйте еще раз';
	}
	elseif (move_uploaded_file($file['tmp_name'], __DIR__ . "/json_tests/$file_name")) {
		header("Location: http://$host$uri/$list_file_name");
		exit;
		$info_style = 'color: green';
		$info_text = 'Файл успешно загружен';
	}
}	
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Модуль загрузки тестов</title>

	<style>
		form {
			display: inline-block;
		}
	</style>
</head>
<body>
	<h1>Модуль загрузки тестов</h1>
	<p>Файл примера теста для загрузки в формате JSON: <a href="./json_example/test2.json" download="">тест по математике</a></p>
	<p>Максимальный размер загружаемого файла не должен превышать 3 МБ.</p>
	<form method="POST" action="" enctype="multipart/form-data">
		<fieldset>
			<legend>Форма загрузки файлов</legend>
			<label>
				Файл:
				<input name="test_file" type="file">
			</label>
			<div style="margin-top: 20px">
				<input name="load_file" type="submit" value="Загрузить файл">
			</div>
			<p style="<?=$info_style?>"><?=$info_text?></p>
		</fieldset>
	</form>
	<div style="margin-top: 20px">
		<a href="list.php">Перейти к списку тестов =></a>
	</div>
</body>
</html>