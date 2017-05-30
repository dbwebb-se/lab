<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// ################### QUERY DATA ##################

$q1 = ["USA", "England"];
$q1Use = $q1[rand_int(0, count($q1)-1)];

$q2 = [1943, 1956, 1977, 1929, 1905, 1934, 1984, 1963, 1930, 1962, 1987, 1964, 1937];
$q2Use = $q2[rand_int(0, count($q2)-1)];

$q3a = ["De Niro", "Nicholson", "Hepburn", "Garbo", "Hanks", "Loren", "Blanchett"];
$q3b = ["Depp", "Bloom", "Carrey", "Johansson", "Connery", "Cage", "Aniston", "Clarke"];
$q3Use1 = $q3a[rand_int(0, count($q3a)-1)];
$q3Use2 = $q3b[rand_int(0, count($q3b)-1)];

// ################### Connect to Database ##################

try {
    $mydb = new PDO("sqlite:" . __DIR__ . "/lab6_extra/myDB.sqlite");
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

// ################### SETUP QUERIES ##################

$query1 = "SELECT firstName FROM people WHERE countryOfBirth=?";
$query2 = "SELECT * FROM people WHERE born=?";
$query3 = "SELECT born FROM people WHERE lastName IN (?,?)";
$query4 = "SELECT count(*) FROM people";
$query5 = "SELECT MIN(born), countryOfBirth FROM people";
$query6 = "SELECT AVG(born) FROM people";
$query7 = "SELECT MAX(born), cityOfBirth FROM people WHERE countryOfBirth='USA'";
$query8 = "SELECT firstName, lastname FROM people ORDER BY lastName";

// ################### PREPARE STATEMENTS ##################

$stmt1 = $mydb->prepare($query1);
$stmt2 = $mydb->prepare($query2);
$stmt3 = $mydb->prepare($query3);
$stmt4 = $mydb->prepare($query4);
$stmt5 = $mydb->prepare($query5);
$stmt6 = $mydb->prepare($query6);
$stmt7 = $mydb->prepare($query7);
$stmt8 = $mydb->prepare($query8);

// ################### EXECUTE STATEMENTS ##################

$stmt1->execute(array($q1Use));
$stmt2->execute(array($q2Use));
$stmt3->execute(array($q3Use1, $q3Use2));
$stmt4->execute();
$stmt5->execute();
$stmt6->execute();
$stmt7->execute();
$stmt8->execute();

// ################### GET RESULTS #################

$res1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$res3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);
$res4 = $stmt4->fetch(PDO::FETCH_NUM);
$res5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
$res6 = $stmt6->fetch(PDO::FETCH_NUM);
$res7 = $stmt7->fetch(PDO::FETCH_ASSOC);
$res8 = $stmt8->fetchAll(PDO::FETCH_ASSOC);

// ################### FIX ANSWERS ##################

$answer1 = [];
$answer2 = "";
$answer3 = 0;
$answer4 = (int)$res4[0];
$answer5 = "";
$answer6 = (int)$res6[0];
$answer7 = (string)$res7['cityOfBirth'];
$answer8 = [];

foreach ($res1 as $row) {
    array_push($answer1, $row['firstName']);
}

foreach ($res2 as $row) {
    $answer2 = $row['firstName'] . " " . $row['lastName'];
}

foreach ($res3 as $row) {
    $answer3 += (int)$row['born'];
}

foreach ($res5 as $row) {
    $answer5 = $row['countryOfBirth'];
}

foreach ($res8 as $row) {
    array_push($answer8, $row['lastName'] . " " . $row['firstName']);
}

// ################### Close the connection ##################

unset($mydb);



/**
 * Titel and introduction to the lab.
 */


return [

"passPercentage" => 7/10,
"passDistinctPercentage" => 10/10,

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 6 - Htmlphp",

"intro" => <<<EOD
In this lab you will be working with a SQLite database file: `myDB.sqlite` and PDO.

Do not forget to check the [PHP Manual on PDO](http://php.net/manual/en/book.pdo.php)
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Working with SQLite and PDO",

"intro" => <<<EOD
The database has one table called `people`. 

The table 'people' has six columns:

> `id`, `firstName`, `lastName`, `born`, `cityOfBirth`, `countryOfBirth`.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the firstnames of the people born in $q1Use. Answer with an array containing their names.
EOD
,

"points" => 1,

"answer" => function () use($answer1) {

    return $answer1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the first name and last name of the person born $q2Use.  
Answer with a string in the format: `"Firstname Lastname"`.
EOD
,

"points" => 1,

"answer" => function () use($answer2) {

    return $answer2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Sum the years the persons with the lastnames `$q3Use1` and `$q3Use2` were born. Answer with an integer.
EOD
,

"points" => 1,

"answer" => function () use($answer3) {

    return $answer3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Count the number of entries in the table `people`. Answer with an integer.
EOD
,

"points" => 1,

"answer" => function () use($answer4) {

    return $answer4;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find which country `(countryOfBirth)` the oldest person was born in. Answer with a string.
EOD
,

"points" => 1,

"answer" => function () use($answer5) {

    return $answer5;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
What is the average value of the column `born`? Answer with an integer.
EOD
,

"points" => 1,

"answer" => function () use($answer6){

    return $answer6;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the youngest person born in USA. Which city is he/she born in? Answer with a string.
EOD
,

"points" => 1,

"answer" => function () use($answer7){

    return $answer7;
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
"title" => "Extra assignments",

"intro" => <<<EOD
These questions are worth 3 points each. Solve them for extra points.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Get the first name and lastname of all persons in the database. Order them by their last name, alphabetically and ascending.

Answer with an array of strings, like this:

> `["lastName firstName", "lastName firstName"]`.
EOD
,

"points" => 3,

"answer" => function () use($answer8){

    return $answer8;
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
]; // EOF the enritre lab
