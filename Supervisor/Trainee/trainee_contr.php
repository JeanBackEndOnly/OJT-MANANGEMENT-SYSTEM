<?php

declare(strict_types=1);

function is_input_empty(
    int $student_id, 
    string $ImageData, 
    string $firstname, 
    string $lastname,
    string $middlename, 
    string $email, 
    string $contact,
    string $address,
    string $year_level,
    string $course,
    string $department,
    string $gender){

    if(
    empty($student_id) ||
    empty($ImageData) ||
    empty($firstname) || 
    empty($lastname) || 
    empty($middlename) || 
    empty($email) || 
    empty($contact) || 
    empty($address) || 
    empty($year_level) ||
    empty($course) ||
    empty($department) ||
    empty($gender)
    ){
        return true;
    }else{
        return false;
    }
}
function is_invalid_email(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
// function is_email_registered(object $pdo, string $email){
//     if(get_email($pdo, $email)){
//         return true;
//     }else{
//         return false;
//     }
// }

function update_trainee(object $pdo, 
    int $student_id, 
    string $ImageData, 
    string $firstname, 
    string $lastname,
    string $middlename, 
    string $email, 
    string $contact,
    string $address,
    string $year_level,
    string $course,
    string $department,
    string $gender,
    int $trainee_id){

    set_trainee(
    $pdo, 
    $student_id, 
    $ImageData, 
     $firstname, 
     $lastname,
     $middlename, 
     $email, 
     $contact,
     $address,
     $year_level,
     $course,
     $department,
     $gender,
    $trainee_id);
}