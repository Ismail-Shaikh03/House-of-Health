let receptionistID=document.getElementById("receptionistID");
let patientFirstName=document.getElementById("patientiFirstName");
let patientLastName=document.getElementById("patientLastName");
let patientID=document.getElementById("patientID");
let reFirstName=/^[A-Za-z-]+$/;
let reLastName=/^[A-Za-z-]+$/;
let reID=/^[0-9]{0,3}$/;
let recepID=/^[0-9]{4}$/;
let submitButton=document.getElementById("submit");
submitButton.addEventListener("click",check);
function check(){
    if(receptionistID.value==""){
        alert("Enter Receptionist ID");
        event.preventDefault();
        receptionistID.focus();
        return;
    }
    if(patientFirstName.value==""){
        alert("Enter Patient First Name");
        event.preventDefault();
        patientFirstName.focus();
        return;
    }
    if(patientLastName.value==""){
        alert("Enter Patient Last Name");
        event.preventDefault();
        patientLastName.focus();
        return;
    }
    if(patientID.value==""){
        alert("Enter Patient ID");
        event.preventDefault();
        patientID.focus();
        return;
    }
    if(recepID.test(receptionistID.value)!=true){
        alert("Please enter a valid receptionist ID");
        event.preventDefault();
        receptionistID.focus();
        return;
    }
    if(reFirstName.test(patientFirstName.value)!=true){
        alert("Please enter a valid first name.");
        event.preventDefault();
        patientFirstName.focus();
        return;
    }
    if(reLastName.test(patientLastName.value)!=true){
        alert("Please enter a valid last name.");
        event.preventDefault();
        patientLastName.focus();
        return;
    }
    if(reID.test(patientID.value)!=true){
        alert("Please enter a valid patient ID.");
        event.preventDefault();
        patientID.focus();
        return;
    }
}