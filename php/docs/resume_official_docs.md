# **PHP (Hypertext Preprocessor)**
Scripting language that is especially suited for web development.

# Basic syntax
## PHP tags
To execute PHP code use Open/closing tags `<?php and ?>` or `<? and ?>`.

```php
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Test</title>
    </head>
    <body>
        <?php echo '<p>Hello World</p>'; ?>
    </body>
</html>
```

## Comments
```php
<?php
    echo "This is a test\n"; // This is a one-line c++ style comment
    /* This is a multi line comment
       yet another line of comment */
    echo "This is yet another test\n";
    echo "One Final Test\n"; # This is a one-line shell-style comment
?>
```

## Types
***Dynamically typed language, mean that by default there is no need to specify the type of a variable***

```php
<?php
$a_bool = true; // a bool
$a_str = "foo"; // or 'foo' a string
$a_int = 12; // an int

// If this is an integer, increment it by four
if (if_int($a_int)) {
  $an_int += 4;
}
var_dump($an_int)

// If $a_bool is a string, print it out
if (is_string($a_bool)){
  echo "String: $a_bool"
}
?>
```

## Type System
Dynamically subtyping checked at run time. PHP type system supports various atomic types that can be composed together to create more complex types. Some of these types can be written as _type declarations_.

### Atomic types
The list of base types is:

Built-in types:
- Scalar types:
  - bool
  - int
  - float
  - string
- array
- object
- resource
- never
- void
- Relative class types: self, parent and static
- Singleton types
  - false
  - true
- Unit types 
  - null
- User-defined types (generally referred to as class-types)
  - Interfaces
  - Classes
  - Enumerations
- callable type

#### User-defined types
It is possible to define custom types with interfaces, classes and enumerations. These are considered as user-defined types, or class-types. For example, a class called Elephant can be defined, then objects of type Elephant can be instantiated, and a function can request a parameter of type Elephant.

### Null
```php
<?php
$var = NULL;
echo $var;
```

### Booleans
```php
$bool_true = True;
$bool_false = False;
```

### Integers 
```php
$a = 1234; // decimal number
$a = 0123; // octal number (equivalent to 83 decimal)
$a = 0o123; // octal number (as of PHP 8.1.0)
$a = 0x1A; // hexadecimal number (equivalent to 26 decimal)
$a = 0b11111111; // binary number (equivalent to 255 decimal)
$a = 1_234_567; // decimal number (as of PHP 7.4.0)
```

### Floating
```php
$a = 1.234;
$b = 1.2e3;
$c = 7E-10;
$d = 1_234.567; // as of PHP 7.4.0

// Some numeric operations can result in a value represented by the constant NAN, represents an undefined or unrepresentable value in floating-point calculations
```

### String
```php
// Outputs: Arnold once said: "I'll be back"
echo 'Arnold once said: "I\'ll be back"', PHP_EOL; // PHP_EOL = \n

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\\*.*?', PHP_EOL;

// Outputs: You deleted C:\*.*?
echo 'You deleted C:\*.*?', PHP_EOL;

// Outputs: This will not expand: \n a newline
echo 'This will not expand: \n a newline', PHP_EOL;

// Outputs: Variables do not $expand $either
echo 'Variables do not $expand $either', PHP_EOL;

// Heredoc: way to delimit strings with the next syntax
echo <<<END
      a
      b
      c
      END; // Closing identifier mustn't be indented further than any lines of the body
?>
```

### Numeric Strings: String is considered numeric if it can be interepreted like or float
```php
$foo = 1 + "10.5";                // $foo is float (11.5)
$foo = 1 + "-1.3e3";              // $foo is float (-1299)
$foo = 1 + "bob-1.3e3";           // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "bob3";                // TypeError as of PHP 8.0.0, $foo is integer (1) previously
$foo = 1 + "10 Small Pigs";       // $foo is integer (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = 4 + "10.2 Little Piggies"; // $foo is float (14.2) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1;          // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
$foo = "10.0 pigs " + 1.0;        // $foo is float (11) and an E_WARNING is raised in PHP 8.0.0, E_NOTICE previously
```

