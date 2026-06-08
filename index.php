<!DOCTYPE html>
<html>
<head>
    <title>AI Chatbot</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="chat-container">

    <div class="header">
        🤖 AI Assistant
    </div>

    <div id="chat-box"></div>

    <div class="input-area">

        <input
            type="text"
            id="main-user-input"
            placeholder="Message AI..."
        >

        <button onclick="sendMainMessage()">
            Send
        </button>

    </div>

</div>
<!-- Floating Button -->
<div id="chat-toggle">
    🤖
</div>

<!-- Popup -->
<div id="chat-popup">

    <div class="popup-header">
        AI Assistant
        <span id="close-chat">✖</span>
    </div>

    <div id="popup-chat-box"></div>

    <div class="popup-input">

        <input
            type="text"
            id="popup-user-input"
            placeholder="Ask anything..."
        >

        <button onclick="sendMessage()">
            Send
        </button>

    </div>

</div>

<script src="assets/script.js"></script>

</body>
</html>