<?php
declare(strict_types=1);
final class Challenge
{

// draw function is to get random number of cards, e.g. if limit = 3 then you will get 3 rendom cards, 
//where cards is an array of range from 0, n but in our case we will be using 0 to 51 cards
    public function draw($cards,$limit){
        $counter = 1;
        foreach($cards as $card){
            //initialise an array to determine suit of the card I am assuming initially the cards will be like below
            // 0-12 clubs, 13-25 diamonds, 26-38 hearts, 39-51 spades 
            $get_suit = array(0=>"c",1=>"d",2=>"h",3=>"s");
            //initialise an array to determine special character cards I am assuming initially the cards will be like below
            // 0 means Ace, 10 means Jack, 11 means Queen, and 12 means King 
            $get_alphabet = array(0=>"A",10=>"J",11=>"Q",12=>"K");
            //getting the card's by using mathematical formula, e.g. 14 should be 2 of diamond
            // 14/13 = 1 & 1 is diamond
            $suit = $get_suit[intval($card/13)];
            //checking whether the card is special character card or not, 
            // e.g. 25 should be King of diamond, 25 - 13*1 = 12 and 12 stands for King
            $BigCard = $get_alphabet[$card - 13*(intval($card/13))];
            //adding random card's suits in a separate array to write less code in the next function.
            $suits[] = $suit;
            //adding random card value in separate array to write less code in the next function
            //important: $card+1 is to adjust the 0 in the range
            //e.g. 14 number card will become 15 it will help us in next function 
            //because in the next function we are just checking the range so it's easier to keep the numbers in numerics
            $allCards[] = $card+1;
            //it will combine card and suits together, looks good!!
            $cardsWithSuits[] = ( $BigCard !="" ? $BigCard.$suit : ($card - 13*(intval($card/13))+1).$suit );
            if($counter==$limit){
                return array("allCards" => $allCards,"suits" => $suits,"cardsWithSuits" => $cardsWithSuits);
            }
            $counter++;
        }
    }
    
    
    public static function f($c,$s) : string {
        return ((array_values($c)==range($c[0],$c[4]))?((count(array_unique($s))==1)?"Straight Flush":"Straight"):"N/A");
    }

}

$total_cards = range(0,51);
shuffle($total_cards);

$output =  Challenge::draw($total_cards, 5);

echo "<pre>";
echo "<h1>RANDOM FIVE CARDS ARE</h1><br/>";
print_r($output["cardsWithSuits"]);

$cards = $output["allCards"];
$suits = $output["suits"];

echo "<h1>Straight Flush/Straight Check?</h1><br/>";

echo Challenge::f($cards,$suits);

echo "<h1>FORCED STRAIGHT FLUSH USING 9c, 10c, Jc, Qc, Kc</h1><br/>";

print_r(Challenge::draw(array(8,9,10,11,12), 5)["cardsWithSuits"]);

echo Challenge::f(array(8,9,10,11,12),array("c","c","c","c","c"));

echo "<h1>FORCED STRAIGHT USING 1s, 2s, 3c, 4d, 5c </h1><br/>";

echo Challenge::f(array(1,2,3,4,5),array("s","s","c","d","c"));

?>
