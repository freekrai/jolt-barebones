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

if( $app->option('simperium.enabled') != false ){
	$simperium = new Simperium\Simperium( $app->option('simperium.appid'), $app->option('simperium.token') );
	//	store our Simperium client in our session store...
	$app->store('simperium',$simperium);
}

if( $app->option('pusher.enabled') != false ){
	$pusher = new Pusher(
		$app->option('pusher.key'),
		$app->option('pusher.secret'),
		$app->option('pusher.appid')
	);

	//	store our Pusher client in our session store...
	$app->store('pusher',$pusher);
}


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