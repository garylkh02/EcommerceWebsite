<html>
    <?=h_header('Login')?>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="CSS.css">
    </head>
    <body>
        <div class="login">
        <div style="font-size:30px;text-align:center;padding-bottom:15px;">Login</div>
        <hr>
        <br>
        <form method="post" name="login" onsubmit="return NoEmptyForm()">
        <table width="353px" border="0" align="center" cellpadding="2px" cellspacing="5">
        <tr>
          <td colspan="3" style="font-size:12px; color:red;">
              <?php 
              require 'DatabaseAccess.php';
                try
                      {
                        $pdo = new PDO($attr, $user, $pass, $opts);
                      }
                      catch (\PDOException $e)
                      {
                        throw new \PDOException($e->getMessage(), (int)$e->getCode());
                      }

                    if(isset($_POST['username']) && isset($_POST['password'])){
                      
                        $un_temp = sanitise($pdo,$_POST['username']);
                        $pw_temp = sanitise($pdo,$_POST['password']);
                        $query   = "SELECT * FROM cust_info WHERE Username=$un_temp";
                        $result  = $pdo->query($query);

                        if (!$result->rowCount()) {
                          $query   = "SELECT * FROM `admin_info` WHERE Username=$un_temp";
                          $result  = $pdo->query($query);
                          if (!$result->rowCount()) {
                          echo "*User not found";
                          }
                          else{
                            $row = $result->fetch();
                            $fn  = $row['First_name'];
                            $ln  = $row['Last_name'];
                            $un  = $row['Username'];
                            $id = $row['AdminID'];
                            $pw  = $row['Pwd'];

                            if (password_verify($pw_temp, $pw)){
                              session_start();

                              $_SESSION['First_name'] = $fn;
                              $_SESSION['Username'] = $un;
                              $_SESSION['AdminID'] = $id;
                              $_SESSION['ID'] = 1;

                              setcookie($un,$id,time()+3600);

                              header("Location: index.php");
                            }
                            else echo("*Invalid username/password combination");
                          }
                        }
                        
                        else{
                          $row = $result->fetch();
                          $fn  = $row['First_name'];
                          $ln  = $row['Last_name'];
                          $un  = $row['Username'];
                          $id = $row['CustID'];
                          $pw  = $row['Pwd'];

                          if (password_verify($pw_temp, $pw)){
                            session_start();

                            $_SESSION['First_name'] = $fn;
                            $_SESSION['Username'] = $un;
                            $_SESSION['CustID'] = $id;
                            $_SESSION['ID'] = 2;

                            setcookie($un,$id,time()+3600);

                            header("Location: index.php");
                          }
                          else echo("*Invalid username/password combination");
                        }
                    }
                      function sanitise($pdo, $str)
                      {
                        $str = htmlentities($str);
                        return $pdo->quote($str);
                      }
                    ?>
                </td>  
            <tr>
                <th colspan="3">Username</th>
            </tr>
            <tr>
                <td><img src="./photo/username.jpg" class="imgicon" alt="username icon"></td>
                <td colspan="2"><input class="loginword" type="text" id="username" name="username" autocomplete="off" placeholder="Type your name"></td>
            </tr>
            <tr>
                <th colspan="3">Password</th>
            </tr>
            <tr>
                <td><img src="./photo/password.png" class="imgicon" alt="username icon"></td>
                <td colspan="2"><input class="loginword" type="password" id="password" name="password" autocomplete="off" placeholder="Type your password"></td>
            </tr>
            <tr>  
                <td  colspan="3" style="text-align:right"><a href="index.php?page=ForgotPassword" class="signupnow">Forgot password?</td>
            </tr>
            <tr>
                <th colspan="3"><input class="loginbuttom" type="submit"  value="Login" autocomplete="off" name="Login">
            </tr>
        </table>
        </form>
        <br>
        <hr>
        <div style="text-align:center;margin-top:50px;">
        Haven't have a account?<br><a href="index.php?page=Sign Up" class="signupnow">Sign up now</a>
        </div>
    </body>
    <?=h_footer()?>
</html>
        

