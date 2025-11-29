# Syntax
## PHP tags
To use PHP code in HTML docs is needed the PHP tags.

```php
// Standar
<?php
...
?>

// Short echo tag: Common in templates
<?= $variable ?>
```

# Comments

```php
// Line comment
/* Block comment */
```

# Variables
Weak and dynamic typed. Variable typed is assigned on execution time.

```php
// Variable declaration
$var_name = "Str";
```

## Variables type
- `string` "Hello"
- `int` 10, -10
- `float` 10.5
- `bool` true, false
- `array`:

```php
// with index
<?php
$arr = ['Alice', 'Bob'];

// pair-key
$arr = ['id' => 1, 'name' => 'Charlie']
?>
```

- `object`: class instance

# Control structure
## Conditionals

```php
<?php
// if-else
if (condition) { // if condition use variable use '$'
  echo "Str";
  ...
} else {
  ...
}

// elseif
if (condition) {
  echo "Str";
  ...
} elseif (condition) {
  ...
} else {
  ...
}

// switch
$dayofWeek = "Tuesday";
swith($dayOfWeek) {
  case "Monday":
    echo "Start of the work week.";
    break;
  case "Friday":
    echo "Weekend is near!";
    break;
  default:
    echo "It's a regular day.";
}

// ternary
$isLoogedIn = true;
$message = ($isLoogedIn) ? "Welcome back!" : "Please log in";
echo $message;
?>
```

# Loops
## for

```php
<?php
for ($i = 0; $i < 5; $i++) {
  echo "The number is: $i <br>"
}
?>
```

## while

```php
<?php
$count = 0;
while ($count < 3) {
  echo "Count: $count <br>"
  $count++
}
?>
```

## do-while

```php
<?php
$num = 5;
do {
  echo "Value: $num <br>";
  $num++;
} while ($num < 5);
?>
```

## foreach

```php
<?php
$colors = ['red', 'green', 'blue'];

foreach ($colors as $color) {
  echo "$color <br>";
}

$person = ['name' => 'Alice', 'age' => 30];
foreach ($person as $key => $value) {
  echo "$key: $value <br>";
}
?>
```

## for with break and continue
- `break`: Terminates the execution of the current loop.
- `continue`: Continue directly with the loop without running the code below.

```php
<?php
for ($i = 0; $i < 10; $i++) {
  if ($i == 5) {
    break; // Exit loop
  }
}

for ($i = 0; $i < 10; $i++) {
  if ($i == 2) {
    continue; // Skip printing when $i = 2
  }

  echo "$i"
}
?>
```

# Functions
Definition: `function nameFunction($param1, $param2 = default_value): returnType { ... }`

```php
function sum(int $a, int $b): int { // Param with type from PHP 7+
  return $a + $b;
}
```

## Closures
Used for callbacks or functions passed like argument.

```php
// Anonimous functions
$sum = function ($a, $b) {
  return $a + $b;
}

// Arrow functions from PHP 7.4+ (Similar to JS arrow function)
$sum = fn ($a, $b) => $a + $b;
```
