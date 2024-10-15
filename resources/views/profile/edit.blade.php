{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагування профілю</h1>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Ім'я</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', explode(' ', $user->name)[0]) }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Прізвище</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', explode(' ', $user->name)[1] ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Номер телефону</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>
        <div class="form-group">
            <label for="address">Адреса</label>
            <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
</div>
@endsection --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редагування профілю</h1>
    <div class="profile-header">
        <img id="profileImage" src="{{ $user->photo_url }}" alt="Avatar" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
    </div>
    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">Ім'я</label>
            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', explode(' ', $user->name)[0]) }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Прізвище</label>
            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', explode(' ', $user->name)[1] ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Номер телефону</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
    <form id="uploadForm" enctype="multipart/form-data">
        @csrf
        <input type="file" id="imageUpload" name="photo" style="display: none;">
        <button type="button" id="uploadButton" class="btn btn-secondary">Завантажити зображення</button>
        <button type="button" id="deleteButton" class="btn btn-danger">Видалити зображення</button>
    </form>
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
