<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $receptionistID=$_POST["receptionistID"];
    $patientFirstName=$_POST["patientFirstName"];
    $patientLastName=$_POST["patientLastName"];
    $patientID=$_POST["patientID"];
    $sql="INSERT INTO `PatientInformation`(`ReceptionistID`, `PatientFirstName`, `PatientLastName`, `PatientID`) 
    VALUES ($receptionistID,'$patientFirstName','$patientLastName', $patientID)";
    $sql1="INSERT INTO `PatientMedicalRecord`(`PatientID`, `DateOfBirth`, `Age`, `PatientAddressAndNumber`, `ShotsGiven`, `Illnesses`, `RecordID`)
    VALUES ($patientID,'',0,'','','',$patientID)";
    $sql2="INSERT INTO `PatientAppointmentsAndProcedures`(`PatientID`, `AppointmentDate`, `AppointmentType`, `ProcedureDate`, `ProcedureType`, `Doctor`, `AppointmentProcedureID`, `ProcedureID`, `DoctorID`) 
    VALUES ($patientID,'','','','','',$patientID,0,0)";
    if(mysqli_query($con,$sql)&&mysqli_query($con,$sql1)&&mysqli_query($con,$sql2)){
        echo "<script>alert('Patient Account Created')</script>";
        header("refresh:0.5;url=CreatePatientForm4.html");
    }
    else{
        echo "<script>alert('Patient Already Exists')</script>";
        header("refresh:0.5;url=CreatePatientForm4.html");
    }
}
?>