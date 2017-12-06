<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

//SECTION 1 ****************************************************
$s1_names              = ["Buster", "James", "Zimba", "Goliat", "Hugo", "Skorstten", "Ove", "Kvothe", "Farseer", "FitzChivalry", "Badgerlock"];
$s1_ssns               = ["768244-4857", "502075-3392", "578118-6946", "228474-2825", "350967-5218", "421396-9785", "619172-0731", "503233-4011", "541355-8072", "516518-3442", "930807-7536"];
$s1_cities             = ["Kholinar", "Elanor", "Ru Parat", "Buckkeep", "Renere", "Imre", "Katar", "Tear", "Lugard", "Amador", "Tar Valon"];
$s1_states             = ["Withywoods", "Blekinge", "Skane", "Smaland", "Gotland", "Norrland", "Vansterland", "Throvenland", "Sagenmark", "The Aiel Waste"];
$s1_countries          = ["Six Duchies", "Commonwealth", "Ceald", "Ademere", "Tarabon", "Andor", "Shienar", "Tear", "Illian", "Gettland"];
$s1_courses            = ["oopython", "webgl", "python", "htmlphp", "linux", "ramverk1", "ramverk2", "webapp", "oophp", "javascript1", "design"];

$s1_per_name           = $s1_names[rand_int(0, count($s1_names) -1)];
$s1_per_ssn            = $s1_ssns[rand_int(0, count($s1_ssns) -1)];
$s1_per_city           = $s1_cities[rand_int(0, count($s1_cities) -1)];
$s1_per_state          = $s1_states[rand_int(0, count($s1_states) -1)];
$s1_per_country        = $s1_countries[rand_int(0, count($s1_countries) -1)];

$s1_tea_name           = $s1_names[rand_int(0, count($s1_names) -1)];
$s1_tea_ssn            = $s1_ssns[rand_int(0, count($s1_ssns) -1)];
$s1_tea_city           = $s1_cities[rand_int(0, count($s1_cities) -1)];
$s1_tea_state          = $s1_states[rand_int(0, count($s1_states) -1)];
$s1_tea_country        = $s1_countries[rand_int(0, count($s1_countries) -1)];
$s1_tea_c1             = $s1_courses[rand_int(0, count($s1_courses) -1)];
$s1_tea_c2             = $s1_courses[rand_int(0, count($s1_courses) -1)];
$s1_tea_c3             = $s1_courses[rand_int(0, count($s1_courses) -1)];

$s1_stu_name           = $s1_names[rand_int(0, count($s1_names) -1)];
$s1_stu_ssn            = $s1_ssns[rand_int(0, count($s1_ssns) -1)];
$s1_stu_city           = $s1_cities[rand_int(0, count($s1_cities) -1)];
$s1_stu_state          = $s1_states[rand_int(0, count($s1_states) -1)];
$s1_stu_country        = $s1_countries[rand_int(0, count($s1_countries) -1)];
$s1_stu_c1             = $s1_courses[rand_int(0, count($s1_courses) -1)];
$s1_stu_c2             = $s1_courses[rand_int(0, count($s1_courses) -1)];
$s1_stu_c3             = $s1_courses[rand_int(0, count($s1_courses) -1)];
$s1_stu_g1             = rand_int(0, 5);
$s1_stu_g2             = "-";
$s1_stu_g3             = rand_int(0, 5);


return [
"author" => ["aar"],
"passPercentage" => 8/8,
"passDistinctPercentage" => 8/8,


/**
 * Titel and introduction to the lab.
 */

"title" => "Lab 2 - oopython",

"intro" => <<<EOD

EOD
,


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Class relationships",

"intro" => <<<EOD
Practice on creating classes and relationships between them in python.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class named **Person**.  Give the class the instance attributes "name" and "ssn". Make "ssn" a private attribute. The values for the attributes should be sent to the constructor as arguments.  
Create a *get* method for both "name" and "ssn". Only Create a *set* method for "name".  

In the code below create a new variable called **per** and set it to a new instance of Person. Give it the name `$s1_per_name` and ssn `$s1_per_ssn`.


Answer with per\'s get method for ssn.
EOD
,
"points" => 2,

"answer" => function () use ($s1_per_ssn) {

    return "$s1_per_ssn";

},

],

