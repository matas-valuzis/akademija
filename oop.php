<?php

class User 
{
	private $name;
    private $last_name;
    private $email;
    private $gender;

	
	public function __construct($name = "", $last_name = "", $email = "", $gender = ""){
		$this->name = $name;
		$this->last_name = $last_name;
		$this->email = $email;
		$this->gender = $gender;
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
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }



}

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

    public function addBid(Bid $bid){
        $this->bids[] = $bid;
    }
    public function getBids(){
        return $this->bids;
    }
    public function getWinnerBid(){
        $imax = -1;
        $max = -1;
        for ($i = 0; $i < count($this->bids); $i++){
            if ($max < $this->bids[$i]->getValue()){
                $max = $this->bids[$i]->getValue();
                $imax = $i;
            }
        }
        return $imax;
    }
}

class Bid {
    private $bidder;
    private $value;
    private $date;

    public function __construct(User $bidder = null, $value=null, $date = null){
        $this->bidder = $bidder;
        $this->value = $value;
        $this->date = $date;
    }

    /**
     * @return User
     */
    public function getBidder()
    {
        return $this->bidder;
    }

    /**
     * @param User $bidder
     */
    public function setBidder($bidder)
    {
        $this->bidder = $bidder;
    }

    /**
     * @return null
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param null $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param null $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }


}

class Article {
    private $product;
    private $end_date;
    private $annotation;
    private $ended;

    public function __construct(Product $product = null, $annotation = "", $end_date=null, $ended = false){
        $this->product = $product;
        $this->annotation = $annotation;
        $this->end_date = $end_date;
        $this->ended = $ended;
    }

    /**
     * @return boolean
     */
    public function isEnded()
    {
        return $this->ended;
    }

    /**
     * @param boolean $ended
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;
    }

    /**
     * @return string
     */
    public function getAnnotation()
    {
        return $this->annotation;
    }

    /**
     * @param string $annotation
     */
    public function setAnnotation($annotation)
    {
        $this->annotation = $annotation;
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return null
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param null $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }
}

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

class DataFetcher{

    public static function fetchArticles(){
        $bert = new User("Bert", "Rose", "rose@phoroneus.com", 'female');
        $rush = new User("Rush", "Tommy", "rush@chronos.com", 'male');
        $howard = new User("Miguel", "Howard", "howard@aurigae.com", 'male');

        $bids = [
            new Bid($bert, 12, '2015-10-25 12:22'),
            new Bid($rush, 13, '2015-10-26 9:13'),
            new Bid($bert, 15.50, '2015-10-26 15:00'),
        ];
        $bids2 = [
            new Bid($howard, 140, '2015-10-28 13:58'),
            new Bid($rush, 155, '2015-10-29 9:13'),
        ];
        $bids3 = [
            new Bid($howard, 10, '2015-10-28 13:58'),
            new Bid($rush, 15, '2015-10-29 9:13'),
            new Bid($bert, 20, '2015-10-29 15:00'),
        ];
        $bids4 = [
            new Bid($howard, 12, '2015-10-28 13:58'),
            new Bid($rush, 13, '2015-10-29 9:13'),
            new Bid($howard, 14, '2015-10-29 13:58'),
            new Bid($rush, 15, '2015-10-30 9:13'),
        ];
        $bids5 = [
            new Bid($howard, 99, '2015-10-28 13:58'),
            new Bid($rush, 111, '2015-10-29 9:13'),
            new Bid($bert, 333, '2015-10-29 15:00'),
        ];

        $product = new Product("Gold Watch", 10, $bids);
        $product2 = new Product("Linen Jacket", 135, $bids2);
        $product3 = new Product("Woollen Jacket", 5, $bids3);
        $product4 = new Product("Waterproof Watch", 10, $bids4);
        $product5 = new Product("Silver Watch", 98, $bids5);
        $annotation = "New with tags: A brand-new, unused, and unworn item (including handmade items) in the original packaging
            (such as the original box or bag) and/or with the original tags attached.";
        $annotation2 = "It has a smooth chalk stripe pattern which gives the suit a refined look. The 6 buttons of his double
            breasted jacket are all buttoned up with the exception of one, it adds a casual touch to an elegant look.<br>
            The jacket is the same length all around, it has vents at either side, there's a pocket on either side and there's
            a breast pocket which contains a stylish pocket square.";

        $article = new Article($product, $annotation, "2015-10-26 15:45", true);
        $article2 = new Article($product2, $annotation2, "2015-10-29 12:00");
        $article3 = new Article($product3, $annotation2, "2015-10-26 12:00", true);
        $article4 = new Article($product4, $annotation, "2015-10-26 12:00");
        $article5 = new Article($product5, $annotation, "2015-10-26 12:00", true);

        return [$article, $article2, $article3, $article4, $article5];
    }
}

$page = new Page(DataFetcher::fetchArticles());
$page->PrintPage();