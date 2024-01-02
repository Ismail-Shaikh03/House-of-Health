<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $patientFirstName=$_POST["patientFirstName"];
    $patientLastName=$_POST["patientLastName"];
    $patientID=$_POST["patientID"];
    $transaction=$_SESSION["transaction"];
    $sql="SELECT *
    FROM PatientInformation
    INNER JOIN PatientMedicalRecord
    ON PatientInformation.PatientID=PatientMedicalRecord.PatientID
    INNER JOIN PatientAppointmentsAndProcedures
    ON PatientInformation.PatientID=PatientAppointmentsAndProcedures.PatientID
    WHERE PatientInformation.PatientFirstName='$patientFirstName'
    AND PatientInformation.PatientLastName='$patientLastName'
    AND PatientInformation.PatientID=$patientID";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
        if($transaction=="Update Patient Information"){
            echo "<script>window.location.href='PatientUpdateForm4.html'</script>";
        }
        if($transaction=="Book Appointment"){
            $_SESSION["patientID"]=$patientID;
            echo "<script>window.location.href='RequestAppointment4.html'</script>";
        }
        if($transaction=="Cancel Appointment"){
            $_SESSION["patientID"]=$patientID;
            echo "<script>window.location.href='CancelAppointment4.html'</script>";
        }
        if($transaction=="Request Procedures"){
            echo "<script>window.location.href='ScheduleProcedure4.html'</script>";
        }
        if($transaction=="Cancel Procedure"){
            echo "<script>window.location.href='CancelProcedure4.html'</script>";
        }
    }
    else{
        echo"<script>alert('Patient Cannot be Found. You are being redirected to create an account.')</script>";
        header("refresh:0.5;url=CreatePatientForm4.html");
    }
}
?>