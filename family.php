<?php

class Person {
    private $name;
    private $lastname;
    private $age;
    private $hp;
    private $mother;
    private $father;

    function __construct($name, $lastname, $age, $mother=null, $father=null) { 
      $this->name = $name;
      $this->lastname = $lastname;
      $this->age = $age;
      $this->mother = $mother;
      $this->father = $father;
      $this->hp = 100;
        
    }

    function setHp($hp) {
        if ($this->hp + $hp > 100) $this->hp = 100;
        else $this->hp = $this->hp + $hp;
    }

    function getHp() {
        return $this->hp;
    }

    function getName() {
        return $this->name;
    }
    
    function getLastName() {
        return $this->lastname;
    } 

    function getMother() {
        return $this->mother;
    }

    function getFather() {
        return $this->father;
    }

    function getAge() {
        return $this->age;
    }

    // ====================================== Информация о семье ======================================

    function getInfo() {
        
        $status = ["Мой папа ", "Моя мама ", "Мой дедушка по маме ", "Моя бабушка по маме ", 
        "Мой дедушка по папе ", "Моя бабушка по папе "];
        
        if ($this->getName() == "Алексей") {
            return $status[0] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ему " . $this->getAge() . " года.<br><br>";
            
        } elseif ($this->getName() == "Ольга") {
            return $status[1] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ей " . $this->getAge() . " года.<br><br>";
        
        } elseif ($this->getName() == "Игорь") {
            return $status[2] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ему " . $this->getAge() . " лет.<br><br>";
        
        } elseif ($this->getName() == "Елена") {
            return $status[3] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ей " . $this->getAge() . " лет.<br><br>";
        
        } elseif ($this->getName() == "Василий") {
            return $status[4] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ему " . $this->getAge() . " лет.<br><br>";
        
        } elseif ($this->getName() == "Татьяна") {
            return $status[5] . $this->getName() . " " . $this->getLastName() . "<br>" . "Ей " . $this->getAge() . " года.<br><br>";
        
        }
            else return "Привет, Меня зовут " . $this->getName() . " " . $this->getLastName() . "<br>" . "Мне " . $this->getAge() . " лет.<br><br>";
        
    }

}

// Бабушка и дедушка по маме
$igor = new Person("Игорь", "Петров", 60);
$elena = new Person("Елена", "Петрова", 59);

// Бабушка и дедушка по папе
$vasya = new Person("Василий", "Иванов", 65);
$tatiana = new Person("Татьяна", "Иванова", 62);

// Родители
$alexey = new Person("Алексей", "Иванов", 42, $tatiana, $vasya);
$olga = new Person("Ольга", "Иванова", 42, $elena, $igor);

// Валера
$valera = new Person("Валера", "Иванов", 12, $olga, $alexey);



$family = [$valera, $alexey, $olga, $vasya, $tatiana, $igor, $elena];

echo "<h2>Пара слов о моей семье:</h2>";

foreach($family as $familyName) {
    echo $familyName->getInfo();
    
}







//echo $valera->getMother()->getFather()->getName();

// $medKit = 50; //Аптечка
// $alex->setHp(-30); //Упал
// echo $alex->getHp() . "<br>";

// $alex->setHp($medKit); //Нашел аптечку
// echo $alex->getHp();


// $alex->name = "Alex";

// echo $alex->sayHi($igor->name);
// echo $igor->name;
