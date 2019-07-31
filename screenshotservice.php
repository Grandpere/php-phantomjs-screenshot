<?php

require __DIR__.'/vendor/autoload.php';

use JonnyW\PhantomJs\Client;
use JonnyW\PhantomJs\DependencyInjection\ServiceContainer;

if(!isset($_GET['id'])) {
    echo 'id not found in url';
}
else {
    $id = $_GET['id'];
    $postUrl = 'https://www.instagram.com/p/'.$id.'/';

    $location = 'custom_scripts';
    $serviceContainer = ServiceContainer::getInstance();
    $procedureLoader = $serviceContainer->get('procedure_loader_factory')
        ->createProcedureLoader($location);

    $client = Client::getInstance();
    // $client->getProcedureCompiler()->clearCache();
    $client->getProcedureLoader()->addLoader($procedureLoader);
    $width  = 1440;
    $height = 900;

    $request = $client->getMessageFactory()->createCaptureRequest($postUrl, 'GET', 2000);
    $file = 'screenshots/'.$id.'.jpg';
    $request->setOutputFile($file);
    $request->setViewportSize($width, $height);
    $request->setCaptureDimensions($width, $height);

    $response = $client->getMessageFactory()->createResponse();
    $client->send($request, $response);

    if($response->getStatus() != 200) {
        echo "Unable to load the address!";
    }
    else {
        echo '<img src="'.$file.'" alt="capture d\'écran du post'.$id.'">';
        // echo '<a href="./'.$file.'">Télécharger la capture d\'écran</a>';
    }
}