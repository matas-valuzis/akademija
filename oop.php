<?php

require_once "Page.php";
require_once "DataFetcher.php";

use OOP\Page;
use OOP\DataFetcher;

$page = new Page(DataFetcher::fetchArticles());
$page->PrintPage();