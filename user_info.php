<?php
// Start the session
session_start();

// Get user information
$userInfo = [
    'IP Address' => $_SERVER['REMOTE_ADDR'], // User's IP address
    'User-Agent' => $_SERVER['HTTP_USER_AGENT'], // Information about the browser and operating system
    'Page' => $_SERVER['REQUEST_URI'], // URL of the page being requested by the user
    'Access Time' => date('Y-m-d H:i:s'), // Access time
];

// Check if the user is logged in (e.g., via sessions)
if (isset($_SESSION['username'])) {
    $userInfo['Username'] = $_SESSION['username']; // Username from the session
} else {
    $userInfo['Username'] = 'Guest'; // If not logged in
}

// Output user information in HTML format
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 50%; margin: 20px auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h1 style="text-align:center;">User Information</h1>
<table>
    <tr>
        <th>Parameter</th>
        <th>Value</th>
    </tr>
    <?php foreach ($userInfo as $key => $value): ?>
    <tr>
        <td><?php echo htmlspecialchars($key); ?></td>
        <td><?php echo htmlspecialchars($value); ?></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
