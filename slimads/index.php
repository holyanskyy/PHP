<?php

// SETUP
//enable on-demand class loader
require_once 'vendor/autoload.php';

DB::$user = 'slimads';
DB::$password = 'CmwfdfLGMNqMKpmd';
DB::$dbName = 'slimads';
// for MAC OSX - DB::$host = '127.0.0.1';

DB::$error_handler = 'sql_error_handler';
DB::$nonsql_error_handler = 'nonsql_error_handler'; // could not connect to server

function sql_error_handler($params) {
  echo "Error: " . $params['error'] . "<br>\n";
  echo "Query: " . $params['query'] . "<br>\n";
  die; // don't want to keep going if a query broke
}

function nonsql_error_handler($params) {
  echo "Error: " . $params['error'] . "<br>\n";
  
  die; // don't want to keep going if a query broke
}
 
// instantiate Slim - router in front controller (this file)
// Slim creation and setup
$app = new \Slim\Slim(array(
    'view' => new \Slim\Views\Twig()
        ));

$view = $app->view();
$view->parserOptions = array(
    'debug' => true,
    'cache' => dirname(__FILE__) . '/cache'
);
$view->setTemplatesDirectory(dirname(__FILE__) . '/templates');

// global condition

\Slim\Route::setDefaultConditions(array(
    'name' =>'[a-zA-Z_]+'
    
));

// END SETUP

$app->get('/', function() use ($app){
  
    $adList=DB::query('SELECT * from ad');
    $app->render('index.html.twig', array('adList' => $adList));
   
});

$app->get('/postad', function() use ($app){ // get method - FIRTS SHOW
    $app->render('postad.html.twig');
});

$app->post ('/postad', function() use ($app){ // post method - SUBMISSION
    $message = $app->request->post('msg'); // PHP Slim way
    $price = $app->request->post('price'); // PHP Slim way
    $contactEmail = $app->request->post('contactEmail'); // PHP Slim way
    // $name = $_POST['name']: - pure PHP way - NOT recommended
    
    $valueList = array(
        'msg' => $message, 
        'price' => $price, 
        'contactEmail' => $contactEmail);
    
    $errorList = array();
    if ((strlen($message)<5)||(strlen($message)>300)) {
        array_push($errorList, "Message text must be at least 5 characters and no longer that 300 characters long"); 
        unset($valueList['msg']);
    }
    if (($price=="") || (!is_numeric($price)) || ($price<0) || ($price>1000000)) {
        array_push($errorList, "Price must be between 0 and 1 000 000"); 
        unset($valueList['price']);
    }
    
     if (filter_var($contactEmail, FILTER_VALIDATE_EMAIL) ===FALSE)  {
        array_push($errorList, "Email does not look like valid email"); 
        
    }
    
    if ($errorList) {
        // State 3: stage failed
        
        $app->render('postad.html.twig', array (
            'errorList' => $errorList,
            'v' =>$valueList
        ));
    } else {
        $app->render('postad_success.html.twig', array ('message' => $message, 'price' => $price, 'email' => $contactEmail));
        DB::insert('ad', 
       array(
        'msg'=> $message,
        'price'=>$price,
        'contactEmail'=>$contactEmail  
       ));
        
    }
});

// EDIT

$app->get('/postad/:ID', function($ID) use ($app){ // get method - FIRTS SHOW
    $ad=DB::queryFirstRow('SELECT * FROM ad WHERE ID=%s', $ID);
    $app->render('postad.html.twig'); 
    
});
 
 



$app->run();