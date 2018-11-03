<?php 

session_start();
require_once("vendor/autoload.php");
use Slim\Slim;
use Hcode\Page;
use Hcode\PageAdmin;
use \Hcode\Model\User;
use \Hcode\Model\Category;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
	$page = new Page();
	$page->setTpl("index");
});

$app->get('/admin', function() {

	User::verifyLogin();
	$pageAdmin = new PageAdmin();
	$pageAdmin->setTpl("index");
});

$app->get('/admin/login', function() {
	$pageLogin = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$pageLogin->setTpl("login");
});

$app->post('/admin/login', function() {
	User::login($_POST["login"], $_POST["password"]);
	header("Location: /admin");
	exit;
});

$app->get('/admin/logout', function() {
	User::logout();
	header("Location: /admin/login");
	exit;
});

// LISTAR: USERS
$app->get('/admin/users', function() {
	User::verifyLogin();
	$usuarios = User::listAll();
	$pageUsers = new PageAdmin();
	$pageUsers->setTpl("users", array(
		"users" => $usuarios
	));
});

// DELETE: users
$app->get('/admin/users/:iduser/delete', function($iduser) {
	User::verifyLogin();
	$user = new User();
	$user->get((int)$iduser);
	$user->delete();
	header("Location: /admin/users");
	exit;
});

// CREATE: users
$app->get('/admin/users/create', function() {
	User::verifyLogin();
	$pageUsers = new PageAdmin();
	$pageUsers->setTpl("users-create");
});

// UPDATE LIST: users
$app->get('/admin/users/:iduser', function($iduser) {
	User::verifyLogin();
	$user = new User();
	$user->get((int)$iduser);
	$pageUsers = new PageAdmin();
	$pageUsers->setTpl("users-update", array(
		"user" => $user->getValues()
	));
});

// CREATE: users
$app->post('/admin/users/create', function() {
	User::verifyLogin();
	$user = new User();
	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$user->setData($_POST);
	$user->save();

	header("Location: /admin/users");
	exit;
});

// UPDATE: users
$app->post('/admin/users/:iduser', function($iduser) {
	User::verifyLogin();
	$user = new User();
	$_POST["inadmin"] = (isset($_POST["inadmin"]))?1:0;
	$user->get((int)$iduser);
	$user->setData($_POST);
	$user->update();
	header("Location: /admin/users");
	exit;
});

$app->get('/admin/forgot', function() {
	$pageLogin = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$pageLogin->setTpl("forgot");
});

$app->post('/admin/forgot', function() {
	$user = User::getForgot($_POST["email"]);
	header("Location: /admin/forgot/sent");
	exit;
});

$app->get('/admin/forgot/sent', function() {
	$pageLogin = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$pageLogin->setTpl("forgot-sent");
});

$app->get('/admin/forgot/reset', function() {
	$user = User::validForgotDecrypt($_GET["code"]);

	$pageReset = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$pageReset->setTpl("forgot-reset", array(
		"name" => $user["desperson"],
		"code" => $_GET["code"]
	));
});

$app->post('/admin/forgot/reset', function() {
	$forgot = User::validForgotDecrypt($_POST["code"]);
	User::setForgotUsed($forgot["idrecovery"]);
	$user = new User();
	$user->get((int)$forgot["iduser"]);
	
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
		"cost" => 12
	]);

	$user->setPassword($password);

	$pageResetSuccess = new PageAdmin([
		"header" => false,
		"footer" => false
	]);
	$pageResetSuccess->setTpl("forgot-reset-success");
});

$app->get('/admin/categories', function() {
	User::verifyLogin();
	$categories = Category::listAll();

	$pageCategories = new PageAdmin();
	$pageCategories->setTpl("categories",[
		"categories" => $categories
	]);
});

$app->get('/admin/categories/create', function() {
	User::verifyLogin();
	$pageCategories = new PageAdmin();
	$pageCategories->setTpl("categories-create");
});

$app->post('/admin/categories/create', function() {
	User::verifyLogin();
	$category = new Category();
	$category->setData($_POST);
	$category->save();
	header("Location: /admin/categories");
	exit;
});

$app->get('/admin/categories/:idcategory/delete', function($idcategory) {
	User::verifyLogin();
	$category = new Category();
	$category->get((int)$idcategory);
	$category->delete();

	header("Location: /admin/categories");
	exit;
});

$app->get('/admin/categories/:idcategory', function($idcategory) {
	User::verifyLogin();
	$category = new Category();
	$category->get((int)$idcategory);
	$pageCategories = new PageAdmin();
	$pageCategories->setTpl("categories-update", [
		"category" => $category->getValues()
	]);
});

$app->post('/admin/categories/:idcategory', function($idcategory) {
	User::verifyLogin();
	$category = new Category();
	$category->get((int)$idcategory);
	$category->setData($_POST);
	$category->save();

	header("Location: /admin/categories");
	exit;
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

$app->run();

?>