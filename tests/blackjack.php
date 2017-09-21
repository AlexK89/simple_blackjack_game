<?php
/**
 * Created by PhpStorm.
 * User: alexandrk
 * Date: 19/09/2017
 * Time: 16:35
 */
use PHPUnit\Framework\TestCase;

require("../blackjack.php");

class StackTest extends TestCase
{
    const CARDS = array(2, 3, 4, 5, 6, 7, 8, 9, 10, "Jack", "Queen", "King", "Ace");
    const CARDS_SET = array("total" => 0);

    public function testrandomize_jack()
    {
        $card_jack = randomize(self::CARDS, self::CARDS_SET, 9 );
        $this-> assertContains(10, $card_jack);
    }
    public function testrandomize_queen ()
    {
        $card_queen = randomize(self::CARDS, self::CARDS_SET, 10 );
        $this-> assertContains(10, $card_queen);
    }
    public function testrandomize_king ()
    {
        $card_king = randomize(self::CARDS, self::CARDS_SET, 11 );
        $this-> assertContains(10, $card_king);
    }
    public function testrandomize_ace ()
    {
        $card_ace = randomize(self::CARDS, self::CARDS_SET, 12 );
        $this-> assertContains(11, $card_ace);
    }
    public function testcards_gen()
    {
        $card = cards_gen(self::CARDS, self::CARDS_SET);
        $this-> assertArrayHasKey("total", $card);
    }
    public function testcards_gen_length()
    {
        $array_length = sizeof(cards_gen(self::CARDS, self::CARDS_SET));
        $this-> assertEquals(3, $array_length);
    }
    public function testthird_card_length()
    {
        $two_cards = array(2, 10, "total" => 12);
        $three_cards = third_card(self::CARDS, $two_cards);
        $this-> assertEquals(4, sizeof($three_cards));
    }
    public function testthird_card_length_2cards_return()
    {
        $two_cards = array(4, 10, "total" => 14);
        $three_cards = third_card(self::CARDS, $two_cards);
        $this-> assertEquals(3, sizeof($three_cards));
    }
}