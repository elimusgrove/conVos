<?php

//printf('Name: %s' . PHP_EOL, $entity->getName());
//printf('Type: %s' . PHP_EOL, EntityType::name($entity->getType()));
//printf('Salience: %s' . PHP_EOL, $entity->getSalience());
//printf('Wikipedia URL: %s' . PHP_EOL, $entity->getMetadata()->offsetGet('wikipedia_url'));

//if (isset($_GET)) {
//    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
//}


// ##################################################
// INCLUDES, NATURAL LANGUAGE PROCESSING API SETUP
putenv("GOOGLE_APPLICATION_CREDENTIALS=/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json");

require '/home3/hsnkwamy/public_html/vendor/autoload.php';
require 'simple_html_dom.php';

use Google\Cloud\Language\V1\Document;
use Google\Cloud\Language\V1\Document\Type;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\Entity\Type as EntityType;

// Create the Natural Language client
$languageServiceClient = new LanguageServiceClient();


// ##################################################
// PROCESS QUERY STRING

// Build array to be returned
$to_process = array();
try {
    // Create a new Document, add text as content and set type to PLAIN_TEXT
    $document = (new Document())
        ->setContent($_GET['string'])
        ->setType(Type::PLAIN_TEXT);

    // Call the analyzeEntities function
    $response = $languageServiceClient->analyzeEntities($document, []);
    $entities = $response->getEntities();

    // Loop over entities
    foreach ($entities as $entity) {
        if ($entity->getMetadata()->offsetExists('wikipedia_url')) {
            $to_process[] = array(
                'word' => $entity->getName(),
                'type' => EntityType::name($entity->getType()),
                'salience' => $entity->getSalience(),
                'wiki' => $entity->getMetadata()->offsetGet('wikipedia_url'));
        }
    }
} finally {
    $languageServiceClient->close();
}


// ##################################################
// WEB SCRAPE PROCESSED ENTITIES

// Loop over entities
foreach ($to_process as $entity => $values) {
    echo $values . PHP_EOL;
    echo PHP_EOL;
}
