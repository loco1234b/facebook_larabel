function openChat(userName) {
    const chatContainer = document.getElementById('chat-container');
    const chatUserName = document.getElementById('chat-user-name');
    chatContainer.style.display = 'flex';
    chatUserName.textContent = `Chat con ${userName}`;
}

function closeChat() {
    const chatContainer = document.getElementById('chat-container');
    chatContainer.style.display = 'none';
}

function sendMessage() {
    const messageInput = document.getElementById('message-input');
    const chatMessages = document.getElementById('chat-messages');

    if (messageInput.value.trim() !== '') {
        const messageDiv = document.createElement('div');
        messageDiv.classList.add('sent');
        messageDiv.textContent = messageInput.value;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight; 
        messageInput.value = '';
    }
}
