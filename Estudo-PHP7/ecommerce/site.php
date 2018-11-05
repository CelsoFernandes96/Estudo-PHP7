<?php

use Hcode\Page;
use Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

$app->get('/', function() {
	$page = new Page();
	$page->setTpl("index");
});

$app->get('/categories/:idcategory', function($idcategory) {
	$category = new Category();
	$category->get((int)$idcategory);
	$pageCategories = new Page();
	$pageCategories->setTpl("category", [
		"category" => $category->getValues(),
		"products" => []
	]);
});

?>