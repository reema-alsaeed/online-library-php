<?php
$conn = new mysqli("localhost", "root", "", "book");

if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
$data = json_decode(file_get_contents("php://input"), true);
$id = intval($data['id']);

$sql = "DELETE FROM book WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "تم حذف الكتاب بنجاح!"]);
} else {
    echo json_encode(["message" => "خطأ: " . $conn->error]);
}

$conn->close();
?>