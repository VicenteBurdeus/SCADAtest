const topicsDiv = document.getElementById("topics");
const messagesDiv = document.getElementById("messages");
const chatHeader = document.getElementById("chat-header");

let lastMessages = [];
let selectedTopic = null;
let fallbackMode = false;

const fallbackData = {
    "sensor/temperatura": [
        { timestamp: "2025-05-12 14:00", payload: "22.4", sender: "server" },
        { timestamp: "2025-05-12 14:05", payload: "22.6", sender: "server" }
    ],
    "sensor/humedad": [
        { timestamp: "2025-05-12 14:00", payload: "58%", sender: "server" },
        { timestamp: "2025-05-12 14:05", payload: "60%", sender: "server" }
    ]
};

function checkForNewMessages() {
    if (!selectedTopic || fallbackMode) return;

    fetch(`Scripts/get_mqtt_db.php?action=get_msg&topic=${selectedTopic}`)
        .then(response => response.json())
        .then(data => {
            if (JSON.stringify(data) !== JSON.stringify(lastMessages)) {
                lastMessages = data;
                loadMessages(data);
            }
        })
        .catch(error => {
            console.error("Error al actualizar mensajes automáticamente:", error);
        });
}

function loadTopics(topics) {
    topicsDiv.innerHTML = "";
    topics.forEach(topic => {
        const el = document.createElement("div");
        el.className = "topic";
        el.textContent = topic;
        el.onclick = () => {
            selectedTopic = topic;
            chatHeader.textContent = `Topic: ${selectedTopic}`;

            if (fallbackMode) {
                const fallbackMessages = fallbackData[selectedTopic] || [];
                loadMessages(fallbackMessages); // ← usamos datos simulados
                lastMessages = fallbackMessages; // ← actualizamos la caché
                return;
            }

            fetch(`Scripts/get_mqtt_db.php?action=get_msg&topic=${selectedTopic}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    loadMessages(data);
                    lastMessages = data;
                })
                .catch(error => {
                    console.error("Error al obtener los mensajes:", error);
                });
        };
        topicsDiv.appendChild(el);
    });
}


function loadMessages(msgs) {
    messagesDiv.innerHTML = "";
    if (!msgs || msgs.length === 0) {
        messagesDiv.innerHTML = "<em>No hay mensajes.</em>";
        lastMessages = [];
        return;
    }
    msgs.forEach(m => {
        const msgDiv = document.createElement("div");
        msgDiv.className = `message ${m.sender === "me" ? "sent" : "received"}`;
        msgDiv.innerHTML = `
            <div class="message topic-label">${selectedTopic}</div>
            ${m.payload}
            <div class="message-timestamp">${m.timestamp}</div>
        `;
        messagesDiv.appendChild(msgDiv);
    });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
    lastMessages = msgs;
}

function addMessageToChat(msg) {
    const msgDiv = document.createElement("div");
    msgDiv.className = `message ${msg.sender === "me" ? "sent" : "received"}`;
    msgDiv.innerHTML = `
        <div class="message topic-label">${selectedTopic}</div>
        <div class="message-timestamp">${msg.timestamp}</div>
        ${msg.payload}
    `;
    messagesDiv.appendChild(msgDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}


window.onload = () => {
    fetch("Scripts/get_mqtt_db.php?action=get_topics")
        .then(response => response.json())
        .then(topics => {
            loadTopics(topics);
        })
        .catch(error => {
            console.error("Error al obtener los topics:", error);
            fallbackMode = true;
            loadTopics(Object.keys(fallbackData));
        });
};

setInterval(checkForNewMessages, 3000);
