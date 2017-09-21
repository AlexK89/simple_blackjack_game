<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 18/09/2017
 * Time: 18:57
 */

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$cards = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King", "Ace");
$cards_set = array("total" => 0);

/*
 * cards_gen picking random cards from $cards array
 * counting picked cards
 *
 * @params $cards Mixed -   an array of all types of cards
 *
 * @return array Mixed -    picked cards names and sum of these cards
 */
function randomize($cards, $cards_set, $rand = 0){
    if ($rand == 0) {
        $rand= rand(0, 12);
    }
    $cards_arr = array("total" => 0);
    $sum = 0;
    $card = $cards[$rand];
    if ($card === "Jack" || $card === "Queen" || $card === "King") {
        $sum += 10;
    } else if ($card === "Ace") {
        $sum += 11;
    } else {
        $sum += $card;
    }
    $cards_arr[] = $card;
    $cards_arr["total"] += $sum;

    foreach ($cards_arr as $item => $value) {
        if($item === "total") {
            $cards_set["total"] += $value;
        } else {
            $cards_set[] = $value;
        }
    }
    return $cards_set;
}

function cards_gen($cards, $cards_set)
{
    for ($i = 0; $i < 2; $i++) {
       $cards_set = randomize($cards, $cards_set);
    }
    return $cards_set;
}

$two_cards = cards_gen($cards, $cards_set);

function third_card($cards, $two_cards)
{
    if ($two_cards["total"] < 13) {
        $two_cards = randomize($cards, $two_cards);
    }
    print_r($two_cards);
    return $two_cards;
}

$player1 = third_card($cards, $two_cards);
$player2 = third_card($cards, $two_cards);

function play($player1, $player2): void
{
    switch (TRUE) {
        case $player1["total"] > $player2["total"] && $player1["total"] < 22:
            echo "<p>Player 1 won!!!</p>";
            break;
        case $player2["total"] > $player1["total"] && $player2["total"] < 22:
            echo "<p>Player 2 won!!!</p>";
            break;
        case $player1["total"] > 21 && $player2["total"] < 22:
            echo "<p>Player 2 won!!!</p>";
            break;
        case $player2["total"] > 21 && $player1["total"] < 22:
            echo "<p>Player 1 won!!!</p>";
            break;
        case $player1["total"] === $player2["total"]:
            echo "<p>DRAW!!!</p>";
            break;
    }
    echo "<p>Player 1:      " . $player1["total"] . "</p>";
    echo "<p>Player 2:      " . $player2["total"] . "</p>";
}

play($player1, $player2);