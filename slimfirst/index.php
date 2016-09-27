<?php

//enable on-demand class loader
require_once 'vendor/autoload.php';

DB::$user = 'slimfirst';
DB::$password = 'ht7fa3fBSYCbTPZm';
DB::$dbName = 'slimfirst';
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

$app->get('/', function() use ($app){
    echo "Welcome to Slim";
    $personList=DB::query('SELECT * from person');
    $app->render('index.html.twig', array('personList' => $personList));
    /*echo '<pre>\n';
    print_r($personList);
    echo'</pre>\n';*/
});

$app->get('/sayhello', function() use ($app){ // get method - FIRTS SHOW
    $app->render('sayhello.html.twig');
});

$app->post ('/sayhello', function() use ($app){ // post method - SUBMISSION
    $name = $app->request->post('name'); // PHP Slim way
    $age = $app->request->post('age'); // PHP Slim way
    // $name = $_POST['name']: - pure PHP way - NOT recommended
    
    $valueList = array('name' => $name, 'age' => $age);
    
    $errorList = array();
    if (strlen($name)<2) {
        array_push($errorList, "Name must be at least 2 characters"); 
        unset($valueList['name']);
    }
    if ($age == "") {
        array_push($errorList, "Age must be provided");
    }
    elseif (($age<0) || ($age>150)) {
        array_push($errorList, "Age must be at least 2 characters"); 
        unset($valueList['age']);
    }
    if ($errorList) {
        // State 3: stage failed
        
        $app->render('sayhello.html.twig', array (
            'errorList' => $errorList,
            'v' =>$valueList
        ));
    } else {
        $app->render('sayhello_success.html.twig', array ('name' => $name, 'age' => $age));
        
    }
});


$app->get('/hello/:name', function ($name) {
    echo "Hello, " . $name;
});


$app->get('/hello/:name/:age', function ($name, $age) use ($app){ // url match
   $app->render('hello.html.twig', 
       array(
        'personName'=> $name, 
        'personAge'=>$age
       ));
   DB::insert('person', 
       array(
        'name'=> $name,
        'age'=>$age
       ));
})->conditions(array('age'=>'\d+'));


$app->get('/hello/:name/:age', function ($name, $city) {
    echo "Hello, " . $name. " You are from ". $city;
});


$app->run();