<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="DataTableStyle4.css">
    </head>
<body>
<nav>
        <div class="navigation">
            <a href="MainPortal4.html">HOME</a>
            <a href="SearchReceptionist4.php">Search a Receptionist Account</a>
            <a href="PatientUpdateForm4.html">Update Patient Information</a>
            <a href="RequestAppointment4.html">Schedule Patient Appointment</a>
            <a href="CancelAppointment4.html">Cancel Patient Appointment</a>
            <a href="ScheduleProcedure4.html">Schedule Patient Procedure</a>
            <a href="CancelProcedure4.html">Cancel Patient Procedure</a>
            <a href="CreatePatientForm4.html">Create Patient Account</a>
        </div>
    </nav>
<h1>House of Health</h1>

</body>
</html>
<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("Connect.php");
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $receptionistFirstName=$_POST["first_name"];
    $receptionistLastName=$_POST["last_name"];
    $receptionistPhoneNumber=$_POST["phone_number"];
    $receptionistEmailAddress=$_POST["email_address"];
    $receptionistPassword=$_POST["password"];
    $receptionistID=$_POST["id_number"];
    $transaction=$_POST["transaction"];
    $_SESSION["first_name"]=$receptionistFirstName;
    $_SESSION["last_name"]=$receptionistLastName;
    $_SESSION["phone_number"]=$receptionistPhoneNumber;
    $_SESSION["email_address"]=$receptionistEmailAddress;
    $_SESSION["password"]=$receptionistPassword;
    $_Session["id_number"]=$receptionistID;
    $_SESSION["transaction"]=$transaction;
    /*if($transaction=="Update Patient Information"){
        $_SESSION["transaction"]="Update Patient Information";
    }
    if($transaction=="Book Appointment"){
        $_SESSION["transaction"]="Book Appointment";
    }*/
    if(isset($_POST["check_box"])){
        $sql="SELECT *
        FROM ReceptionistsInformation
        INNER JOIN PatientInformation
        ON ReceptionistsInformation.ReceptionistID=PatientInformation.ReceptionistID
        INNER JOIN PatientMedicalRecord
        ON PatientInformation.PatientID=PatientMedicalRecord.PatientID
        INNER JOIN PatientAppointmentsAndProcedures
        ON PatientInformation.PatientID=PatientAppointmentsAndProcedures.PatientID
        WHERE ReceptionistsInformation.ReceptionistID=$receptionistID
        AND ReceptionistsInformation.ReceptionistFirstName='$receptionistFirstName'
        AND ReceptionistsInformation.ReceptionistLastName='$receptionistLastName'
        AND ReceptionistsInformation.ReceptionistPassword='$receptionistPassword'
        AND ReceptionistsInformation.ReceptionistEmail='$receptionistEmailAddress'";
    }
    else{
        $sql="SELECT *
        FROM ReceptionistsInformation
        INNER JOIN PatientInformation
        ON ReceptionistsInformation.ReceptionistID=PatientInformation.ReceptionistID
        INNER JOIN PatientMedicalRecord
        ON PatientInformation.PatientID=PatientMedicalRecord.PatientID
        INNER JOIN PatientAppointmentsAndProcedures
        ON PatientInformation.PatientID=PatientAppointmentsAndProcedures.PatientID
        WHERE ReceptionistsInformation.ReceptionistID=$receptionistID
        AND ReceptionistsInformation.ReceptionistFirstName='$receptionistFirstName'
        AND ReceptionistsInformation.ReceptionistLastName='$receptionistLastName'
        AND ReceptionistsInformation.ReceptionistPassword='$receptionistPassword'";
    }
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0 ){
        if($transaction=="Search Account"){
            echo "<table>";
            echo "<tr><th>Receptionist First Name</th><th>Receptionist Last Name</th><th>Receptionist ID</th><th>Receptionist Phone Number</th><th>Receptionist Email Address</th><th>Patient First Name</th><th>Patient Last Name</th><th>Patient ID</th><th>Date of Birth</th><th>Age</th><th> Phone # and Address</th><th>Shots</th><th>Illness</th><th>Appointment Date</th><th>Appointment Type</th><th>Procedure Date</th><th>Procedure Type</th><th>Doctor Name</th><th>Doctor ID</th></tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                echo "<td>".$row['ReceptionistFirstName']."</td>";
                echo "<td>".$row['ReceptionistLastName']."</td>";
                echo "<td>".$row['ReceptionistID']."</td>";
                echo "<td>".$row['ReceptionistPhone']."</td>";
                echo "<td>".$row['ReceptionistEmail']."</td>";
                echo "<td>".$row['PatientFirstName']."</td>";
                echo "<td>".$row['PatientLastName']."</td>";
                echo "<td>".$row['PatientID']."</td>";
                echo "<td>".$row['DateOfBirth']."</td>";
                echo "<td>".$row['Age']."</td>";
                echo "<td>".$row['PatientAddressAndNumber']."</td>";
                echo "<td>".$row['ShotsGiven']."</td>";
                echo "<td>".$row['Illnesses']."</td>";
                echo "<td>".$row['AppointmentDate']."</td>";
                echo "<td>".$row['AppointmentType']."</td>";
                echo "<td>".$row['ProcedureDate']."</td>";
                echo "<td>".$row['ProcedureType']."</td>";
                echo "<td>".$row['Doctor']."</td>";
                echo "<td>".$row['DoctorID']."</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        if($transaction=="Update Patient Information"){
            echo "<script>window.location.href='PatientInfoPortal4.html'</script>";
        }
        if($transaction=="Create New Patient Account"){
            echo "<script>window.location.href='CreatePatientForm4.html'</script>";
        }
        if($transaction=="Book Appointment"){
            echo "<script>window.location.href='PatientInfoPortal4.html'</script>";
        }
        if($transaction=="Cancel Appointment"){
            echo "<script>window.location.href='PatientInfoPortal4.html'</script>";
        }
        if($transaction=="Request Procedures"){
            echo "<script>window.location.href='PatientInfoPortal4.html'</script>";
        }
        if($transaction=="Cancel Procedure"){
            echo "<script>window.location.href='PatientInfoPortal4.html'</script>";
        }

    }
    else{
        echo "<script>alert('$receptionistFirstName $receptionistLastName Not Found. Please try again!')</script>";
        echo "<script>window.location.href='MainPortal4.html'</script>";
        }
}
?>