<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2015.11.09
 * Time: 21:58
 */

namespace OOP;

require_once "Article.php";

class Page{
    private $articles;

    public function __construct($articles = []){
        $this->articles = $articles;
    }

    public function PrintPage(){
        foreach($this->articles as $article){
            $winner = -1;
            if ($article->isEnded()){
                $winner = $article->getProduct()->getWinnerBid();
                $date = "<p>Ended {$article->getEndDate()}</p>";
            }
            else{
                $date = "<p>Ends {$article->getEndDate()}</p>";
            }

            echo "<dl>";
            echo "<dt>{$article->getProduct()->getName()}</dt>
                    <dd><p>{$article->getAnnotation()}</p>
                    <p>Price: {$article->getProduct()->getPrice()}&euro;</p>
                    {$date}
                    <p><ul>";
            $i = 0;
            foreach($article->getProduct()->getBids() as $bid){
                $sold = "";
                if ($i == $winner){
                    $sold = "; Sold";
                }

                echo "
                    <li>{$bid->getBidder()->getLastName()}; {$bid->getValue()}&euro;; {$bid->getDate()}{$sold}</li>
                ";
                $i++;
            }
            echo

            "</ul></p></dd>";
        }
    }
}