let reFirstName=/^[A-Za-z-]+$/;
let reLastName=/^[A-Za-z-]+$/;
let reID=/^[0-9]{0,3}$/;
let patientFirstName=document.getElementById("patientFirstName");
let patientLastName=document.getElementById("patientLastName");
let patientID=document.getElementById("patientID");
let submit=document.getElementById("submit");
submit.addEventListener("click",validate);

function validate(){
    if(patientFirstName.value===""){
        window.alert("Patient First Name Missing. Please enter first name.")
        event.preventDefault();
        patientFirstName.focus();
        return;
        }
    else{
        if(reFirstName.test(patientFirstName.value)!=true){
            window.alert("The Data Entered for Patient First Name is incorrect. Please check your data.")
            event.preventDefault();
            patientFirstName.focus();
            return;
        }
        }
    if(patientLastName.value===""){
        window.alert("Patient Last Name is Missing. Please enter last name.")
        event.preventDefault();
        patientLastName.focus();
        return;
    }
    else{
        if(reLastName.test(patientLastName.value)!=true){
            window.alert("The Data Entered for Patient Last Name is incorrect. Please check your data.")
            event.preventDefault();
            patientLastName.focus();
            return;
        }
    }
    if(patientID.value===""){
        window.alert("Patient ID Missing. Please enter patient ID.")
        event.preventDefault();
        patientID.focus();
        return;
    }
    else{
        if(reID.test(patientID.value)!=true){
            window.alert("The Data Entered for Patient ID is incorrect. Please check your data.")
            event.preventDefault();
            patientID.focus();
            return;
        }
    }
}