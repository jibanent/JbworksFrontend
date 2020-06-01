// Firebase App (the core Firebase SDK) is always required and must be listed first
import * as firebase from "firebase/app";
import "firebase/database";

var firebaseConfig = {
  apiKey: "AIzaSyB6Y1PFel-QB7V6gBirPvKfmap9jPknzwM",
  authDomain: "jbwork-9e662.firebaseapp.com",
  databaseURL: "https://jbwork-9e662.firebaseio.com",
  projectId: "jbwork-9e662",
  storageBucket: "jbwork-9e662.appspot.com",
  messagingSenderId: "576175592672",
  appId: "1:576175592672:web:2711da5d85f47f5186ec85",
  measurementId: "G-PD9TX9WYEH"
};

firebase.initializeApp(firebaseConfig);

const database = firebase.database();

export default database;
