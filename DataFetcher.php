<?php
/**
 * Created by PhpStorm.
 * User: Matas
 * Date: 2015.11.09
 * Time: 21:59
 */

namespace OOP;

require_once "User.php";
require_once "Bid.php";
require_once "Product.php";
require_once "Article.php";

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
