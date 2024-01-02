let appointmentDate=document.getElementById("appointmentDate");
let appointmentType=document.getElementById("appointmentType");
let doctorID=document.getElementById("doctorID");
let procedureNeeded=document.getElementById("procedureNeeded");
let submitButton=document.getElementById("submit");
submitButton.addEventListener("click",check);
function check(){
    if(appointmentDate.value==""){
        alert("Appointment Date is missing. Please add.");
        event.preventDefault();
        appointmentDate.focus();
        return;
    }
    if(appointmentType.value==""){
        alert("Appointment Type is missing. Please add.");
        event.preventDefault();
        appointmentType.focus();
        return;
    }
    if(doctorID.value==""){
        alert("Doctor ID is missing. Please add.");
        event.preventDefault();
        doctorID.focus();
        return;
    }
    if(confirm("You are about to REQUEST an APPOINTMENT. Are you sure?")==true){

    }
    else{
        alert("You have canceled the REQUEST APPOINTMENT.");
        event.preventDefault();
        return;
    }
}