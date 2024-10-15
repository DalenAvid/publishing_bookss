<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування профілю</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }

        .profile-container {
            margin: 0 auto;
            background-color: #ffffff;
        }

        .profile-header {
            background-color: #6c6c6c;
            padding: 30px;
            color: #fff;
            text-align: left;
            height: 200px;
            position: relative;
        }

        .profile-avatar {
            position: absolute;
            bottom: -93px; 
            left: 47%;
            transform: translateX(-80%);
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #d3d3d3;
            overflow: hidden;
            z-index: 1; 
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }
        .profile-avatar input[type="file"] {
            display: none;
        }
        .delete-avatar {
            position: absolute;
            top: -10px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            text-align: center;
            cursor: pointer;
            z-index: 2;
            display: none; 
        }
        .profile-avatar:hover .delete-avatar {
            display: block;
        }
        .profile-avatar:hover #uploadButton, 
        .profile-avatar:hover #deleteButton {
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

        .profile-content {
            text-align: center;
            padding-top: 80px; 
        }

        .profile-info {
            position: relative;
            padding-bottom: 80px; 
        }

        .profile-info img {
            width: 30px; 
            height: 30px;
            border-radius: 50%;
            margin: 0 auto;
            display: block;
            position: relative;  
            z-index: 2;
            margin-top: -44px;
            margin-left: 690px;
        }

        .profile-info h2, .profile-info p {
            margin-top: -60px;
            margin-left: 160px;
            font-size: 24px;
            color: #333;
        }

        .profile-info p {
            margin-top: 8px;
            color: #888;
            font-size:14px;
        }

        .profile-form {
            max-width: 400px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            padding: 20px;
            background-color: #ffffff;
        }

        
.form-row {
    width: 48%; 
    margin-bottom: 15px;
    display: flex;
    flex-direction: column;
    margin-right: 4%; 
    margin-top:14px;
}

.form-row:nth-child(2n) {
    margin-right: 0; 
}

.form-row input {
    background-color: #d3d3d3;
    width: 93%;
    padding: 8px;
    border: none; 
    outline: none;
    font-size: 14px;
    color: #333;
}
.form-row input::placeholder {
    color: #333;
    font-weight: bold;
    text-align: center;
}
.save-button {
    background-color: #d3d3d3;
    color: #333;
    font-weight: bold;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    width: calc(100%);
    margin-top: 20px;
    margin-bottom:167px;
}
.save-button:hover {
    background-color: #5a5a5a;
}
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-header">
            <h1>Ваш профіль</h1>
            <div class="profile-avatar">
                {{-- <img id="profileImage" src="{{ asset('images/default-avatar.png') }}"> --}}
                <img id="profileImage" src="{{ $user->photo_url }}" alt="Avatar" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                <span class="delete-avatar" id="deleteAvatar">&times;</span>
                <input type="file" id="uploadAvatar" accept="image/*">

                 <input type="file" id="imageUpload" style="display:none;" accept="image/*" /> 
                         <button id="uploadButton">Upload</button> 

                        <button id="deleteButton">&times;</button>
            </div>
        </div>
        <div class="profile-content">
            <div class="profile-info">
                
                <img src="{{ asset('icons/icon.jpg') }}" >
                <h2>{{ $user->name }}</h2>
                <p>{{ Auth::user()->location ?? 'Unknown Location' }}</p>
                {{-- <p>{{ $user->address }}</p> --}}
            </div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
                @csrf
                @method('PUT')

                <div class="form-row">
                    <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" placeholder="Ім'я" >
                </div>
                <div class="form-row">
                    <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" placeholder="Прізвище" >
                </div>
                <div class="form-row">
                    <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="Адреса" >
                </div>
                <div class="form-row">
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" placeholder="Номер телефону">
                </div>
                <div class="form-row">
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                </div>
                <div class="form-row">
                    <input type="text" id="reader_id" name="reader_id" value="{{ old('reader_id', $user->reader_id) }}" placeholder="Читацький ID" >
                </div>
                <div style="width: 100%;">
                    <button type="submit" class="save-button">Зберегти</button>
                </div>
            </form>
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

        const formData = new FormData();
        formData.append('photo', file);

        fetch('{{ route("profile.uploadPhoto") }}', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (!data.success) {
                alert('Не вдалося завантажити фото.');
            } else {
                alert('Фото успішно завантажено.');
            }
        })
        .catch(error => console.error('Помилка:', error));
    }
});

document.getElementById("deleteButton").addEventListener("click", function() {
    const defaultAvatar = "{{ asset('images/default-avatar.png') }}";
    document.getElementById("profileImage").setAttribute("src", defaultAvatar);

    fetch('{{ route("profile.uploadPhoto") }}', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ delete: true })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Фото видалено.');
        } else {
            alert('Не вдалося видалити фото.');
        }
    })
    .catch(error => console.error('Помилка:', error));
});
// document.getElementById("uploadButton").addEventListener("click", function() {
//         document.getElementById("imageUpload").click();
//     });

//     document.getElementById("imageUpload").addEventListener("change", function() {
//         const file = this.files[0];
//         if (file) {
//             const reader = new FileReader();
//             reader.onload = function(event) {
//                 document.getElementById("profileImage").setAttribute("src", event.target.result);
//             }
//             reader.readAsDataURL(file);
//         }
//     });

//     document.getElementById("deleteButton").addEventListener("click", function() {
//         const defaultAvatar = "{{ asset('images/default-avatar.png') }}";
//         document.getElementById("profileImage").setAttribute("src", defaultAvatar);
//         });
    </script>
</body>
</html>
