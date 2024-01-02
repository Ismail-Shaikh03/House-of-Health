<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $procedureID=$_POST["procedureID"];
    $sql="UPDATE `PatientAppointmentsAndProcedures`
    SET  `ProcedureDate`= '',`ProcedureType`= ''
    WHERE `ProcedureID`=$procedureID";
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Your Procedure Appointment was Deleted')</script>";
        header("refresh:0.5;url=CancelProcedure4.html");
    }
    else{
        echo "<script>alert('Please check if the procedure ID is correct.')</script>";
        header("refresh:0.5;url=CancelProcedure4.html");
    }
}
?>