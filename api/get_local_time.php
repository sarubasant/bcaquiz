<?php



function getLocalTime($gmtTime){

// Assume $gmtTime is the retrieved time from the MySQL database in GMT
// $gmtTime = '2023-06-19 12:00:00'; // Replace with your retrieved time

// Assume $userTimezone is the user's selected time zone
$userTimezone = 'Asia/Kathmandu'; // Replace with the user's time zone

// Create DateTime objects for GMT and user's time zone
$gmtDateTime = new DateTime($gmtTime, new DateTimeZone('GMT'));
$userDateTime = $gmtDateTime->setTimezone(new DateTimeZone($userTimezone));

// Convert the user's local time to a JavaScript Date object string
$userTime = $userDateTime->format('Y-m-d H:i:s');


return $userTime;

// Prepare the data to be passed to JavaScript as JSON
// $data = [
//     'userTime' => $userTime,
// ];

// Convert the data to JSON
// $jsonData = json_encode($data);
}

?>