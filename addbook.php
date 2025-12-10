<?php
$conn = new mysqli("localhost", "root", "", "book");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$data = json_decode(file_get_contents("php://input"), true);
$title = $conn->real_escape_string($data['title']);
$link = $conn->real_escape_string($data['link']);

$sql = "INSERT INTO book (title, link) VALUES ('$title', '$link')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "تم إضافة الكتاب إلى كتبي!"]);
} else {
    echo json_encode(["message" => "خطأ: " . $conn->error]);
}

$conn->close();
?>