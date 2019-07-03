<?php 

/*-------------------------- Example without OOP --------------------------*/
// // Person 1
// $person1_name = 'Peter';
// $person1_speciality = 'Programmer';
// $person1_age = 25;

// function person1_hello($name, $spec, $age) {
//     echo "Hello. My name is $name. I`m $spec and $age years old.";
// }

// person1_hello($person1_name, $person1_speciality, $person1_age);
// echo "<br><br>";

// // Person 2
// $person2_name = 'Jane';
// $person2_speciality = 'Web-designer';
// $person2_age = 23;

// function person2_hello($name, $spec, $age) {
//     echo "Hello. My name is $name. I`m $spec and $age years old.";
// }

// person2_hello($person2_name, $person2_speciality, $person2_age);



/*-------------------------- Example OOP --------------------------*/
// class Person {
// 	public $name; // свойства класса
// 	public $speciality;
// 	public $age;
// }

// $person1 = new Person; // создаем объект

// $person1->name = 'Peter'; // задаем свойства у объекта
// $person1->speciality = 'Programmer';
// $person1->age = 25;

// echo 'Name: '.$person1->name.'<br>', 'Speciality: '.$person1->speciality.'<br>', 'Age: '.$person1->age;

/*-------------------------- Example OOP (methods) --------------------------*/
// class Person {
// 	public $name;
// 	public $speciality;
// 	public $age;

// 	public function greeting($name, $spec, $age) { // метод: вывод приветствия
// 		echo "Hello! My name is $name. I am $spec and $age years old.";
// 	}
// }

// $person1 = new Person;

// $person1->name = 'Peter';
// $person1->speciality = 'Programmer';
// $person1->age = 25;
// $person1->greeting($person1->name, $person1->speciality, $person1->age); // обращаемся к методу в class Person


/*-------------------------- Example OOP (methods без передачи параметров) --------------------------*/
// class Person {
// 	public $name;
// 	public $speciality;
// 	public $age;

// 	public function greeting() {
//         echo "Hello! My name is " . $this->name  . ". I am " . $this->speciality  ." and " . $this->age  ." years old. ";
// 	}
// }

// $person1 = new Person;

// $person1->name = 'Peter';
// $person1->speciality = 'Programmer';
// $person1->age = 25;
// $person1->greeting();

// /* $this->name - обращаемся к имени класса Person, но это у нас уже объект $person1, т.е. в объекте $person1 мы присваиваем ($person1->name) public $name имя Peter и в методе greeting() обращаемся к свойству $name ($this->name) */
// // $person1->greeting(); - обращается к свойству объекта, т.е. public $name, $speciality, $age


/*-------------------------- Example OOP (methods +  __construct + $this) --------------------------*/
class Person {
	public $name;
	public $speciality;
	public $age;

	public function __construct($name, $spec, $age) {
        echo "New person just created<br>";
		$this->name = $name;
		$this->speciality = $spec;
		$this->age = $age;
	}
	public function greeting() { 
		echo "Hello! My name is " . $this->name  . ". I am " . $this->speciality  ." and " . $this->age  ." years old. ";
	}
}

$person1 = new Person('Peter', 'Programmer', 25); // передаем параметры для __construct
$person1->greeting(); 
echo "<br><br>";
$person2 = new Person('Jane', 'Web-designer', 22);
$person2->greeting();

// __construct - запускается в момент создания нового объекта
// параметр Peter из $person1 попадает в __construct $name и далее  $this->name (т.е. в public $name) прописывает $name (имя Peter) 

 ?>