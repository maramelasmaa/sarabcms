<!doctype html>
<html lang="en">
<head>
    <title>@yield('title') | Sarab Tech</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="https://sarab.tech/public/images/media/1689461139icon light.png">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root { --sarab-blue: #007bff; }

        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#000; color:#fff; }

        .header {
            background: rgba(0,0,0,0.85);
            backdrop-filter: blur(15px);
            padding:15px 0;
            position:sticky;
            top:0;
            z-index:1000;
            border-bottom:1px solid rgba(255,255,255,0.1);
        }
        .header__content__venor { display:flex; justify-content:space-between; align-items:center; max-width:1200px; margin:0 auto; padding:0 25px; }
        .header__logo img { width:105px; }
        .header__actions__venor { display:flex; gap:15px; }
        .header__action-btn { color:#fff; text-decoration:none; padding:10px 24px; border-radius:50px; border:1.5px solid rgba(255,255,255,0.3); transition:0.3s; }
        .header__action-btn:hover { background:#fff; color:#000; }

        main { min-height:80vh; padding:40px 20px; }

        .footer-section { border-top:1px solid rgba(255,255,255,0.05); margin-top:80px; padding:40px 0; text-align:center; }
        .container { max-width:1200px; margin:0 auto; }

        /* Chat UI */
        #sarab-chat-toggle {
            position:fixed; bottom:25px; right:25px;
            width:60px; height:60px; background:var(--sarab-blue); color:#fff;
            border-radius:50%; display:flex; justify-content:center; align-items:center;
            font-size:24px; cursor:pointer; box-shadow:0 8px 25px rgba(0,0,0,0.3); z-index:9999;
        }

        #sarab-chat-box {
            position:fixed; bottom:100px; right:25px;
            width:370px; height:520px; background:#fff; border-radius:15px;
            display:none; flex-direction:column; overflow:hidden;
            box-shadow:0 15px 45px rgba(0,0,0,0.3); z-index:9999;
        }

        .sarab-chat-header {
            background:var(--sarab-blue); color:#fff;
            padding:15px; display:flex; justify-content:space-between; align-items:center;
        }

        #sarab-chat-messages { flex:1; padding:15px; overflow-y:auto; background:#f4f6fb; }

        .message-user {
            background:var(--sarab-blue); color:#fff; padding:10px 14px; border-radius:18px; margin-bottom:10px; max-width:75%; margin-left:auto;
        }

        .message-bot {
            background:#fff; color:#333; padding:10px 14px; border-radius:18px; margin-bottom:10px; max-width:75%; border:1px solid #e0e0e0;
        }

        #sarab-chat-form { display:flex; border-top:1px solid #eee; }
        #sarab-chat-input { flex:1; border:none; padding:12px; outline:none; }
        #sarab-chat-form button { background:var(--sarab-blue); border:none; color:#fff; padding:0 20px; cursor:pointer; }
    </style>
</head>
<body>

<header class="header">
    <div class="header__content__venor">
        <div class="header__logo">
            <a href="/"><img src="https://sarab.tech/public/images/media/17135578102.png"></a>
        </div>
        <nav class="header__actions__venor">
            <a class="header__action-btn" href="/portfolio">Our Portfolio</a>
            <a class="header__action-btn" href="/contact">Start a Project</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer class="footer-section">
    <div class="container">
        <p>© 2026. Handcrafted by <a href="/" style="color:white;">sarab.tech</a></p>
    </div>
</footer>

<!-- Chat HTML -->
<div id="sarab-chat-toggle">💬</div>

<div id="sarab-chat-box">
    <div class="sarab-chat-header">
        <div>
            <strong>Sarab Support</strong><br>
            <small>Online • AI Assistant</small>
        </div>
        <span id="sarab-chat-close" style="cursor:pointer;">×</span>
    </div>

    <div id="sarab-chat-messages"></div>

    <form id="sarab-chat-form">
        @csrf
        <input type="text" id="sarab-chat-input" placeholder="Type your message..." autocomplete="off">
        <button type="submit">➤</button>
    </form>
</div>

<script>
const toggle = document.getElementById('sarab-chat-toggle');
const box = document.getElementById('sarab-chat-box');
const closeBtn = document.getElementById('sarab-chat-close');
const form = document.getElementById('sarab-chat-form');
const input = document.getElementById('sarab-chat-input');
const messages = document.getElementById('sarab-chat-messages');

toggle.onclick = () => box.style.display = 'flex';
closeBtn.onclick = () => box.style.display = 'none';

form.onsubmit = async function(e) {
    e.preventDefault();

    const text = input.value.trim();
    if (!text) return;

    const userDiv = document.createElement('div');
    userDiv.classList.add('message-user');
    userDiv.textContent = text;
    messages.appendChild(userDiv);
    messages.scrollTop = messages.scrollHeight;
    input.value = '';

    const typingDiv = document.createElement('div');
    typingDiv.classList.add('message-bot');
    typingDiv.id = 'typing';
    typingDiv.textContent = 'Typing...';
    messages.appendChild(typingDiv);
    messages.scrollTop = messages.scrollHeight;

    try {
        const response = await fetch('/ai-chat', {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
                'X-CSRF-TOKEN':'{{ csrf_token() }}'
            },
            body: JSON.stringify({ message: text })
        });

        const data = await response.json();

        const typingEl = document.getElementById('typing');
        if (typingEl) typingEl.remove();

        const botDiv = document.createElement('div');
        botDiv.classList.add('message-bot');
        botDiv.textContent = data.reply || "Sorry, something went wrong.";
        messages.appendChild(botDiv);
        messages.scrollTop = messages.scrollHeight;

    } catch(err) {
        console.error(err);
        const typingEl = document.getElementById('typing');
        if (typingEl) typingEl.remove();

        const botDiv = document.createElement('div');
        botDiv.classList.add('message-bot');
        botDiv.textContent = "Sorry, something went wrong.";
        messages.appendChild(botDiv);
        messages.scrollTop = messages.scrollHeight;
    }
};
</script>

</body>
</html>
