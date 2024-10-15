<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            width: 250px;
            color: white;
            height: 100vh;
            position: fixed;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
            margin-left: 20px;
            padding: 20px 0;
        }
        .profile-picture {
            display: flex;
            align-items: center;
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #ccc;
            margin-bottom: 10px;
            cursor: pointer;
        }
        .profile-picture img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }
        .profile-picture h2 {
            font-size: 16px;
            color: #333;
            white-space: nowrap;
            margin-bottom: 20px;
            margin-left: 70px;
        }
        .profile-info {
            text-align: center;
        }
        .profile-info h2 {
            font-size: 18px;
            color: black;
        }
        .profile-info .button1 {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
        }
        .profile-info .button1:hover {
            background-color: #2980b9;
        }
        .sidebar h2 {
            margin-top: 10px;
            text-align: center;
        }
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            width: 100%;
            padding-left: 140px;
        }
        .sidebar ul li {
            width: 100%;
            border-bottom: 1px solid black; 
            position: relative;
        }
        .sidebar ul li a {
            display: block;
            padding: 15px 0px;
            color: black;
            text-decoration: none;
            width: 100%;
        }
        .sidebar ul li::before {
            content: '>'; 
            position: absolute;
            right: 3px;
            top: 15px;
            color: black;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }
        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }
        .card {
            background-color: #ccc;
            width: 18%;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
            position: relative;
        }
        .card img {
            width: 100%;
            border-radius: 5px;
        }
        .rating {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 5px;
            border-radius: 3px;
        }
        .title {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
        }
        .author {
            font-size: 14px;
            color: #555;
        }
        .upload-container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            width: 400px;
            margin: 20px auto;
        }
        .upload-container h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .upload-container h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .upload-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .upload-container input,
        .upload-container textarea,
        .upload-container button {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #D9D9D9;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .upload-container button {
            /* background-color: #ff4c4c; */
            color: rgb(12, 12, 12);
            border: none;
            cursor: pointer;
            width: 76%;
        }
        /* .upload-container button:hover {
            background-color: #e04343;
        } */
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-picture">
                <img id="profileImage" src="{{ asset('images/default-avatar.png') }}" >
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <h2>Меню</h2>
        @include('sidebar')
    </div>
    <div class="content">
        <div class="upload-container">
            <h1>Завантаження власної книги</h1>
            <p>Надихайте інших на творчість та створення!</p>
            <h2>Крок 1</h2>
       
            <form action="{{ route('book.preview') }}" method="GET" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="Введіть назву вашої книги" required>
                <textarea name="description" placeholder="Додайте опис" required></textarea>
                <input type="text" name="language" placeholder="Мова" required>
                <input type="text" name="genre" placeholder="Жанр" required>
                <input type="text" name="age" placeholder="Вік" required>
                <input type="number" name="year" placeholder="Рік видання" required>
                <input type="number" name="pages" placeholder="К-ть сторінок" required>
                <input type="file" name="book_file" accept=".pdf,.doc,.docx" required>
                <input type="file" id="coverImageInput" name="cover_image" accept="image/*" required>
                
                <button type="submit">Далі</button>
            </form>
            @if (session('book_data.cover_image'))
            <img src="{{ Storage::url(session('book_data.cover_image')) }}" alt="Обкладинка книги" style="max-width: 100%; height: auto;">
        @else
            <p>Обкладинка книги не знайдена.</p>
        @endif
    
        </div>   
         <div id="previewContainer">
            <h2>Прев'ю обкладинки</h2>
            <img id="coverPreview" src="" alt="Прев'ю обкладинки" style="display: none; max-width: 100%;">
        </div> 
        
        <script>
            document.getElementById('coverImageInput').addEventListener('change', function(event) {
                var reader = new FileReader();
                reader.onload = function(){
                    var preview = document.getElementById('coverPreview');
                    preview.src = reader.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(event.target.files[0]);
            });
        </script>
    </div>
</body>
</html>
