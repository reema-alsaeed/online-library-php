<!DOCTYPE html>
<html>
<head>
    <title>كتبي</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Cairo', sans-serif;
            text-align: center;
            overflow: auto;
            
            
        }

        h1 {
            font-size: 6em;
            margin: 20px;
            color: #c67316be;

        }

        .return-button {
            position: absolute;
            top: 20px;
            right: 30px;
            padding: 10px 15px;
            font-family: 'Cairo', sans-serif;
            background-color: rgba(194, 135, 52, 0.507);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
        }

        .return-button:hover {
            background-color: rgba(240, 231, 223);
        }

        .my-books {
            padding: 20px;
            display: inline-block;
            width: 60%;
            text-align: right;
        }

        .book-item {
            background-color: rgba(183, 115, 20, 0.415);
            border-radius: 10px;
            color: white;
            padding: 15px;
            margin: 30px 0;
            transition: transform 0.3s;
        }

        .book-item:hover {
            transform: scale(1.02);
        }

        .delete-button,
        .read-button {
            background-color:  #c8780f;
            color: rgba(0, 0, 0, 0.632);
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            margin: 3px;
            cursor: pointer;
            font-family: 'Cairo', sans-serif;
            color:white;
        }

        .delete-button:hover {
            background-color: rgba(139, 69, 0, 0.567);
        }

        .read-button:hover {
            background-color: rgb(139, 69, 0, 0.567);
        }

        footer {
            margin-top: 500px;
            background-color: rgba(194, 135, 52, 0.093);
            color: #fff;
            font-size: 0.8em;
            width: 100%;
            padding: 1px 0;

        }

        .background {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .background video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            transform: translate(-50%, -50%);
            opacity: 0.7;
        }
        .stars {
            color: gray; 
            font-size: 1.5em;
            cursor: pointer;
        }
        .stars span {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="background">
        <video autoplay muted loop>
            <source src="vid.mp4" type="video/mp4">
            
        </video>
    </div>
    <button class="return-button" onclick="goBack()">عودة</button>
    <h1>كتبي</h1>
    <div class="my-books" id="myBooksList">
    <?php
    $conn = new mysqli("localhost", "root", "", "book");

        if ($conn->connect_error) {
            die("فشل الاتصال: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM book";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($book = $result->fetch_assoc()) {
                echo '<div class="book-item">';
                echo '<h2>' . htmlspecialchars($book['title']) . '</h2>';
                echo '<div class="stars" data-rating="0" onclick="rateBook(this, event)">';
                echo '<span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>';
                echo '</div>';
                echo '<button class="delete-button" onclick="deleteBook(' . $book['id'] . ')">حذف الكتاب</button>';
                echo '<button class="read-button" onclick="readBook(\'' . htmlspecialchars($book['link']) . '\')">قراءة الكتاب</button>';
                echo '</div>';
            }
        } else {
            echo '<p>المكتبة فارغة</p>';
        }

        $conn->close();
        ?>

    </div>
    <footer>
        <p> &copy; 2024 جميع الحقوق محفوظة</p>
    </footer>
    <script>
        function goBack() {
            window.location.href = 'home.php'; 
        }

        function displayMyBooks() {
            let myBooks = JSON.parse(localStorage.getItem('myBooks')) || [];
            const myBooksList = document.getElementById('myBooksList');
            myBooksList.innerHTML = '';

            myBooks.forEach((book, index) => {
                let bookItem = document.createElement('div');
                bookItem.className = 'book-item';
                bookItem.innerHTML = `
                    <h2>${book.title}</h2>
                    <button class="delete-button" onclick="deleteBook(${index})">حذف الكتاب</button>
                    <button class="read-button" onclick="readBook('${book.link}')">قراءة الكتاب</button>`;
                myBooksList.appendChild(bookItem);
            });
        }

        function rateBook(element, event) {
            const stars = element.querySelectorAll('span');
            let rating = Array.from(stars).indexOf(event.target) + 1; 

            // تحديث التقييم
            element.setAttribute('data-rating', rating);
            for (let i = 0; i < stars.length; i++) {
                stars[i].style.color = i < rating ? 'gold' : 'gray'; 
            }
            
        }

        function deleteBook(id) {
            fetch('delete_book.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload(); 
            });
        }

        function readBook(link) {
            window.open(link, '_blank');
        }

    </script>
</body>

</html>