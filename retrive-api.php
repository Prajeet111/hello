<?php
// Connect to database
$mysqli = new mysqli("bcpyzrlybnogo1ynwbmv-mysql.services.clever-cloud.com","uknugsrrcnqhpyut","vnShzvPBDYN8Qi1Hg2ou","bcpyzrlybnogo1ynwbmv"); //it contains server,username,password and name of database respectively.
//checking connection---------------------------
if ($mysqli -> connect_error) {
echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
exit();
}
include('get-data.php'); //it is used to include a php file in another file.
// Execute SQL query
$sql = "SELECT *
FROM weatherdata
WHERE weather_city = '{$_GET['city']}'
AND weather_datetimes >= DATE_SUB(NOW(), INTERVAL 10 HOUR)
ORDER BY weather_datetimes DESC limit 1";
$result = $mysqli -> query($sql);
$result = $mysqli -> query($sql);
// Get data, convert to JSON and print
$row = $result -> fetch_assoc();
print json_encode($row);
// Free result set and close connection
$result -> free_result();
$mysqli -> close();
?>