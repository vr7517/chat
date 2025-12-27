{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel OpenAI Chat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h2>Chat with AI</h2>
    <div>
        <textarea id="chatBox" rows="10" cols="50" readonly></textarea>
    </div>
    <div>
        <input type="text" id="message" placeholder="Type your message...">
        <button onclick="sendMessage()">Send</button>
    </div>

   <script>
    async function sendMessage() {
        const message = document.getElementById('message').value;
        const chatBox = document.getElementById('chatBox');

        chatBox.value += `You: ${message}\n`;

        // ✅ This is a POST request
        const response = await axios.post('{{ route('chat.send') }}', {
            message: message
        });

        chatBox.value += `AI: ${response.data.reply}\n\n`;
        document.getElementById('message').value = '';
    }

    // CSRF token setup for axios
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document
        .querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>

</body>
</html> --}}
