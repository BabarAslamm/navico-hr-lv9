<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\JobStatusController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AddressController;
use App\Models\Post;
use MongoDB\Client;
use App\Models\CustomRole;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/post', function () {

    // $post = new Post();
    // $post->name = 'abcd';
    // $post->detail = 'xyz';
    // $post->save();

    $posts = Post::all();
   echo '<pre>'; print_r($posts); exit;

    echo '<pre>'; print_r('done'); exit;
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::resource('designations', DesignationController::class);
    Route::resource('locations', LocationController::class);
    Route::resource('job-status', JobStatusController::class);
    Route::resource('employees', EmployeeController::class);
    Route::get('/employee/register/{id}', [EmployeeController::class, 'employeeRegister'])->name('employee.register');
    Route::resource('address', AddressController::class);
});



require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


