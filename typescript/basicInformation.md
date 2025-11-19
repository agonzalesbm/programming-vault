# Typescript types
## Primitives
- `string`: "Hello, world"
- `number`: Every is simple number doesn't matter if is `int`, `float`, or another
- `boolean`: `true` or `false`

```ts
// Type annotations
const str: string = "Hello"
let num: number = 2
var bool: boolean = true
let hobbies: string[] = ["reading", "hacking"];

// OOP
interface Person : {
  name: string
  age: number
}
let person: Person = { name: "Bob", age: 25 };
```

## Arrays

```ts
// Square Brackets Notation
let numArr: number[] = [1, 2, 3]
let strArr: string[] = ["1", "2", "3"]
let mixed: (string | number) = ["Apple", 1] // Union type

// Generic Array Type
let numbers: Array<number> = [1, 2, 3];
let names: Array<string> = ["Alice", "Bob", "Charlie"];
let mixed: Array<string | number> = ["Apple", 2, "Orange", 3];

// Empty Array
let emptyNumbers: number[] = [];
let emptyStrings: Array<string> = [];

// Objects Array
interface User {
  id: number
  name: string
}

let users: User[] = [
  { id: 1, name: "John Doe" },
  { id: 2, name: "Jane Smith" }
]
```

## Functions
```ts
// Function declaration
function greet(name: string) {
  console.log(`Hello, ${name.toUpperCase()}!!`);
}

// Return type annotation
function getNumber(): number {
  return Math.random();
}

// Functions that return promises 
async function getNumber(): Promise<number> {
  return 26;
}

// Anonymous functions
const names = ["Alice", "Bob", "Eve"];
 
names.forEach(function (s) {
  console.log(s.toUpperCase());
});
 
names.forEach((s) => {
  console.log(s.toUpperCase());
});

// Object Types
function printCoord(pt: { x: number; y: number }) {
  console.log(`X: ${pt.x}, Y: ${pt.y}`)
}

printCoord({ x: 3, y: 8 })

// Union Type
function printId(id: number | string) {
  console.log("Your ID is:" + id)
}

// Optional object properties
function printName(obj: { first: string; last?: string }) {
  if(obj.last !== undefinded) {
    console.log(obj.last.toUpperCase());
  }

  // Alternative syntax
  console.log(obj.last?.toUpperCase())
}

// Type aliases
type ID = number | string
type UserInputSanitizedString = string;
 
function sanitizeInput(str: string): UserInputSanitizedString {
  return sanitize(str);
}
 
let userInput = sanitizeInput(getInput());
userInput = "new input";
```

## Interfaces
**Interface declaration** is another way to name an object type.

```ts
interface Point {
  x: number;
  y: number;
}

function printCoord(pt: Point) {
  console.log(`X: ${pt.x}, Y: ${pt.y}`)
}

printCoord({ x: 100, y: 100 })

// Type assertions
const myCanvas = document.getElementById("main_canvas") as HTMLCanvasElement;

conts myCanvas = <HTMLCanvasElement>document.getElementById("main_canvas"); // Alternative syntax, except for .tsx file

// Literal types
function printText(s: string, alignment: "left" | "right" | "center") {
  // ..
}

printText("Hello, world", "left");
printText("G'day, mate", "centre"); // Argument of type '"centre"' is not assignable to parameter of type '"left" | "right" | "center"'.

function compare(a: string, b: string): -1 | 0 | 1 {
  return a === b ? 0 : a > b ? 1 : -1;
}

interface Options {
  width: number;
}

function configure(x: Options | "auto") {
  // ...
}

configure({ width: 100 });
configure("auto");
configure("automatic"); // Error
```

## Literal Inference
Typescript take object values like a type.

```typescript
declare function handleRequest(url: string, method: "GET" | "POST"): void;
 
const req = { url: "https://example.com", method: "GET" };
handleRequest(req.url, req.method);
// Argument of type 'string' is not assignable to parameter of type '"GET" | "POST"'.
```

We have to ways to work around this.

1. Change the inference by adding a type assertion in either location:

```typescript
// Change 1:
const req = { url: "https://example.com", method: "GET" as "GET" };
// Change 2
handleRequest(req.url, req.method as "GET");
```

2. Use `as const` to convert the entire object to be a literals type:

```typescript
const req = { url: "https://example.com", method: "GET" } as const;
handleRequest(req.url, req.method);
```

## Non-null assertion operator (Postfix `!`)
Type assertion that verify that the value isn't `null` or `undefinded`.

```ts
function liveDangerously(x?: number | null) {
  // No error
  console.log(x!.toFixed());
}
```

Only use `!` when you know that the value can't be `null` or undefined.

## Enums

