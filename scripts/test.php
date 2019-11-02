<?php

if (isset($_GET)) {
    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'value 2')));
}

# Includes the autoloader for libraries installed with composer
require '/home3/hsnkwamy/public_html/vendor/autoload.php';

# Imports the Google Cloud client library
use Google\Cloud\Language\LanguageClient;

# Your Google Cloud Platform project ID
$projectId = 'YOUR_PROJECT_ID';

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
