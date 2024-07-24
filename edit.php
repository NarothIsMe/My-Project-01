<?php
    include_once('db.php');
 
    $output = array('error' => false);
 
    $database = new connDB();
    $db = $database->open();
    try{
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $address = $_POST['address'];
 
        $sql = "UPDATE members SET firstname = '$firstname', lastname = '$lastname', address = '$address' WHERE id = '$id'";
        //if-else statement executing query
        if($db->exec($sql)){
            $output['message'] = 'Member updated successfully';
        } 
        else{
            $output['error'] = true;
            $output['message'] = 'Something went wrong. Cannot update member';
        }
 
    }
    catch(PDOException $e){
        $output['error'] = true;
        $output['message'] = $e->getMessage();
    }
 
    //close connection
    $database->close();
 
    echo json_encode($output);
?>