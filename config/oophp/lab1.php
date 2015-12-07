<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// CARD ATTRIBUTES
$allValues = [
    "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King", "Ace"
];
$allSuits = [
    "clubs", "diamonds", "spades", "hearts"
];

// SECTION 1
$randValue = rand_int(0, (count($allValues)-1));
$randSuit = rand_int(0, (count($allSuits)-1));

$randValue2 = rand_int(0, (count($allValues)-1));
$randSuit2 = rand_int(0, (count($allSuits)-1));

$useThisValue = $allValues[$randValue];
$useThisSuit = $allSuits[$randSuit];

$useThisValue2 = $allValues[$randValue2];
$useThisSuit2 = $allSuits[$randSuit2];


class Card {
    private $value = "";
    private $suit = "";

    public function __construct($val, $suit) {
        $this->value = $val;
        $this->suit = $suit;
    }

    public function getValue() {
        return $this->value;
    }

    public function getCard() {
        return $this->value . " of " . $this->suit;
    }
}

$myCard = new Card($useThisValue, $useThisSuit);


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - oophp",

"intro" => "
<p>TBD
</p>
",


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Classes and Objects",

"intro" => "
<p>Create a Card-class.</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question. 1.1
 */
[

"text" => "
<p>Create a class called 'Card'. Create a private member called 'value' which holds the string-value: '$useThisValue'. Create a public function called 'getValue()' that returns the member 'value'. Create an instance of the class and call it 'card1'. Answer with a call to: '&#36;card1-&gt;getValue()'.
</p>
",

"answer" => function () use ($myCard){

    return $myCard->getValue();
},

],



/** ---------------------------------------------------------------------------
 * A question. 1.2
 */
[

"text" => "
<p>Continue with the class 'Card'. Create another private member called 'suit' which holds the string-value: '$useThisSuit'. Create a public function called 'getCard()' that returns a string in the format: '$useThisValue of $useThisSuit'. Create an instance of the class and call it 'card2'. Answer with a call to: '&#36;card2-&gt;getCard()'.
</p>
",

"answer" => function () use ($myCard){

    return $myCard->getCard();
},

],



/** ---------------------------------------------------------------------------
 * A question. 1.3
 */
[

"text" => "
<p>Continue with the class 'Card'. Create a constructor that takes two arguments, value and suit. Set the private members and answer with a call to: '&#36;card2-&gt;getCard()'.
</p>
",

"answer" => function () use ($myCard){

    return $myCard->getCard();
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Classes and Objects",

"intro" => "
<p>Create a deck of cards.</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question. 1.1
 */
[

"text" => "
<p>Create a class called 'Deck'.
</p>
",

"answer" => function () use ($myDeck){

    return $myDeck->getCard();
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
