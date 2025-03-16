<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['movieFile'])) {
    $targetDirectory = 'uploads/';
    $targetFile = $targetDirectory . basename($_FILES['movieFile']['name']);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a video
    if (isset($_POST['submit'])) {
        $check = getimagesize($_FILES['movieFile']['tmp_name']);
        if ($check !== false) {
            echo 'File is a video - ' . $check['mime'] . '.';
            $uploadOk = 1;
        } else {
            echo 'File is not a video.';
            $uploadOk = 0;
        }
    }

    // Check file size (5MB limit)
    if ($_FILES['movieFile']['size'] > 5000000) {
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($videoFileType != 'mp4' && $videoFileType != 'avi' && $videoFileType != 'mov') {
        echo 'Sorry, only MP4, AVI, and MOV files are allowed.';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo 'Sorry, your file was not uploaded.';
    } else {
        if (move_uploaded_file($_FILES['movieFile']['tmp_name'], $targetFile)) {
            echo 'The file ' . htmlspecialchars(basename($_FILES['movieFile']['name'])) . ' has been uploaded.';
        } else {
            echo 'Sorry, there was an error uploading your file.';
        }
    }
}
?>