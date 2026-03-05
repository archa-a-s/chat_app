<!DOCTYPE html>
<html>
<head>
    <title>Chat Room</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { font-family: Arial; background: #f0f2f5; }

        .chat-container {
            width: 500px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .chat-header {
            background: #007bff;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .chat-messages {
            height: 350px;
            padding: 10px;
            overflow-y: scroll;
            background: #f9f9f9;
        }

        .message {
            margin-bottom: 10px;
            padding: 8px 12px;
            background: #e4e6eb;
            border-radius: 8px;
        }

        .chat-input {
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: none;
        }

        .chat-input button {
            padding: 10px 15px;
            background: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

 
   
<div class="chat-container">
     <button id="logout-btn" style="
        float: right;
        padding: 5px 10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    ">Logout</button>
    <div class="chat-header">
        Chat Room - <?= $this->session->userdata('user_name'); ?>
    </div>

    <div class="chat-messages" id="chat-box"></div>

    <div class="chat-input">
        <input type="text" id="message" placeholder="Type message...">
        <button onclick="sendMessage()">Send</button>
    </div>
    
</div>

<script>

function fetchMessages(){
    $.ajax({
        url: "<?= base_url('index.php/chat/fetch'); ?>",
        method: "GET",
        success: function(data){
            var messages = JSON.parse(data);
            var html = "";

            messages.forEach(function(msg){
                html += "<div class='message'><strong>" 
                        + msg.name + ":</strong> " 
                        + msg.message + "</div>";
            });

            $("#chat-box").html(html);
            $("#chat-box").scrollTop($("#chat-box")[0].scrollHeight);
        }
    });
}

function sendMessage(){
    var message = $("#message").val().trim();
    if(message == "") return;

    $.ajax({
        url: "<?= base_url('index.php/chat/send'); ?>",
        method: "POST",
        data: {message: message},
        success: function(){
            $("#message").val("");
            fetchMessages();
        }
    });
}

setInterval(fetchMessages, 1000); // auto refresh every 1 sec
fetchMessages();
$("#logout-btn").click(function(){
    window.location.href = "<?= base_url('auth/logout'); ?>";
});
</script>

</body>
</html>