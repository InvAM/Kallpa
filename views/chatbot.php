<!DOCTYPE html>
<html>

<head>
    <title>Chatbot</title>
    <link rel="stylesheet" type="text/css" href="<?php echo constant('URL'); ?>public/css/chatbot.css">
</head>

<body>

    <button id="openChat" onclick="abrirChat()">
        <img src="<?php echo constant('URL'); ?>public/Img/bot.png" alt="Iniciar Chat">
    </button>

    <!-- Aquí comienza la sección del chatbot (inicialmente oculto) -->
    <div id="chatBox" class="chatbot-container" style="display: none;">
        <div class="chat-header">
            <div class="header-content">
                <img src="<?php echo constant('URL'); ?>public/Img/Kallpa1.png" alt="Logo" class="kallpalogo"> <img
                    src="<?php echo constant('URL'); ?>public/Img/bot.png" alt="Logo" class="logo">
            </div>
            <span class="close-btn" onclick="cerrarChat()">X</span>
        </div>
        <div id="chat-container" class="chat-container"></div>
        <input type="text" id="inputMessage" class="input-message" placeholder="Chat bot Kallpa">
        <button onclick="enviarMensaje()" class="btn">Enviar</button>
    </div>
    <!-- Fin de la sección del chatbot -->
    <script src="<?php echo constant('URL'); ?>public/js/chatbot.js"></script>
</body>

</html>