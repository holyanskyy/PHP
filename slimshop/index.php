<?php

session_start();
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

DB::$user = 'slimshop';
DB::$password = 'WRhM74AU6Lxetcas';
DB::$dbName = 'slimshop';
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
/*
\Slim\Route::setDefaultConditions(array(
    'id' =>'\d+'
    
));
*/
 

// END SETUP



$app->get('/', function() use ($app){
    $app->render('index.html.twig');
  
});

// State 1: First show
$app->get('/login', function() use ($app, $log){
    $app->render('login.html.twig');
});

// State 2: Submission
$app->post('/login', function() use ($app, $log){ // post method - SUBMISSION AND (/:id) IS an optional parameter
    echo "TODO";
   
 });
 
 // State 1: First show
$app->get('/logout', function() use ($app, $log){
    $app->render('logout.html.twig');
});

// State 2: Submission
$app->post('/logout', function() use ($app, $log){ // post method - SUBMISSION AND (/:id) IS an optional parameter
    echo "TODO";
   
 });

// State 1: First show
$app->get('/register', function() use ($app, $log){
    $app->render('register.html.twig');
});
// State 2: Submission

$app->post('/register', function() use ($app, $log){ // post method - SUBMISSION AND (/:id) IS an optional parameter
    $name = $app->request->post('name'); // PHP Slim way
    $email = $app->request->post('email'); // PHP Slim way
    $pass1 = $app->request->post('pass1'); // PHP Slim way
    $pass2 = $app->request->post('pass2'); // PHP Slim way
   
    
    $valueList = array(
        'name' => $name, 
        'email' => $email);
    
    $errorList = array();
    
    if (strlen($name) < 4) {
        array_push($errorList, "Name must be at least 4 characters long");
        unset($valueList['name']);
    }
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        array_push($errorList, "Email does not look like a valid email");
        unset($valueList['email']);
    } 
    if (!preg_match('/[0-9;\'".,<>`~|!@#$%^&*()_+=-]/', $pass1) 
            || (!preg_match('/[a-z]/', $pass1)) 
            || (!preg_match('/[A-Z]/', $pass1)) 
            || (strlen($pass1) < 8)) {
        array_push($errorList, "Password must be at least 8 characters " .
                "long, contain at least one upper case, one lower case, " .
                " one digit or special character");
    } else if ($pass1 != $pass2) {
        array_push($errorList, "Passwords don't match");
    }
    
    
    if ($errorList) {
        // State 3: stage failed
        
        $app->render('register.html.twig', array (
            'errorList' => $errorList,
            'v' =>$valueList
        ));
    } else {
        // Stage 2: successfull submission
       
        DB::insert('users', 
       array(
        'name'=> $name,
        'email'=>$email,
        'password'=>$pass1   
         
       ));
        
       //$log->debug("Ad created with ID =".$id);
        
                 
        $app->render('register_success.html.twig', array(
            'name' => $name,
            'email' => $email,
            'password' => $pass1
        ));
    }
});






$app->run();