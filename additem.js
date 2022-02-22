import { initializeApp } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
import { getFirestore, query, where, doc, getDoc, getDocs,setDoc, collection } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-firestore.js";
import { getStorage, ref, uploadBytes, getDownloadURL, uploadBytesResumable } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-storage.js";

document.getElementById("submit").addEventListener("click", ()=>authenticate());

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

  var iname  = document.getElementById('iname').value;
  var price  = document.getElementById('price').value;
  var filename = Math.round(+new Date()/1000)+'.'+document.getElementById('photo').value.split('.')[1];
  var file  = document.querySelector('#photo').files[0];

  const storage = getStorage();

  const storageRef = ref(storage, 'images/'+filename);
  const uploadTask = uploadBytesResumable(storageRef, file);

  
  uploadTask.on('state_changed',
  (snapshot) => {
    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
    const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
    console.log('Upload is ' + progress + '% done');
    document.getElementById("progress").value = progress;
    switch (snapshot.state) {
      case 'paused':
        console.log('Upload is paused');
        break;
      case 'running':
        console.log('Upload is running');
        break;
    }
  }, 
  (error) => {
    // A full list of error codes is available at
    // https://firebase.google.com/docs/storage/web/handle-errors
    switch (error.code) {
      case 'storage/unauthorized':
        // User doesn't have permission to access the object
        break;
      case 'storage/canceled':
        // User canceled the upload
        break;

      // ...

      case 'storage/unknown':
        // Unknown error occurred, inspect error.serverResponse
        break;
    }
  }, 
  () => {
    // Upload completed successfully, now we can get the download URL
     getDownloadURL(uploadTask.snapshot.ref).then(async(downloadURL)=> {
      console.log('File available at', downloadURL);
      var fileurl = downloadURL;
      await setDoc(doc(db,"menu",iname), {
        name: iname,
        price: parseInt(price,10),
        photo: fileurl
      });
    });
  }
);

}
