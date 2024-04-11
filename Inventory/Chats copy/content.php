<div id="initialContent" class="my-9 py-9 text-center">
    <div id="spinner" class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="actualContent" style="display: none;">
    <!-- ----------------- -->
        
    <form id="chatForm" action="test.php" method="post">
        <input type="text" name="from" placeholder="From">
        <input type="text" name="message" placeholder="Message">
        <input type="text" name="to" placeholder="To">
        <button type="submit">Send</button>
    </form>

    <div id="chat_list"></div>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to fetch and render chat messages
        function fetchAndRenderChats() {
            fetch('chats.json')
            .then(response => response.json())
            .then(data => {
                // Render the initial chat messages
                renderChats(data);
            })
            .catch(error => console.error('Error fetching chats:', error));
        }

        // Function to render chat messages
        function renderChats(chats) {
            const chatList = document.getElementById('chat_list');
            chatList.innerHTML = ''; // Clear existing content
            chats.forEach(chat => {
                const chatItem = document.createElement('div');
                chatItem.textContent = `${chat.from}: ${chat.message} (To: ${chat.to})`;
                chatList.appendChild(chatItem);
            });
        }

        // Initial fetch and render
        fetchAndRenderChats();

        // Event listener for form submission
        document.getElementById("chatForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            var formData = new FormData(this);

            // Convert form data to JSON
            var jsonData = {};
            formData.forEach(function(value, key) {
                jsonData[key] = value;
            });

            // Send form data to test.php using fetch
            fetch('test.php', {
                method: 'POST',
                body: JSON.stringify(jsonData),
                headers:{
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Fetch and render updated chat messages after successful submission
                fetchAndRenderChats();
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        });
    });
    </script>



    <!-- ----------------- -->
</div>
