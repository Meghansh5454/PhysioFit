<?php
include "config.php";

$alertMessage = '';

// Define arrays for dropdown options
$genderOptions = ['Select', 'Male', 'Female'];
$categoryOptions = ['Select', 'Body Pain', 'Weight', 'Disease', 'Pregnancy'];
$subCategoryOptions = [
    'Body Pain' => ['Select', 'Back Pain', 'Hand Pain', 'Leg Pain', 'Head Pain'],
    'Weight' => ['Select', 'Weight Gain', 'Weight Loss'],
    'Disease' => ['Select', 'Carpal Tunnel Syndrome', 'Stroke', 'Vertigo', 'Asthma'],
    'Pregnancy' => ['Select', 'Prenatal', 'Postnatal']
];
$levelOptions = ['Select', 'Beginner', 'Intermediate', 'Advanced'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exerciseName = $_POST['exerciseName'];
    $exerciseDescription = $_POST['exerciseDescription'];
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $level = $_POST['level'];

    // Check if any dropdown is set to "Select"
    if ($gender == 'Select' || $category == 'Select' || $subCategory == 'Select' || $level == 'Select') {
        $alertMessage = "Please select values for all dropdowns";
    } else {
        // File upload paths
        $imagePath = '';

        // Handle image upload
        if (isset($_FILES['exerciseImage']) && $_FILES['exerciseImage']['error'] === 0) {
            $uploadDirImages = 'uploads/images/';
            createDirectory($uploadDirImages);  // Create directory if not exists
            $imagePath = handleFileUpload($_FILES['exerciseImage'], $uploadDirImages, 'image_');
        }

        // Get benefits from the form
        $benefits = $_POST['benefits'];

        // Insert data into the database
        $stmt = $db_conn->prepare("INSERT INTO exercises (exerciseName, exerciseDescription, gender, category, subCategory, level, imagePath, benefits) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssss", $exerciseName, $exerciseDescription, $gender, $category, $subCategory, $level, $imagePath, $benefits);

        if ($stmt->execute()) {
            // Add JavaScript code to display the alert
            echo '<script>alert("Exercise added successfully");</script>';
        } else {
            $alertMessage = "Error adding exercise: " . $stmt->error;
        }

        $stmt->close();
    }
}

function createDirectory($directory)
{
    if (!file_exists($directory) && !is_dir($directory)) {
        mkdir($directory, 0777, true);
    }
}

function handleFileUpload($file, $uploadDir, $prefix)
{
    $fileName = uniqid($prefix) . '_' . $file['name'];
    $filePath = $uploadDir . $fileName;
    move_uploaded_file($file['tmp_name'], $filePath);
    return $filePath;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Management - Admin Panel</title>
    <link rel="icon" type="image/png" href="image/logo6.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)),url('image/genderbg.jpg');
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            background-attachment: fixed;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 600px;
            margin-top : 30px  ;
            margin-left : 490px ;
            background-color: rgba(53,53,53,0.35);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: white;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 20px;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            font-weight: bold;
        }

        .success {
            background-color: #4caf50;
            color: white;
        }

        .error {
            background-color: #f44336;
            color: white;
        }

        * {
            margin: 0;
            padding: 0;
            font-family: 'Raleway', sans-serif;
            
        }

        nav {
            width: 100%;
            height: 10vh;
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-transform: uppercase;
            position: fixed;
            z-index: 1;
        }

        .nav-links {
            display: flex;
            list-style: none;
            text-decoration: none;
        }

        .nav-links li {
            padding: 10px 15px;
            margin: 0 10px;
            position: relative;
            text-decoration: none;
        }

        .nav-links li::before,
        .nav-links li::after {
            position: absolute;
            content: '';
            width: 0;
            height: 2px;
            background-color: #fff;
            transition: 0.5s all ease-in-out;
            left: 0;
        }

        .nav-links li::before {
            bottom: 0;
        }

        .nav-links li.active::before,
        .nav-links li:hover::before {
            right: 0;
            left: auto;
            width: 100%;
            background-color: #fff;
        }

        .nav-links ul li.active::after,
        .nav-links ul li:hover::after {
            right: auto;
            left: 0;
            width: 100%;
            background-color: #fff;
        }

        .nav-links li a {
            text-decoration: none;
            display: flex;
            color: #fff;
            font-size: 20px;
            transition: 0.5s all ease-in-out;
        }

        .nav-links li.active a,
        .nav-links li:hover a {
            color: #fff;
            display: flex;
        }
    </style>
</head>
<body>
    <div class="bg1">
        <nav class="navbar">
            <div class="logo">
                <img src="image/logo6.png" width="100px">
            </div>
            <ul class="nav-links">
                <li><a href="main.php" target="_self">Home</a></li>
                <li><a href="#">About US</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>

        <form id="exerciseForm" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <label for="exerciseName">Exercise Name:</label>
            <input type="text" id="exerciseName" name="exerciseName" required>

            <label for="exerciseDescription">Exercise Description:</label>
            <textarea id="exerciseDescription" name="exerciseDescription" required></textarea>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <?php foreach ($genderOptions as $option) : ?>
                    <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="category">Category:</label>
            <select id="category" name="category" required onchange="updateSubcategories()">
                <?php foreach ($categoryOptions as $option) : ?>
                    <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="subCategory">Subcategory:</label>
            <select id="subCategory" name="subCategory" required>
                <!-- Subcategories will be dynamically populated here -->
            </select>

            <label for="level">Level:</label>
            <select id="level" name="level" required>
                <?php foreach ($levelOptions as $option) : ?>
                    <option value="<?php echo $option; ?>"><?php echo $option; ?></option>
                <?php endforeach; ?>
            </select>

            <!-- Removed the "Day" dropdown code -->

            <label for="exerciseImage">Exercise Image:</label>
            <input type="file" id="exerciseImage" name="exerciseImage">

            <label for="benefits">Benefits:</label>
            <textarea id="benefits" name="benefits" required></textarea>

            <button type="submit">Add Exercise</button>
        </form>
    </div>

    <script>
        function updateSubcategories() {
            var category = document.getElementById("category").value;
            var subCategoryDropdown = document.getElementById("subCategory");
            subCategoryDropdown.innerHTML = ''; // Clear previous options
            <?php foreach ($subCategoryOptions as $parentCategory => $subCategories) : ?>
                if (category === "<?php echo $parentCategory; ?>") {
                    <?php foreach ($subCategories as $subCategory) : ?>
                        var option = document.createElement("option");
                        option.value = "<?php echo $subCategory; ?>";
                        option.text = "<?php echo $subCategory; ?>";
                        subCategoryDropdown.add(option);
                    <?php endforeach; ?>
                }
            <?php endforeach; ?>
        }
    </script>
</body>
</html>
