document.addEventListener('DOMContentLoaded', () => {
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');
    const chatMessages = document.getElementById('chatbot-messages');

    // Function to add a message to the chat
    function addMessage(text, sender) {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('message', sender);
        messageDiv.textContent = text;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight; // Scroll to the latest message
    }

    // Function to send a message to the Flask API
    async function sendMessage() {
        const message = chatInput.value.trim();
        if (!message) return;

        // Add the user's message to the chat
        addMessage(message, 'user');
        chatInput.value = '';

        try {
            // Send the message to the Laravel endpoint
            const response = await fetch('/chatbot/message', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ message }),
            });

            const data = await response.json();
            if (data.response) {
                // Add the bot's response to the chat
                addMessage(data.response, 'bot');
            } else {
                addMessage('Sorry, something went wrong.', 'bot');
            }
        } catch (error) {
            console.error('Error:', error);
            addMessage('Sorry, something went wrong.', 'bot');
        }
    }

    // Attach event listeners
    sendButton.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            e.preventDefault();
            sendMessage();
        }
    });
});