<script> 
    function NoEmptyForm() {
        var x = document.forms["Customers"]["FirstName"].value;
            if (x == "" || x == null) {
                alert("Firstname must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["LastName"].value;
            if (x == "" || x == null) {
                alert("Lastname must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["UserName"].value;
            if (x == "" || x == null) {
                alert("Username must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["DateOfBirth"].value;
            if (x == "" || x == null) {
                alert("Date of Birth must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["Gender"].value;
            if (x == "" || x == null) {
                alert("Gender must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["Email"].value;
            if (x == "" || x == null) {
                alert("Email must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["Phone"].value;
            if (x == "" || x == null) {
                alert("Phone must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["Password"].value;
            if (x == "" || x == null) {
                alert("Password must be filled out");
                return false;
            }
        var x = document.forms["Customers"]["Reenterpassword"].value;
            if (x == "" || x == null) {
                alert("Re-enter Password must be filled out");
                return false;
                }
    }
</script>
<?php
    require 'DatabaseAccess.php';
   
    
    if(isset($_POST['UserName'])){

        $valid = "";
        try{
            $pdo= new PDO($attr,$user,$pass,$opts);
        }
        catch(\PDOException $e){
            throw new \PDOException($e->getMessage(),(int)$e->getCode());
        }

        $myusername = sanitise($pdo,$_POST['UserName']);
        $mypassword = sanitise($pdo,$_POST['Password']);
        $retrypass = sanitise($pdo,$_POST['Reenterpassword']);
        $myhashpassword = password_hash($mypassword, PASSWORD_DEFAULT);
        $dob = sanitise($pdo,$_POST['DateOfBirth']);
        $email = sanitise($pdo,$_POST['Email']);
        $firstname = sanitise($pdo,$_POST['FirstName']);
        $lastname = sanitise($pdo,$_POST['LastName']);
        $phone = sanitise($pdo,$_POST['Phone']);
        $gender = sanitise($pdo,$_POST['Gender']);
        if($_POST['Gender'] == "Male"){
            $gender = 'M';
        }
        elseif($_POST['Gender'] == "Female"){
            $gender = 'F';
        }
        else{
            $gender = 'O';
        }
        

        $valid = valid($_POST['FirstName'], "/^[A-Za-z ]+$/");
        $valid .=valid($_POST['LastName'], "/^[A-Za-z]+$/" );
        $valid .=valid($_POST['UserName'],"/^[A-Za-z\d]{2,10}/");
        $valid .=valid($_POST['Email'],"/^[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$/");
        $valid .=valid($_POST['Phone'],"/^[0-9]+$/");
        $valid .=valid($_POST['Password'], "/^(?=.*\W)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/"); 



        if($valid == ""){
            $stmt = $pdo->query('SELECT * FROM cust_info WHERE Username ='. $myusername .'OR Email='. $email .'OR Phone='. $phone);
            $check = $stmt->fetchAll();
            $stmt1 = $pdo->query('SELECT * FROM admin_info WHERE Username ='. $myusername .'OR Email='. $email .'OR Phone='. $phone);
            $check1 = $stmt1->fetchAll();
            if((count($check) == 0 ) && (count($check1)==0) && ($_POST['Password'] == $_POST['Reenterpassword'])){   
                $query = "INSERT INTO $table (CustID,First_name,Last_name,Username,Dob,Gender,Email,Phone,Pwd) VALUES(NULL,$firstname,$lastname,$myusername,$dob,'$gender',$email,$phone,'$myhashpassword')";
                $result = $pdo->query($query);
                if(! $result){
                    die('Error:' . mysqli_error());
                }
                header("location:index.php?page=Sucessfull");   
            }
        }
    }
    function sanitise($pdo,$str){
        $str = htmlentities($str);
        return $pdo->quote($str);
    }
    function datavalid($data,$data_pattern,$errormessage){
        if(preg_match($data_pattern, $data)){
            return "";
        }
        else{
            return $errormessage;
        }
    }
    function valid($data,$data_pattern){
        if(!preg_match($data_pattern, $data)){
            return 1;
        }

    }
    
?>
<html>
    <?=h_header('Sign Up')?>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS.css">
    </head>
    <body>
        <div class="signupbox">
            <div style="font-size:30px;text-align:center;padding-bottom:15px;">Sign up</div>
            <div style="text-align:center; color:grey; padding-bottom:15px;" >Fill in all the blank required to create a account.</div>
            <hr>
                <form method="post" name="Customers" onsubmit="return NoEmptyForm()">
                    <table width="430px" border="0" align="center" cellpadding="0px" cellspacing="5">
                        <tr>
                            <th><label for="FirstName" >Firstname</label></th>
                            <td></td>
                            <th><label for="FirstName" >Lastname</label></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input class="inputsize" type="text" id="FirstName" value="<?php if(isset($_POST['FirstName'])){echo $_POST['FirstName'];}?>" name="FirstName" autocomplete="off"></td>
                            <td colspan="3"><input class="inputsize" type="text" id="LastName" value="<?php if(isset($_POST['LastName'])){ echo $_POST['LastName'];} ?>" name="LastName" autocomplete="off"></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="color:red;font-size:12px">
                                <?php 
                                    if(isset($_POST['FirstName'])){ 
                                    $validation = datavalid($_POST['FirstName'], "/^[A-Za-z ]+$/" , "*Contain letters and spacing only"); 
                                    if($validation != ""){
                                    echo $validation;
                                   }
                                }
                                ?>
                            </td>
                            <td colspan="3" style="color:red;font-size:12px">
                                <?php 
                                    if(isset($_POST['LastName'])){ 
                                    $validation = datavalid($_POST['LastName'], "/^[A-Za-z]+$/" , "*Contain letters only no spacing"); 
                                    if($validation != ""){
                                    echo $validation;
                                   }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="5"><label for="Username">Username</label></th>        
                        </tr>
                        </tr>
                        <tr>
                            <th colspan="5"><input style="width:405px;"class="inputsize" type="text" value="<?php if(isset($_POST['UserName'])){ echo $_POST['UserName'];}?>"id="UserName" name="UserName"  autocomplete="off" ></th>
                        </tr>
                        <tr>
                            <td colspan="5" style="color:red;font-size:12px">
                            <?php
                                if(isset($_POST['UserName'])){                           
                                    $stmt = $pdo->query('SELECT * FROM cust_info WHERE Username ='. $pdo->quote($_POST['UserName']));
                                    $checkusername = $stmt->fetchAll();
                                    $stmt1 = $pdo->query('SELECT * FROM admin_info WHERE Username ='. $pdo->quote($_POST['UserName']));
                                    $checkusername1 = $stmt1->fetchAll();
                                    $validation = datavalid($_POST['UserName'],"/^[A-Za-z\d]{2,10}/","*2-10 words or numbers only no spacing");
                                    if($validation != ""){
                                        echo $validation;
                                       }
                                    elseif(count($checkusername)>0 || count($checkusername1)>0){
                                        echo '*Username is used';
                                    }
                                    else{
                                        echo'';
                                    }
                                }
                            ?>
                            </td>
                        <tr>
                            <th><label for="DateOfBirth">Date of Birth</label></th>
                            <th></th>
                            <th><label for="gender"> Gender: </label></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="2"><input class="inputsize" type="date" id="DateOfBirth" name="DateOfBirth" autocomplete="off"></th>
                            <th colspan="3">                           
                                <select  style="width:194px;" class="inputsize"list="Gender" name="Gender" autocomplete="off">
                                <option disabled selected value></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                                </select>
                            </th>
                        </tr>
                        <tr>                  
                            <th><label for="Email">Email</label></th>
                        </tr>
                        <tr>
                            <th colspan="5"><input style="width:405px;" class="inputsize" type="email" value="<?php if(isset($_POST['Email']) ){ echo $_POST['Email'];} ?>"id="Email" name="Email" autocomplete="off"></th>
                        </tr>
                        <tr>
                            <td colspan="5" style="color:red;font-size:12px">
                            <?php
                                if(isset($_POST['Email']) ){                                
                                    $stmt = $pdo->query('SELECT * FROM cust_info WHERE Email ='. $pdo->quote($_POST['Email']));
                                    $checkemail = $stmt->fetchAll();
                                    $stmt1 = $pdo->query('SELECT * FROM admin_info WHERE Email ='. $pdo->quote($_POST['Email']));
                                    $checkemail1 = $stmt1->fetchAll();
                                    $validation = datavalid($_POST['Email'],"/^[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$/","* Email is not valid. example: lchowwai@yahoo.com" );
                                    if($validation != ""){
                                        echo $validation;

                                       }
                                    elseif(count($checkemail)>0 || count($checkemail1)>0){
                                        echo '*Email is used';

                                    }
                                    else{
                                        echo'';
                                    }
                                }
                            ?>
                            </td>
                        <tr>
                        <tr>
                            <th><label for="Phone">Phone</label></th>
                        </tr>    
                        <tr>
                            <th colspan="5"><input style="width:405px;" class="inputsize" type="tel" value="<?php if(isset($_POST['Phone']) ){ echo$_POST['Phone'];} ?>"id="Phone" name="Phone" autocomplete="off">
                        </tr>
                        <tr>
                            <td colspan="5" style="color:red;font-size:12px">
                            <?php
                                if(isset($_POST['Phone']) ){                                
                                    $stmt = $pdo->query('SELECT * FROM cust_info WHERE Phone ='. $pdo->quote($_POST['Phone']));
                                    $checkphone = $stmt->fetchAll();
                                    $stmt1 = $pdo->query('SELECT * FROM admin_info WHERE Phone ='. $pdo->quote($_POST['Phone']));
                                    $checkphone1 = $stmt1->fetchAll();
                                    $validation = datavalid($_POST['Phone'],"/^[0-9]+$/","*Contain numbers only" );
                                    if($validation != ""){
                                        echo $validation;

                                       }
                                    elseif(count($checkphone)>0 || count($checkphone1)>0){
                                        echo '*Phone is used';

                                    }
                                    else{
                                        echo'';
                                    }
                                }
                            ?>   
                            </td>
                        </tr>
                        <tr>
                            <th><label for="Password">Password</th>
                        </tr>
                        <tr>
                            <th colspan="5"><input style="width:405px;" class="inputsize" type="password" id="Password" name="Password" autocomplete="off"></th>
                        </tr>
                        <tr>
                            <td colspan="5" style="color:red;font-size:12px">
                            <?php 
                                    if(isset($_POST['Password'])){ 
                                    $validation = datavalid($_POST['Password'], "/^(?=.*\W)(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/" , "*Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters"); 
                                    if($validation != ""){
                                    echo $validation;
                                   }
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="Reenterpassword">Re-enter Password</th>
                        </tr>
                        <tr>
                            <th colspan="5"><input style="width:405px;" class="inputsize" type="password" id="Reenterpassword" name="Reenterpassword"  autocomplete="off"></th>
                        </tr>
                        <tr>
                            <td colspan="5" style="color:red;font-size:12px">
                            <?php
                                if(isset($_POST['Reenterpassword'])){
                                    if ($_POST['Password'] != $_POST['Reenterpassword']){
                                        echo '*Re-enter password does not match your password';

                                    }
                                    else{
                                        echo'';
                                    }
                                }
                            ?>
                            </td>
                        <tr>
                        <tr>
                            <th colspan="5"><input class="signupbuttom" type="submit"  value="Sign Up" autocomplete="off" name="Submit">
                        </tr>
                    </table>    
                </form> 
        </div>
        <br><br>   
    </body>
    <?=h_footer()?> 
</html>

