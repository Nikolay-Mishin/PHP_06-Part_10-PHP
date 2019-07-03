<?php 

/*-------------------------- [11/01] - Example: PDO for the database (sql, query, fetch, fetchAll, bindColumn) --------------------------*/

// The connection to the database
// $db = new PDO('mysql:host=localhost,dbname=filmoteka', 'root', '');

// Example 1:
// $sql = "SELECT * FROM films";
// $result = $db->query($sql);
// echo "<h2>Вывод записей из запроса по одной: </h2>";
// while ($film = $result->fetch(PDO::FETCH_ASSOC)) {
//     //print_r($film);
//     echo "ID фильма: ".$film['id']."<br>";
//     echo "Название фильма: ".$film['title']."<br>";
//     echo "Жанр фильма: ".$film['genre']."<br>";
//     echo "Дата выхода фильма: ".$film['year']."<br>";
//     echo "Описание фильма: ".$film['description']."<br>";
//     echo "Постер фильма: ".$film['photo'];
//     echo "<br><br>";
// }

// Example 2:
// echo "<hr />";
// $sql = "SELECT * FROM films";
// $result = $db->query($sql); 
// $films = $result->fetchAll(PDO::FETCH_ASSOC);
// // print_r($films);
// echo "<h2>Выборка всех записей в массив и вывод на экран: </h2>";
// foreach ($films as $film) {
//     echo "ID фильма: ".$film['id']."<br>";
//     echo "Название фильма: ".$film['title']."<br>";
//     echo "Жанр фильма: ".$film['genre']."<br>";
//     echo "Дата выхода фильма: ".$film['year'];
//     echo "<br><br>";
// }

// Example 3:
// echo "<hr />";
// $sql = "SELECT * FROM films";
// $result = $db->query($sql); 

// $result->bindColumn('id', $id);
// $result->bindColumn('title', $title);
// $result->bindColumn('genre', $genre);
// $result->bindColumn('year', $year);
// $result->bindColumn('description', $description);
// $result->bindColumn('photo', $photo);

// echo "<h2>Вывод записей с привязкой данных к переменным: </h2>";
// while ($result->fetch(PDO::FETCH_ASSOC)) {
//     echo "ID фильма: {$id} <br>";
//     echo "Название фильма: {$title} <br>";
//     echo "Жанр фильма: {$genre} <br>";
//     echo "Дата выхода фильма: {$year} <br>";
//     echo "Описание фильма: {$description} <br>";
//     echo "Постер фильма: {$photo}";
//     echo "<br><br>";
// }



/*-------------------------- [11/02] - Example: selecting data from a database --------------------------*/

// $db = new PDO('mysql:host=localhost,dbname=mini-site', 'root', '');

// Example 1: Выборка без защиты от SQL инъекции

// $username = 'Joker';
// $password = '555';

// $sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
// $result = $db->query($sql); 

// echo "<h2>Выборка записи без защиты от SQL инъекции:</h2>";
// // print_r( $result->fetch(PDO::FETCH_ASSOC) );
// if ($result->rowCount() == 1) {
//     $user = $result->fetch(PDO::FETCH_ASSOC);
//     echo "Имя пользователя: {$user['name']} <br>";
//     echo "Пароль пользователя: {$user['email']} <br>";
//     echo "Пароль пользователя: {$user['password']} <br>";
// }


// Example 2: Выборка с защитой от SQL инъекции - В РУЧНОМ режиме

// $username = 'Joker';
// $password = '555';

// // quote('Joker'), quote($username), quote($_POST['name'])
// $username = $db->quote($username);
// $username = strtr($username, array('_' => '\_', '%' => '\%'));

// $password = $db->quote($password);
// $password = strtr($password, array('_' => '\_', '%' => '\%'));

// $sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
// $result = $db->query($sql); 

// echo "<h2>Выборка записи с защитой от SQL инъекции - В РУЧНОМ режиме:</h2>";
// if ($result->rowCount() == 1) {
//     $user = $result->fetch(PDO::FETCH_ASSOC);
//     echo "Имя пользователя: {$user['name']} <br>";
//     echo "Email пользователя: {$user['email']} <br>";
//     echo "Пароль пользователя: {$user['password']} <br>";
// }


// Example 3: Выборка с защитой от SQL инъекции - В АВТОМАТИЧЕСКОМ режиме (с подстановкой в placeholder)

// $sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";
// $stmt = $db->prepare($sql);

// $username = 'Joker';
// $password = '555';

// $stmt->bindValue(':username', $username);
// $stmt->bindValue(':password', $password);
// $stmt->execute(); 

// $stmt->bindColumn('name', $name);
// $stmt->bindColumn('email', $email);

// echo "<h2>Выборка записи с автоматической защитой от SQL инъекции:</h2>";
// $stmt->fetch();
// echo "Имя пользователя: {$name} <br>";
// echo "Email пользователя: {$email} <br>";


// Example 4: Выборка с защитой от SQL инъекции - В АВТОМАТИЧЕСКОМ режиме (с заданием параметров в определенном порядке)

// $sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";
// $stmt = $db->prepare($sql);

// $username = 'Joker';
// $password = '555';
// //$string = "<script>hello</script>";

// $username = htmlentities($username);
// $password = htmlentities($password);
// //$string = htmlentities($string);

// $stmt->bindValue(1, $username);
// $stmt->bindValue(2, $password);
// $stmt->execute(); 
// // $stmt->execute( array($username, $password) );

// $stmt->bindColumn('name', $name);
// $stmt->bindColumn('email', $email);

// echo "<h2>Выборка записи с автоматической защитой от SQL инъекции:</h2>";
// $stmt->fetch();
// echo "Имя пользователя: {$name} <br>";
// echo "Email пользователя: {$email} <br>";



/*-------------------------- [11/03] - Example: inserting data into a database  --------------------------*/

// $db = new PDO('mysql:host=localhost,dbname=mini-site', 'root', '');

// $sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
// $stmt = $db->prepare($sql); 

// $username = 'Flash';
// $email = 'flash@gmail.com';

// $stmt->bindValue(':name', $username);
// $stmt->bindValue(':email', $email);
// $stmt->execute(); 

// echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";
// echo "<p>ID вставленной записи: ".$stmt->lastInsertId()."</p>";



/*-------------------------- [11/04] - Example: data update --------------------------*/

// $db = new PDO('mysql:host=localhost,dbname=mini-site', 'root', '');

// $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
// $stmt = $db->prepare($sql); 

// $id = 7;
// $username = 'New Flash';
// $useremail = 'flash@inbox.com';

// $stmt->bindValue(':id', $id);
// $stmt->bindValue(':name', $username);
// $stmt->bindValue(':email', $useremail);
// $stmt->execute(); 

// echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";
// echo "<p>SQL запрос для отладки: ".$stmt->debugDumpParams()."</p>";


/*-------------------------- [11/05] - Example: delete data --------------------------*/

$db = new PDO('mysql:host=localhost,dbname=mini-site', 'root', '');

$sql = "DELETE FROM users WHERE name = :name";
$stmt = $db->prepare($sql); 

$username = 'New Flash';

$stmt->bindValue(':name', $username);
$stmt->execute(); 

echo "<p>Было затронуто строк: ".$stmt->rowCount()."</p>";


 ?>