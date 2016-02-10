Hey this is some content above the code
<<<<<<< HEAD
<?php 
$name = 'Vivian';
$fullName = $name . 'Teng';
=======
<?php
$name = 'Dave';
$fullName = $name . 'Stearns';
>>>>>>> dd127347d12c8bb16a0f6d7fa4d2cd6133701c08

class Person {
    protected $name;
    
    public function __construct($n) {
        $this->name = $n;
    }
    
    public function getName() {
        return $this->name;
    }
}

function foo($bar) {
    echo "Hey this is the foo fighting function\n";
}

<<<<<<< HEAD
echo "Hello $name\n";
foo(NULL);
?>
And this is some content below
=======
echo "Hello {$name}s\n";
foo(NULL);
?>
And this is some content below
>>>>>>> dd127347d12c8bb16a0f6d7fa4d2cd6133701c08
