<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if($_SERVER["REQUEST_METHOD"]== "POST"){
    $patientShots=$_POST["patientShots"];
    $patientIllnesses=$_POST["patientIllnesses"];
    $patientID=$_POST["patientID"];
    if($patientShots!=="" && $patientIllnesses===""){
        $sql="UPDATE `PatientMedicalRecord` 
        SET `ShotsGiven`= '$patientShots'
        WHERE PatientID=$patientID";
    }
    if($patientShots==="" && $patientIllnesses!==""){
        $sql="UPDATE `PatientMedicalRecord` 
        SET `Illnesses`= '$patientIllnesses'
        WHERE PatientID=$patientID";
    }
    if($patientShots!=="" && $patientIllnesses!==""){
        $sql="UPDATE `PatientMedicalRecord` 
        SET `ShotsGiven`= '$patientShots',`Illnesses`= '$patientIllnesses'
        WHERE PatientID=$patientID";
    }
    if(mysqli_query($con,$sql)){
        echo "<script>alert('Patient Information was Successfully Updated.')</script>";
        header("refresh:0.5;url=PatientUpdateForm4.html");
    }
    else{
        echo "<script>alert('The Data Entered for $patientID is incorrect. Please check your data.')</sctipt>";
        header("refresh:0.5;url=PatientUpdateForm4.html");
    }

}
?>