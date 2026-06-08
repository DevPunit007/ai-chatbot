<?php
session_start();

if (!isset($_SESSION['messages'])) {

    $_SESSION['messages'] = [
        [
            "role" => "system",
            "content" => "You are a helpful AI assistant."
        ]
    ];

}

require "config.php";

$userMessage = trim($_POST['message'] ?? '');

if($userMessage == '')
{
    exit;
}

$_SESSION['messages'][] = [
    "role" => "user",
    "content" => $userMessage
];

$url = "https://api.groq.com/openai/v1/chat/completions";

$data = [
    "model" => "llama-3.3-70b-versatile",
    "messages" => $_SESSION['messages']
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer " . GROQ_API_KEY
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "CURL ERROR: " . curl_error($ch);
    exit;
}

curl_close($ch);

$result = json_decode($response, true);

$aiReply = $result['choices'][0]['message']['content'] ?? "No response from AI";
$_SESSION['messages'][] = [
    "role" => "assistant",
    "content" => $aiReply
];

if(count($_SESSION['messages']) > 20)
{
    $systemMessage = $_SESSION['messages'][0];

    $recentMessages = array_slice(
        $_SESSION['messages'],
        -18
    );

    $_SESSION['messages'] = array_merge(
        [$systemMessage],
        $recentMessages
    );
}

echo $aiReply;

?>