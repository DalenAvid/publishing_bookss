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
</style>
<div class="sidebar">
    <h2></h2>
    <ul>
        <li><a href="/home">Домівка</a></li>
        <li><a href="/library">Бібліотека</a></li>
        <li><a href="#services">Ваші книги</a></li>
        <li><a href="/downloadingTheBook">Завантаження книги</a></li>
        <li><a href="/saved">Збережене</a></li>
        <li><a href="/profile">Профіль</a></li>
    </ul>
</div>