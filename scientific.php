<!DOCTYPE html>
<html>
<head>
    <title>قسم تطوير الذات</title>
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
        h1 {
            font-size: 6em;
            color: #c67316be;
        }
        h2 {
            font-size: 1.4em;
            color: #5832009f;
            margin: 7px 0;
        }
        
        .return-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 10px 15px;
            font-family: 'Cairo', sans-serif;
            background-color: rgba(194, 135, 52, 0.507);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .return-button:hover {
            background-color: rgb(240, 231, 223);
        }
        .new-button {
            display: inline-block;
            width: 130px;
            height: 50px;
            background-color:  #c8780f;
            color: white;
            border: none;
            border-radius: 40px;
            font-size: 1.2em;
            font-family: 'Cairo', sans-serif;
            cursor: pointer;
            margin: 10px 0;
            transition: background-color 0.3s;
        }
        .new-button:hover {
            background-color:  rgba(194, 135, 52, 1);
        }
        .read-link {
           
            background-color: #c8780f;
            color: white;
            border-radius: 40px;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 1.2em;
            font-family: 'Cairo', sans-serif;
            transition: background-color 0.3s;
        }
        .read-link:hover {
            background-color: rgba(194, 135, 52, 1);
        }
        .book-list {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        .book-item {
            background-color: rgba(194, 135, 52, 0.542);
            border-radius: 80px;
            padding: 35px;
            margin: 20px;
            width: 300px;
            height: 130px;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        .book-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5);
        }
        footer {
            background-color: rgba(194, 135, 52, 0.093); 
            color: #fff;
            font-size: 0.8em; 
            width: 100%; 
            padding: 1px 0;
        }
    </style>
</head>
<body>
    <div class="background">
        <video autoplay muted loop>
            <source src="vid.mp4" type="video/mp4">
        </video>
    </div>
    <h1>الكتب العلمية</h1>
    <button class="return-button" onclick="goBack()">عودة</button>
    <div class="book-list">
        <div class="book-item">
            <h2>خريدة العجائب وفريدة الغرائب</h2>
            <a class="read-link" href="book7.pdf" target="_blank">اقرأ الكتاب</a>
            <button class="new-button" onclick="addToMyBooks('خريدة العجائب وفريدة الغرائب', 'book7.pdf')">إلى كتبي</button>
        </div>
        <div class="book-item">
            <h2>الموسوعة العلمية الشاملة</h2>
            <a class="read-link" href="book8.pdf" target="_blank">اقرأ الكتاب</a>
            <button class="new-button" onclick="addToMyBooks('الموسوعة العلمية الشاملة', 'book8.pdf')">إلى كتبي</button>
        </div>
        <div class="book-item">
            <h2>كيف تقوي قدراتك الدماغية</h2>
            <a class="read-link" href="book9.pdf" target="_blank">اقرأ الكتاب</a>
            <button class="new-button" onclick="addToMyBooks('كيف تقوي قدراتك الدماغية', 'book9.pdf')">إلى كتبي</button>
        </div>
    </div>
    <footer>
        <p> &copy; 2024 جميع الحقوق محفوظة</p>
    </footer>
    <script>
        function goBack() {
            window.location.href = 'home.php'; 
        }
        function addToMyBooks(title, link) {
            fetch('addbook.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ title, link })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
            });
        }

    </script>
</body>
</html>
