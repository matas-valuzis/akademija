<?php
namespace OOP;

require_once "Product.php";

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
