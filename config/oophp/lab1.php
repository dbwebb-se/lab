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

$printValues = implode(", ", $allValues);
$printSuits = implode(", ", $allSuits);

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

class Deck {
    private $fullDeck = [];

    public function __construct($suits, $values) {
        $sCount = count($suits);
        $vCount = count($values);
        for ($i = 0; $i < $sCount; $i++) {
            for ($j = 0; $j < $vCount; $j++) {
                array_push($this->fullDeck, new Card($values[$j], $suits[$i]));
            }
        }
    }

    public function amountOfCards() {
        return count($this->fullDeck);
    }

    public function drawFive() {
        $drawnCards = [];
        for ($i = 0; $i < 5; $i++) {
            array_push($drawnCards, array_pop($this->fullDeck));
        }
    }
}

$myCard = new Card($useThisValue, $useThisSuit);
$myDeck = new Deck($allSuits, $allValues);

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - oophp",

"intro" => "
<p>Read more: http://php.net/manual/en/language.oop5.php
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
<p>Continue with the class 'Card'. Create a constructor that takes two arguments, value and suit. Create a new instance of 'Card', called 'card3'. Pass the arguments $useThisValue and $useThisSuit. Set the private members and answer with a call to: '&#36;card2-&gt;getCard()'.
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
 * A question. 2.1
 */
[

"text" => "
<p>Create a new class called 'Deck' that has a private array called 'fullDeck'. In the constructor, fill 'fullDeck' with new Cards from the Card-class. Create two string arrays containing all values and all suits. Use: suits = [$printSuits] and values = [$printValues]. Pass those arrays as arguments to the contructor in 'Deck'. Create a public function, called 'amountOfCards', that returns the current amount of cards in your deck as an integer. Create an instance of your 'Deck'-class called 'myDeck' and answer with a call to &#36;myDeck-&gt;amountOfCards().
</p>
",

"answer" => function () use ($myDeck){

    return $myDeck->amountOfCards();
},

],



/** ---------------------------------------------------------------------------
 * A question. 2.2
 */
[

"text" => "
<p>Create another function in 'Deck', called 'drawFive', that draws 5 cards. Use the method 'pop()' to solve it. Call the new function and answer with another call to &#36;myDeck-&gt;amountOfCards().
</p>
",

"answer" => function () use ($myDeck){

    $myDeck->drawFive();
    return $myDeck->amountOfCards();
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
