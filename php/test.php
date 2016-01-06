Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eum culpa maiores quia? Expedita explicabo, nobis facilis, alias voluptas eveniet aspernatur sapiente facere provident voluptatem a tenetur consequuntur voluptatibus, ratione, quia.
<?php 

$name = 'Corey';
$fullName = $name . 'Cole';

class Person {
    protected $name;
    
    public function __construct($n) {
        $this->name = $n;
    }
    
    public function getName() {
        return $this->name;
    }
}

function foo() {
    echo "foo bar\n";
}

echo "Hello {$name}!\n";
foo();

?>
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique suscipit, iste perferendis fugit! Accusamus dignissimos fuga necessitatibus error reiciendis cupiditate! Praesentium placeat veritatis doloremque, doloribus neque dolore totam magnam consequuntur?