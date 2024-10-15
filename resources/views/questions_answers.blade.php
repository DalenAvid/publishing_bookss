<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль користувача</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container {
            margin-top: 20px;
        }

        .profile-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .profile-container h1 {
            margin-right: 260px;
            margin-bottom: 30px;
            white-space: nowrap;
        }
        
        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-picture {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background-color: #ccc;
            margin-top: 10px;
            margin-bottom: 10px;
            margin-left: 10px;
            cursor: pointer;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .profile-picture:hover #uploadButton, 
        .profile-picture:hover #deleteButton {
            display: block;
        }

        #uploadButton, #deleteButton {
            display: none;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        #deleteButton {
            top: 10px;
            right: 10px;
            left: auto;
            transform: none;
            background-color: red;
            padding: 5px;
            border-radius: 50%;
        }

        .profile-info {
            margin-bottom: 20px;
        }

        .profile-info h2 {
            align-items: left;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-info p {
            margin-bottom: 20px;
        }

        .button1 {
            background-color: #cfcfcf; 
            color: rgb(9, 9, 9); 
            border: none;
            width: 180px;
            height: 40px;
        }

        .social-media-title {
            text-align: left; 
            margin-left: 10px; 
            font-size: 24px;
            margin-bottom: 10px; 
        }

        .alternative-login {
            margin-top: 1rem;
            text-align: center;
        }

        .alternative-login img {
            width: 30px;
            margin: 0 10px;
            cursor: pointer;
        }

        .stats {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .stats div {
            text-align: center;
            margin: 0 15px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
        }

        .col-left, .col-right {
            flex: 1;
            margin: 10px;
        }

        .col-left {
            max-width: 300px;
        }

        .col-right {
            max-width: 1100px;
        }

        .tabs {
            display: flex;
            justify-content: left;
            margin-bottom: 20px;
        }

        .tabs button {
            margin: 0 5px;
            padding: 10px 20px;
            margin-bottom: 5px;
            border-radius: 20px; 
        }

        .grey-rectangle {
            width: 100%;
            height: 150px;
            background-color: #656565;
            margin-top: 10px;
            margin-bottom: 25px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .card {
            background-color: #fff;
            width: 18%;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: none;
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
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .author {
            font-size: 14px;
            color: #555;
        }

        .btn {
            background-color: initial; 
            border: none;
        }

        .btn:hover {
            background-color: #d3d3d3; 
            cursor: pointer;
        }

        .btn:active {
            background-color: #a9a9a9; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-left">
            <div class="profile-container">
                <h1 class="text-center">Ваш профіль</h1>
                <div class="profile-header">
                    <div class="profile-picture">
                        <img id="profileImage" src="{{ asset('images/default-avatar.png') }}" >
                        <input type="file" id="imageUpload" style="display:none;" accept="image/*" />
                        <button id="uploadButton">Upload</button>
                        <button id="deleteButton">&times;</button>
                    </div>
                    <div class="profile-info">
                        <h2>{{ Auth::user()->name }}</h2>
                        <p>{{ Auth::user()->location ?? 'Unknown Location' }}</p>
                        <a href="{{ route('profile.modify') }}" style="text-decoration: none;">
                            <button class="button1">Редагувати</button>
                        </a>
                    </div>
                </div>
                <div class="social-media-title">
                    <h6>Мої інші соц.мережі:</h6>
                </div>
                <div class="alternative-login">
                    <a href="{{ route('socialite.auth', ['provider' => 'google']) }}"><img src="{{ asset('icons/google.jpeg') }}" alt="Google"></a>
                    <a href="{{ route('socialite.auth', ['provider' => 'apple']) }}"><img src="{{ asset('icons/apple.jpeg') }}" alt="Apple"></a>
                    <a href="{{ route('socialite.auth', ['provider' => 'facebook']) }}"><img src="{{ asset('icons/facebook.jpeg') }}" alt="Facebook"></a>
                <hr>
                </div>

                <div class="stats">
                    <div>
                        <h4>42</h4>
                        <p>прочитано</p>
                    </div>
                    <div>
                        <h4>12</h4>
                        <p>прослухано</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-right">
            <div class="grey-rectangle"></div>
            <div class="tabs">
                {{-- <button class="btn btn-light">Опубліковані книги</button> --}}
                <a href="{{ route('profile.show') }}" class="btn btn-light">Опубліковані книги</a>
                {{-- <a href="{{ route('profile.questions_answers') }}" style="text-decoration: none;">           
                    <button class="btn btn-light">Запитання та відповіді</button>
                </a> --}}
                <a href="{{ route('profile.questions_answers') }}" class="btn btn-light">
                    Запитання та відповіді
                </a>
                
                {{-- <button class="btn btn-light">Запитання та відповіді</button> --}}
                <button class="btn btn-light">Ваші відгуки</button>
            </div>

             <div class="content">
                <div class="container">
                    {{-- <div class="card">
                        <div class="image-container">
                            <img src="https://via.placeholder.com/150" alt="Обложка книги">
                        </div>
                        <div class="info-container">
                            <div class="title">Назва книги 1</div>
                            <div class="author">Автор книги 1</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-container">
                            <img src="https://via.placeholder.com/150" alt="Обложка книги">
                        </div>
                        <div class="info-container">
                            <div class="title">Назва книги 2</div>
                            <div class="author">Автор книги 2</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-container">
                            <img src="https://via.placeholder.com/150" alt="Обложка книги">
                        </div>
                        <div class="info-container">
                            <div class="title">Назва книги 3</div>
                            <div class="author">Автор книги 3</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-container">
                            <img src="https://via.placeholder.com/150" alt="Обложка книги">
                        </div>
                        <div class="info-container">
                            <div class="title">Назва книги 4</div>
                            <div class="author">Автор книги 4</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="image-container">
                            <img src="https://via.placeholder.com/150" alt="Обложка книги">
                        </div>
                        <div class="info-container">
                            <div class="title">Назва книги 5</div>
                            <div class="author">Автор книги 5</div>
                        </div>
                    </div>
                </div> --}}
            </div>
            
        </div>
    </div>
</div>

<script>
    document.getElementById("uploadButton").addEventListener("click", function() {
        document.getElementById("imageUpload").click();
    });

    document.getElementById("imageUpload").addEventListener("change", function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById("profileImage").setAttribute("src", event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });

    document.getElementById("deleteButton").addEventListener("click", function() {
        const defaultAvatar = "{{ asset('images/default-avatar.png') }}";
        document.getElementById("profileImage").setAttribute("src", defaultAvatar);
    });
</script>

</body>
</html>
