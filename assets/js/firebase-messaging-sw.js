importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyAW6fg_85_pPuvuLq-aAtg6Lc45hWfvtk8",
    authDomain: "samaa-news-b8f3b.firebaseapp.com",
    projectId: "samaa-news-b8f3b",
    storageBucket: "samaa-news-b8f3b.appspot.com",
    messagingSenderId: "561958533654",
    appId: "1:561958533654:web:6a30898aa576aa65155337",
    measurementId: "G-F66T0S7BPB"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function (payload) {
    console.log("Message received.", payload);
    const title = "Hello world is awesome";
    const options = {
        body: "Your notificaiton message .",
        icon: "/firebase-logo.png",
    };
    return self.registration.showNotification(
        title,
        options,
    );
});
