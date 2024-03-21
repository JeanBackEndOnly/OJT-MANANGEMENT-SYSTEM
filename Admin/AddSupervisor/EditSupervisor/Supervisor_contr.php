<?php

declare(strict_types=1);

function is_input_empty(string $firstname, string $lastname, string $middlename, string $email,
    string $position, string $department, string $room){

    if(empty($firstname) || empty($lastname) || empty($middlename)
    || empty($email) || empty($position) || empty($department) || empty($room)){
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

function update_supervisor(object $pdo, string $firstname, string $lastname, string $middlename, string $email,
string $position, string $department, string $room, int $supervisor_info_id){

    set_supervisor($pdo, $firstname, $lastname, $middlename, $email, $position, $department, $room, $supervisor_info_id);
}