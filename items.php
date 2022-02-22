<?php include 'nav.php' ?>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">
  <header class="w3-container" style="padding-top:22px">
    <h4><b><i class="fa fa-list " aria-hidden="true"></i> All Menu Items</b></h4>
  </header>
  <center>
    <div style="padding-top: 50px; font-family: 'Roboto', sans-serif;"></div>
    <table class="w3-table-all" style="width: 60%;font-family: 'Roboto', sans-serif;"" >
<thead>
  <tr class=" w3-green">
      <th>Slno</th>
      <th></th>
      <th>Name</th>
      <th>Price</th>
      <th>Action</th>
      </tr>
      </thead>
      <tbody id="myTable">
      </tbody>
    </table>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="labs">Name :</label>
        <input class="w3-input w3-border" type="text" id="NameMod" readonly><br>
        <label class="labs">Price :</label>
        <input class="w3-input w3-border" type="text" id="PriceMod" required>
      </div>
      <div class="modal-footer">
        <button type="button" id="UpdateModBtn" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-primary">Save changes</button>
        <button type="button" id="DelModBtn" class="btn btn-danger" onclick="DelItem()">Delete item</button>
      </div>
    </div>
  </div>
</div>


</center>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
    updateDoc,
    collection,
    onSnapshot
  } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";
  import {
    getStorage,
    ref,
    uploadBytes,
    getDownloadURL
  } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-storage.js";

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
  const storage = getStorage();

  document.getElementById("UpdateModBtn").addEventListener("click", async () => {

    var item = document.getElementById("NameMod").value;
    var newPrice = document.getElementById("PriceMod").value;

    const itemRef = doc(db, "menu", item);

    await updateDoc(itemRef, {
      price: newPrice
    });

    location.reload();
  });


  const q = query(collection(db, "menu"));
  const unsubscribe = onSnapshot(q, (snapshot) => {

    var table = document.getElementById("myTable");
    var i = 0;

    function FillTboxes(i, name, price) {
      document.getElementById('NameMod').value = name;
      document.getElementById('PriceMod').value = price;
    }

    snapshot.docChanges().forEach((change) => {
      if (change.type === "added") {
        var imageurl = "";

        const image = ref(storage, change.doc.data().photo);
        getDownloadURL(image).then((url) => {
            // Insert url into an <img> tag to "download"
            imageurl = url;
            var row = table.insertRow(i);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            cell1.innerHTML = i + 1;
            cell2.innerHTML = "<img src='" + imageurl + "' style='height:40px;width:40px'>";
            cell3.innerHTML = change.doc.data().name;
            cell4.innerHTML = "₹" + change.doc.data().price;
            cell5.innerHTML = '<button class="w3-round-small w3-btn w3-purple w3-medium" data-toggle="modal" data-target="#exampleModalCenter"  id="editBtn' + i + '"><i class="fa fa-pencil-square-o"></i> / <i class="fa fa-trash"></i></button>';

            var editBtnRef = document.getElementById("editBtn" + i);
            editBtnRef.addEventListener("click", () => FillTboxes(editBtnRef.id, change.doc.data().name, change.doc.data().price));
            i += 1;
          })
          .catch((error) => {});

      }
    });
  });

  // function UpdateItem(){
  //   const washingtonRef = doc(db, "menu", );

  //   // Set the "capital" field of the city 'DC'
  //   await updateDoc(washingtonRef, {
  //     capital: true
  //   });

  // }
</script>