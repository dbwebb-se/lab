<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

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
    $mydb = new PDO("sqlite:" . __DIR__ . "/myDB.sqlite");
    $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
    echo $e->getMessage();
}

// ################### SETUP QUERIES ##################

$query1 = "SELECT firstName FROM people WHERE countryOfBirth=?";
$query2 = "SELECT * FROM people WHERE born=?";
$query3 = "SELECT born FROM people WHERE lastName IN (?,?)"; 
$query4 = "SELECT * FROM people"; //count rows 
$query5 = "SELECT * FROM people"; //how many are born 1969 

// ################### PREPARE STATEMENTS ##################

$stmt1 = $mydb->prepare($query1);
$stmt2 = $mydb->prepare($query2);
$stmt3 = $mydb->prepare($query3);
$stmt4 = $mydb->prepare($query4);
$stmt5 = $mydb->prepare($query5);

// ################### EXECUTE STATEMENTS ##################

$stmt1->execute(array($q1Use));
$stmt2->execute(array($q2Use));
$stmt3->execute(array($q3Use1, $q3Use2));

// ################### GET RESULTS #################

$res1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
$res2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
$res3 = $stmt3->fetchAll(PDO::FETCH_ASSOC);

// ################### FIX ANSWERS ##################

$answer1 = []; $answer2 = []; $answer3 = 0; $answer4 = []; $answer5 = [];

foreach ($res1 as $row) {
    array_push($answer1, $row['firstName']);
}
foreach ($res2 as $row) {
    array_push($answer2, $row['firstName'] . " " . $row['lastName']);
}
foreach ($res3 as $row) {
    $answer3 += $row['born'];
}
// ################### Save the Answers ##################

$a1 = implode(", ", $answer1);
$a2 = implode(", ", $answer2);
$a3 = (int)$answer3;


// ################### Close the connection ##################

unset($mydb);
/**
 * Titel and introduction to the lab.
 */


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 5 - Htmlphp",

"intro" => "
<p>In this lab you will be working with a SQLite database file: 'myDB.sqlite' and PDO. References: http://php.net/manual/en/book.pdo.php, http://dbwebb.se/htmlphp/me/kmom10/guide.php?id=sqlite20#s10
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Working with SQLite and PDO",

"intro" => "
<p>The database has six columns: 'id', 'firstName', 'lastName', 'born', 'cityOfBirth', 'countryOfBirth'.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find the firstnames of the people born in $q1Use. Answer with a string and the names comma-separated.
</p>
",

"answer" => function () use($a1) {

    return $a1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find the first name and last name of the person born $q2Use. Answer with a string in the format: 'Firstname Lastname'.
</p>
",

"answer" => function () use($a2) {

    return $a2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Sum the years the persons with the lastnames '$q3Use1' and '$q3Use2' were born. Answer with an integer.
</p>
",

"answer" => function () use($a3) {

    return $a3;
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
"title" => "tjoho",

"intro" => "
<p>weehoo</p>
",

"shuffle" => false,

"questions" => [


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p></p>
",

"answer" => function () {

    return 0;
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
