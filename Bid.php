<?php
namespace OOP;


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

require_once "User.php";