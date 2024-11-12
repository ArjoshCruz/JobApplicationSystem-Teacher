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
    <h2 class="main-text">Editing Teacher' <u><?php echo $getTeacherByID['first_name'];?></u> Information!</h2>

    <div class="form-div">
        <form action="../core/handleForms.php?teacher_id=<?php echo $_GET['teacher_id']?>" method="POST">
            <p>
                <label for="firstName">First Name:  </label>
                <input class="text" type="text" name="firstName" value="<?php echo $getTeacherByID['first_name']?>" required>
            </p>

            <p>        
                <label for="lastName">Last Name:  </label>
                <input class="text" type="text" name="lastName" value="<?php echo $getTeacherByID['last_name']?>">
            </p>

            <p>
                <label for="age">Age:  </label>
                <input class="number" type="number" name="age" value="<?php echo $getTeacherByID['age']?>" required>
            </p>

            <p>
                <label for="gender">Gender:  </label>
                <select name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Prefer Not to Say">Prefer Not to Say</option>
                </select>
            </p>

            <p>
                <label for="email">Email:  </label>
                <input class="email" type="email" name="email" value="<?php echo $getTeacherByID['email']?>" required>
            </p>

            <p>
                <label for="yrsOfExperience">Years of Experience:  </label>
                <input class="number" type="number" name="yrsOfExperience" value="<?php echo $getTeacherByID['yrs_of_experience']?>" required>
            </p>
                
            <p>        
                <label for="position">Position:  </label>
                <input class="text" type="text" name="position" value="<?php echo $getTeacherByID['position']?>" required>
                </p>

            <p>        
                <label for="subjectSpecialization">Subject Specialization:  </label>
                <input class="text" type="text" name="subjectSpecialization" value="<?php echo $getTeacherByID['subject_specialization']?>" required>
            </p>

            <br>
            <p class="form-btn">
                <input class="submit-form" type="submit" name="editNewTeacherBtn" value="Submit">
                <button class="clear-form" type="reset">Clear</button>
            </p>
        </form>
    </div>

    <section>
        <div class="button-container">
            <a class="back-btn" href="../index.php">Back</a>
        </div>
    </section>

</body>
</html>