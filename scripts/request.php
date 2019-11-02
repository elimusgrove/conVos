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

use Google\Cloud\Language\V1\Document;
use Google\Cloud\Language\V1\Document\Type;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\Entity\Type as EntityType;

// ##################################################
// PROCESSING SENTENCE REQUEST
if (isset($_GET['sentence'])) {

    // Create the Natural Language client
    $languageServiceClient = new LanguageServiceClient();

    // ##################################################
    // PROCESS QUERY STRING

    // Build array to be returned
    $return = array('value' => array());
    try {
        // Create a new Document, add text as content and set type to PLAIN_TEXT
        $document = (new Document())
            ->setContent($_GET['sentence'])
            ->setType(Type::PLAIN_TEXT);

        // Call the analyzeEntities function
        $response = $languageServiceClient->analyzeEntities($document, []);
        $entities = $response->getEntities();

        // Loop over entities
        foreach ($entities as $entity) {
            if ($entity->getMetadata()->offsetExists('wikipedia_url')) {
                // Generate unique id
                $id = str_replace('.', '', strval(microtime(true)));

                // Add to return array
                $return['value'][] = array(
                    'word' => $entity->getName(),
                    'id' => $id);
//                    'type' => EntityType::name($entity->getType()),
//                    'salience' => $entity->getSalience(),
//                    'wiki' => $entity->getMetadata()->offsetGet('wikipedia_url'));
            }
        }
    } finally {
        $languageServiceClient->close();
    }

    // ##################################################
    // RETURN KEYWORDS
    echo json_encode($return);
}


// ##################################################
// PROCESSING KEYWORD REQUEST
if (isset($_GET['keyword'])) {
    echo json_encode(array("This is not a supported feature yet."));
    exit(1);
}

//$return = array();
//foreach ($entities as $entity) {
//    $return[] = $entity->getName();
//}
//
//echo json_encode(array('string' => $return));

// ##################################################
// WEB SCRAPE PROCESSED ENTITIES

// Sort entities by salience
//$salience = array_column($to_process, 'salience');
//array_multisort($salience, SORT_DESC, $to_process);
//
//// Loop over entities
//foreach ($to_process as $entity => $values) {
//
//    $xml = file_get_contents("http://en.wikipedia.org/w/api.php?action=query&list=search&srsearch=" . $_GET['string']);
//    var_dump($xml);
//}
