<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="{{ asset('css/chatbot.css') }}">
</head>
<body>
    <div id="chatbot-container">
        <div id="chatbot-messages">
            <div class="message bot">Hello! How can I assist you today?</div>
        </div>
        <div id="chatbot-input">
            <textarea id="chat-input" placeholder="Type your message..."></textarea>
            <button id="send-button">Send</button>
        </div>
    </div>

    <script src="{{ asset('js/chatbot.js') }}"></script>
</body>
</html>