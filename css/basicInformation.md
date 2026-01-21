## Syntax

```css
selector {
  property1: value;
  property2: value;
}

selector:hover {
  ...
}
```

## The box model

- Content: Text or images inside the box.
- Padding: Transparent area around the content (between content and border).
- Border: A line surrounding the padding and content.
- Margin: Transparent area outside the border (spacing between elements).

## Basic selectors

| Selector | Example | Target |
| --------------- | --------------- | --------------- |
| Universal | * { } | Every elemtn on the page |
| Type | h1 { } | all `<h1>` elements |
| Class | .btn { } | Elements with class="btn"|
| ID | #header { } | Target the unique element with `id="header"` |
| Grouping | h1, p | Applies styles to both |

## Interaction selectors

| Selector | Example | Description |
| --------------- | --------------- | --------------- |
| :hover | a:hover { } | Styles a link when the mouse ir over it |
| :active | button:active { } | Applies while the elemtn is being clicked |
| :focus | input:focus { } | Applies when an element (like an input) is selected |
| :focus-within | form:focus-within { } | Applies to a parent if any child has focus |
| :visited | a:visited { } | styles links the user has already clicked |

## Relationship & Combinator selectors

| Selector | Syntax | Description |
| --- | --- | --- |
| Descendant | div p | All <p> inside a <div> |
| Child | ul > li | Direct children only (not nested lists) |
| Adjacent Sibling | h1 + p | The first <p> immediately following an <h1> |
| General Sibling | h1 ~ p | All <p> elements that follow an <h1> |

## Common Text & Typography

Properties for making your content readable.

* **Font Size:** `font-size: 16px;` (or use `rem` for accessibility).
* **Font Weight:** `font-weight: bold;` or `400`, `700`.
* **Color:** `color: #333;` (text color).
* **Alignment:** `text-align: center | left | right;`
* **Line Height:** `line-height: 1.5;` (spacing between lines).
* **Decoration:** `text-decoration: none;` (removes link underlines).

## Positioning

How an element sits in the document flow.

* **Static:** Default. Follows normal page flow.
* **Relative:** Positioned relative to its normal spot without affecting others.
* **Absolute:** Positioned relative to its **nearest positioned ancestor**.
* **Fixed:** Stays in the same spot on the screen even when scrolling.
* **Sticky:** Toggles between relative and fixed based on scroll position.

# Units

* **px:** Pixels (absolute size).
* **%:** Percentage of the parent's size.
* **em:** Relative to the element's font size.
* **rem:** Relative to the **root** (`<html>`) font size.
* **vw / vh:** Percentage of the viewport width or height.

### Absolute units

These are fixed and don't change based on screen size or settings.

| Unit | Description | Best for |
| --- | --- | --- |
| px | Pixels (1px = 1/96th of an inch) | Borders, small icons, or precise spacing | 
| pt / cm | Points, centimeters, etc. | Primarily used for print stylesheets |

```css
.card {
  border: 2px solid black; /* Stays 2px on all devices */
  border-radius: 8px;
}
```

### Relative units

These are the backbone of responsive design because they adapt to the environment.

**A. Font-Relative: `em` and `rem`**
* rem (Root EM): relative to the font-size of the `<html>` element (usually 16px by default).
* em: Relative to the font-size of the parent element.

**Why use `rem`?** If user changes their browser's default font size (for accessibility), your whole layout scales perfectly, e.g:

```css
html { font-size: 16px; } 

h1 { font-size: 2rem; }    /* 2 * 16px = 32px */
p  { padding: 1.5rem; }   /* 1.5 * 16px = 24px */
```

***B. Viewport-Relative: `vw` and `vh`***

These are based on the size of the browser window (the viewport).

* **1vw:** 1% of the viewport's width.
* **1vh:** 1% of the viewport's height.

**Example:**

```css
.hero-section {
  height: 100vh; /* Takes up the full height of the screen */
  width: 100vw;  /* Takes up the full width */
}
```

### Percentages (`%`)

Percentages are always relative to the **parent container's** size, not the screen or the root.

**Example:**

```css
.container { width: 1000px; }
.sidebar { width: 25%; } /* This will be 250px */
```

### The Power of `calc()`

You can mix different units using the `calc()` function. This is incredibly helpful when you want an element to take up "most" of the screen but leave a fixed gap.

**Example:**

```css
.main-content {
  /* Take up full screen height, but subtract 60px for a fixed header */
  height: calc(100vh - 60px); 
  
  /* 50% of parent minus 20px for a margin */
  width: calc(50% - 20px); 
}
```

### Summary Table: Which to use?

| Goal | Recommended Unit |
| --- | --- |
| **Typography (Accessibility)** | `rem` |
| **Padding / Margins** | `rem` or `em` |
| **Layout Widths** | `%` or `vw` |
| **Hero Sections** | `vh` |
| **Borders / Thin Lines** | `px` |

## Mobile-first structure

In a **Mobile-First** approach, you write your "default" CSS for the smallest screens (phones) first. Then, you use **Media Queries** to layer on styles for larger screens (tablets, desktops).

This strategy is efficient because it requires less code and usually results in faster-loading sites for mobile users.

