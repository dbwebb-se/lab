<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### SECTION 1 ##################
$s1_countries = [
["Russia", "France", "Norway"],
["Ireland", "Hungary", "Denmark"],
["United Kingdom", "Bahamas", "Ukraine"]
];
$s1_capitals = [
["Moscow", "Paris", "Oslo"],
["Dublin", "Budapest", "Copenhagen"],
["London", "Nassau", "Kiev"]
];
$s1_useThisRand = rand_int(0, count($s1_countries)-1);
$s1_useThisCountryArray = $s1_countries[$s1_useThisRand];
$s1_useThisCapitalArray = $s1_capitals[$s1_useThisRand];
$s1_countryPrint = implode(",", $s1_useThisCountryArray);
$s1_capitalPrint = implode(",", $s1_useThisCapitalArray);
$s1_smallRand1 = rand_int(0, count($s1_useThisCountryArray)-1);

$s1_arr1 = [
[123,25,87.55,2,5466],
[285,11,9.75,9,2216],
[324,36,20.02,8,4998],
[499,98,21.63,5,9855],
[522,87,54.98,3,6533]
];
$s1_arrWhich = rand_int(1, count($s1_arr1)-1);
$s1_arrSel = $s1_arr1[$s1_arrWhich];
$s1_arrSelPrint = implode(",", $s1_arrSel);
$s1_smallRand2 = rand_int(0, count($s1_arrSel)-1);


$s1_states = [
["Alabama", "Michigan", "Nebraska"],
["Indiana", "Utah", "Nevada"],
["Iowa", "Maryland", "New Mexico"],
["Minnesota", "Illinois", "Texas"],
];
$s1_singleStates = ["Washington", "Wyoming", "Oregon", "Montana", "North Dakota"];
$s1_stateRand = $s1_states[rand_int(0, count($s1_states[0])-1)];
$s1_statesPrint = implode(",", $s1_stateRand);
$stateSingle1 = $s1_singleStates[rand_int(0, count($s1_singleStates)-1)];


// ################### SECTION 2 ##################

$s2_keyArray = array_combine($s1_useThisCountryArray, $s1_useThisCapitalArray);
$s2_moreKeys = ["Sweden", "Jamaica", "Mexico", "India", "Canada"];
$s2_moreValues = ["Stockholm", "Kingston", "Mexico City", "New Delhi", "Ottawa"];
$s2_smallRand = rand_int(0, count($s2_moreKeys)-1);
$s2_addThisKey = $s2_moreKeys[$s2_smallRand];
$s2_addThisValue = $s2_moreValues[$s2_smallRand];

//$s2_newArr = $s2_keyArray;

$s2_keyArray2 = $s2_keyArray;
$s2_keyArray2[$s2_addThisKey] = $s2_addThisValue;
$s2_randKey = $s1_useThisCountryArray[rand_int(0, count($s1_useThisCountryArray)-1)];

//$s2_randKey = $s2_keyArray2[$s2_newRand];
//print_r($s2_newRand);
// ################### SECTION 3 ##################

$s3_arr1 = [
[123,25,87.55,2,5466],
[285,11,9.75,9,2216],
[324,36,20.02,8,4998],
[499,98,21.63,5,9855],
[522,87,54.98,3,6533]
];
$s3_arrWhich = rand_int(1, count($s3_arr1)-1);
$s3_arrSel = $s3_arr1[$s3_arrWhich];
$s3_arrSelPrint = implode(",", $s3_arrSel);
$s3_smallRand2 = rand_int(0, count($s3_arrSel)-1);
$s3_arrSel2 = $s3_arr1[$s3_arrWhich-1];
$s3_arrSel2Print = implode(",", $s3_arrSel2);

$s3_singleNumbers = [3, 56, 65, 555, 122, 45, 669, 55.89, 7, 1];
$s3_single = $s3_singleNumbers[rand_int(0, count($s3_singleNumbers)-1)];

$s3_newArray = $s1_useThisCountryArray;
//$s3_shiftedArray = array_shift($s3_newArray);

