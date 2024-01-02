let procedureDate=document.getElementById("procedureDate");
let procedureType=document.getElementById("procedureType");
let appointmentID=document.getElementById("appointmentID");
let reID=/^[0-9]{0,4}$/;
let submitButton=document.getElementById("submit");

submitButton.addEventListener("click",check);
function check(){
    if(procedureDate.value==""){
        alert("Enter in Procedure Date");
        event.preventDefault();
        procedureDate.focus();
        return;
    }
    if(procedureType.value==""){
        alert("Enter in Procedure Type");
        event.preventDefault();
        procedureType.focus();
        return;
    }
    if(appointmentID.value==""){
        alert("Enter in Appointment ID");
        event.preventDefault();
        appointmentID.focus();
        return;
    }
    if(reID.test(appointmentID.value)!=true){
        alert("Enter in a Valid Appointment ID")
        event.preventDefault();
        appointmentID.focus();
        return;
    }
    if(confirm("You are about to schedule a Procedure Apppointment. Are you sure?")==true){

    }
    else{
        alert("You have canceled.")
        event.preventDefault();
        return;
    }
}