<?php 

/*-------------------- 12 - 01 - Соединение, создание новой записи в БД --------------------- */

require "db.php";

// Создание новых записей
// $course = R::dispense('courses');
// //$course->title = "Курс по <верстке> 2";
// $course->title = "Курс по верстке";
// $course->tuts = 10;
// $course->homeworks = 8;
// $course->level = "Для новичков";
// R::store($course);

// $course = R::dispense('courses');
// $course->title = "Курс по React";
// $course->tuts = 10;
// $course->homeworks = 8;
// $course->level = "Для новичков";
// $course->price = 100;
// R::store($course);

/*-------------------- 12 - 02 - Вывод записей из БД --------------------- */

// Получение всех записей
$courses = R::find('courses');
print_r($courses);

foreach ($courses as $course) {
    echo "ID: " . $course->id . "<br>";
    echo "Название: " . $course->title . "<br>";
    echo "Кол-во уроков: " . $course->tuts . "<br>";
    echo "Уровень: " . $course->level . "<br>";
    echo "Цена: " . $course->price . "<br>";
    echo "<hr>";
}

/*-------------------- 12 - 03 - Обновление записи в БД --------------------- */

// Получение одного курса
$id = 4;
$course = R::load('courses', $id);
//print_r($course);
echo "ID: " . $course->id . "<br>";
echo "Название: " . $course->title . "<br>";
echo "Кол-во уроков: " . $course->tuts . "<br>";
echo "Уровень: " . $course->level . "<br>";
echo "Цена: " . $course->price . "<br>";

// $course->title = "React - ступень 1-я";
// $course->tuts = 20;
// $course->price = 80;
// $course->student = 20;

$course->title = "React - ступень 2-я";
$course->tuts = 14;
$course->price = 80;
$course->students = 20;
$course->img = "<img src='img/react.png'>";

R::store($course);

/*-------------------- 12 - 04 - Удаление записи в БД --------------------- */

$id = 2;
$course = R::load('courses', $id);
R::trash($course);



 ?>