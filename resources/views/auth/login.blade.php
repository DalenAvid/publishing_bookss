<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Логінація</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .main-container {
            display: flex;
            width: 100%;
            height: 100%;
        }
        .image-side {
            flex: 1;
            background-image: url('picture.jpg'); 
            background-size: cover;
            background-position: center;
        }
        .form-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem;
            box-sizing: border-box;
            background-color: #fcc2c2;
        }
        .form-container {
            background-color: #ffffff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .form-container h1 {
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
        .alternative-login {
            margin-top: 1rem;
        }
        .alternative-login img {
            width: 30px;
            margin: 0 10px;
            cursor: pointer;
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
            width: 150px;
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
        <button onclick="window.location.href='{{ route('register') }}'">Зареєструватися</button>
        <div class="language-selector">
            <img src="{{ asset('icons/language.jpg') }}" alt="Language">
            {{-- <div id="google_translate_element"></div> --}}
            <select id="language-select" class="form-select" onchange="changeLanguage(this)">
                <option value="ua" {{ app()->getLocale() == 'ua' ? 'selected' : '' }}>укр</option>
                <option value="ru" {{ app()->getLocale() == 'ru' ? 'selected' : '' }}>рус</option>
                <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>eng</option>
            </select> 
        </div>
    </div>
    <div class="main-container">
        <div class="image-side"></div>
        <div class="form-side">
            <div class="form-container">
                <h1>Readify</h1>
                <p>Ваш затишний куточок для читання</p>
                <p>Маєте акаунт? Увійдіть</p>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="tel" name="phone" placeholder="Ваш номер телефону" value="{{ old('phone') }}" required>
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Пароль" required>
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit">Увійти</button>
                    </div>
                </form>
                <div class="alternative-login">
                    <p>або</p>
                    <a href="{{ route('socialite.auth', ['provider' => 'google']) }}"><img src="{{ asset('icons/google.jpeg') }}" alt="Google"></a>
                    <a href="{{ route('socialite.auth', ['provider' => 'apple']) }}"><img src="{{ asset('icons/apple.jpeg') }}" alt="Apple"></a>
                    <a href="{{ route('socialite.auth', ['provider' => 'facebook']) }}"><img src="{{ asset('icons/facebook.jpeg') }}" alt="Facebook"></a>
                    </div>
            </div>
        </div>
    </div>
    {{-- <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({pageLanguage: 'uk', includedLanguages: 'en,ru,uk'}, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script> --}}

    <script>
        function changeLanguage(select) {
            const language = select.value;
            window.location.href = {{ url('set-language') }}/${language};
        }
    </script>
</body>
</body>
</html>
