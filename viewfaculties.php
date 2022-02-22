<?php
include 'nav.php';
session_start();
if (!isset($_SESSION['id'])) {
  header('location: index.php');
}

?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-list " aria-hidden="true"></i> All Registered Faculties</b></h4>
  </header>
  <center>
    <div style="padding-top: 50px; font-family: 'Roboto', sans-serif;"></div>
    <table class="w3-table-all" style="width: 80%;font-family: 'Roboto', sans-serif;"" >
<thead>
  <tr class=" w3-green">
      <th>Name</th>
      <th>FID</th>
      <th>Department</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Credit Balance</th>
      <th>View</th>
      </tr>
      </thead>
      <tbody id="myTable">
      </tbody>
    </table>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p id="popupText"></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

</div>
</center>
<!-- Button trigger modal -->
</div>





<script type="module">
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
    setDoc,
    collection,
    onSnapshot,
  } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";

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


  const q = query(collection(db, "faculty"));
  const unsubscribe = onSnapshot(q, (snapshot) => {

    var table = document.getElementById("myTable");
    var i = 0;
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
        cell1.innerHTML = change.doc.data().name;
        cell2.innerHTML = change.doc.data().fid;
        cell3.innerHTML = change.doc.data().department;
        cell4.innerHTML = change.doc.data().email;
        cell5.innerHTML = change.doc.data().phone;
        cell6.innerHTML = "₹" + change.doc.data().credit;
        cell7.innerHTML = '<button class="w3-round-small w3-btn w3-indigo w3-medium" data-toggle="modal" data-target="#exampleModalCenter" id="btn' + i + '"> View</button>';
        document.getElementById("btn" + i).addEventListener("click", async() => {
          var element = document.getElementById('popupText');

          const docRef = doc(db, "faculty/"+change.doc.data().fid+"/orders/orderId");

          const docSnap = await getDoc(docRef);

          if (docSnap.exists()) {
            element.innerHTML = `
            Date: `+docSnap.data().date+`<br>
            Item Name: `+docSnap.data().itemname+`<br>
            Order ID: `+docSnap.data().oid+`<br>
            Payment: `+docSnap.data().payment+`<br>
            Status: `+docSnap.data().status+`<br>
            Total: `+docSnap.data().total+`<br>
            `;
          }
          else{
            element.innerHTML = '';
          }
        });
        //console.log(db.collection("faculty/"+change.doc.data().fid+"/orders").get());
        i += 1;

      }
    });
  });
</script>