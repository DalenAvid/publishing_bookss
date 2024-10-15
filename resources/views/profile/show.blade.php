
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Профіль користувача</h1>
    <div class="profile-container">
        <div class="profile-header">
            <div class="profile-picture">
                <img id="profileImage" src="{{ $user->photo_url }}" alt="Avatar" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
            </div>
            <div class="profile-info">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->email }}</p>
                <p>{{ $user->phone }}</p>
            </div>
        </div>
        <div class="profile-body">
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Ім'я:</label>
                    <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Телефон:</label>
                    <input type="text" name="phone" id="phone" value="{{ $user->phone }}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Зберегти зміни</button>
            </form>
            <form id="uploadForm" enctype="multipart/form-data">
                @csrf
                <input type="file" id="imageUpload" name="photo" style="display: none;">
                <button type="button" id="uploadButton" class="btn btn-secondary">Завантажити зображення</button>
                <button type="button" id="deleteButton" class="btn btn-danger">Видалити зображення</button>
            </form>
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
</script>
@endsection