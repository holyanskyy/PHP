<?php

// SETUP
//enable on-demand class loader
require_once 'vendor/autoload.php';

// MONOLOG logger for errors
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));

DB::$user = 'slimads';
DB::$password = 'CmwfdfLGMNqMKpmd';
DB::$dbName = 'slimads';
// for MAC OSX - DB::$host = '127.0.0.1';

DB::$error_handler = 'sql_error_handler';
DB::$nonsql_error_handler = 'nonsql_error_handler'; // could not connect to server

function sql_error_handler($params) {
    global $app, $log;
  $log->error("SQL error: " . $params['error']);
  $log->error(" in query: " . $params['query']);
  http_response_code(500);
  $app->render('error_internal.html.twig');
  die; // don't want to keep going if a query broke
}

function nonsql_error_handler($params) {
    global $app, $log;
  $log->error("Database error: " . $params['error']);
  http_response_code(500);
  $app->render('error_internal.html.twig');
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
    'id' =>'\d+'
    
));

// END SETUP

$app->get('/', function() use ($app){
  
    $adList=DB::query('SELECT * from ad');
    $app->render('index.html.twig', array('adList' => $adList));
   
});
// FIRST SHOW
/*
$app->get('/postad', function() use ($app){ // get method - FIRTS SHOW
    $app->render('postad.html.twig');
});
 * */
 

$app->post ('/postad(/:id)', function($id='') use ($app, $log){ // post method - SUBMISSION AND (/:id) IS an optional parameter
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
        //unset($valueList['msg']);
    }
    if (($price=="") || (!is_numeric($price)) || ($price<0) || ($price>1000000)) {
        array_push($errorList, "Price must be provided and between 0 and 1 000 000"); 
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
        // Stage 2: successfull submission
        if ($id==='') {
        DB::insert('ad', 
       array(
        'msg'=> $message,
        'price'=>$price,
        'contactEmail'=>$contactEmail   
         
       ));
        
        $id = DB::insertId();
        $log->debug("Ad created with ID =".$id);
        
        
        } else {
            DB::update('ad', 
       array(
        'msg'=> $message,
        'price'=>$price,
        'contactEmail'=>$contactEmail 
        ),
                    
          'ID=%s', $id); 
            
            
          $log->debug("Ad updated with ID =".$id);
        }
        $app->render('postad_success.html.twig', array(
            'msg' => $message,
            'price' => $price,
            'contactEmail' => $contactEmail
        ));
    }
});


$app->get('/postad(/:id)', function($id = '') use ($app) {
    if ($id === ''){
        $app->render('postad.html.twig');
        return;
    }
    
   $ad = DB::queryOneRow('SELECT * FROM ad WHERE ID=%d', $id); 
   if (!$ad) {
        $app->render('editad_notfound.html.twig');
   } else {
       $app->render('postad.html.twig', array('v' =>$ad));
   }
});



$app->run();