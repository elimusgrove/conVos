<?php

//if (isset($_GET)) {
//    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
//}

namespace Google\Cloud\Samples\Auth;
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

// Imports the Cloud Storage client library.
use Google\Cloud\Storage\StorageClient;

# Explicitly use service account credentials by specifying the private key
# file.
$config = [
    'keyFilePath' => "/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json",
    'projectId' => "siributworse-1572669643321",
];
$storage = new StorageClient($config);

# Make an authenticated API request (listing storage buckets)
foreach ($storage->buckets() as $bucket) {
    printf('Bucket: %s' . PHP_EOL, $bucket->name());
}
