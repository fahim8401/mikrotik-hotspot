<?php
require_once 'routeros_api.class.php';

header('Content-Type: application/json');

if (
    isset($_POST['name']) &&
    isset($_POST['phone']) &&
    isset($_POST['package'])
) {
    $username = $_POST['phone'];
    $password = $_POST['phone']; // Password is the phone number
    $name = $_POST['name'];
    $package = $_POST['package'];

    // Set limits based on package
    $limits = [
        'Basic Pack' => ['profile' => 'Basic Pack'],
        'Standard Pack' => ['profile' => 'Standard Pack'],
        'Premium Pack' => ['profile' => 'Premium Pack'],
    ];
    $userLimit = $limits[$package] ?? $limits['Basic Pack'];

    $api = new RouterosAPI();
    // Set your MikroTik router credentials below
    $router_ip = '192.168.88.1'; // Example: your router's IP address
    $router_user = 'admin';      // Example: your API username
    $router_pass = 'yourpassword'; // Example: your API password
    if ($api->connect($router_ip, $router_user, $router_pass)) {
        $api->comm('/ip/hotspot/user/add', [
            'name' => $username,
            'password' => $password,
            'profile' => $userLimit['profile'],
            'comment' => $name,
        ]);
        $api->disconnect();

        // Send welcome SMS with credentials (server-side)
        $smsApiKey = 'RMvSnEicdJJU1EWSoTdX';
        $smsSender = '8809617618315';
        $smsNumber = $username;
        $smsMessage = urlencode("Welcome to Hotspot!\nUsername: $username\nPassword: $password\nPackage: $package\nThank you for your purchase.");
        $smsUrl = "http://bulksmsbd.net/api/smsapi?api_key=$smsApiKey&type=text&number=$smsNumber&senderid=$smsSender&message=$smsMessage";
        // Use file_get_contents to send SMS (ignore response)
        @file_get_contents($smsUrl);

        echo json_encode(['status' => 'success', 'user' => $username, 'pass' => $password]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Could not connect to router']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Missing data']);
}
?>
