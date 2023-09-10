<?php
session_start();

if (isset($_SESSION['First_name']) && $_SESSION['ID']==2){
       
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
        destroy_session_and_data();

        echo '<script type="text/javascript">',
        'alert("Your session has timed out due to inactivity for more than 5 minutes. \n\nPlease Log in again");
        window.location.replace("index.php?page=Login"); ',
        '</script>';
    
    }

    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
  }
  


  if (isset($_SESSION['First_name']) && $_SESSION['ID']==1){
       
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
        destroy_session_and_data_admin();
    
        echo '<script type="text/javascript">',
        'alert("Your session has timed out due to inactivity for more than 5 minutes. \n\nPlease Log in again");
        window.location.replace("index.php?page=Login"); ',
        '</script>';
    }

    $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
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