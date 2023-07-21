<?php
// ThingSpeak channel ID
$channel_id = "2177826";

// ThingSpeak API URL for retrieving data in JSON format
$url = "https://api.thingspeak.com/channels/{$channel_id}/feeds.json?results=50";

// Make an HTTP GET request to the ThingSpeak API
$response = file_get_contents($url);

// Check if the request was successful
if ($response === false) {
    // Handle the error
    echo json_encode(['error' => 'Unable to retrieve data from ThingSpeak']);
} else {
    // Decode the JSON response and output it
    header('Content-Type: application/json');
    echo $response;
}
