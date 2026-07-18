<?php
// ডাটাবেজের তথ্য
$servername = "localhost";
$username = "students";
$password = "Cisfa1998$#@";
$dbname = "school_data";

// কানেকশন তৈরি
$conn = new mysqli($servername, $username, $password, $dbname);

// ফর্ম থেকে ডাটা নেওয়া
$name = $_POST['name'];
$class = $_POST['class'];
$roll = $_POST['roll'];
$image = $_POST['image_name'];

// ডাটাবেজে ডাটা পাঠানো
$sql = "INSERT INTO students (name, class, roll, student_image) 
VALUES ('$name', '$class', '$roll', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "সফলভাবে ডাটা জমা হয়েছে!";
} else {
    echo "ভুল হয়েছে: " . $conn->error;
}

$conn->close();
?>
