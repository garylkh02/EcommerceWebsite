<?=h_header('Logout')?>
<?php 
  if (isset($_SESSION['First_name']) && $_SESSION['ID']==2){

    destroy_session_and_data();
    echo '<script type="text/javascript">',
    'alert("You have sucessfully logout.");
    window.location.replace("index.php"); ',
    '</script>';  
  }
  if (isset($_SESSION['First_name']) && $_SESSION['ID']==1){
    
    destroy_session_and_data_admin();
    echo '<script type="text/javascript">',
    'alert("You have sucessfully logout.");
    window.location.replace("index.php"); ',
    '</script>';  
  }
  function destroy_session_and_data_admin(){
    unset($_SESSION['First_name']);
    unset($_SESSION['Username']);
    unset($_SESSION['AdminID']);
    unset($_SESSION['ID']);
    $_SESSION = array();
    session_unset();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
    }


  function destroy_session_and_data(){
    unset($_SESSION['First_name']);
    unset($_SESSION['Username']);
    unset($_SESSION['CustID']);
    unset($_SESSION['ID']);
    $_SESSION = array();
    session_unset();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
    }
?>