$s3_singleStates = ["Washington", "Wyoming", "Oregon", "Montana", "North Dakota"];
$s3_stateRand = rand_int(1, count($s3_singleStates)-1);
$s3_singelState1 = $s3_singleStates[$s3_stateRand];
$s3_singleState2 = $s3_singleStates[$s3_stateRand-1];

// ################### SECTION 4 ##################

$s4_numArr1 = [
[1,6,4,67,43,2,89,8,55,10],
[10,3,45,98,4,7,56,23,3,1],
[11,4,41,67,99,22,8,83,5,16],
[21,5,4,6,76,2,18,85,55,1],
[31,60,54,7,13,2,9,68,5,2]
];
$s4_which = rand_int(1, count($s4_numArr1)-1);
$s4_useThis1 = $s4_numArr1[$s4_which];
$s4_useThis2 = $s4_numArr1[$s4_which-1];
$s4_printNum1 = implode(",", $s4_useThis1);
$s4_printNum2 = implode(",", $s4_useThis2);
$s4_smallNum = rand_int(5, 20);
$s4_capitals = $s1_useThisCapitalArray;

$s4_newCountries = [
["Netherlands", "Turkey", "China"],
["Germany"]
];
$s4_newCapitals = [
["Amsterdam", "Ankara", "Bejing"],
["Berlin"]
];

$s4_foreach1 = ["one"=>1, "two"=>2, "three"=>3, "four"=>4, "five"=>5];
//$temp = implode(", ", $s4_foreach1);

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 2 - Htmlphp",

"intro" => "
<p>If you need to peek at examples or just want to know more, take a look at the page: http://php.net/manual/en/langref.php. Here you will find everything this lab will go through and much more.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Arrays - with numeric index",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an array, called 'countries' with the items: ['$s1_countryPrint']. Answer with the second item in the array.
</p>
",

