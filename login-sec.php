<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']); 

    $conn = new mysqli("localhost", "root", "", "database_library") or die(mysqli_error($conn));

    if ($conn) {
        $query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            
            if ($remember) {
               
                setcookie("email", $email, time() + (86400 * 30), "/"); 
            }
                    header('Location: home.php');
                    exit();
                } else {
                    echo "<script>alert('لا يوجد حساب منشئ مسبقًا. يرجى انشاء حساب جديد.');</script>";
                    echo 'ليس لديك حساب؟ <a href="signin.php"> سجل الآن</a>';
                }
    }

    $conn->close();
}

?>