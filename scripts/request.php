<?php

//printf('Name: %s' . PHP_EOL, $entity->getName());
//printf('Type: %s' . PHP_EOL, EntityType::name($entity->getType()));
//printf('Salience: %s' . PHP_EOL, $entity->getSalience());
//printf('Wikipedia URL: %s' . PHP_EOL, $entity->getMetadata()->offsetGet('wikipedia_url'));

//if (isset($_GET)) {
//    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
//}

use Google\Cloud\Language\V1\Document;
use Google\Cloud\Language\V1\Document\Type;
use Google\Cloud\Language\V1\LanguageServiceClient;
use Google\Cloud\Language\V1\Entity\Type as EntityType;

// ##################################################
// PROCESSING SENTENCE REQUEST
if (isset($_GET['sentence'])) {

    // ##################################################
    // INCLUDES, NATURAL LANGUAGE PROCESSING API SETUP
    putenv("GOOGLE_APPLICATION_CREDENTIALS=/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json");

    // Load the API
    require '/home3/hsnkwamy/public_html/vendor/autoload.php';

    // Connect to database
    $conn = mysqli_connect('hsn.kwa.mybluehost.me', 'hsnkwamy', '8Rd23K*%', 'hsnkwamy_conVo');



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

            // Filter results based on entity type
            $type = strtolower(EntityType::name($entity->getType()));
            if ($type != 'event' && $type != 'consumer_good' && $type != 'organization' && $type != 'person') {
                continue;
            }

            // Add to return array
            $return['value'][] = array(
                'string' => $entity->getName(),
                'id' => uniqid(),
                'type' => EntityType::name($entity->getType()),
                'salience' => $entity->getSalience());
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

    // Invalid keyword id
    if (!$_GET['id']) {
        exit(1);
    }


    // ##################################################
    // WEB SCRAPE PROCESSED ENTITIES

    if (isset($_GET['test'])) {

        // Library to process scraped HTML
        require 'simple_html_dom.php';

        // Begin curl request
        $curl = curl_init();

        // Set curl parameters
        curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=" . str_replace(' ', '+', $_GET['keyword']));
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        // Execute curl request, close
        $result = curl_exec($curl);
        curl_close($curl);

//        echo $result;

        // Filter html
        $dom_results = new simple_html_dom();
        $dom_results->load($result);

        // Get paragraph elements
        $i = 0;
        foreach($dom_results->find('.BNeawe.s3v9rd.AP7Wnd') as $par) {
            if ($i > 3) {
                break;
            }
            $i++;
            echo $par->plaintext . '<br/>';
        }
    } else {
        // Response to app
        echo json_encode(array('id' => $_GET['id'], 'keyword' => $_GET['keyword']));
    }
}
