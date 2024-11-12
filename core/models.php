<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fetching Data
function getAllTeacher($pdo): mixed {
    $sql = "SELECT * FROM teacher_records";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();

    if ($executeQuery) {
        return $stmt->fetchAll();
    }
}

function getTeacherByID($pdo, $teacher_id) {
    $sql = "SELECT * FROM teacher_records
            WHERE teacher_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$teacher_id]);

    if ($executeQuery) {
        return $stmt->fetch();
    }
}

// Insert to Database
function insertIntoTeacherRecords($pdo, $first_name, $last_name, $age, $gender, $email, $yrs_of_experience, $position, $subject_specialization) {
    $sql = "INSERT INTO teacher_records (first_name, last_name, age, gender, email, yrs_of_experience, position, subject_specialization) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$first_name, $last_name, $age, $gender, $email, $yrs_of_experience, $position, $subject_specialization]);
    
    if ($executeQuery) {
        return ["message" => "Teacher added successfully.", "statusCode" => " <br>Status Code: 200"];
    } else {
        return ["message" => "Failed to add teacher.", "statusCode" => "Status Code: 400"];
    }
}


// Edit
function editTeacher($pdo, $first_name, $last_name, $age, $gender, $email, $yrs_of_experience, $position, $subject_specialization, $teacher_id){
    $sql = "UPDATE teacher_records
                SET first_name = ?,
                    last_name = ?,
                    age = ?,
                    gender = ?,
                    email = ?,
                    yrs_of_experience =?,
                    position = ?,
                    subject_specialization = ?
                WHERE teacher_id = ?
            ";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$first_name, $last_name, $age, $gender, $email, $yrs_of_experience, $position, $subject_specialization, $teacher_id]);

    if ($executeQuery) {
        return ["message" => "Teacher updated successfully.", "statusCode" => " <br>Status Code: 200"];
    } else {
        return ["message" => "Failed to update teacher.", "statusCode" => "Status Code: 400"];
    }
}

// Delete
function deleteTeacher($pdo, $teacher_id) {
    $sql = "DELETE FROM teacher_records WHERE teacher_id = ?";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([$teacher_id]);

    if ($executeQuery) {
        return ["message" => "Teacher deleted successfully.", "statusCode" => " <br>Status Code: 200"];
    } else {
        return ["message" => "Failed to delete teacher.", "statusCode" =>"Status Code: 400"];
    }        return true;
}


// Search
function searchForATeacher($pdo, $searchQuery) {
    $sql = "SELECT * FROM teacher_records
            WHERE 
                first_name LIKE ? OR 
                last_name LIKE ? OR 
                age LIKE ? OR 
                gender LIKE ? OR 
                email LIKE ? OR 
                yrs_of_experience LIKE ? OR 
                position LIKE ? OR 
                subject_specialization LIKE ?";
    
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute([
        "%$searchQuery%", "%$searchQuery%", "%$searchQuery%", "%$searchQuery%",
        "%$searchQuery%", "%$searchQuery%", "%$searchQuery%", "%$searchQuery%"
    ]);
    
    if ($executeQuery) {
        return $stmt->fetchAll();
    }
    return [];
}

?>