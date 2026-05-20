<!DOCTYPE html>
<html>
<head>
    <title>EduHelperAgent</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        body{
            font-family: Arial;
            width: 600px;
            margin: 50px auto;
        }

        #chatbox{
            border:1px solid #ccc;
            padding:20px;
            height:400px;
            overflow:auto;
            margin-bottom:20px;
        }

        .user{
            color:blue;
            margin-bottom:10px;
        }

        .bot{
            color:green;
            margin-bottom:20px;
        }
    </style>
</head>
<body>

<div style="text-align:center; margin-top:30px;">

    <h2 style="color:#333;">
        EduHelperAgent 🤖
    </h2>

    <img src="{{ asset('images/robot.jpg') }}"
         width="120"
         style="border-radius:50%; box-shadow:0 0 10px #ccc; margin-bottom:20px;"
         alt="Robot">

</div>

<div style="text-align:center; margin-bottom:20px;">

    <input type="text"
           id="message"
           placeholder="Hi ! Ask about Solar System, Fractions, or Water Cycle..."
           style="width:70%; padding:10px; border-radius:10px; border:1px solid #ccc;">

    <button onclick="sendMessage()"
            style="padding:10px 20px; border:none; border-radius:10px; background:#4CAF50; color:white; cursor:pointer;">
        Send
    </button>

</div>

<div id="chatbox"
     style="
        width:80%;
        margin:20px auto;
        min-height:300px;
        border:1px solid #ccc;
        border-radius:10px;
        padding:20px;
        background:#f9f9f9;
        text-align:left;
        overflow-y:auto;
     ">
</div>
<script>

async function sendMessage()
{
    let message = document.getElementById('message').value;

    let chatbox = document.getElementById('chatbox');

    chatbox.innerHTML += `<div class="user"><b>You:</b> ${message}</div>`;

    let response = await fetch('/send', {

        method:'POST',

        headers:{
            'Content-Type':'application/json',
            'X-CSRF-TOKEN':
            document.querySelector('meta[name="csrf-token"]').content
        },

        body:JSON.stringify({
            message:message
        })
    });

    let data = await response.json();

    chatbox.innerHTML += `<div class="bot"><b>Bot:</b> ${data.reply}</div>`;

    document.getElementById('message').value = '';
}

</script>

</body>
</html>