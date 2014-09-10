<?php
$_GET['route'] = isset($_GET['route']) ? '/'.$_GET['route'] : '/';

// Check for composer installed
if (file_exists('vendor/autoload.php')){
	include_once('vendor/autoload.php');
}else{
	echo '{"error":"Composer Install"}';
	header('HTTP/1.1 500 Internal Server Error', true, 500);
	return False;
}

include("core/system/runtime.php");

$app = new Jolt\Jolt();
$app->option('source', 'config.ini');


//	home page --------------------------------------------------------------------------------------------

$app->get('/', function() use ($app){
	$app->render( 'home', array(),'layout' );
});

//	404 page  --------------------------------------------------------------------------------------------
$app->get('.*',function() use ($app){
	$app->error(404, $app->render('404',  array(
		"pageTitle"=>"404 Not Found",
	),'layout'));
});

$app->listen();