<?php 
echo '<h2>Домашняя работа по теме 04: Основы PHP. Функции</h2>';

function hello($username, $weekday) {
    switch ($weekday) {
        case '1':
            echo "Привет $username! Хорошего и продуктивного рабочего дня!";
            break;
        case '2':
            echo "Привет $username! Хорошего и продуктивного рабочего дня!";
            break;
        case '3':
            echo "Привет $username! Хорошего и продуктивного рабочего дня!";
            break;            
        case '4':
            echo "Привет $username! Хорошего и продуктивного рабочего дня!";
            break;
        case '5':
            echo "Привет $username! Хорошего и продуктивного рабочего дня!";
            break;
        case '6':
            echo "Привет $username! Желаю вам хорошо отдохнуть в этот день!";
            break;             
        case '7':
            echo "Привет $username! Желаю вам хорошо отдохнуть в этот день!";
            break;          
        default:
            echo "Такого дня недели не существует";
            break;
    }

    echo '<br><br>'.'Введено имя: '.$username.'<br>'.'День недели: '.$weekday;
}
hello("Николай", 3);

?>