<?php

//if (isset($_GET)) {
//    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
//}

putenv("GOOGLE_APPLICATION_CREDENTIALS=/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json");

// Includes the autoloader for libraries installed with composer
require '/home3/hsnkwamy/public_html/vendor/autoload.php';

// Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;
$language = new LanguageClient();

// The text to analyze
$text = $_GET['string'];

// Detects the sentiment of the text
$annotation = $language->analyzeSentiment($text);
$sentiment = $annotation->sentiment();

echo 'Text: ' . $text . '
Sentiment: ' . $sentiment['score'] . ', ' . $sentiment['magnitude'];

// ['keyFile' => json_decode(file_get_contents("/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json"), true)]