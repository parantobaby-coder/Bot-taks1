<?php

error_reporting(E_ALL);

$bot_token = "8615564897:AAGKfiskTAa9cS5BauE-F0oe15PEo3Cy_Lg";

$content = file_get_contents("php://input");

$update = json_decode($content, true);

if(isset($update["message"])){

$message = $update["message"];

$chat_id = $message["chat"]["id"];

$name = $message["from"]["first_name"] ?? "User";

$username = $message["from"]["username"] ?? "No Username";

$user_id = $message["from"]["id"];

$text = $message["text"] ?? '';

if($text == "/start"){

$keyboard = [
"inline_keyboard" => [
[
[
"text" => "🚀 OPEN MINI APP",
"web_app" => [
"url" => "https://daliywork.dailywarzone.xyz"
]
]
]
],
[
[
"text" => "📢 Join Channel",
"url" => "https://t.me/taskmini"
],
[
"text" => "🆘 Support",
"url" => "https://t.me/taskmini"
]
]
]
];

$welcome = "
🎉 Welcome To Task Craft 📨

👤 Name: $name
🆔 Telegram ID: $user_id
🔗 Username: @$username

💰 Earn Money Daily
👥 Refer & Earn Bonus
📋 Complete Tasks
🏆 Leaderboard Rewards
💸 Fast Withdraw System

━━━━━━━━━━━

🚀 Click OPEN MINI APP
And Start Your Journey Now!

";

$data = [
"chat_id" => $chat_id,
"text" => $welcome,
"reply_markup" => json_encode($keyboard)
];

$url = "https://api.telegram.org/bot".$bot_token."/sendMessage";

$options = [
"http" => [
"header" => "Content-type: application/x-www-form-urlencoded\r\n",
"method" => "POST",
"content" => http_build_query($data),
]
];

$context = stream_context_create($options);

file_get_contents($url, false, $context);

}

}

?>