### Arrays
```php
$array = array(
    "foo" => "bar",
    42    => 24,
    "multi" => array(
         "dimensional" => array(
             "array" => "foo"
         )
    )
);

var_dump($array["foo"]);
var_dump($array[42]);
var_dump($array["multi"]["dimensional"]["array"]);

// Indexed array
$array = array("foo", "bar", "hello", "world");
var_dump($array);
var_dump($array[0]);

// Array dereferencing
function getArray() {
  return array(1,2,3);
}

$secondElement = getArray()[1];
var_dump($secondElement)

// Array, creating/modifiying
$arr = array(5 => 1, 12 => 2);

$arr[] = 56;    // This is the same as $arr[13] = 56;
                // at this point of the script

$arr["x"] = 42; // This adds a new element to
                // the array with key "x"

unset($arr[5]); // This removes the element from the array

var_dump($arr);

unset($arr);    // This deletes the whole array

// Create a simple array.
$array = array(1, 2, 3, 4, 5);
print_r($array);

// Now delete every item, but leave the array itself intact:
foreach ($array as $i => $value) {
    unset($array[$i]);
}
print_r($array);

// Append an item (note that the new key is 5, instead of 0).
$array[] = 6;
print_r($array);

// Re-index:
$array = array_values($array);
$array[] = 7;
print_r($array);

// Array destructuring
$source_array = [
    [1, 'John'],
    [2, 'Jane'],
];

foreach ($source_array as [$id, $name]) {
    echo "{$id}: '{$name}'\n";
}

// Ignoring elements
$source_array = ['foo', 'bar', 'baz'];
[, , $baz] = $source_array; // Assign the element at index 2 to the variable $baz
echo $baz;    // prints "baz"

// Destructurign associative arrays
$source_array = ['foo' => 1, 'bar' => 2, 'baz' => 3];

// Assign the element at index 'baz' to the variable $three
['baz' => $three] = $source_array;

echo $three, PHP_EOL;  // prints 3

$source_array = ['foo', 'bar', 'baz'];

// Assign the element at index 2 to the variable $baz
[2 => $baz] = $source_array;

echo $baz, PHP_EOL;    // prints "baz"
```

### Objects
```php
// To create a new object use the `new` statement to instantiate a class
<?php
class foo {
  function do_foo() {
    echo "Doing foo.";
  }
}

$bar = new foo;
$bar->do_foo();

// Casting to an object
$obj = (object) array('1' => 'foo')
var_dump(isset($obj->{'1'})); // output 'bool(true)'

// Any value cast
$obj = (object) 'ciao';
echo $obj->scalar; // output 'ciao', scalar contain the value
?>
```

### Enums
```php
<?php
enum Suit {
  case Hearts;
  case Diamonds;
  case Clubs;
  case Spades;
}

// Example how to use
enum MyExceptionCase {
    case InvalidMethod;
    case InvalidProperty;
    case Timeout;
}

class MyException extends Exception {
    function __construct(private MyExceptionCase $case){
        match($case){
            MyExceptionCase::InvalidMethod      =>    parent::__construct("Bad Request - Invalid Method", 400),
            MyExceptionCase::InvalidProperty    =>    parent::__construct("Bad Request - Invalid Property", 400),
            MyExceptionCase::Timeout            =>    parent::__construct("Bad Request - Timeout", 400)
        };
    }
}

// Testing my custom exception class
try {
    throw new MyException(MyExceptionCase::InvalidMethod);
} catch (MyException $myE) {
    echo $myE->getMessage();  // Bad Request - Invalid Method
}
?>
```

### Resources
Special variable that holding a reference to an external resource, handles to opened files, database connections, image canvas areas ant the like.

List of Resource types: https://www.php.net/manual/en/resource.php

### Callbacks
```php
<?php

// An example callback function
function my_callback_function() {
    echo 'hello world!', PHP_EOL;
}

// An example callback method
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World!', PHP_EOL;
    }
}

// Type 1: Simple callback
call_user_func('my_callback_function');

// Type 2: Static class method call
call_user_func(array('MyClass', 'myCallbackMethod'));

// Type 3: Object method call
$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod'));

// Type 4: Static class method call
call_user_func('MyClass::myCallbackMethod');

// Type 5: Relative static class method call
class A {
    public static function who() {
        echo 'A', PHP_EOL;
    }
}

class B extends A {
    public static function who() {
        echo 'B', PHP_EOL;
    }
}

call_user_func(array('B', 'parent::who')); // A, deprecated as of PHP 8.2.0

// Type 6: Objects implementing __invoke can be used as callables
class C {
    public function __invoke($name) {
        echo 'Hello ', $name, PHP_EOL;
    }
}

$c = new C();
call_user_func($c, 'PHP!');
?>
```

