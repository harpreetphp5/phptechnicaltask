<?php
declare(strict_types=1);
final class Challenge
{


    public function draw($cards,$limit){
        $counter = 1;
        foreach($cards as $card){
            $get_suit = array(0=>"c",1=>"d",2=>"h",3=>"s");
            $get_alphabet = array(0=>"A",10=>"J",11=>"Q",12=>"K");
            $suit = $get_suit[intval($card/13)];
            $BigCard = $get_alphabet[$card - 13*(intval($card/13))];
            $suits[] = $suit;
            $allCards[] = $card+1;
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