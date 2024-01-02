let check_box=document.getElementById("check_box")
let check_box_required=document.getElementById("email_required")
check_box.addEventListener("change",function(){
    if(check_box.checked==true){
    check_box_required.style.visibility="visible";
    }
    else{
    check_box_required.style.visibility="hidden";
    }
    });
let reFirstName=/^[A-Za-z-]+$/;
let reLastName=/^[A-Za-z-]+$/;
let reID=/^[0-9]{4}$/;
let rePhoneNumber=/^[0-9]{3}[ -]{1}[0-9]{3}[ -]{1}[0-9]{4}$/; // /^[0-9 -]{10,12}$/-> old regex expression
let rePassword=/^(?=.*[!@#$%^&*])(?=.*[A-Z])(?=.*[0-9])[A-Za-z0-9!@#$%^&*]{3,16}$/;
let reEmail=/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{3,5}$/;
let firstName=document.getElementById("first_name");
let lastName=document.getElementById("last_name");
let phoneNumber=document.getElementById("phone_number");
let emailAddress=document.getElementById("email_address");
let password=document.getElementById("password");
let idNumber=document.getElementById("id_number");
let dropDown=document.getElementById("transaction");
let submit=document.getElementById("submit");
submit.addEventListener("click",validate);
function validate(){
    if(firstName.value===""){
        window.alert("Receptionist First Name Missing. Please enter first name.")
        event.preventDefault();
        firstName.focus();
        return;
        }
    else{
        if(reFirstName.test(firstName.value)!=true){
            window.alert("Enter a Valid First Name")
             event.preventDefault();
             firstName.focus();
             return;
            }
     }
    if(lastName.value===""){
        window.alert("Receptionist Last Name Missing. Please enter last name.")
        event.preventDefault();
        lastName.focus();
        return;
    }
    else{
        if(reLastName.test(lastName.value)!=true){
            window.alert("Enter a Valid Last Name")
            event.preventDefault();
            lastName.focus();
            return;
        }
    }
    if(phoneNumber.value===""){
    window.alert("Receptionist Phone Number is Missing. Please enter number.")
    event.preventDefault();
    phoneNumber.focus();
    return;
    }
    else{
    if(rePhoneNumber.test(phoneNumber.value)!=true){
    window.alert("Enter a Valid Phone Number");
    event.preventDefault();
    phoneNumber.focus();
    return;
    }
    }
    if(check_box.checked==true&&emailAddress.value===""){
    window.alert("Receptionist's Email Address is Missing. Please enter email.")
    event.preventDefault();
    emailAddress.focus();
    return;
    }
    else{
    if(check_box.checked==true&&reEmail.test(emailAddress.value)!=true){
    window.alert("Enter a Valid Email Address")
    event.preventDefault();
    emailAddress.focus();
    return;
    }
    }
    if(password.value===""){
    window.alert("Receptionist Password is Missing. Please enter password.")
    event.preventDefault();
    password.focus();
    return;
    }
    else{
    if(rePassword.test(password.value)!=true){
    window.alert("Enter a Valid Password with 1 uppercase, 1 number, and 1 special character with a max length of 16")
    event.preventDefault();
    password.focus();
    return;
    }
    }
    if(idNumber.value===""){
    window.alert("Receptionist ID Number is Missing. Please enter ID.");
    event.preventDefault();
    idNumber.focus();
    return;
    }
    else{
    if(reID.test(idNumber.value)!=true){
    window.alert("Enter a Valid 4 digit ID.");
    event.preventDefault();
    idNumber.focus();
    return;
    }
    }
    //verify();
    }
    let receptionists=[{firstName:"Ismail",lastName:"Shaikh",emailAddress:"is385@njit.edu",password:"Is456!",idNumber:"7631"},
                       {firstName:"James",lastName:"Smith",emailAddress:"james65@gmail.com",password:"James342!",idNumber:"1234"},
                       {firstName:"Abigail",lastName:"Pane",emailAddress:"pane987@yahoo.com",password:"Pabigail4!",idNumber:"0876"},
                       {firstName:"Sam",lastName:"North",emailAddress:"sammy64@gmail.com",password:"sammyN1$",idNumber:"8769"},
                       {firstName:"Anos",lastName:"Miller",emailAddress:"anosM87@yahoo.com",password:"Amill87@",idNumber:"1209"},
                       {firstName:"Michael",lastName:"Jones",emailAddress:"jonesy87@gmail.com",password:"Mike09!",idNumber:"7333"},
                       {firstName:"Ben",lastName:"Allen",emailAddress:"ba685@gmail.com",password:"TBen08#",idNumber:"5489"},
                       {firstName:"Phil",lastName:"Dunphy",emailAddress:"philly06@gmail.com",password:"Potter45!",idNumber:"0145"},
                       {firstName:"Chris",lastName:"Murphy",emailAddress:"cm87@stevens.edu",password:"Money87$",idNumber:"8310"},
                       {firstName:"Tucker",lastName:"Evans",emailAddress:"te754@njit.edu",password:"Evanns8*",idNumber:"5142"}
    ];
    function verify(){
    for(let i=0;i<receptionists.length;i++){
    if(check_box.checked==true){
    if(receptionists[i].firstName==firstName.value && receptionists[i].lastName==lastName.value&&receptionists[i].emailAddress==emailAddress.value&&receptionists[i].password==password.value&&receptionists[i].idNumber==idNumber.value){
    window.alert("Hello! "+firstName.value+" "+lastName.value+".\n"+"Transaction: "+dropDown.value+" Complete!");
    return true;
    }
    }
    else{
    if(receptionists[i].firstName==firstName.value && receptionists[i].lastName==lastName.value &&  receptionists[i].password==password.value && receptionists[i].idNumber==idNumber.value){
    window.alert("Hello! "+firstName.value+" "+lastName.value+".\n"+"Transaction: "+dropDown.value+" Complete!");
    return true;
    }
    }
    }
    window.alert("Cannot find Receptionist: "+firstName.value+" "+lastName.value);
    event.preventDefault();
    return false;
    }
