<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $appointmentID=$_POST["appointmentID"];
    $patientID=$_SESSION["patientID"];
    $sql="UPDATE `PatientAppointmentsAndProcedures` 
    SET `AppointmentDate`= '',`AppointmentType`= '',`ProcedureDate`= '',`ProcedureType`= '' 
    WHERE `AppointmentProcedureID`=$appointmentID";
    //,`AppointmentProcedureID`= NULL
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Appointment Deleted.If this was a Pre-Surgical Appointment then your Procedure was also canceled.')</script>";
        header("refresh:0.5;url=CancelAppointment4.html");
    }
    else{
        echo "<script>alert('Appointment ID does not exist for the Patient. Please re-enter Appointment ID.')</script>";
        header("refresh:0.5;url=CancelAppointment4.html");
    }
}
?>