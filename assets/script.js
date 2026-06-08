function sendChatMessage(inputId, chatBoxId)
{
    let input = document.getElementById(inputId);

    let message = input.value.trim();

    if(message === "")
    {
        return;
    }

    let chatBox = document.getElementById(chatBoxId);

    chatBox.innerHTML += `
        <div class="message user">
            ${message}
        </div>
    `;

    input.value = "";

    fetch("chat.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body:"message="+encodeURIComponent(message)
    })
    .then(response => response.text())
    .then(data => {

        chatBox.innerHTML += `
            <div class="message ai">
                ${data}
            </div>
        `;

        chatBox.scrollTop = chatBox.scrollHeight;
    });
}


function sendMessage()
{
    let input =
        document.getElementById("popup-user-input");

    let message = input.value.trim();

    if(message === "")
    {
        return;
    }

    let chatBox =
        document.getElementById("popup-chat-box");

    chatBox.innerHTML += `
        <div class="message user">
            ${message}
        </div>
    `;

    input.value = "";

    fetch("chat.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body:"message="+encodeURIComponent(message)
    })
    .then(response => response.text())
    .then(data => {

        chatBox.innerHTML += `
            <div class="message ai">
                ${data}
            </div>
        `;

        chatBox.scrollTop =
            chatBox.scrollHeight;
    });
}



function sendMainMessage()
{
    let input =
        document.getElementById("main-user-input");

    let message = input.value.trim();

    if(message === "")
    {
        return;
    }

    let chatBox =
        document.getElementById("chat-box");

    chatBox.innerHTML += `
        <div class="message user">
            ${message}
        </div>
    `;

    input.value = "";

    fetch("chat.php",{
        method:"POST",
        headers:{
            "Content-Type":"application/x-www-form-urlencoded"
        },
        body:"message="+encodeURIComponent(message)
    })
    .then(response => response.text())
    .then(data => {

        chatBox.innerHTML += `
            <div class="message ai">
                ${data}
            </div>
        `;

        chatBox.scrollTop =
            chatBox.scrollHeight;
    });
}

document.addEventListener("DOMContentLoaded", function(){

    const toggle =
        document.getElementById("chat-toggle");

    const popup =
        document.getElementById("chat-popup");

    const closeBtn =
        document.getElementById("close-chat");

    toggle.addEventListener("click", function(){

        popup.style.display = "flex";

    });

    closeBtn.addEventListener("click", function(){

        popup.style.display = "none";

    });

});