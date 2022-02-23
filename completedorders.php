<?php 
include 'nav.php';
?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
<header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-list " aria-hidden="true"></i>  All Pending Orders</b></h4>
  </header>
<center>
<div style="padding-top: 50px; font-family: 'Roboto', sans-serif;"></div>
<table class="w3-table-all" style="width: 80%;font-family: 'Roboto', sans-serif;"" >
<thead>
  <tr class="w3-green">
    <th>Slno</th>
    <th>Date</th>
    <th>Items</th>
    <th>Ordered By</th>
    <th>Order ID</th>
    <th>Payment</th>
    <th>Total</th>
  </tr>
  </thead>
  <tbody id="myTable">
  </tbody>
</table>
</div>
</center>
</div>

<script type="module">
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
import { getFirestore, query, where, doc, getDoc, getDocs,setDoc, collection, onSnapshot, updateDoc } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";

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


const q = query(collection(db, "order"), where("status", "==", 'Completed'));
console.log(q);
const unsubscribe = onSnapshot(q, (snapshot) => {

var table = document.getElementById("myTable");
var i=0;
snapshot.docChanges().forEach((change) => {
  if (change.type === "added") {
      var row = table.insertRow(i);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);
      var cell4 = row.insertCell(3);
      var cell5 = row.insertCell(4);
      var cell6 = row.insertCell(5);
      var cell7 = row.insertCell(6);
     
      cell1.innerHTML = i+1;
      cell2.innerHTML = change.doc.data().date;
      cell3.innerHTML = change.doc.data().item;


      const docRef =doc(db, "faculty/"+change.doc.data().uid);
      fetch();
        async function fetch() {
          var docSnap = await getDoc(docRef);
          if (docSnap.exists()) {
            cell4.innerHTML = docSnap.data().name;
          } else {
            cell4.innerHTML = '--';
          }
        }
      cell5.innerHTML = change.doc.data().oid;
      cell6.innerHTML = change.doc.data().payment;
      cell7.innerHTML = "₹"+change.doc.data().total;


    i+=1;
  } 
  });
});
</script>