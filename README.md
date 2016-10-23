# Installation

Install this library via composer:

```
composer require flsouto/array2options
```

# array2options

This function allows you to easily build options from arrays for inserting into a "select" tag.

```
<?php
require_once('vendor/autoload.php');

$choices = ['apple','orange','banana'];

echo "<select name=\"fruit\">\n";
echo "<option value=\"none\">Choose a Fruit:</option>\n";
echo array2options($choices);
echo "</select>";

```

The above php code will produce the following html output:

```
<select name="fruit">
<option value="none">Choose a Fruit:</option>
<option value="apple">apple</option>
<option value="orange">orange</option>
<option value="banana">banana</option>
</select>
```

## Selecting an option

In the above html output the "Choose a Fruit" option will be selected by default since it is the first option inside the select element and no other option is marked as selected. But if for instance you wanted the 'orange' option to be selected, you could use the second parameter to the array2options function:

```
<?php
require_once('vendor/autoload.php');

$choices = ['apple','orange','banana'];

echo "<select name=\"fruit\">\n";
echo "<option value=\"none\">Choose a Fruit:</option>\n";
echo array2options($choices, "orange");
echo "</select>";
```

Notice the "selected" attribute in the following output:

```
<select name="fruit">
<option value="none">Choose a Fruit:</option>
<option value="apple">apple</option>
<option value="orange" selected>orange</option>
<option value="banana">banana</option>
</select>
```

## Using associative arrays

While array2options is good for generating options when values are the same as their associated labels, sometimes we need to produce options whose values differ from their labels. This is where the *assoc2options* function comes in handy:

```
<?php
require_once('vendor/autoload.php');

$choices = [
	'none' => 'Choose a Color',
	'#C0C0C0' => 'Silver',
	'#FF0000' => 'Red',
	'#000000' => 'Black'
];

echo "<select name=\"color\">\n";
echo assoc2options($choices);
echo "</select>";

```

Output:

```
<select name="color">
<option value="none">Choose a Color</option>
<option value="#C0C0C0">Silver</option>
<option value="#FF0000">Red</option>
<option value="#000000">Black</option>
</select>
```

*Notice*: the assoc2options also allows you to set an option as "selected" just like array2option does.

## Converting datasets to options

Usually you will be working with rows fetched from the database. In this case the data comes as data sets (AKA "array of arrays"). So, if you want to produce options for data in this format, you should use the dataset2options:

```
<?php
require_once('vendor/autoload.php');

// Rows fetched from database
$rows = [
	[
		'id' => 93,
		'name' => 'Category 1'
	],
	[
		'id' => 102,
		'name' => 'Category 2'
	],
	[
		'id' => 106,
		'name' => 'Category 3'
	]
];

// Prepends a "caption" option
array_unshift($rows, ['id' => 0, 'name'=>'Choose a Category']);

// Renders
echo "<select name=\"category_id\">\n";
echo dataset2options($rows);
echo "</select>";
```

The above will produce as expected:

```
<select name="category_id">
<option value="0">Choose a Category</option>
<option value="93">Category 1</option>
<option value="102">Category 2</option>
<option value="106">Category 3</option>
</select>
```

This function works by looking at the first attribute of each array, for determining the "value" of each option, and then looks at the second attribute for determing the "label". So it doesn't matter if your dataset contains more data besides just id and name of an object, as long as these attributes come in the first and second positions respectively.

*Notice*: the dataset2options also allows you to set an option as "selected" just like array2option and assoc2options do.

# Final thoughts

Even though it is relatively simple to iterate over arrays and print out tags in your templates it makes your code ugly and is such a tedious work to do - especially when you have to include logic to select one of the options. 

## Why not generate the whole select widget?

I hear some complain that this library doesn't help build the entire "select" element. However, if you think about it, there is no difficulty in making the select tag. The somewhat "complexity" lies in the generation of the variable content that goes inside it. Besides, this way you can customize the select tag using plain html code without having to learn weird APIs. Learn and use an API that does something useful, not one that reinvents the wheel.