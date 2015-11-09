<?php
namespace OOP;

require_once "Bid.php";

class Product {
    private $name;
    private $price;
    private $bids;

    public function __construct($name = "", $price = "", $bids = []){
        $this->name = $name;
        $this->price = $price;
        $this->bids = $bids;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @param string $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * @param Bid $bid
     */
    public function addBid(Bid $bid){
        $this->bids[] = $bid;
    }
    /**
     * @return array
     */
    public function getBids(){
        return $this->bids;
    }
    public function getWinnerBid(){
        $imax = -1;
        $max = -1;
        $size = count($this->bids);
        for ($i = 0; $i < $size; $i++){
            if ($max < $this->bids[$i]->getValue()){
                $max = $this->bids[$i]->getValue();
                $imax = $i;
            }
        }
        return $imax;
    }
}