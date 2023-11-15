<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Visited Time</title>
</head>
<body>

<?php
// Function to set a cookie with the current date-time
function setLastVisitedCookie() {
    $lastVisited = date('Y-m-d H:i:s');
    setcookie('last_visited', $lastVisited, time() + (86400 * 30), "/"); // Cookie expires in 30 days
}

// Check if the 'last_visited' cookie is set
if(isset($_COOKIE['last_visited'])) {
    $lastVisitedTime = $_COOKIE['last_visited'];
    echo "<p>Last visited on: $lastVisitedTime</p>";
} else {
    echo "<p>Welcome! This is your first visit.</p>";
}

// Set the 'last_visited' cookie with the current date-time
setLastVisitedCookie();
?>

</body>
</html>
