<?php
// index.php

$sender = $_POST['sender'] ?? '';
$message = $_POST['message'] ?? '';

if (!empty($message)) {
    // ১. TrxID বের করার লজিক (যেমন: TrxID 9J87X6YZ)
    preg_match('/TrxID\s+([A-Z0-9]+)/i', $message, $trxMatches);
    
    // ২. টাকার পরিমাণ বের করার লজিক (যেমন: Tk 500.00)
    preg_match('/Tk\s+([\d\.]+)/i', $message, $amountMatches);

    $trxId = $trxMatches[1] ?? null;
    $amount = $amountMatches[1] ?? null;

    if ($trxId && $amount) {
        // ৩. TrxID এবং Amount টেক্সট ফাইলে বা ডাটাবেজে সেভ করে রাখা
        $logData = date('Y-m-d H:i:s') . " | TrxID: " . $trxId . " | Amount: Tk " . $amount . "\n";
        file_put_contents("transactions.txt", $logData, FILE_APPEND);
        
        // এখানে আপনার ডাটাবেজে সেভ করার কোড বা কাস্টমার সার্ভিস অন করার লজিক বসবে
    }
}

// Render-কে Response দেওয়া
http_response_code(200);
echo "OK";
?>

