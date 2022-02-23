<?php include 'nav.php';
?>

<head>
</head>
<!-- Overlay effect when opening sidebar on small screens -->

<div id="nav"></div>
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Admin Dashboard</b></h5>
  </header>
  <div class="w3-row-padding w3-margin-bottom ">
    <div class="w3-quarter w3-padding">
      <a href="items.php" style="text-decoration: none">
        <div class="w3-container w3-red w3-padding-16 w3-hover-shadow">
          <div class="w3-left"><i class="fa fa-list w3-xxxlarge"></i></div>

          <div class="w3-right">
            <h3 id="itemCount"></h3>
          </div>
          <div class="w3-clear"></div>
          <h4>All Items</h4>
        </div>
    </div></a>
    <div class="w3-quarter w3-padding">
      <a href="additem.php" style="text-decoration: none">
        <div class="w3-container w3-blue w3-padding-16 w3-hover-shadow">
          <div class="w3-left"><i class="fa fa-cart-plus w3-xxxlarge"></i></div>

          <div class="w3-right">
            <h3> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Add items</h4>
        </div>
      </a>
    </div>
    <div class="w3-quarter w3-padding">
      <a href="pendingorders.php" style="text-decoration: none">
        <div class="w3-container w3-teal w3-padding-16 w3-hover-shadow">

          <div class="w3-left"><i class="fa fa-clock-o w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3 id="pendingCount"> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Pending Orders</h4>
        </div>
      </a>
    </div>
    <div class="w3-quarter w3-padding">
      <a href="completedorders.php" style="text-decoration: none">
        <div class="w3-container w3-orange w3-text-white w3-padding-16 w3-hover-shadow">

          <div class="w3-left"><i class="fa fa-check-square-o w3-xxxlarge"></i></div>
          <div class="w3-right">
            <h3 id="completedCount"> </h3>
          </div>
          <div class="w3-clear"></div>
          <h4>Completed Orders</h4>
        </div>
      </a>
    </div>
  </div>


  <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }
  </script>


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
      deleteDoc,
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

    var q = query(collection(db, "menu"));
    onSnapshot(q, (snapshot) => {
      var i = 0;
      snapshot.docChanges().forEach((change) => {
        i += 1;
      });
      document.getElementById("itemCount").innerHTML = i;
    });

    var q = query(collection(db, "order"), where("status", "==", "Pending"));
    onSnapshot(q, (snapshot) => {
      var i = 0;
      snapshot.docChanges().forEach((change) => {
        i += 1;
      });
      document.getElementById("pendingCount").innerHTML = i;
    });

    var q = query(collection(db, "order"), where("status", "==", "Completed"));
    onSnapshot(q, (snapshot) => {
      var i = 0;
      snapshot.docChanges().forEach((change) => {
        i += 1;
      });
      document.getElementById("completedCount").innerHTML = i;
    });
  </script>


  </body>

  </html>