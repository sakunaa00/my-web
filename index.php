<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Happy Valentine's 💖</title>

<style>
html, body {
    height: 100%;
    margin: 0;
    background: pink;
    overflow: hidden;
    font-family: Arial, sans-serif;
    text-align: center;
}

h1 {
    margin-top: 80px;
    color: #b3003b;
}

.game-box {
    position: relative;
    height: 400px;
    width: 600px;
    margin: 20px auto 0 auto;
}

button {
    padding: 12px 25px;
    font-size: 18px;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin: 10px;
    transition: 0.3s;
}

#yesBtn {
    background: #ff3366;
    color: white;
    margin-left: -110px;
}

#noBtn {
    background: white;
    color: #ff3366;
    position: absolute;
}

.message {
    font-size: 28px;
    color: #b3003b;
    margin-top: 30px;
    display: none;
}

.hover-text {
    margin-top: 20px;
    font-size: 20px;
    color: #8a0030;
    height: 30px;
}

/* YES button glow animation */
.glow {
    animation: glowAnim 1s ease-in-out infinite alternate;
}

@keyframes glowAnim {
    0% {
        transform: scale(1);
        box-shadow: 0 0 10px #ff3366;
    }
    50% {
        transform: scale(1.2);
        box-shadow: 0 0 30px #ff6699;
    }
    100% {
        transform: scale(1.1);
        box-shadow: 0 0 20px #ff3366;
    }
}

/* Falling hearts */
.heart {
    position: fixed;
    top: -50px;
    font-size: 24px;
    color: #ff1744;
    pointer-events: none;
    animation: fall linear forwards;
}

@keyframes fall {
    0% { transform: translateY(0); opacity: 1; }
    100% { transform: translateY(100vh); opacity: 0; }
}
</style>
</head>

<body>

<h1>Will you be my Valentine? 💖</h1>

<div class="game-box">
    <button id="yesBtn">YES 💕</button>
    <button id="noBtn">NO 😜</button>
    <div class="hover-text" id="hoverText"></div>

    <div class="message" id="loveMessage">
        Happy Valentine's Day my love 💘<br>
        I love you so much ❤️
    </div>
</div>

<script>
// Falling hearts
function createHeart() {
    const heart = document.createElement("div");
    heart.classList.add("heart");
    heart.textContent = "❤";
    heart.style.left = Math.random() * 100 + "vw";
    heart.style.fontSize = (Math.random() * 20 + 16) + "px";
    heart.style.animationDuration = (Math.random() * 3 + 4) + "s";
    document.body.appendChild(heart);
    setTimeout(() => heart.remove(), 7000);
}
setInterval(createHeart, 400);

// Elements
const yesBtn = document.getElementById("yesBtn");
const noBtn = document.getElementById("noBtn");
const hoverText = document.getElementById("hoverText");
const loveMessage = document.getElementById("loveMessage");

const messages = [
    "Are you sure? 🥺",
    "Think again 😢",
    "Don't break my heart 💔",
    "Pretty please? 💕",
    "You can't catch me 😜",
    "Last chance 😏",
    "I promise I'll be good! 😇",
    "I need you! 😭",
    "I can't live without you! 😩"
];

// NO button movement inside game box
noBtn.addEventListener("mouseover", () => {
    const container = document.querySelector(".game-box");
    const maxX = container.clientWidth - noBtn.offsetWidth;
    const maxY = container.clientHeight - noBtn.offsetHeight;
    noBtn.style.left = Math.random() * maxX + "px";
    noBtn.style.top = Math.random() * maxY + "px";
    hoverText.textContent = messages[Math.floor(Math.random() * messages.length)];
});

// YES button click
yesBtn.addEventListener("click", () => {
    loveMessage.style.display = "block";
    hoverText.textContent = "";
    noBtn.style.display = "none";
    yesBtn.classList.add("glow");
});
</script>

</body>
</html>
