<?php
$length = isset($_GET['str_leng']) ? $_GET['str_leng'] : '';
$repeat = isset($_GET['repeatChar']) && $_GET['repeatChar'] === 'true';
$includeLetters = isset($_GET['checkLetters']);
$includeNumbers = isset($_GET['checkNumbers']);
$includeSymbols = isset($_GET['checkSimbols']);


function randomString($length, $repeat = true, $includeLetters = true, $includeNumbers = true, $includeSymbols = true)
{
    $characters = '';

    if ($includeLetters) {
        $characters .= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    if ($includeNumbers) {
        $characters .= '0123456789';
    }

    if ($includeSymbols) {
        $characters .= '!@#$%^&*()';
    }

    if (empty($characters)) {
        return 'Impossibile generare la Password';
    }

    $strLenght = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        if ($repeat) {
            if ($strLenght > 0) {
                $randomString .= $characters[random_int(0, $strLenght - 1)];
            }
        } else {
            $randomChar = $characters[random_int(0, $strLenght - 1)];
            if (strpos($randomString, $randomChar) === false) {
                $randomString .= $randomChar;
            } else {
                $i--;
            }
        }
    }

    return $randomString;
}
$password = randomString($length, $repeat, $includeLetters, $includeNumbers, $includeSymbols);
