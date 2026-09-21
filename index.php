<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sender = $_POST['sender'] ?? 'Unknown';
    $message = $_POST['message'] ?? 'No Message';
    
    echo json_encode([
        "status" => "success",
        "message" => "SMS received successfully",
        "data" => [
            "sender" => $sender,
            "message" => $message
        ]
    ]);
} else {
    echo json_encode([
        "status" => "online",
        "message" => "SMS Forwarder API is ready"
    ]);
}
?>
