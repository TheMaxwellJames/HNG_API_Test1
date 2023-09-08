<?php
header('Content-Type: application/json');

// Set the Slack name to "Maxwell_James"
$slackName = isset($_GET['slack_name']) ? $_GET['slack_name'] : '';
$track = isset($_GET['track']) ? $_GET['track'] : '';

// Validate the track parameter
if ($track !== 'backend') {
    http_response_code(400); // Bad Request
    echo json_encode(array("error" => "Invalid track parameter"));
    exit;
}

// Get the current UTC time with a +/-2 minute window
$currentUtcTime = gmdate('Y-m-d\TH:i:s\Z', time());

// Get the current day of the week
$currentDayOfWeek = date('l');

// Construct the JSON response
$response = array(
    "slack_name" => $slackName,
    "current_day" => $currentDayOfWeek,
    "utc_time" => $currentUtcTime,
    "track" => $track,
    "github_file_url" => "https://github.com/TheMaxwellJames/HNG_API_Test1/blob/main/index.php",
    "github_repo_url" => "https://github.com/TheMaxwellJames/HNG_API_Test1",
    "status_code" => 200
);

// Send the JSON response
echo json_encode($response);
?>
