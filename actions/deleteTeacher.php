<?php 
    require_once '../core/handleForms.php';
    require_once '../core/models.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Application</title>
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php $getTeacherByID = getTeacherByID($pdo, $_GET['teacher_id']); ?>
    <header>
        <h1>Teacher Application</h1>
    </header>

    <div class="form-div">
        <h2 class="main-text">Are you sure you want to delete <u><?php echo $getTeacherByID['first_name'];?></u></h2>
        <h3 class="center">Teacher ID: <?php echo $getTeacherByID['teacher_id'];?></h3>
        <h3 class="center">First Name: <?php echo $getTeacherByID['first_name'];?></h3>
        <h3 class="center">Last Name: <?php echo $getTeacherByID['last_name'];?></h3>
        <h3 class="center">Age: <?php echo $getTeacherByID['age'];?></h3>
        <h3 class="center">Gender: <?php echo $getTeacherByID['gender'];?></h3>
        <h3 class="center">Email: <?php echo $getTeacherByID['email'];?></h3>
        <h3 class="center">Years of Experience: <?php echo $getTeacherByID['yrs_of_experience'];?></h3>
        <h3 class="center">Postion: <?php echo $getTeacherByID['position'];?></h3>
        <h3 class="center">Subject Specializtation: <?php echo $getTeacherByID['subject_specialization'];?></h3>

        <form class="delete-form" action="../core/handleForms.php?teacher_id=<?php echo $_GET['teacher_id']?>" method="POST" onsubmit="return confirmDeletion();">
            <input class="delete-btn" type="submit" name="deleteTeacherBtn" value="Delete">
        </form>
    </div>

    <section>
        <div class="button-container">
            <a class="back-btn" href="../index.php">Back</a>
        </div>
    </section>

    <script>
        function confirmDeletion() {
            return confirm("Are you sure you want to delete this teacher?");
        }
    </script>
</body>
</html>