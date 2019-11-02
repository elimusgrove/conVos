<?php

//if (isset($_GET)) {
//    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
//}

//// Includes the autoloader for libraries installed with composer
require '/home3/hsnkwamy/public_html/vendor/autoload.php';
//
//// Imports the Google Cloud client library
//use Google\Cloud\Language\LanguageClient;
//$language = new LanguageClient(['keyFile' => json_decode(file_get_contents("/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json"), true)]);
//
//// The text to analyze
//$text = $_GET['string'];
//
//// Detects the sentiment of the text
//$annotation = $language->analyzeSentiment($text);
//$sentiment = $annotation->sentiment();
//
//echo 'Text: ' . $text . '
//Sentiment: ' . $sentiment['score'] . ', ' . $sentiment['magnitude'];

use Google\Cloud\Language\V1\Document;
use Google\Cloud\Language\V1\Document\Type;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\Entity\Type as EntityType;

$languageServiceClient = new LanguageServiceClient(['keyFile' => json_decode(file_get_contents("/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json"), true)]);

//$text = $_GET['string'];
//try {
//    // Create a new Document, add text as content and set type to PLAIN_TEXT
//    $document = (new Document())
//        ->setContent($text)
//        ->setType(Type::PLAIN_TEXT);
//
//    // Call the analyzeEntities function
//    $response = $languageServiceClient->analyzeEntities($document, []);
//    $entities = $response->getEntities();
//    // Print out information about each entity
//    foreach ($entities as $entity) {
//        printf('Name: %s' . PHP_EOL, $entity->getName());
//        printf('Type: %s' . PHP_EOL, EntityType::name($entity->getType()));
//        printf('Salience: %s' . PHP_EOL, $entity->getSalience());
//        if ($entity->getMetadata()->offsetExists('wikipedia_url')) {
//            printf('Wikipedia URL: %s' . PHP_EOL, $entity->getMetadata()->offsetGet('wikipedia_url'));
//        }
//        if ($entity->getMetadata()->offsetExists('mid')) {
//            printf('Knowledge Graph MID: %s' . PHP_EOL, $entity->getMetadata()->offsetGet('mid'));
//        }
//        printf(PHP_EOL);
//    }
//} finally {
//    $languageServiceClient->close();
//}