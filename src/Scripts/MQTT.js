const socket = io("http://localhost:3000", { timeout: 2000 });

const statusDiv = document.getElementById("status");
const topicsDiv = document.getElementById("topics");
const messagesDiv = document.getElementById("messages");
const chatHeader = document.getElementById("chat-header");
const messageInput = document.getElementById("messageInput");
const sendBtn = document.getElementById("sendBtn");

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

function loadTopics(topics) {
    topicsDiv.innerHTML = "";
    topics.forEach(topic => {
        const el = document.createElement("div");
        el.className = "topic";
        el.textContent = topic;
        el.onclick = () => {
            selectedTopic = topic;
            chatHeader.textContent = `Topic: ${topic}`;
            loadMessages(fallbackMode ? fallbackData[topic] : []);
            if (!fallbackMode) socket.emit("getMessages", topic);
        };
        topicsDiv.appendChild(el);
    });
}

function loadMessages(msgs) {
    messagesDiv.innerHTML = "";
    if (!msgs || msgs.length === 0) {
        messagesDiv.innerHTML = "<em>No hay mensajes.</em>";
        return;
    }
    msgs.forEach(m => {
        const msgDiv = document.createElement("div");
        msgDiv.className = `message ${m.sender === "me" ? "sent" : "received"}`;
        msgDiv.innerHTML = `<div class="message topic-label">${selectedTopic}</div>${m.payload}`;
        messagesDiv.appendChild(msgDiv);
    });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

sendBtn.onclick = () => {
    const text = messageInput.value.trim();
    if (!text || !selectedTopic) return;
    const newMsg = {
        timestamp: new Date().toISOString(),
        payload: text,
        sender: "me"
    };

    // Mostrarlo localmente
    if (fallbackMode) {
        fallbackData[selectedTopic].push(newMsg);
        loadMessages(fallbackData[selectedTopic]);
    } else {
        socket.emit("sendMessage", { topic: selectedTopic, payload: text });
        addMessageToChat(newMsg);
    }

    messageInput.value = "";
};

function addMessageToChat(msg) {
    const msgDiv = document.createElement("div");
    msgDiv.className = `message ${msg.sender === "me" ? "sent" : "received"}`;
    msgDiv.innerHTML = `<div class="message topic-label">${selectedTopic}</div>${msg.payload}`;
    messagesDiv.appendChild(msgDiv);
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}


function setStatus(text, type) {
    statusDiv.textContent = text;
    statusDiv.classList.remove("success", "error", "warning");

    if (type === "success") {
        statusDiv.classList.add("success");
    } else if (type === "error") {
        statusDiv.classList.add("error");
    } else if (type === "warning") {
        statusDiv.classList.add("warning");
    }
}

socket.on("connect", () => {
    fallbackMode = false;
    setStatus("✅ Conectado al backend", "success");
    socket.emit("getTopics");
});

socket.on("disconnect", () => {
    setStatus("⚠️ Desconectado del backend. Usando datos de prueba.", "warning");
    fallbackMode = true;
    loadTopics(Object.keys(fallbackData));
});

socket.on("connect_error", () => {
    setStatus("❌ No se pudo conectar al backend. Mostrando datos de prueba.", "error");
    fallbackMode = true;
    loadTopics(Object.keys(fallbackData));
});

socket.on("topics", (topics) => loadTopics(topics));
socket.on("messages", (msgs) => loadMessages(msgs));
socket.on("message", (msg) => {
    if (msg.topic === selectedTopic) {
        addMessageToChat({ ...msg, sender: "server" });
    }
});
