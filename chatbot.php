<?php
// chatbot.php
?>
<!-- Floating Chatbot Button -->
<button id="chatbotButton" class="fixed bottom-6 right-6 bg-blue-600 text-white w-16 h-16 flex justify-center items-center rounded-full shadow-lg hover:bg-blue-700 transition-transform transform hover:scale-110 z-50">
    <i class="fas fa-robot text-2xl"></i>
</button>

<!-- Chatbot Window -->
<div id="chatbotWindow" class="fixed bottom-20 right-6 w-80 max-h-[450px] bg-white shadow-2xl rounded-xl backdrop-blur-md bg-opacity-80 hidden flex flex-col border border-gray-300">
    <div class="flex justify-between items-center p-3 bg-blue-600 text-white rounded-t-xl">
        <h2 class="text-lg font-semibold"> Bileco Chatbot</h2>
        <button id="closeChatbot" class="text-white hover:text-gray-300 text-2xl">&times;</button>
    </div>
    <div id="chatbotMessages" class="overflow-y-auto h-72 p-3 space-y-2 text-sm text-gray-700 flex flex-col">
        <div class="bg-gray-200 p-2 rounded-lg max-w-[75%] self-start">👋 Hi! How can I assist you today?</div>
    </div>
    <div id="typingIndicator" class="hidden text-gray-500 text-sm px-3">Chatbot is typing...</div>
    <div class="p-3 border-t bg-white flex">
        <input type="text" id="chatbotInput" placeholder="Type a message..." class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300 outline-none">
        <button id="sendMessage" class="ml-2 bg-blue-600 text-white p-2 rounded-lg hover:bg-blue-700 transition">
            <i class="fas fa-paper-plane"></i>
        </button>
    </div>
</div>

<script>
    document.getElementById("chatbotButton").addEventListener("click", function() {
        document.getElementById("chatbotWindow").classList.toggle("hidden");
        scrollToBottom();
    });

    document.getElementById("closeChatbot").addEventListener("click", function() {
        document.getElementById("chatbotWindow").classList.add("hidden");
    });

    const chatbotInput = document.getElementById("chatbotInput");
    const chatbotMessages = document.getElementById("chatbotMessages");
    const typingIndicator = document.getElementById("typingIndicator");

    document.getElementById("sendMessage").addEventListener("click", sendMessage);
    chatbotInput.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        let userMessage = chatbotInput.value.trim();
        if (userMessage) {
            addMessage("You", userMessage, "bg-blue-500 text-white self-end");
            chatbotInput.value = "";
            chatbotInput.focus();
            generateResponse(userMessage);
        }
    }

    function addMessage(sender, message, style) {
        let messageElement = document.createElement("div");
        messageElement.className = `p-2 rounded-lg max-w-[75%] ${style}`;
        messageElement.innerHTML = message;
        chatbotMessages.appendChild(messageElement);
        scrollToBottom();
    }

    function generateResponse(userMessage) {
        let response;
        let lowerCaseMessage = userMessage.toLowerCase();

        typingIndicator.classList.remove("hidden");

        setTimeout(() => {
            typingIndicator.classList.add("hidden");

            if (lowerCaseMessage.includes("hello") || lowerCaseMessage.includes("hi")) {
                response = "Hello! How can I assist you today? 😊";
            } else if (lowerCaseMessage.includes("help")) {
                response = "Sure! Please describe the issue you're facing.";
            } else if (lowerCaseMessage.includes("contact")) {
                response = "You can contact us at bileco1973@gmail.com 📧 or see in navigation contact for more.";
            } else if (lowerCaseMessage.includes("services")) {
                response = "We offer billing inquiries, account support, and technical assistance.";
            } else if (lowerCaseMessage.includes("thank you")) {
                response = "You're very welcome! 😊🚀";
            } else {
                response = "I'm not sure I understand. Can you please rephrase? 🤔";
            }

            addMessage("Chatbot", response, "bg-gray-200 self-start");
        }, 1000);
    }

    function scrollToBottom() {
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
</script>
