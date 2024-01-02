let appointmentID=document.getElementById("appointmentID");
let reAppointmentID=/^[0-9]{0,4}$/;
let submitButton=document.getElementById("submit");
submitButton.addEventListener("click",check);
function check(){
    if(appointmentID.value==""){
        alert("Please enter in appointment ID");
        event.preventDefault();
        appointmentID.focus();
        return;
    }
    if(reAppointmentID.test(appointmentID.value)!= true){
        alert("Please enter in a valid appointment ID");
        event.preventDefault();
        appointmentID.focus();
        return;
    }
    if(confirm("You are about to cancel your apppointment. If this is a pre-procedural appointment then your procedure will also cancel.")==true){

    }
    else{
        alert("You have stopped the cancelation of the appointment.");
        event.preventDefault();
    }
}