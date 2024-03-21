<?php

declare(strict_types=1);

function is_input_empty(string $firstname, string $lastname, string $middlename, string $email, string $department,
                string $position, string $room, string $username, string $userpassword, string $con_userpassword){

    if(empty($firstname) || empty($lastname) || empty($middlename)
    || empty($username) || empty($userpassword) || empty($con_userpassword) || empty($email)
    || empty($department) || empty($room) || empty($position)){
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
function is_username_taken(object $pdo, string $username){
    if(get_username($pdo, $username)){
        return true;
    }else{
        return false;
    }
}
function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
function is_password_not_matched(string $con_userpassword, string $userpassword){
    if($con_userpassword !== $userpassword){
        return true;
    }else{
        return false;
    }
}
function create_user(object $pdo, string $username, string $userpassword){
    set_user($pdo, $username, $userpassword);
    $users_id = $pdo->lastInsertId();
    return $users_id;
}

function create_supervisor(object $pdo, int $user_id, string $firstname, string $lastname, string $middlename,
    string $email, string $department, string $position, string $room){

        set_supervisor($pdo, $user_id, $firstname, $lastname, $middlename, $email, $department, $position, $room);
}