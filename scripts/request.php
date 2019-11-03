<?php

// TODO: Insert into database on receiving a sentence
// TODO: Update database when receiving the keywords

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
            if ($type == 'other') {
                continue;
            }

            // Add to return array
            $return['value'][] = array(
                'string' => $entity->getName(),
                'id' => uniqid(),
                'type' => EntityType::name($entity->getType()));
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
else if (isset($_GET['keyword'])) {

    // Invalid keyword id
    if (!$_GET['id']) {
        exit(1);
    }


    // ##################################################
    // WEB SCRAPE PROCESSED ENTITIESt

    // Library to process scraped HTML
    if (isset($_GET['test'])) {
        require 'simple_html_dom.php';

        $url = "https://www.google.com/search?q=" . str_replace(' ', '+', $_GET['keyword']);
        $html = file_get_html($url);
//        echo $html;

        // Get paragraph elements
        $return = array('headlines' => array());
        foreach ($html->find('div.BNeawe div.s3v9rd div.AP7Wnd') as $par) {
            $return['headlines'][] = $par->plaintext;
        }

        // Add id
        $return['id'] = $_GET['id'];

        // Return values to app
        echo json_encode($return);
    } else {
        echo json_encode(array('headlines'=>array('string'=>'Trump', 'id'=>'1')));
    }
}
