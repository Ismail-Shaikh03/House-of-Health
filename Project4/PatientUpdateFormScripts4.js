let patientShots=document.getElementById("patientShots");
let patientIllnesses=document.getElementById("patientIllnesses");
let patientID=document.getElementById("patientID");
let submitButton=document.getElementById("submit");

submitButton.addEventListener("click",check);

function check(){
    if(patientIllnesses.value=="" && patientShots.value==""){
        alert("There is no info for either Shots or Illnesses.");
        event.preventDefault();
        return;
    }
    if(confirm("You are about to update Shots and Illnesses for the patient.Are you sure you want to do so?")==true){
        alert("Shots and Illnesses Updated");
    }
    else{
        alert("You have canceled the update.");
        event.preventDefault();
        return;
    }
}