<?php

declare(strict_types=1);

function is_inputs_empty($username, $userpassword){
    if(empty($username) || empty($userpassword)){
        return true;
    }else{
        return false;
    }
}
function is_username_wrong($result){
    if($result === null || !$result){
        return true;
    }else{
        return false;
    }
}
function is_userpassword_wrong(string $userpassword, string $hashedPassword) {
    if ($hashedPassword === null) {
        return true;
    }
    return !password_verify($userpassword, $hashedPassword);
}