## The Mobile-First Structure

You define your base styles outside of any media query, then use `min-width` to target larger breakpoints.

```css
/* --- 1. Base Styles (Mobile: < 768px) --- */
body {
  font-size: 1rem;      /* Use rem for accessible text */
}

.container {
  width: 90%;          /* Use % so it doesn't hit screen edges on small phones */
  margin: 0 auto;
  padding: 1.5rem;     /* Fixed-ish spacing using rem */
}

.hero-title {
  font-size: 8vw;      /* Viewport units: Title scales with screen width */
}

/* --- 2. Tablet Styles (min-width: 768px) --- */
@media (min-width: 768px) {
  body {
    font-size: 1.1rem; /* Slightly larger text for larger screens */
  }

  .container {
    width: 80%;        /* Shrink container % as screen gets wider */
  }

  .hero-title {
    font-size: 3rem;   /* Switch from vw to rem to prevent title from getting TOO big */
  }
}

/* --- 3. Desktop Styles (min-width: 1024px) --- */
@media (min-width: 1024px) {
  .container {
    max-width: 1200px; /* Cap the width so it doesn't stretch infinitely */
    width: 100%;
  }
}
```

## Best Practices for Units in Media Queries

### Use `rem` for Breakpoints

While many developers use `px` for media query breakpoints (e.g., `768px`), using `em` or `rem` is technically better for accessibility. If a user zooms in, a `rem`-based media query will trigger the "mobile" layout sooner, making the site easier to read.

* **Rule of thumb:** 
* **Example:** `768px / 16 = 48rem`

```css
@media (min-width: 48rem) { 
  /* Styles for tablets and up */
}
```

### Fluid Typography with `clamp()`

Instead of writing multiple media queries just to change font sizes, you can use the `clamp()` function. It uses a **minimum**, a **preferred (relative)**, and a **maximum** value.

```css
h1 {
  /* Minimum 2rem, Preferred 5vw, Maximum 4rem */
  font-size: clamp(2rem, 5vw, 4rem);
}

```

* **On mobile:** It stays at `2rem`.
* **While resizing:** It grows fluidly at `5vw`.
* **On desktop:** It stops growing at `4rem`.

## 3. Comparison of Unit Behavior

| Scenario | Mobile (Phone) | Tablet/Desktop |
| --- | --- | --- |
| **Container Width** | Use **90%** or **95%** to provide "breathing room" on small screens. | Use **max-width** in `px` or `rem` to stop expansion on ultrawide monitors. |
| **Height** | Use **auto** or **min-height: 100vh** for hero sections. | **100vh** works well here too, but be careful of mobile browser bars. |
| **Spacing** | **1rem** (16px) is standard for padding/margins. | Increase to **2rem** or **3rem** as white space becomes more available. |

## Grid
* **Grid container:** Element where `diplay: grid` is applied.
* **Grid item:** Direct children of the container.
* **Grid track:** Space between rows and columns.

### Defining the Grid

On parent element.

```css
.container {
  display: grid;

  /* Define 3 columns: first is 200px, second takes remaining space, third is 100px */
  grid-template-columns: 200px 1fr 100px;
  
  /* Define 2 rows: 100px and 200px */
  grid-template-rows: 100px 200px;
  
  /* Gap between rows and columns */
  gap: 20px;
}
```

### `fr` Unit (Fractional unit)

Unique unit to Grid. Represents a fraction of the free space in the grid container.

* `1fr 1fr 1fr` creates three equal columns.
* `2fr 1fr` creates two columns where the first is twice as wide as the second.

### Positioning items

It's possible to specify where child start and end using grid lines.

```css
.item {
  /* Start at column line 1, end at line 3 */
  grid-column: 1 / 3;
  
  /* Start at row line 1, span 2 rows */
  grid-row: 1 / span 2;
}
```

### Grid template areas

"Visual" way to code a layout, allow "draw" the layout using text.

```css
.container {
  display: grid;
  grid-template-areas:
    "header header header"
    "sidebar main main"
    "footer footer footer";
  grid-template-columns: 200px 1fr 1fr;
}

.header { grid-area: header; }
.sidebar { grid-area: siderbar; }
.main { grid-area: main; }
.footer { grid-area: footer; }
```

### Responsive Grid
One of the best features of Grid is creating responsive layout without media queries using `auto-fit` or `auto-fill`.

```css
.container {
  display: grid;
  /* Create as many columns as will fit, at least 250px wide, max 1fr */
  grid-template-columns: repeat(auto-fit, ,minmax(250px, 1fr));
  gap: 1rem;
}
```

### Alignment properties

Grid uses the same logic as Flexbox but in two directions.

| Property | Axis | Description |
| --- | --- | --- |
| justify-items | Inline (Horizontal) | Aligns items inside their cell horizontally |
| align-items | Block (Vertical) | Aligns items insside their cell vertically |
| justify-content | Inline (Horizontal) | Aligns the entire inside the container |
| align-content | Block (Vertical) | Aligns the entire grid vertically |


### Centering Everything

To center a "child" div perfectly inside a "parent" div, use this snippet:

```css
.parent {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Optional: centers vertically on the whole screen */
}
```
```
