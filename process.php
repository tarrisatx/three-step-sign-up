<?php
        
    $name       = $_POST['name'];
    $lname      = $_POST['lname'];
    $email      = $_POST['email'];
    $baddress   = $_POST['baddress'];
    $bcity      = $_POST['bcity'];
    $bstate     = $_POST['bstate'];
    $bzip       = $_POST['bzip'];
 
        if (isset($_POST['name'])) {
           $data = array(
                "firstname"  => $name,
                "lastname"   => $lname,
                "useremail"  => $email,    
                "address"    => $baddress,
                "city"       => $bcity,
                "state"      => $bstate,
                "zip"        => $bzip
           );
        echo json_encode($data);
    }
?>