/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class named **Address**.  Give the class the instance attributes "city", "state" and "country". The values for the attributes should be sent to the constructor as arguments.  
Create a method, in Address, called **to_string**, it should return `"Address: <city> <state> <country>"` (replace the \<city\> with the value of the attribute city...).  

Add the instance attribute **address** to class Person. It's value should be sent as argument to constructor, give it a default value of and empty string, `""`.  
Create a set method for attribute "address".  
Create a method, in Person, called **to_string**, it should return `"Name: <name> SSN: <ssn> Address: <city> <state> <country>"`. Use Address' to_string method to get address data.  

In the code below Create a new instance of the class Address. Initiate it with the city `$s1_per_city`, the state `$s1_per_state` and the country `$s1_per_country`.  
Use the set method in Person to add the newly create Address object to your **per** object.

Answer with per's "to_string" method.
EOD
,
"points" => 2,

"answer" => function () use ($s1_per_name, $s1_per_ssn, $s1_per_city, $s1_per_state, $s1_per_country) {

    return "Name: $s1_per_name SSN: $s1_per_ssn Address: $s1_per_city $s1_per_state $s1_per_country";

},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class name **Teacher** make it inherit from class "Person". In the constructor add the instance attribute "courses" and initiate it to and empty list.  
Create the method **add_course**, it should take one argument and add it to the course list attribute.  
Create the method **remove_course**, it should take one argument and remove if from the course list attribute.  
Overload the **to_string** method from the base class. It should return the same as the original method and add the courses to the end of the string, `"Name: <name> SSN: <ssn> Address: <city> <state> <country> Courses: <course>, <course>, ..."`. The list of courses should be comma seperated without one at the end. Tip, use `super(Teacher, self)` to access base method.  


In the code below Create a new instance of the class Address. Initiate it with the city `$s1_tea_city`, the state `$s1_tea_state` and the country `$s1_tea_country`.  
Create a new instance of the class Teacher. Initiate it with the name `$s1_tea_name` and ssn `$s1_tea_ssn` and the aforementioned Address object.  
Use the add_course method to add the following courses, `$s1_tea_c1`, `$s1_tea_c2` and `$s1_tea_c3`.


Answer with the Teacher object's "to_string" method.
EOD
,
"points" => 2,

"answer" => function () use ($s1_tea_name, $s1_tea_ssn, $s1_tea_city, $s1_tea_state, $s1_tea_country, $s1_tea_c1, $s1_tea_c2, $s1_tea_c3) {

    return "Name: $s1_tea_name SSN: $s1_tea_ssn Address: $s1_tea_city $s1_tea_state $s1_tea_country Courses: $s1_tea_c1, $s1_tea_c2, $s1_tea_c3";

},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class name **Student** make it inherit from class "Person". In the constructor add the instance attribute "courses_grades" and initiate it to and empty list.  
Create the method **add_course_grade**, it should take two arguments, one course and a grade. Create a tuple with the two arguments and add to the attribute "courses_grades".  
Create the method **average_grade**. Calculate and return the students average grade. Ignore grades with "-" in the calculation.

In the code below Create a new instance of the class Address. Initiate it with the city `$s1_stu_city`, the state `$s1_stu_state` and the country `$s1_stu_country`.  
Create a new instance of the class Student. Initiate it with the name `$s1_stu_name` and ssn `$s1_stu_ssn` and the aforementioned Address object.  
Use the add_course_grade method to add the following courses, `$s1_stu_c1` with grade `$s1_stu_g1`, `$s1_stu_c2` with grade `$s1_stu_g2` and `$s1_stu_c3` with grade `$s1_stu_g3`.


Answer with the Student object's "average_grade" method.
EOD
,
"points" => 2,

"answer" => function () use ($s1_stu_g1, $s1_stu_g3) {

    return ($s1_stu_g1 + $s1_stu_g3) / 2;

},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
