<?php
    //Form will be submitted with or with out javascript on the backend
    $name       = $_POST['name'];
    $lname      = $_POST['lname'];
    $email      = $_POST['email'];
    $baddress   = $_POST['baddress'];
    $bcity      = $_POST['bcity'];
    $bstate     = $_POST['bstate'];
    $bzip       = $_POST['bzip'];
    $mailboxes   = $_POST['mailboxes'];
 
        if (isset($_POST['name'])) {
           $data = array(
                "firstname"  => $name,
                "lastname"   => $lname,
                "useremail"  => $email,    
                "address"    => $baddress,
                "city"       => $bcity,
                "state"      => $bstate,
                "zip"        => $bzip,
                "totalamount" => $mailboxes
           );
        //convert to json to be handled async
           echo json_encode($data);
    }
?>