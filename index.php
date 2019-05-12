<?php
/**
 * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов
 * продукт, ценник, посылка и т.п.
 *
 * 2. Описать свойства класса из п.1 (состояние).
 *
 * 3. Описать поведение класса из п.1 (методы).
 *
 * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */

class Book
{
    public $index;
    public $authorMark;
    public $author;
    public $title;
    public $description;
    public $year;
    public $publishing;
    public $place;
    public $pagesNum;
    public $ISNB;

    public function __construct($index, $authorMark, $author, $title, $description, $year, $publishing, $place, $pagesNum, $ISNB)
    {
        $this->index = $index;
        $this->authorMark = $authorMark;
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->year = $year;
        $this->publishing = $publishing;
        $this->place = $place;
        $this->pagesNum = $pagesNum;
        $this->ISNB = $ISNB;
    }

    public function render()
    {
        echo "
            <hr>            
            <h5>$this->index</h5>
            <h5>$this->authorMark</h5>            
            <h3>$this->author</h3>                       
            <p>
               $this->title <span>:</span>
               $this->description<span>.-</span>
               $this->place<span>:</span>
               $this->publishing<span>,</span>
               $this->year<span>.-</span>
               $this->pagesNum <span>c</span>
            <p>
           <br>
           <br>
           <span>ISNB $this->ISNB</span>
           <br>
           <hr>
        ";
    }

    public function isBusy()
    {
        echo "<b>Книга $this->title в настоящий момент на ходится на руках</b><br>";
    }

    public function isFree()
    {
        echo "<b>Книга $this->title в настоящий момент находится на полке $this->index</b><br>";
    }

    public function discarded()
    {
        echo "<b>Книга списана из фонда!</b><br>";

    }
}
// Списанные книги
class WriteOff extends Book
{
    public $state;
    public $reason;
    public $yearWriteOff;
    public $actNumber;

    function __construct($index, $authorMark, $author, $title, $description, $year, $publishing, $place, $pagesNum, $ISNB, $state, $reason, $yearWriteOff, $actNumber)
    {
        parent::__construct($index, $authorMark, $author, $title, $description, $year, $publishing, $place, $pagesNum, $ISNB);
        $this->state = $state;
        $this->reason = $reason;
        $this->yearWriteOff = $yearWriteOff;
        $this->actNumber = $actNumber;
    }

    public function render()
    {
        parent::render();
        parent::discarded();
        $this->discardInfo();
    }

    public function discardInfo() {
        echo "
            <div style=' border: 2px solid #111111; padding: 10px; width: 500px'>
            <h5>Состояние:$this->state</h5> 
            <h5>Причина списания:$this->reason</h5>
            <h5>Год списания:$this->yearWriteOff</h5
            <h5>Номер акта списания:$this->actNumber</h5>
            </div>
        ";
    }

}

function displayCard($book) {
    $book->render();
}

$book1 = new Book("28.6", "Г42", "Гершун В.И.", "Домашние животные", "Интересные рассказы из жизни братьев наших меньших",
    "1991", "Педагогика", "М", "144", "123456 78895653");


$book2 = new WriteOff("28.6", "Г42", "Гершун В.И.", "Домашние животные", "Интересные рассказы из жизни братьев наших меньших",
    "1991", "Педагогика", "М", "144", "123456 78895653", "Потрепанный переплет, отсутсвие страниц", "Пришедствие в негодность",
    "2011", "1204556-2011");

displayCard($book1);
$book1->isFree();
displayCard($book2);

/**
5. Дан код:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
    $a1 = new A();
    $a2 = new A();
    $a1->foo();
    $a2->foo();
    $a1->foo();
    $a2->foo();
Что он выведет на каждом шаге? Почему?
 */

class A
{
    public function foo()
    {
        static $x = 0;
        echo ++$x . '<br>';
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
echo '<hr>';

// 1 2 3 4

/*
Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к тому, что:
Присваивание выполняется только один раз, при первом вызове функции.
Значение, помеченной таким образом переменной, сохраняется после окончания работы функции.
При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение.

При создании любого количества объектов одного и того же класса метод будет оставаться в одном экземпляре.  */

/*
Немного изменим п.5:
class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
6. Объясните результаты в этом случае.
*/
class C
{
    public function foo()
    {
        static $x = 0;
        echo ++$x . '<br>';
    }
}

class B extends C
{
}

$c1 = new C();
$b1 = new B();
$c1->foo();
$b1->foo();
$c1->foo();
$b1->foo();
echo '<hr>';
// 1 1 2 2

/* При наследовании класса, а следовательно и его метода, происходит создание нового метода.
Динамические методы в PHP существуют в контексте классов, а не объектов*/

 /*
7. *Дан код:
class A {
public function foo() {
static $x = 0;
echo ++$x;
}
}
class B extends A {
}
$a1 = new A;
$b1 = new B;
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
Что он выведет на каждом шаге? Почему?
 */

class D {
    public function foo() {
        static $x = 0;
        echo ++$x. '<br>';
    }
}
class E extends D {
}
$d1 = new D;
$e1 = new E;
$d1->foo();
$e1->foo();
$d1->foo();
$e1->foo();
echo '<hr>';
// 1 1 2 2

/* Не нашла отличий от пункта 6*/