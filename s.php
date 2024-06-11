<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: ../Downloads/index.html');
	exit;
}
$server="localhost";
$username="root";
$password="";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



$con=mysqli_connect($server,$username,$password);
if(!$con){
    die("connection failed ".mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $crno=$_POST["crno"];
    $taskno=$_POST["taskno"];
    $duedate=$_POST["due_date"];
    $presentdate=$_POST["present_Date"];
    $email=$_POST["email"];
    $empid=$_POST["empid"];
    $personname=$_POST["Personname"];
    $phoneno=$_POST["phoneno"];
    $body=$_POST["body"];
    $cc=$_POST["cc"];
    $empid=$_POST["empid"];
    if(!empty($_POST["addto"])){  
    $sql2="INSERT INTO `taskm`.`tasks`( `cr_no`, `task_no`,`empid`,`due_date`,`present_date`,`person_name`,`body`,`cc`,`email`,`phone`) VALUES ('$crno','$taskno','$empid','$duedate','$presentdate','$personname','$body','$cc',' $email','$phoneno')";
    $result=mysqli_query($con,$sql2);
    }


if(!empty($_POST["button"]))
{  
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com'; // Outlook SMTP server
    $mail->SMTPAuth   = true;
    $mail->Username   = 'Kirantu9972@outlook.co.id'; // Your Outlook email address
    $mail->Password   = 'Kiran@2002'; // Your Outlook email password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    // Sender and recipient settings
    $mail->setFrom('Kirantu9972@outlook.co.id', 'Your Name');
    $mail->addAddress($email, 'Recipient Name');
    $ccEmail = $cc;
    $mail->addCC($cc, 'CC User');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Subject Here';
    $mail->Body    = $body;

    // Send the email
    $mail->send();
    echo '<script type="text/javascript">
    alert("Mail has sent");window.location.href="./s.php"</script>';
}
 catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


    }
   
}


?>
    <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Management System</title>
        <link rel="stylesheet" href="styles.css">
        <style>
    .bulb {
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background-color: green; /* Default color for the bulb */
        display: inline-block;
        margin-right: 5px;
    }

    .bulb.late {
        background-color: red; /* Red color for the bulb if present_date > due_date */
    }
</style>

        
</head>
<body>
<header>
        <h1>Task Management System</h1>
        
    </header>
    <form method="post">
   
        <table id="taskTable">
         
                
                    <th>CR No</th>
                    <th>Task No</th>
                    <th>emp id</th>
                    <th>Due Date</th>
                    <th>Present Date</th>
                    <th>Person Name</th>
                    <th>body</th>
                    <th>cc</th>
                    <th>Email ID</th>
                    <th>Phone Number</th>
                    <tr>

<td>
    <input type="number" name="crno">
</td>
<td>
    <input type="number" name="taskno">
</td>
<td>
    <input type="text" name="empid">
</td>
    <td>
    <input type="date" name="due_date">
</td>
<td>
    <input  name="present_Date" id="present">
</td>
<td>
    <input type="text" name="Personname">
</td>
<td>
    <input type="text" name="body">
</td>
<td>
    <input type="text" name="cc">
</td>
<td>
    <input type="email" name="email">
</td>
<td>
    <input type="tel" name="phoneno">
</td>

<td>
    <Button type="submit" name="addto" value="addto">add to database</Button>
</td>
<td>
    <Button  name="button" value="send">send mail</Button>
</td>            </tr>
                   
                    
                
            
               
           
        </table>
</form>
    <table>
    <thead>
                <tr>
                    <th>Sl No</th>
                    <th>CR No</th>
                    <th>Task No</th>
                    <th>empid</th>
                    <th>Due Date</th>
                    <th>Present Date</th>
                    <th>Person Name</th>
                   
                    <th>Email ID</th>
                    <th>Phone Number</th>
                    <th>operation</th>
                </tr>
            </thead>

        <tbody>
        <?php
        $sql="select * from `taskm`.`tasks` ";
        $result=mysqli_query($con,$sql);
        $sn=1;
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Check if present_date is greater than due_date
            $lateClass = '';
            if ($row['present_date'] > $row['due_date']) {
                $lateClass = 'late';
            }
        
            echo "<tr>
                <td>".$sn."</td>
                <td>".$row['cr_no']."</td>
                <td>".$row['task_no']."</td>
                <td>".$row['empid']."</td>
                <td>".$row['due_date']."</td>
                <td>".$row['present_date']."</td>
                <td>".$row['person_name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['phone']."</td>
                <td>
                    <button class='delete-button' data-task_no='".$row['task_no']."'>Delete</button>
                    <button class='send-mail-button' data-email='".$row['email']."'>
                    <span class='bulb $lateClass'></span>Send Mail
                </button>
                </td>

            </tr>";
            $sn = $sn + 1;
        };
        
        ?>
        </tbody>
    </table>



<center><p> count</p></center>
    <table>
    <thead>
                <tr>
                    
                    <th>empid</th>
                    <th>preso Name</th>
                    <th>Count</th>
                    
                </tr>
            </thead>

        <tbody>

        <?php
        
            $sql="SELECT  empid,person_name,COUNT(task_no) AS task_count
            FROM `taskm`.`tasks`
            GROUP BY empid";
            $res=mysqli_query($con,$sql);
            
            while($rw = mysqli_fetch_assoc($res)){ 

            echo "
            <tr>
                
                <td>".$rw['empid']."</td>
                <td>".$rw['person_name']."</td>
                <td>".$rw['task_count']."</td>

                
            </tr>";
            
            };
        
        ?>
        </tbody>
    </table>


    <a href="../Downloads/logout.php"><i class="fas fa-sign-out-alt"></i><button>Logout</button></a>

    <script>
// JavaScript to confirm and handle row deletion
const deleteButtons = document.querySelectorAll('.delete-button');

deleteButtons.forEach(button => {
    button.addEventListener('click', () => {
        const task_no = button.getAttribute('data-task_no');
        const confirmMessage = "Are you sure you want to delete row " + task_no + "?";
        const confirmDelete = confirm(confirmMessage);

        if (confirmDelete) {
            // Redirect to a delete script or handle the deletion using AJAX
            window.location.href = 'delete.php?task_no=' + task_no;
        }
    });
});

        const sendMailButtons = document.querySelectorAll('.send-mail-button');

sendMailButtons.forEach(button => {
    button.addEventListener('click', () => {
        const email = button.getAttribute('data-email');
        const sendmail = confirm("Are you sure you want to send this row?");
                
                if (sendmail) {
                    // Redirect to a delete script or handle the deletion using AJAX
                    window.location.href = 'send.php?email=' + email;
                }
        // Use JavaScript or AJAX to send mail based on the email address
        // You can use the code you provided earlier for sending mail
        alert("Sending mail to: " + email);
    });
});
    </script>
    <script>
    function getCurrentDate() {
    const today = new Date();
    const year = today.getFullYear();
    let month = today.getMonth() + 1;
    let day = today.getDate();

    if (month < 10) {
        month = "0" + month;
    }

    if (day < 10) {
        day = "0" + day;
    }

    return year + "-" + month + "-" + day;
}
        presentDate = getCurrentDate();
        console.log(presentDate)
        e=document.getElementById("present");
        e.value= presentDate
        </script>
</body>
</html>
