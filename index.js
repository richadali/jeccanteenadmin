import {
  initializeApp
} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
import {
  getFirestore,
  query,
  where,
  doc,
  getDoc,
  getDocs,
  collection
} from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";
document.getElementById("submit").addEventListener("click", () => authenticate());

const firebaseConfig = {
  apiKey: "AIzaSyC4Tu-_ZWxpgW3dV9qFVdxf9W_b4szEqYw",
  authDomain: "jeccanteen-4e566.firebaseapp.com",
  databaseURL: "https://jeccanteen-4e566-default-rtdb.firebaseio.com",
  projectId: "jeccanteen-4e566",
  storageBucket: "jeccanteen-4e566.appspot.com",
  messagingSenderId: "441614833498",
  appId: "1:441614833498:web:3ba4a17b1b52cf63b00563",
  measurementId: "G-QJBRKBVF7N"
};

const app = initializeApp(firebaseConfig);
const db = getFirestore();


async function authenticate() {

  var email = document.getElementById('email').value;
  var pass = document.getElementById('password').value;
  let q = query(collection(db, "admin"));
  q = query(q, where("email", "==", email));
  q = query(q, where("password", "==", pass));

  const querySnapshot = await getDocs(q);
  if (querySnapshot.empty) {
    swal({
		  title: "Login Failure",
		  text: "Invalid Email or Password",
		  icon: "error",
		  button: "Retry",
		});
  } else {
    //window.location.href = "home.php";
    document.getElementById("userID").value = email;
    document.getElementById("sessionForm").submit();

  }

  querySnapshot.forEach((doc) => {
    console.log(doc.id, " => ", doc.data());
  });

}