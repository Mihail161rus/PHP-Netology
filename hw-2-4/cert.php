<?php
$header = 'Сертификат';
$label_name = 'Выдан на имя:';
$label_result = 'Оценка в баллах:';
$label_sum_points = 'из';
$user_name = $_GET['user_name'];
$test_result = $_GET['test_result'];
$sum_points = $_GET['sum_points'];

$image = imagecreatetruecolor(566, 800);
$backColor = imagecolorallocate($image, 245, 245, 245);
$redColor = imagecolorallocate($image, 255, 0, 0);
$blackColor = imagecolorallocate($image, 0, 0, 0);
$blueColor = imagecolorallocate($image, 0, 101, 189);

$certFile = __DIR__ . '/img/cert.png';
if (!file_exists($certFile)) {
	echo 'Файл с картинкой не найден';
	exit;
}

$certImg = imagecreatefrompng($certFile);
imagefill($image, 0, 0, $backColor);
imagecopy($image, $certImg, 0, 0, 0, 0, 566, 800);

$fontFile = __DIR__ . '/font/comic-sans-ms-bold.ttf';
if (!file_exists($fontFile)) {
	echo 'Файл со шрифтом не найден';
	exit;
}

imagettftext($image, 46, 0, 110, 250, $redColor, $fontFile, $header);
imagettftext($image, 24, 0, 50, 330, $blackColor, $fontFile, $label_name);
imagettftext($image, 24, 0, 310, 330, $blueColor, $fontFile, $user_name);
imagettftext($image, 24, 0, 50, 480, $blackColor, $fontFile, $label_result);
imagettftext($image, 24, 0, 340, 480, $blueColor, $fontFile, $test_result);
imagettftext($image, 24, 0, 390, 480, $blackColor, $fontFile, $label_sum_points);
imagettftext($image, 24, 0, 440, 480, $blueColor, $fontFile, $sum_points);
header('Content-Type: image/png');
imagepng($image);
?>