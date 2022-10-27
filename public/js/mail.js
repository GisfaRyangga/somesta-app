const firebaseConfig = {
    //   copy your firebase config informations
    apiKey: "AIzaSyAP-C8bs8FseKSRXQfxltRzRDkf4WgjlVA",
    authDomain: "somesta-ccb06.firebaseapp.com",
    databaseURL: "https://somesta-ccb06-default-rtdb.firebaseio.com",
    projectId: "somesta-ccb06",
    storageBucket: "somesta-ccb06.appspot.com",
    messagingSenderId: "361974702050",
    appId: "1:361974702050:web:e2349a99fce380133da3bb",
    measurementId: "G-T20LYLZ0LM"
  };
  
  // initialize firebase
  firebase.initializeApp(firebaseConfig);
  
  // reference your database
  var contactFormDB = firebase.database().ref("contactForm");
  
  document.getElementById("contactForm").addEventListener("submit", submitForm);
  
  function submitForm(e) {
    e.preventDefault();
  
    var name = getElementVal("name");
    var emailid = getElementVal("emailid");
    var msgContent = getElementVal("msgContent");
  
    saveMessages(name, emailid, msgContent);
  
    //   enable alert
    document.querySelector(".alert").style.display = "block";
  
    //   remove the alert
    setTimeout(() => {
      document.querySelector(".alert").style.display = "none";
    }, 3000);
  
    //   reset the form
    document.getElementById("contactForm").reset();
  }
  
  const saveMessages = (name, emailid, msgContent) => {
    var newContactForm = contactFormDB.push();
  
    newContactForm.set({
      name: name,
      emailid: emailid,
      msgContent: msgContent,
    });
  };
  
  const getElementVal = (id) => {
    return document.getElementById(id).value;
  };