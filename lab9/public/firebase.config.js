// firebase.config.js
const firebaseConfig = {
 apiKey: "AIzaSyBQOygQ_hktX2Uo5nmnBjoefZmRl9lQaDU",
  authDomain: "notname-39a64.firebaseapp.com",
  projectId: "notname-39a64",
  storageBucket: "notname-39a64.firebasestorage.app",
  messagingSenderId: "127206100422",
  appId: "1:127206100422:web:80e596caec21c7a1c9f6c7",
  measurementId: "G-QRMK7PXHB8"
};

// For service worker (firebase-messaging-sw.js)
// This ensures the config is available in both module and non-module contexts
if (typeof self !== 'undefined') {
    self.firebaseConfig = firebaseConfig;
}