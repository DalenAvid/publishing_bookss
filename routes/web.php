<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\SocialiteController; 
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UploadBookController;
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Auth::routes();   


Route::get('/', function () {
    return view('home');
})->name('home');




Route::middleware('guest')->group(function () {
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])->name('socialite.auth');
    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])->name('socialite.callback');
});

Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('login.provider');
Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback'])->name('login.provider.callback');

Route::get('/index', [IndexController::class, 'index'])->name('index');
Route::resource('books', BooksController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.modify');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/questionsAnsw', [ProfileController::class, 'questionsAnswers'])->name('profile.questions_answers');

    Route::post('/profile/upload', [ProfileController::class, 'uploadPhoto'])->name('profile.uploadPhoto');
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::get('/library', [LibraryController::class, 'library'])->name('library');

    Route::get('/upload', [UploadBookController::class, 'create'])->name('book.upload');

Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
Route::post('/upload-book', [UploadBookController::class, 'store'])->name('book.store');


    // Route::post('/upload', [UploadBookController::class, 'store'])->name('book.store');
    Route::post('/book/preview', [UploadBookController::class, 'preview'])->name('book.preview');
    Route::get('/book/preview', [UploadBookController::class, 'showPreviewPage'])->name('preview.new');

    Route::get('/book/preview', [UploadBookController::class, 'showPreview'])->name('preview.page');
Route::get('/book/preview-new', function () {
    return view('preview');
})->name('preview.new');
    // Route::post('/upload/preview', [UploadBookController::class, 'preview'])->name('upload.preview');
    // Route::get('/upload/preview-page', [UploadBookController::class, 'showPreviewPage'])->name('upload.preview.page');
    Route::get('/book/preview-new', [UploadBookController::class, 'previewPage'])->name('preview.new');

});
// Route::get('/library', [LibraryController::class, 'index'])->name('library');

// Route::get('/library', function () {
//     return view('library'); 
// });
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.modify');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/login/{provider}', [LoginController::class, 'redirectToProvider']);
// Route::get('/login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);




Route::get('login/facebook', [AuthController::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [AuthController::class, 'handleFacebookCallback']);
Route::get('login/google', [AuthController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [AuthController::class, 'handleGoogleCallback']);


Route::get('login/google', [App\Http\Controllers\Auth\LoginController::class, 'redirectToGoogle'])->name('login/google');
Route::get('login/google/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleGoogleCallback']);
Route::get('login/facebook', [App\Http\Controllers\Auth\LoginController::class, 'redirectToFacebook'])->name('login/facebook');
Route::get('login/facebook/callback', [App\Http\Controllers\Auth\LoginController::class, 'handleFacebookCallback']);



Route::get('set-language/{lang}', function ($lang) {
    Session::put('locale', $lang);
    return redirect()->back();
});


Route::redirect('/', '/en');
Route::group(['prefix' => '{language}'], function () {
    Route::get('/', function ($language) {
        App::setLocale($language);
        return view('welcome');
    });
});