"answer" => function () use($s1_useThisCountryArray) {

    return $s1_useThisCountryArray[1];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new array called 'capitals' with the items: ['$s1_capitalPrint']. Answer with a string containing each country from the 'countries'-array followed by the corresponding capital. Use the format 'country = capital, country = capital...'.
</p>
",

"answer" => function () use($s1_useThisCountryArray, $s1_useThisCapitalArray) {

	$ca = $s1_useThisCapitalArray;
	$co = $s1_useThisCountryArray;

    return $co[0] . " = " . $ca[0] . ", " . $co[1] . " = " . $ca[1] . ", " . $co[2] . " = " . $ca[2];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an array, called 'numbers1' with the items: [$s1_arrSelPrint]. Answer with the sum of the first two items.
</p>
",

"answer" => function () use($s1_arrSel) {

    return $s1_arrSel[0]+$s1_arrSel[1];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your arrays 'numbers1' and 'capitals' to change item at index $s1_smallRand2 in 'numbers1' to the item at index $s1_smallRand1 in 'capitols'. Answer with your 'numbers1'-array.
</p>
",

"answer" => function () use($s1_arrSel, $s1_smallRand2, $s1_smallRand1, $s1_useThisCapitalArray) {
	$s1_arrSel[$s1_smallRand2] = $s1_useThisCapitalArray[$s1_smallRand1];

    return $s1_arrSel;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your array 'countries' and concatinate the first and the last item as a string. Separate the items with a hyphen (-) and answer with the result.
</p>
",

"answer" => function () use($s1_useThisCountryArray) {

    return $s1_useThisCountryArray[0] . "-" . $s1_useThisCountryArray[count($s1_useThisCountryArray)-1];
},

],



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Arrays - with keys",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your 'countries' and 'capitals' arrays and create another array called 'keyArray'. The country should be the key and the capital should be the value. Answer with the new array. (hint: 'country'=&gt;'capital')
</p>
",

"answer" => function () use($s2_keyArray) {



	return $s2_keyArray;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Add the key '$s2_addThisKey' with the value '$s2_addThisValue' to your 'keyArray'. Answer with the updated array.
</p>
",

"answer" => function () use($s2_keyArray2) {



	return $s2_keyArray2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Answer with the value for the key '$s2_randKey'.
</p>
",

"answer" => function () use($s2_keyArray2, $s2_randKey) {
	return $s2_keyArray2[$s2_randKey];
},

],



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Arrays - built-in functions",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find the number of items in the array [$s3_arrSelPrint]. Answer with the result as an integer.
</p>
",

"answer" => function () use ($s3_arrSel) {


	return count($s3_arrSel);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Sort the array [$s3_arrSel2Print] in ascending order. Make sure that it doesn't maintain the key association. Answer with the sorted array.
</p>
",

"answer" => function () use ($s3_arrSel2) {

	sort($s3_arrSel2);

	return $s3_arrSel2;

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Sort the array [$s3_arrSelPrint] in decending order. Make sure that it does maintain the key association. Answer with the sorted array.
</p>
",

"answer" => function () use ($s3_arrSel) {

	arsort($s3_arrSel);

	return $s3_arrSel;

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use pop() on the array [$s3_arrSelPrint] and answer with the popped item.
</p>
",

"answer" => function () use ($s3_arrSel) {

	$temp = array_pop($s3_arrSel);

	return $temp;

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use push() on the array [$s3_arrSel2Print] and insert the number $s3_single. Answer with the resulting array.
</p>
",

"answer" => function () use ($s3_arrSel2, $s3_single) {

	array_push($s3_arrSel2, $s3_single);

	return $s3_arrSel2;

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Copy your array 'countries' to a new array called 'newArray'. Use shift() on the new array and answer with the shifted item.
</p>
",

"answer" => function () use ($s3_newArray) {

	return array_shift($s3_newArray);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use unshift() on your 'newArray' add the items '$s3_singelState1' and '$s3_singleState2' in the beginning of the array. Answer with the modified array.
</p>
",

"answer" => function () use ($s3_newArray, $s3_singelState1, $s3_singleState2) {

	array_shift($s3_newArray);
	array_unshift($s3_newArray, $s3_singelState1, $s3_singleState2);

	return $s3_newArray;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Reverse the order of the array [$s3_arrSelPrint]. Answer with the modified array.
</p>
",

"answer" => function () use ($s3_arrSel) {

	return array_reverse($s3_arrSel);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use implode() on your 'capital'-array and answer with a string where each item is separated by a hyphen (-).
</p>
",

"answer" => function () use ($s4_capitals) {

	return implode("-", $s4_capitals);
},

],



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Arrays - for-each loop",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an array, called 'numbers1' with the items: [$s4_printNum1]. Use a for-each loop to sum each item with $s4_smallNum and put them in a new array called 'summedNumbers1'. Answer with the new array.
</p>
",

"answer" => function () use ($s4_useThis1, $s4_smallNum) {
	$summedNumbers1 = [];
	foreach ($s4_useThis1 as $key) {
		array_push($summedNumbers1,($key+=$s4_smallNum));
	}
	return $summedNumbers1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new array called 'numbers2' with the items [$s4_printNum2]. Use at least a for-each loop to add all numbers larger than 20 to a new array called 'largeNumbers'. Answer with the new array.
</p>
",

"answer" => function () use ($s4_useThis2) {
	$largeNumbers = [];
	foreach ($s4_useThis2 as $key) {
		if($key > 20) {
			array_push($largeNumbers,$key);
		}
	}
	return $largeNumbers;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an array with the keys: 'one', 'two', 'three', 'four' and 'five' and the values: 1, 2, 3, 4, 5. Use a foreach-loop to add all keys and values to an array in the format: ['key=value', key=value, etc']. Use implode() to make the answer a string with all items separated by a comma (,).
</p>
",

"answer" => function () use ($s4_foreach1) {
	$res = [];
	foreach ($s4_foreach1 as $key => $val) {

		array_push($res, $key . "=" . $val);

	}
	return implode(",", $res);
},

],



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** -----------------------------------------------------------------------------------
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
