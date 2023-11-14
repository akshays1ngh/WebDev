<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Upload Your Resume</h2>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="resume">Select PDF Resume:</label>
    <input type="file" name="resume" accept=".pdf" required>
    <br>
    <input type="submit" value="Upload">
</form>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the file was uploaded without errors
    if (isset($_FILES["resume"]) && $_FILES["resume"]["error"] == 0) {
        $targetDir = "uploads/";  // Specify the directory where you want to store the resumes

        // Generate a unique filename based on the current timestamp
        $targetFile = $targetDir . time() . "_" . basename($_FILES["resume"]["name"]);

        // Check if the file is a PDF
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($fileType == "pdf") {
            // Move the uploaded file to the specified directory
            if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {
                echo "<p style='color: green;'>Resume uploaded successfully!</p>";
            } else {
                echo "<p style='color: red;'>Error uploading the resume.</p>";
            }
        } else {
            echo "<p style='color: red;'>Please upload a PDF file.</p>";
        }
    } else {
        echo "<p style='color: red;'>Error uploading the resume.</p>";
    }
}
?>

</body>
</html>
