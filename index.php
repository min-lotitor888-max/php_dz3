<?php

setlocale(LC_CTYPE, 'ru_RU.UTF-8');

if (!function_exists('readLine')) {
    function readLine($prompt) {
        echo $prompt;
        return trim(fgets(STDIN));
    }
}

$lastName = readLine('Введите фамилию: ');
$firstName = readLine('Введите имя: ');
$patronymic = readLine('Введите отчество: ');

$lastNameLower = mb_strtolower($lastName, 'UTF-8');
$firstNameLower = mb_strtolower($firstName, 'UTF-8');
$patronymicLower = mb_strtolower($patronymic, 'UTF-8');

$lastNameTitle = mb_convert_case($lastNameLower, MB_CASE_TITLE, 'UTF-8');

$fullName = mb_convert_case(
    $lastNameLower . ' ' . $firstNameLower . ' ' . $patronymicLower,
    MB_CASE_TITLE,
    'UTF-8'
);

$surnameAndInitials = $lastNameTitle . ' '
    . mb_strtoupper(mb_substr($firstNameLower, 0, 1, 'UTF-8'), 'UTF-8') . '.'
    . mb_strtoupper(mb_substr($patronymicLower, 0, 1, 'UTF-8'), 'UTF-8') . '.';

$fio = mb_strtoupper(
    mb_substr($lastNameLower, 0, 1, 'UTF-8')
    . mb_substr($firstNameLower, 0, 1, 'UTF-8')
    . mb_substr($patronymicLower, 0, 1, 'UTF-8'),
    'UTF-8'
);

echo "\nПолное имя: '" . $fullName . "'\n";
echo "Фамилия и инициалы: '" . $surnameAndInitials . "'\n";
echo "Аббревиатура: '" . $fio . "'\n";