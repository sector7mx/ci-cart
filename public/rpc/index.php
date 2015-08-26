<?php

// inclue the various view classes
include('views.php');
include('actions.php');

// work out what format they want
$accept = explode(',', $_SERVER['HTTP_ACCEPT']);
if($accept[0] == 'text/html') {
    $view = new HtmlView();
} elseif($accept[0] == 'text/xml') {
    $view = new XmlView();
} else {
    $view = new JsonView();
}

// route the request (filter input!)
$action = $_GET['action'];
$library = new Actions();
// OBVIOUSLY you would filter input at this point
$data = $library->$action($_GET);

// output appropriately
$view->render($data);
