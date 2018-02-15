<?php
$dir_tests = __DIR__ . '/json_tests';
$test_list = glob("$dir_tests/*.json");

foreach ($test_list as $test) {
    $json_test_info = file_get_contents($test);
    $arr_test_info = json_decode($json_test_info, 1);
}

echo '<pre>';
print_r($test_list);
print_r($arr_test_info);
?>