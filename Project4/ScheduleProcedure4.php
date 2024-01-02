<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $procedureID=rand(0,1500);
    $procedureDate=$_POST["procedureDate"];
    $procedureType=$_POST["procedureType"];
    $appointmentID=$_POST["appointmentID"];
    $sql="UPDATE `PatientAppointmentsAndProcedures`
    SET `ProcedureDate`= CASE WHEN `AppointmentDate`!='' AND `AppointmentType`!='' 
    THEN '$procedureDate'
    END,
    `ProcedureType`=CASE WHEN `AppointmentDate`!='' AND `AppointmentType`!='' 
    THEN'$procedureType' 
    END,
    `ProcedureID`=CASE WHEN `AppointmentDate`!='' AND `AppointmentType`!='' 
    THEN $procedureID 
    END
    WHERE `AppointmentProcedureID`=$appointmentID "; 
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Procedure Scheduled! Procedure ID:$procedureID')</script>";
        header("refresh:0.5;url=ScheduleProcedure4.html");
    }
    else{
        echo "<script>alert('Please make sure the pre-procedure appointment was made before booking the appointment.')</script>";
        header("refresh:0.5;url=ScheduleProcedure4.html");
    }
}
?>