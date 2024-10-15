<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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

.sidebar h2 {
    margin-top: 20px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
    width: 100%;
}

.sidebar ul li {
    width: 100%;
}

.sidebar ul li a {
    display: block;
    padding: 15px 20px;
    color: black;
    text-decoration: none;
    width: 100%;
}

.sidebar ul li a:hover {
    background-color: #34495e;
}

.content {
    margin-left: 250px;
    padding: 20px;
    flex-grow: 1;
}
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: white;
    padding: 10px 20px;
    }
    
    .header-title {
    color: black;
    font-size: 24px;
}

.header-search input {
    padding: 5px 10px;
    font-size: 16px;
    border: none;
    border-radius: 3px;
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
</style>
<body>
<div class="sidebar">
        <h2>Меню</h2>
        @include('sidebar')
    </div>
    <div class="content">
    <header class="header">
        <div class="header-title">Домівка</div>
        <div class="header-search">
            <input type="text" placeholder="Пошук...">
        </div>
    </header>
    <div class="content">
    <div class="container">
        <div class="card">
            <div class="rating">4.5</div>
            <img src="https://via.placeholder.com/150" alt="Обложка книги">
            <div class="title">Назва книги 1</div>
            <div class="author">Автор книги 1</div>
        </div>
        <div class="card">
            <div class="rating">4.7</div>
            <img src="https://via.placeholder.com/150" alt="Обложка книги">
            <div class="title">Назва книги 2</div>
            <div class="author">Автор книги 2</div>
        </div>
        <div class="card">
            <div class="rating">4.8</div>
            <img src="https://via.placeholder.com/150" alt="Обложка книги">
            <div class="title">Назва книги 3</div>
            <div class="author">Автор книги 3</div>
        </div>
        <div class="card">
            <div class="rating">4.9</div>
            <img src="https://via.placeholder.com/150" alt="Обложка книги">
            <div class="title">Назва книги 4</div>
            <div class="author">Автор книги 4</div>
        </div>
        <div class="card">
            <div class="rating">5.0</div>
            <img src="https://via.placeholder.com/150" alt="Обложка книги">
            <div class="title">Назва книги 5</div>
            <div class="author">Автор книги 5</div>
        </div>
    </div>
    </div>
    </div>
</body>
</html>