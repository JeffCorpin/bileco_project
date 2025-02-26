<?php
// header.php
?>
<style>
    #chatbotWindow {
    z-index: 9999; /* Ensure it's on top */
    position: fixed;
    bottom: 20px;
    right: 6px;
    width: 600px;
    height: 1000px;
    background: rgba(255, 255, 255, 0.9);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    overflow: hidden;
}

</style>
<!-- FontAwesome CDN -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link rel="icon" href="./assets/favicon.ico" type="image/x-icon">
<script src="https://cdn.tailwindcss.com"></script>
<header class="bg-[#ffdb19] text-white py-2">
    <div class="container mx-auto px-4 flex flex-col items-center md:flex-row md:justify-between text-center">
        <div class="privacy-links md:space-x-4 mb-2 md:mb-0 text-black text-sm">
            <a href="<?php echo BASE_URL; ?>user/privacy.php" class="hover:underline">Privacy Policy</a>
            <a href="<?php echo BASE_URL; ?>user/bids.php" class="hover:underline">Bids & Awards</a>
        </div>
        <div class="social-header flex flex-wrap justify-center space-x-4 text-black">
            <a href="https://facebook.com" target="_blank" class="hover:text-blue-600 inline-flex items-center">
                <i class="fab fa-facebook-f w-5 h-5 mr-1"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="hover:text-blue-400 inline-flex items-center">
                <i class="fab fa-twitter w-5 h-5 mr-1"></i>
            </a>
            <a href="mailto:your-email@example.com" class="hover:text-pink-600 inline-flex items-center">
                <i class="fas fa-envelope w-5 h-5 mr-1"></i>
            </a>
            <a href="https://linkedin.com" target="_blank" class="hover:text-blue-700 inline-flex items-center">
                <i class="fab fa-linkedin w-5 h-5 mr-1"></i>
            </a>
            <a href="https://youtube.com" target="_blank" class="hover:text-red-600 inline-flex items-center">
                <i class="fab fa-youtube w-5 h-5 mr-1"></i>
            </a>
        </div>
    </div>
</header>

<!-- Floating Chatbot Button -->
<button id="chatbotButton" class="fixed bottom-6 right-6 bg-blue-600 text-white w-16 h-16 flex justify-center items-center rounded-full shadow-lg hover:bg-blue-700 transition-transform transform hover:scale-110">
    <i class="fas fa-robot text-2xl"></i>
</button>

<!-- Chatbot Window -->
<div id="chatbotWindow" class="fixed bottom-20 right-6 w-80 max-h-[450px] bg-white shadow-2xl rounded-xl backdrop-blur-md bg-opacity-80 hidden flex flex-col border border-gray-300">
    <!-- Chatbot Header -->
    <div class="flex justify-between items-center p-3 bg-blue-600 text-white rounded-t-xl">
        <h2 class="text-lg font-semibold"> Bileco Chatbot</h2>
        <button id="closeChatbot" class="text-white hover:text-gray-300 text-2xl">&times;</button>
    </div>

    <!-- Chat Messages -->
    <div id="chatbotMessages" class="overflow-y-auto h-72 p-3 space-y-2 text-sm text-gray-700 flex flex-col">
        <div class="bg-gray-200 p-2 rounded-lg max-w-[75%] self-start">👋 Hi! How can I assist you today?</div>
    </div>

    <!-- Typing Indicator -->
    <div id="typingIndicator" class="hidden text-gray-500 text-sm px-3">Chatbot is typing...</div>

    <!-- Chat Input -->
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
                response = "You can contact us at bileco@gmail.com 📧";
            } else if (lowerCaseMessage.includes("services")) {
                response = "We offer billing inquiries, account support, and technical assistance.";
            } else if (lowerCaseMessage.includes("thank you")) {
                response = "You're very welcome! 😊🚀";
            } else if (lowerCaseMessage.includes("ma ano ulam")) {
                response = "Mag trabaho ka ngaaa!";
            } else if (lowerCaseMessage.includes("boss")) {
                response = "Bossing! kamusta ang buhay-buhay?";
            } else if (lowerCaseMessage.includes("okay")) {
                response = "Glad to help! Let me know if you need any questions. 🚀🤖";
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

<?php
// end of header.php
?>
