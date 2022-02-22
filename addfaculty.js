import { initializeApp } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
import { getFirestore, updateDoc, query, where, doc, getDoc, getDocs,setDoc, collection } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";
document.getElementById("sub").addEventListener("click", ()=>authenticate());

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

async function authenticate()
{

  var fname  = document.getElementById('fname').value;
  var department  = document.getElementById('department').value;
  var email  = document.getElementById('email').value;
  var phone  = document.getElementById('phone').value;
  var password  = document.getElementById('pass').value;
  var fid  = document.getElementById('fid').value;
  var credit  = document.getElementById('credit').value;

  ()=>{
  await setDoc(doc(db,"faculty",fid), {
    name: fname,
    department: department,
    phone: parseInt(phone,10),
    email: email,
    password: password,
    fid: parseInt(fid,10),
    credit: parseInt(credit,10)
  })
  .then(()=>{
    alert("Data Submitted Sucessfully");
  });

}
}