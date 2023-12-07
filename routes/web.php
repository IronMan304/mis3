<?php


use App\Http\Livewire\Sex\SexList;
use App\Http\Livewire\User\UserList;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Course\CourseList;
use App\Http\Livewire\College\CollegeList;
use App\Http\Controllers\ProfileController;

use App\Http\Livewire\Borrower\BorrowerList;


use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Authentication\RoleList;
use App\Http\Livewire\Authentication\PermissionList;

use App\Http\Livewire\Category\CategoryList;
use App\Http\Livewire\Type\TypeList;
use App\Http\Livewire\Tool\ToolList;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('users', UserList::class);
    Route::get('borrowers', BorrowerList::class);
    Route::get('sexes', SexList::class);
    Route::get('colleges', CollegeList::class);
    Route::get('courses', CourseList::class);
    Route::get('categories', CategoryList::class);
    Route::get('types', TypeList::class);
    Route::get('tools', ToolList::class);
    
    Route::get('role', RoleList::class);
    Route::get('permission', PermissionList::class);
});

require __DIR__.'/auth.php';
