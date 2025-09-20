<?php
$botToken = "PASTE_YOUR_BOT_TOKEN_HERE";
$apiURL = "https://api.telegram.org/bot$botToken/";

// Load DB
require_once "db.php";

// Get Telegram update
$update = json_decode(file_get_contents("php://input"), true);

if (isset($update["message"])) {
    $chatId = $update["message"]["chat"]["id"];
    $messageText = trim($update["message"]["text"]);

    // CNIC check (13 digits)
    if (preg_match("/^[0-9]{13}$/", $messageText)) {
        $stmt = $pdo->prepare("SELECT * FROM cnic_data WHERE cnic = ?");
        $stmt->execute([$messageText]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $reply = "✅ CNIC Found:\n";
            $reply .= "👤 Name: " . $data["name"] . "\n";
            $reply .= "👨‍👦 Father: " . $data["father_name"] . "\n";
            $reply .= "📅 DOB: " . $data["dob"];
        } else {
            $reply = "❌ No record found for CNIC: $messageText";
        }
    } else {
        $reply = "⚠️ Please send a valid 13-digit CNIC number.";
    }

    // Send message back
    file_get_contents($apiURL . "sendMessage?chat_id=$chatId&text=" . urlencode($reply));
}
?>
