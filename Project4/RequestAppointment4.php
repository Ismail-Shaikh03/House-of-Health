<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $appointmentID=rand(0,1500);
    $appointmentDate=$_POST["appointmentDate"];
    $appointmentType=$_POST["appointmentType"];
    $doctorID=$_POST["doctorID"];
    $procedureNeeded=$_POST["procedureNeeded"];
    $patientID=$_SESSION["patientID"];
    if($doctorID==1){
        $sql1="UPDATE `PatientAppointmentsAndProcedures` 
        SET `Doctor`='Dr.Smith' 
        WHERE `DoctorID`=1";
    }
    if($doctorID==2){
        $sql1="UPDATE `PatientAppointmentsAndProcedures` 
        SET `Doctor`='Dr.John' 
        WHERE `DoctorID`=2";
    }
    if($doctorID==3){
        $sql1="UPDATE `PatientAppointmentsAndProcedures` 
        SET `Doctor`='Dr.Patel' 
        WHERE `DoctorID`=3";
    }
    if($doctorID==4){
        $sql1="UPDATE `PatientAppointmentsAndProcedures` 
        SET `Doctor`='Dr.Lawrence' 
        WHERE `DoctorID`=4";
    }
    if($doctorID==5){
        $sql1="UPDATE `PatientAppointmentsAndProcedures` 
        SET `Doctor`='Dr.Cranel' 
        WHERE `DoctorID`=5";
    }
    $sql="UPDATE `PatientAppointmentsAndProcedures`
    SET `AppointmentDate`='$appointmentDate',`AppointmentType`='$appointmentType',`AppointmentProcedureID`=$appointmentID,`DoctorID`=$doctorID
    WHERE PatientID=$patientID";
    if(mysqli_query($con,$sql)){
        if($procedureNeeded=="Yes"){
            echo "<script>alert('Appointment Made. Your Appointment ID:$appointmentID. Proceeding to Schedule a Procedure Form.')</script>";
            mysqli_query($con,$sql1);
            header("refresh:0.5;url=ScheduleProcedure4.html");
        }
        if($procedureNeeded=="No"){
            echo "<script>alert('Appointment Made. Your Appointment ID:$appointmentID')</script>";
            mysqli_query($con,$sql1);
            header("refresh:0.5;url=RequestAppointment4.html");
        }
    }
    else{
        echo "<script>alert('There seems to be an error. Try again.')</script>";
        header("refresh:0.5;url=RequestAppointment4.html");
    }
}
?>