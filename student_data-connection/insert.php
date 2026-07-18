<?php
// ডাটাবেজ কানেকশন ফাইলটি যুক্ত করুন
require 'db.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ফর্ম থেকে ডাটা রিসিভ করা (ফর্মের 'name' অ্যাট্রিবিউটের সাথে মিলিয়ে)
    $name = $_POST['name'] ?? '';
    $father_name = $_POST['father_name'] ?? '';
    $mother_name = $_POST['mother_name'] ?? '';
    $class = $_POST['class'] ?? '';
    $section = $_POST['section'] ?? '';
    $roll = $_POST['roll'] ?? '';
    $phone_number = $_POST['phone_number'] ?? '';
    $student_image = 'default.jpg'; // আপাতত ডিফল্ট ছবি, পরবর্তীতে আপলোড লজিক যোগ করবেন

    try {
        // SQL কোড - কলামের নামের সাথে মিল রাখা হয়েছে
        $sql = "INSERT INTO students (name, father_name, mother_name, class, section, roll, phone_number, student_image) 
                VALUES (:name, :father_name, :mother_name, :class, :section, :roll, :phone_number, :student_image)";
        
        $stmt = $pdo->prepare($sql);
        
        // ডাটা এক্সিকিউট করা
        $stmt->execute([
            ':name' => $name,
            ':father_name' => $father_name,
            ':mother_name' => $mother_name,
            ':class' => $class,
            ':section' => $section,
            ':roll' => $roll,
            ':phone_number' => $phone_number,
            ':student_image' => $student_image
        ]);

        echo json_encode(["status" => "success", "message" => "সফলভাবে তথ্য জমা হয়েছে!"]);

    } catch (PDOException $e) {
        echo json_encode(["status" => "error", "message" => "ডাটাবেজ এরর: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "শুধুমাত্র POST মেথড গ্রহণযোগ্য।"]);
}
?>
