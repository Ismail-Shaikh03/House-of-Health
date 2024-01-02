let procedureID=document.getElementById("procedureID");
let reProcedureID=/^[0-9]{0,4}$/;
let submitButton=document.getElementById("submit");
submitButton.addEventListener("click",check);
function check(){
if(procedureID.value==""){
    alert("Please enter procedrue ID.");
    event.preventDefault();
    return;
}
if(reProcedureID.test(procedureID.value)!=true){
    alert("Please enter valid Procedure ID");
    event.preventDefault();
    return;
}
if(confirm("You are about to cancel procedure appointment")==true){

}else{
    alert("You have not canceled your procedure.")
    event.preventDefault();
    return;
}
}