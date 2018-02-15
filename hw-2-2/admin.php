<?php
$info_style = '';
$info_text = '';

if (isset($_FILES['test_file']) && !empty($_FILES['test_file']['name'])) {
	$file = $_FILES['test_file'];
	$file_name = $_FILES['test_file']['name'];

	if (($file['type'] == 'application/json') && $file['error'] == UPLOAD_ERR_OK && move_uploaded_file($file['tmp_name'], __DIR__ . "/json_tests/$file_name")) {
		$info_style = 'color: green';
		$info_text = 'Файл успешно загружен';
	}
	else {
		$info_style = 'color: red';
		$info_text = 'Файл не загружен. Файл должен иметь расширение JSON';
	}
}	
?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Модуль загрузки тестов</title>
</head>
<body>
	<h1>Модуль загрузки тестов</h1>
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
	<div><a href="list.php">Перейти к списку тестов</a></div>
</body>
</html>