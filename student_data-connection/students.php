<?php
// ডাটাবেজ কানেকশন ফাইলটি যুক্ত করুন
require 'db.php'; 

try {
    // টেবিল থেকে সব ডাটা নিয়ে আসার কোড
    $sql = "SELECT * FROM students";
    $stmt = $pdo->query($sql);
    $students = $stmt->fetchAll();
} catch (PDOException $e) {
    die("ডাটা আনতে সমস্যা হচ্ছে: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>ছাত্রছাত্রীদের তালিকা</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>ছাত্রছাত্রীদের তালিকা</h2>
    <table>
        <tr>
            <th>নাম</th>
            <th>পিতার নাম</th>
            <th>ক্লাস</th>
            <th>রোল</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo htmlspecialchars($student['name']); ?></td>
            <td><?php echo htmlspecialchars($student['father_name']); ?></td>
            <td><?php echo htmlspecialchars($student['class']); ?></td>
            <td><?php echo htmlspecialchars($student['roll']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
