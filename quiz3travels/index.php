<?php

session_start();

// enable on-demand class loader
require_once 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('main');
$log->pushHandler(new StreamHandler('logs/everything.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('logs/errors.log', Logger::ERROR));

DB::$dbName = 'quiz3travels';
DB::$user = 'quiz3travels';
DB::$password = 'zXdAmqnjVAz4sjTK';
// DB::$host = '127.0.0.1'; // sometimes needed on Mac OSX
DB::$error_handler = 'sql_error_handler';
DB::$nonsql_error_handler = 'nonsql_error_handler';

function nonsql_error_handler($params) {
    global $app, $log;
    $log->error("Database error: " . $params['error']);
    http_response_code(500);
    $app->render('error_internal.html.twig');
    die;
}

function sql_error_handler($params) {
    global $app, $log;
    $log->error("SQL error: " . $params['error']);
    $log->error(" in query: " . $params['query']);
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


if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = array();
}

$app->get('/', function() use ($app) {    
    $app->render('index.html.twig',
            array('sessionUser' => $_SESSION['user']));
    
    if ($_SESSION['user']) {
    $bookingsList=DB::query('SELECT * from bookings');
    $app->render('index.html.twig', array('bookingsList' => $bookingsList));
    }
});



// State 1: first show
$app->get('/register', function() use ($app, $log) {
    $app->render('register.html.twig');
});
// State 2: submission
$app->post('/register', function() use ($app, $log) {
    $name = $app->request->post('name');
    $passport = $app->request->post('passport');
    $pass1 = $app->request->post('pass1');
    $pass2 = $app->request->post('pass2');
    $valueList = array ('name' => $name, 'passport' => $passport);
    // submission received - verify
    $errorList = array();
    
    if (strlen($name) < 4) {
        array_push($errorList, "Name must be at least 4 characters long");
        unset($valueList['name']);
    }
    if ((!preg_match('/[A-Z]/', $passport)) || (!preg_match('/[0-9]/', $passport)) || (strlen($passport) < 6)) {
        array_push($errorList, "Passport must be at least 6 characters " .
                "long, contain at least one upper case, one number");
        unset($valueList['passport']);
    } else {
        $user = DB::queryFirstRow("SELECT ID FROM passenger WHERE passport=%s", $passport);        
        if ($user) {
            array_push($errorList, "User with such passport already registered");
            unset($valueList['passport']);
        }
    }
    if (!preg_match('/[0-9;\'".,<>`~|!@#$%^&*()_+=-]/', $pass1) || (!preg_match('/[a-z]/', $pass1)) || (!preg_match('/[A-Z]/', $pass1)) || (strlen($pass1) < 8)) {
        array_push($errorList, "Password must be at least 8 characters " .
                "long, contain at least one upper case, one lower case, " .
                " one digit or special character");
    } else if ($pass1 != $pass2) {
        array_push($errorList, "Passwords don't match");
    }
    //
    if ($errorList) {
        // STATE 3: submission failed        
        $app->render('register.html.twig', array(
            'errorList' => $errorList, 'v' => $valueList
        ));
    } else {
        // STATE 2: submission successful
        DB::insert('passenger', array(
            'name' => $name, 'passport' => $passport, 'password' => $pass1
        ));
        $id = DB::insertId();
        $log->debug(sprintf("Passenger %s created", $id));
        $app->render('register_success.html.twig');
    }
});

// LOGIN

// State 1: first show
$app->get('/login', function() use ($app, $log) {
    $app->render('login.html.twig');
});
// State 2: submission
$app->post('/login', function() use ($app, $log) {
    $passport = $app->request->post('passport');
    $password = $app->request->post('password');
    $user = DB::queryFirstRow("SELECT * FROM passenger WHERE passport=%s AND password=%s", $passport, $password );    
    if (!$user) {
        $log->debug(sprintf("Passenger failed for passport %s from IP %s",
                    $passport, $_SERVER['REMOTE_ADDR']));
        $app->render('login.html.twig', array('loginFailed' => TRUE));
    } else {
        // password MUST be compared in PHP because SQL is case-insenstive
        if ($user['password'] == $password) {
            // LOGIN successful
            unset($user['password']);
            $_SESSION['user'] = $user;
            $log->debug(sprintf("User %s logged in successfuly from IP %s",
                    $user['ID'], $_SERVER['REMOTE_ADDR']));
            $app->render('login_success.html.twig');
        } else {
            $log->debug(sprintf("User failed for passport %s from IP %s",
                    $password, $_SERVER['REMOTE_ADDR']));
            $app->render('login.html.twig', array('loginFailed' => TRUE));            
        }
    }
});

$app->get('/logout', function() use ($app, $log) {
    $_SESSION['user'] = array();
    $app->render('logout_success.html.twig');
});


$app->get('/book', function() use ($app, $log) {
    $app->render('book.html.twig',
            array('sessionUser' => $_SESSION['user']));
    
});
// State 2: submission
$app->post('/book', function() use ($app, $log) {
    $fromAirport = $app->request->post('fromAirport');
    $toAirport = $app->request->post('toAirport');
    
    $valueList = array ('fromAirport' => $fromAirport, 'toAirport' => $toAirport);
    // submission received - verify
    $errorList = array();
    
     if ((!strlen($fromAirport) == 3) && 
             (!strlen($toAirport) == 3) &&
             (!preg_match('/[A-Z]/', $fromAirport)) &&
             (!preg_match('/[A-Z]/', $toAirport))
             ) {
        array_push($errorList, "Airport TO and FROM must be exactly 3 Uppercase letters");
        unset($valueList['fromAirport']);
        unset($valueList['$toAirport']);
    } else if ($fromAirport == $toAirport) {
        array_push($errorList, "Airport FROM and TO must be different");
    }
    
     DB::insert('bookings', 
       array(
        'passengerID'=> $_SESSION['user']['ID'],
        'fromAirport'=> $fromAirport,
        'toAirport'=>$toAirport
                    
       ));
     
     $id = DB::insertId();
     $log->debug("Booking created with ID =".$id);
     $app->render('book_success.html.twig');
    

    
});




$app->run();