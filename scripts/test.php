<?php

if (isset($_GET)) {
    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
}

# Includes the autoloader for libraries installed with composer
require '/home3/hsnkwamy/public_html/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;
use Google\Cloud\Storage\StorageClient;

// Authenticating with keyfile data.
$storage = new StorageClient([
    'keyFile' => json_decode(file_get_contents('/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json'), true)
]);

// Authenticating with a keyfile path.
$storage = new StorageClient([
    'keyFilePath' => '/home3/hsnkwamy/public_html/vendor/SiriButWorse-0e5d6a5f7218.json'
]);

// Providing the Google Cloud project ID.
$storage = new StorageClient([
    'projectId' => 'SiriButWorse'
]);

# Your Google Cloud Platform project ID
$projectId = 'siributworse-1572669643321';

# Instantiates a client
$language = new LanguageClient([
    'projectId' => $projectId
]);

# The text to analyze
$text = 'Hello, world!';

# Detects the sentiment of the text
$annotation = $language->analyzeSentiment($text);
$sentiment = $annotation->sentiment();

echo 'Text: ' . $text . '
Sentiment: ' . $sentiment['score'] . ', ' . $sentiment['magnitude'];

?>
