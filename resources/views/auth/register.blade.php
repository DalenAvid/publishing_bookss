<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fcc2c2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 470px;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }
        .container h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group input {
            width: 100%;
            padding: 0.5rem;
            box-sizing: border-box;
            margin-bottom: 0.5rem;
            background-color: #CCCCCC;
            border: 1px solid #CCCCCC; 
        }
        .form-group button {
            width: 100%;
            padding: 0.5rem;
            background-color: #CCCCCC;
            border: none;
            cursor: pointer;
        }
        .form-group label {
            display: flex;
            align-items: center;
            width: 100%;
        }
        .form-group label input {
            margin-right: 0.5rem;
        }
        .form-group label span {
            flex: 1; 
            margin-left: 0.5rem; 
        }
        .alternative-login {
            margin-top: 1rem;
        }
        .alternative-login img {
            width: 30px;
            margin: 0 10px;
            cursor: pointer;
        }
        .form-check-inline {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-checkbox{
            width: 20px;
            height: 20px;
            float: left;
            position: relative;
        }
        .main-checkbox label{
            width: 20px;
            height: 20px;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
        }
        .main-checkbox input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background-color: #CCCCCC;
            border: 1px solid #000; 
            cursor: pointer;
            position: relative;
        }
        .main-checkbox input[type="checkbox"]:checked::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 10px;
            height: 10px;
            background-color: #000; 
            transform: translate(-50%, -50%);
        }
        .header {
            position: absolute;
            top: 20px;
            right: 60px;
            display: flex;
            align-items: center;
            gap: 60px; 
        }
        .header button {
            padding: 0.5rem 1rem;
            background-color: #CCCCCC;
            border: none;
            cursor: pointer;
            font-size: 1rem;
            width:150px;
        }
        .language-selector {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }
        .language-selector img {
            width: 20px;
            height: 20px;
        }
        .language-selector select {
            padding: 0.2rem;
            font-size: 1rem;
            border: none;
            background: none;
            appearance: none;
            cursor: pointer;
            text-align: center;

        }
    </style>
</head>
<body>
    <div class="header">
        <button onclick="window.location.href='{{ route('login') }}'">Логін</button>
        <div class="language-selector">
            <img src="{{ asset('icons/language.jpg') }}" alt="Language">
            <select id="langSelect" onchange="changeLanguage(this.value)">
                <option value="ua">укр</option>
                <option value="ru">рус</option>
                <option value="eng">eng</option>
            </select>
        </div> 
        
        
    </div>
    <div class="container">
        <h1>Whimsy</h1>
        <p>Ваш затишний куточок для читання</p>
        <p>Створіть свій акаунт тут</p>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="name" placeholder="Ваше ім'я та прізвище" value="{{ old('name') }}" required >
                @if ($errors->has('name'))
                    <span class="error">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="tel" name="phone" placeholder="Ваш номер телефону" value="{{ old('phone') }}" required>
                @error('phone')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="error">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Пароль" required>
                @if ($errors->has('password'))
                    <span class="error">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="Підтвердіть пароль" required>
            </div>
            <div class="form-group">
                <button type="submit">Зареєструватись</button>
            </div>
            <div class="form-group">
                <div class="main-checkbox">
                    <input value="None" id="checkbox1" name="check" type="checkbox" required>
                    <label for="checkbox1"></label>
                </div>
                <span class="text">Я погоджуюся з політикою конфіденційності.</span>
            </div>
        </form>
        <div class="alternative-login">
            <p>або</p>
            
            <a href="{{ route('socialite.auth', ['provider' => 'google']) }}"><img src="{{ asset('icons/google.jpeg') }}" alt="Google"></a>
            <a href="{{ route('socialite.auth', ['provider' => 'apple']) }}"><img src="{{ asset('icons/apple.jpeg') }}" alt="Apple"></a>
            <a href="{{ route('socialite.auth', ['provider' => 'facebook']) }}"><img src="{{ asset('icons/facebook.jpeg') }}" alt="Facebook"></a>
        </div>
    </div>
    <script>
        function changeLanguage(select) {
            const language = select.value;
            window.location.href = `/${language}`;
        }

        function changeLanguage(lang) {
        document.documentElement.setAttribute('lang', lang);
        document.documentElement.setAttribute('data-lang', lang);
        updatePageLanguage();
    }

    function updatePageLanguage() {
        const lang = document.documentElement.getAttribute('data-lang');
        switch (lang) {
            case 'ua':
                updateUI('Ласкаво просимо', 'Створіть свій акаунт тут', "Ваше ім'я та прізвище", 'Email', 'Пароль', 'Підтвердіть пароль', 'Зареєструватись', 'Я погоджуюся з політикою конфіденційності.', 'або');
                break;
            case 'ru':
                updateUI('Добро пожаловать', 'Создайте свой аккаунт здесь', 'Ваше имя и фамилия', 'Email', 'Пароль', 'Подтвердите пароль', 'Зарегистрироваться', 'Я согласен с политикой конфиденциальности.', 'или');
                break;
            case 'eng':
                updateUI('Welcome', 'Create your account here', 'Your name and surname', 'Email', 'Password', 'Confirm password', 'Register', 'I agree to the privacy policy.', 'or');
                break;
            default:
                break;
        }
    }

    function updateUI(welcome, createAccount, name, email, password, confirmPassword, registerButton, agreePolicy, or) {
        document.getElementById('welcome').innerText = welcome;
        document.getElementById('create_account').innerText = createAccount;
        document.getElementById('name_placeholder').setAttribute('placeholder', name);
        document.getElementById('email_placeholder').setAttribute('placeholder', email);
        document.getElementById('password_placeholder').setAttribute('placeholder', password);
        document.getElementById('confirm_password_placeholder').setAttribute('placeholder', confirmPassword);
        document.getElementById('register_button').innerText = registerButton;
        document.getElementById('agree_policy').innerText = agreePolicy;
        document.getElementById('or_text').innerText = or;
    }
    window.onload = function() {
        updatePageLanguage();
    };
    </script>
</body>
</html>
