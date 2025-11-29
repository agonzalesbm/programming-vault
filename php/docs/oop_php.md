# Class, properties and methods

```php
class User {
  public string $name;

  public function __construct(string $name) { // Constructor
    $this->name = $name;
  }

  public function getName(): string {
    return $this->name;
  }
}

$user = new User("Pepe"); // instantiation
```

`$this->` used to access to properties and methods of class.

## Modifier access
- `class`: Object definition.
- `public`: Accessible from outside.
- `protected`: Accessible on class and their descendants.
- `private`: Accessible only on class.

## Static class
Definition: `public static function staticMethod() { ... }`
Call: `Class::staticMethod();`
Access in class: `self::` or `static::`

# Inheritance, Interface
- Inheritance: Use `extends`.
- Interfaces: Use `interface` and `implements`
