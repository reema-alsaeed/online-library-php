<!DOCTYPE html>
<html>
<head>
    <title>موقع الكتب</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"> 
    <style>
        body {
            height: 100%;
            font-family: 'Cairo', sans-serif; 
            color: #fff;
            text-align: center;
        }
        .background {
            position: fixed; 
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        .background video {
            width: 100%;
            height: 100%;
            object-fit: cover; 
            opacity: 0.7; 
        }
        .container {
            display: flex;
            flex-direction: column; 
            align-items: center;
            justify-content: center;
        }
        h1 {
            font-size: 5em; 
            color: #c67316be;
        }
        .category {
            background-color: rgba(194, 135, 52, 0.507);
            border-radius: 15px; 
            width: 350px; 
            height: 120px; 
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(30, 23, 15, 0.33);
            transition: transform 0.3s;
            font-size: 2em; 
            text-decoration: none; 
            color: #fff; 
        }
        .category:hover {
            transform: scale(1.05); 
        }
        .logout-button {
            position: absolute; 
            top: 20px;
            right: 20px;
            padding: 10px 15px;
            background-color: rgba(194, 135, 52, 0.507); 
            color: white; 
            font-family: 'Cairo', sans-serif;
            border: none; 
            border-radius: 5px; 
            font-size: 1.2em; 
            cursor: pointer; 
            transition: background-color 0.3s;
        }
        .logout-button:hover {
                background-color: rgb(240, 231, 223);
        }
        footer {
            background-color: rgba(194, 135, 52, 0.093);
            color: #fff;
            font-size: 0.8em; 
            width: 100%; 
            padding: 1px 0;
        }
        table {
            margin: 50px auto;
            width: 50%; 
            border-spacing: 15px; 
        }
        th, td {
            text-align: center;
            background-color: rgba(194, 135, 52, 0.5); 
            color: #fff;
            border-radius: 15px; 
            border: 2px solid rgba(194, 135, 52, 0.8); 
            height: 70px; 
            font-size: 1.5em;
        }
        
    </style>
</head>
<body>
    <div class="background">
        <video autoplay muted loop>
            <source src="vid.mp4" type="video/mp4">
        </video>
    </div>
    <button class="logout-button" onclick="logout()">خروج</button>
    <h1>المكتبة الرقمية</h1>
    <div class="container">
        <a href="mybooks.php" class="category">كتبي</a>
        <a href="novels.php" class="category"> الروايات</a>
        <a href="self-development.php" class="category">كتب تطوير الذات</a>
        <a href="scientific.php" class="category">كتب علمية</a>
        <a href="religious.php" class="category">كتب دينية</a>
    </div>
    

    <table>
        <thead>
            <tr>
                <th colspan="2">أعضاء الفريق </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>جوهرة الحقباني</td>
                <td>ريما آل سعيد</td>
            </tr>
        </tbody>
    </table>

    <footer>
        <p> &copy; 2024 جميع الحقوق محفوظة</p>
    </footer>
    <script>
        function logout() {
            alert("تم تسجيل الخروج!");
            window.location.href = 'logout.php';
        }
    </script>
</body>
</html>