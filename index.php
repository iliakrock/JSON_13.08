<?php

$deck = [];

function generateDeck() {
    global $deck;

    $cards = [6,7,8,9,10,'J','Q', 'K', 'A'];
    $signs = ['♡', '♧', '♢', '♤'];
    foreach ($cards as $card) {
        foreach ($signs as $sign) {
            $deck[] = $card . $sign;
        }
    }

    shuffle($deck);
}

function getNCards(int $numberOfCardsToGive =6) {
    global $deck;
    $hand = [];

    $cards = [];

    if ($numberOfCardsToGive > count($deck)) {
        $numberOfCardsToGive = count($deck);
    }

    for ($i = 0; $i < $numberOfCardsToGive; $i++) {
        $card = array_shift($deck);
        $hand[] = $card;
    }
    return $hand;
}

generateDeck();

print_r($deck);
$player1 = getNCards(5);
$player2 = getNCards(5);

print_r($deck);
print_r($player1);
print_r($player2);
