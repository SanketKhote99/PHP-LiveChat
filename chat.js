$(document).ready(function () {
    var chatContainer = $("#chat-container");
    var messageContainer = $("#message-container");
    var chatInput = $("#chat-input");
    var sendButton = $("#send-btn");

    // Fetch and display existing chat messages
    function loadMessages() {
        $.ajax({
            url: "get_messages.php",
            method: "GET",
            success: function (data) {
                messageContainer.html(data);
            }
        });
    }

    // Send message when send button is clicked
    sendButton.click(function () {
        var message = chatInput.val();
        if (message.trim() !== "") {
            $.ajax({
                url: "send_message.php",
                method: "POST",
                data: { message: message },
                success: function () {
                    chatInput.val("");
                    loadMessages();
                }
            });
        }
    });

    // Periodically fetch new messages
    setInterval(loadMessages, 3000);

    // Initial loading of messages
    loadMessages();
});
