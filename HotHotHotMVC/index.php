<?php

require 'Core/Autoload.php';

$S_controller = isset($_GET['url']) ? $_GET['url'] : null;
$S_action = isset($_GET['action']) ? $_GET['action'] : null;

View::openBuffer();
$S_url = isset($_GET['url']) ? $_GET['url'] : null;
$A_parameters = isset($_POST) ? $_POST : null;

try
{
    $O_controller = new Controller($S_url, $A_parameters);
    $O_controller->execute();
}
catch (ControllerException $O_exception)
{
    echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
}

$contentToDisplay = View::getBufferContent();


View::show('gabarit', array('body' => $contentToDisplay));