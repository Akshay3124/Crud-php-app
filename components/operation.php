<?php

//calling all other important php files required into this file
require_once("db.php");
require_once("components.php");

$con = createDb();

//create button click
if (isset($_POST['create'])) {
    createData();
}

if (isset($_POST['update'])) {
    UpdateData();
}

if (isset($_POST['delete'])) {
    deleteRecord();
}

if (isset($_POST['deleteall'])) {
    DeleteAll();
}



// declaring the funtion that will create the data and insert it into the specified table
function createData(){

    // variables for catching and storing each form data filled
    $personname = textboxValue("person_name");
    $placename = textboxValue("place_name");
    $amountdeposited = textboxValue("amount_deposited");

    if($personname&&$placename&&$amountdeposited) {

        // storing each entered value specifically for its designated table value
        $sql = "INSERT INTO donations(person_name, place_name, amount_deposited) VALUES ('$personname','$placename','$amountdeposited')";
        
        if(mysqli_query($GLOBALS['con'], $sql)){
            //when data is succesfully entered into the database
            Textnode("success", "Record Successfully Inserted... !");
        
        } else {
            //if some error occured during trying to enter the data
            Textnode("error", "Error Occurred... !");
        }

    } else {
        //if user hasn't entered any data into the fields
      Textnode("error", "Provide data in the text box... !");
    }
}

// for checking whether the user is entering and valid data or not
function textboxValue($value){
    $textbox = mysqli_real_escape_string($GLOBALS['con'], trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    } else {
        return $textbox;
    }
}


// messages function
function Textnode($classname, $msg){
    $element = "<h6 class='$classname'>$msg</h6>";
    echo $element;
}


// get data from the mysql database

function getdata(){
    $sql ="SELECT * FROM donations";

    $result = mysqli_query($GLOBALS['con'], $sql);

    if(mysqli_num_rows($result) > 0){
        return $result;
    }
}

//declaring the funtion that will see the updated data and update it into the specified table
function UpdateData(){
    $personid = textboxValue("person_id");
    $personname = textboxValue("person_name");
    $placename = textboxValue("place_name");
    $amountdeposited = textboxValue("amount_deposited");

    if($personname&&$placename&&$amountdeposited) {
        $sql = "UPDATE donations SET person_name='$personname',place_name='$placename',amount_deposited='$amountdeposited'WHERE id='$personid'";

        if(mysqli_query($GLOBALS['con'], $sql)) {
            Textnode("success", "Data Successfully Updated");
        }else {
            Textnode("error", "Unable to Update Data");
        }

    } else {
        Textnode("error", "Select Data using Edit Icon");
    }
}

//Delete one value selected for editing
function deleteRecord(){
    $personid = (int)textboxValue("person_id");

    $sql = "DELETE FROM donations WHERE id=$personid";

    if(mysqli_query($GLOBALS['con'], $sql)) {
        Textnode("success", "Record has been deleted successfully");
    } else {
        Textnode("error", "Unable to delete record");
    }
}

// Adding the Delete all button when records are more than 3
function DeleteAllBtn(){
    $result = getdata();
    $i = 0;

    if($result){
        while($row = mysqli_fetch_assoc($result)){
           $i++;
           if($i > 3){
               buttonElement("btn-deleteall", "btn btn-danger", "Delete All ", "fas fa-trash-alt", "deleteall", "");
               return;
           } 
        }
    }
}


// Delete All function to delete all the records available in the table and create a new blank database
function DeleteAll(){
    $sql = "DROP TABLE donations";

    if(mysqli_query($GLOBALS['con'], $sql)){
        Textnode("success", "All Records deleted successfully..!");
        createDb();
    } else {
        Textnode("error", "Records cannot be deleted..!");
    }
}

// to set & show the current ID number in the input field
function setID(){
    $getid = getdata();
    $id = 0;
    
    if($getid){
        while($row = mysqli_fetch_assoc($getid)){
            $id = $row['id'];
        }
    }
    
    return ($id + 1);
}
?>