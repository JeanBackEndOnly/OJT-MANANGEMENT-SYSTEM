<?php

declare(strict_types=1);

function is_empty_inputs(
    int $student_id,
    string $username,
    string $userpassword,
    string $firstname,
    string $lastname,
    string $middlename,
    string $email,
    string $address,
    string $contact,
    string $year_level,
    string $course,
    string $department,
    string $gender
) {

    if (
        empty($username) || 
        empty($userpassword) || 
        empty($student_id) || 
        empty($email) || 
        empty($firstname) || 
        empty($lastname) || 
        empty($middlename) || 
        empty($address) || 
        empty($contact) || 
        empty($year_level) || 
        empty($course) || 
        empty($department) || 
        empty($gender)
    ) {
        return true;
    } else {
        return false;
    }
}
function is_studentid_invalid(string $student_id)
{
    if (!is_numeric($student_id)) {
        return true;
    } else {
        return false;
    }
}
function is_invalid_email(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
function is_username_taken(object $pdo, string $username)
{
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
function is_email_registered(object $pdo, string $email)
{
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}
function is_password_not_matched(string $confirm_password, string $userpassword)
{
    if ($confirm_password !== $userpassword) {
        return true;
    } else {
        return false;
    }
}
function create_user(object $pdo, string $username, string $userpassword)
{
    set_user($pdo, $username, $userpassword);
    $users_id = $pdo->lastInsertId();
    return $users_id;
}
function create_user_info(
    object $pdo,
    int $user_id,
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
    string $gender
) {
    set_user_info(
        $pdo,
        $user_id,
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
        $gender
    );
}