#### Callbacks with Closure
```php
<?php
// Our closure
$double = function($a) {
    return $a * 2;
};

// This is our range of numbers
$numbers = range(1, 5);

// Use the closure as a callback here to
// double the size of each element in our
// range
$new_numbers = array_map($double, $numbers);

print implode(' ', $new_numbers);
?>
```

### Iterable
```php
<?php
function gen(): iterable {
  yield 1;
  yield 2;
  yield 3;
}

foreach(gen() as $value) {
  echo $value, "\n";
}
?>
```

## Variables
### Basic
```php
<?php
$var = 'Bob';
$Var = 'Joe';
echo "$var, $Var";      // outputs "Bob, Joe"

$_4site = 'not yet';    // valid; starts with an underscore
$täyte = 'mansikka';    // valid; 'ä' is (Extended) ASCII 228.

$4site = 'not yet';     // invalid; starts with a number
?>

// Accessing obscure variable names
${'invalid-name'} = 'bar';
$name = 'invalid-name';
echo ${'invalid-name'}, " ", $$name;

$foo = 'Bob';              // Assign the value 'Bob' to $foo
$bar = &$foo;              // Reference $foo via $bar.
```

### Variable scope
```php
<?php
// Global variable scope
$a = 1
include 'b.ince'; // Variable $a will be available within b.inc
?>

// Local variable scope
$a = 1; // global scope

function test() { 
    echo $a; // Variable $a is undefined as it refers to a local version of $a
}

// Using global
$a = 1;
$b = 2;

function Sum()
{
    global $a, $b;

    $b = $a + $b;
} 

Sum();
echo $b;

// Using $GLOBALS instead of global
$a = 1;
$b = 2;

function Sum()
{
    $GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
} 

Sum();
echo $b;
```

### Static variables
```php
<?php
// Declaring static variables
function foo(){
    static $int = 0;          // correct 
    static $int = 1+2;        // correct
    static $int = sqrt(121);  // correct as of PHP 8.3.0

    $int++;
    echo $int;
}

// Static vars in anonymous functions
function exampleFunction($input) {
    $result = (static function () use ($input) {
        static $counter = 0;
        $counter++;
        return "Input: $input, Counter: $counter\n";
    });

    return $result();
}

// Calls to exampleFunction will recreate the anonymous function, so the static
// variable does not retain its value.
echo exampleFunction('A'); // Outputs: Input: A, Counter: 1
echo exampleFunction('B'); // Outputs: Input: B, Counter: 1

// Use in Inherited methods
class Foo {
    public static function counter() {
        static $counter = 0;
        $counter++;
        return $counter;
    }
}
class Bar extends Foo {}
var_dump(Foo::counter()); // int(1)
var_dump(Foo::counter()); // int(2)
var_dump(Bar::counter()); // int(3), prior to PHP 8.1.0 int(1)
var_dump(Bar::counter()); // int(4), prior to PHP 8.1.0 int(2)
?>
```

### Variable variables
```php
<?php
$a = "hello";
$$a = "world";
echo "$a {$$a}" // output "hello world"
>?
```

## Constants
```php
<?php
// Valid constant names
define("FOO",     "something");
define("FOO2",    "something else");
define("FOO_BAR", "something more");

// Invalid constant names
define("2FOO",    "something");

// This is valid, but should be avoided:
// PHP may one day provide a magical constant
// that will break your script
define("__FOO__", "something"); 
?>
```

## Expressions
```php
<?php
function double($i)
{
    return $i*2;
}
$b = $a = 5;        /* assign the value five into the variable $a and $b */
$c = $a++;          /* post-increment, assign original value of $a 
                       (5) to $c */
$e = $d = ++$b;     /* pre-increment, assign the incremented value of 
                       $b (6) to $d and $e */

/* at this point, both $d and $e are equal to 6 */

$f = double($d++);  /* assign twice the value of $d before
                       the increment, 2*6 = 12 to $f */
$g = double(++$e);  /* assign twice the value of $e after
                       the increment, 2*7 = 14 to $g */
$h = $g += 10;      /* first, $g is incremented by 10 and ends with the 
                       value of 24. the value of the assignment (24) is 
                       then assigned into $h, and $h ends with the value 
                       of 24 as well. */
?>
```


