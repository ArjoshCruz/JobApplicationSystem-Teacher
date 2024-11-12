<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'dbConfig.php';
require_once 'models.php';
require_once 'validate.php';

// Insert to Database
if (isset($_POST['insertNewTeacherBtn'])) {
    $first_name = sanitizeInput($_POST['firstName']);
    $last_name = sanitizeInput($_POST['lastName']);
    $age = sanitizeInput($_POST['age']);
    $gender = sanitizeInput($_POST['gender']);
    $email = sanitizeInput($_POST['email']);
    $yrsOfExperience = sanitizeInput($_POST['yrsOfExperience']);
    $position = sanitizeInput($_POST['position']);
    $subjectSpecialization = sanitizeInput($_POST['subjectSpecialization']);

    $response = insertIntoTeacherRecords($pdo, $first_name, $last_name, $age, $gender, $email, $yrsOfExperience, $position, $subjectSpecialization);
    $_SESSION['message'] = $response['message'];
    $_SESSION['statusCode'] = $response['statusCode'];

    header("Location: ../index.php");
}

// Edit
if (isset($_POST['editNewTeacherBtn'])) {
    $first_name = sanitizeInput($_POST['firstName']);
    $last_name = sanitizeInput($_POST['lastName']);
    $age = sanitizeInput($_POST['age']);
    $gender = sanitizeInput($_POST['gender']);
    $email = sanitizeInput($_POST['email']);
    $yrsOfExperience = sanitizeInput($_POST['yrsOfExperience']);
    $position = sanitizeInput($_POST['position']);
    $subjectSpecialization = sanitizeInput($_POST['subjectSpecialization']);

    $response = editTeacher($pdo, $first_name, $last_name, $age, $gender, $email, $yrsOfExperience, $position, $subjectSpecialization, $_GET['teacher_id']);
    $_SESSION['message'] = $response['message'];
    $_SESSION['statusCode'] = $response['statusCode'];

    header("Location: ../index.php");
}

// Delete
if (isset($_POST['deleteTeacherBtn'])) {
    $response = deleteTeacher($pdo, $_GET['teacher_id']);
    $_SESSION['message'] = $response['message'];
    $_SESSION['statusCode'] = $response['statusCode'];

    header("Location: ../index.php");
}
?>