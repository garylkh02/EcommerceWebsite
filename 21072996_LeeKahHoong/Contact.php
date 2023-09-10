<script> 
                    function NoEmptyForm() {
                      var x = document.forms["Feedback"]["firstname"].value;
                      if (x == "" || x == null) {
                        alert("Firstname must be filled out");
                        return false;
                      }
                      var x = document.forms["Feedback"]["lastname"].value;
                      if (x == "" || x == null) {
                        alert("Lastname must be filled out");
                        return false;
                      }
                      var x = document.forms["Feedback"]["phone"].value;
                      if (x == "" || x == null) {
                        alert("Phone must be filled out");
                        return false;
                      }
                      var x = document.forms["Feedback"]["email"].value;
                      if (x == "" || x == null) {
                        alert("Email must be filled out");
                        return false;
                      }
                    
                    }
                </script>


<?php
    include 'logtimeout.php';
    require 'DatabaseAccess.php';

    if(isset($_POST['firstname']) && isset($_POST['message'])){

        try{
            $pdo= new PDO($attr,$user,$pass,$opts);
        }
        catch(\PDOException $e){
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        }

       
       
        $email = sanitise($pdo,$_POST['email']);
        $firstname = sanitise($pdo,$_POST['firstname']);
        $lastname = sanitise($pdo,$_POST['lastname']);
        $phone = sanitise($pdo,$_POST['phone']);
        $message = sanitise($pdo,$_POST['message']);

            $query = "INSERT INTO `feedback` (FeedbackID,Firstname,Lastname,Email,Phone,Message) VALUES(NULL,$firstname,$lastname,$email,$phone,$message)";
            $result = $pdo->query($query);
            if(! $result){
                die('Error:' . mysqli_error());
            }
            header("location:index.php?page=Sucessfull");     
    }
    function sanitise($pdo,$str){
        $str = htmlentities($str);
        return $pdo->quote($str);
    }
?>


<?=h_header('Contact us')?>
<html>
<head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS.css">
    </head>
    <body>
        <div class="recentlyadded content-wrapper">
            <h2>Contact Us <br><p>Any questions or suggestions? Feel free to leave a message!</p></h2>
        </div>
            <div class="contactbox">
                <div class="contentleft">
                    <div style="font-size:40px">Contact Information</div>
                    <br>
                    <p>Fill in the form and we will reply to your email as soon as possible.</p>
                    <br><br><br><br><br><br><br>
                    <table cellpadding="0" cellspacing="0" style="color:#FFFFFF">
                    <tr>
                    <td style="padding-right:30px;padding-bottom:30px"><img src="./imgs/name.png" class="imgicon" alt="phone icon"></td>
                    <td style="padding-bottom:30px;">Long Chow Wai</td>
                    </tr>
                    <tr>
                    <td style="padding-right:30px;padding-bottom:30px"><img src="./imgs/phone.png" class="imgicon" alt="phone icon"></td>
                    <td style="padding-bottom:30px;">+6012 367 8839</td>
                    </tr>
                    <tr></tr>
                    <tr>
                    <td style="padding-right:30px;padding-bottom:30px"><img src="./imgs/mail.png" class="imgicon" alt="mail icon"></td>
                    <td style="padding-bottom:30px;">greenstuff@gmaill.com</td>
                    </tr>
                    </table>
                </div>
                <div class="contentright" >
                    <form method="post" name="Feedback" onsubmit="return NoEmptyForm()">
                    <table cellpadding="0" cellspacing="10">
                    <tr>
                        <td>First name</td>
                        <td></td>
                        <td>Last name</td>
                        <td></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input style="width:245px;margin-right:30px;margin-bottom:30px;"class="loginword" type="text" pattern="[A-Za-z ]+" title="Contain letter only"  name="firstname" autocomplete="off" placeholder="Jack"></td>
                    <td colspan="2"><input style="width:245px;margin-bottom:30px;"class="loginword" type="text" pattern="[A-Za-z ]+" title="Contain letter only" id="lastname" name="lastname" autocomplete="off" placeholder="Hoong Jie"></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td></td>
                        <td>Phone</td>
                        <td></td>
                    </tr>
                    <tr>
                    <td colspan="2"><input style="width:245px;margin-right:30px;margin-bottom:30px;"class="loginword" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="example: lchowwai@yahoo.com no capital letter" id="email" name="email" autocomplete="off" placeholder="greenstuff@gmail.com"></td>
                    <td colspan="2"><input style="width:245px;margin-bottom:30px;"class="loginword" type="text" pattern="[0-9]{10,11}" title="10-11 digits only" id="phone" name="phone" autocomplete="off" placeholder="0122345678"></td>
                    </tr>
                    <tr>
                        <td>Message</td>
                    </tr>
                    <tr>
                        <td colspan="4"><textarea rows="4" cols="50" name="message" maxlength="500" placeholder="Enter text here..."></textarea></td>
                    </tr>
                    <tr>
                        <td style="text-align:right;"colspan="4"><input class="sendbuttom" type="submit"  value="Send Message" autocomplete="off" name="Submit"></td>
                    </tr>
                    </table>
                    </form>
                </div>
            </div>
    </body>
</html>


<?=h_footer()?>

