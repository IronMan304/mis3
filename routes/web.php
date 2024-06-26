<?php


use App\Models\Request;
use App\Http\Livewire\Log\LogList;
use App\Http\Livewire\Sex\SexList;
use App\Http\Livewire\Part\PartList;
use App\Http\Livewire\Tool\ToolList;
use App\Http\Livewire\Type\TypeList;
use App\Http\Livewire\User\UserList;

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Trial\TrialList;
use App\Http\Livewire\Venue\VenueList;
use App\Http\Livewire\Course\CourseList;

use App\Http\Livewire\Online\OnlineList;
use App\Http\Livewire\Option\OptionList;
use App\Http\Livewire\Source\SourceList;
use App\Http\Livewire\Status\StatusList;
use App\Http\Livewire\Request\ReportList;
use App\Http\Livewire\College\CollegeList;
use App\Http\Livewire\Request\RequestList;
use App\Http\Livewire\Service\ServiceList;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Livewire\Request\RequestList1;
use App\Http\Livewire\Borrower\BorrowerList;
use App\Http\Livewire\Category\CategoryList;
use App\Http\Livewire\Operator\OperatorList;
use App\Http\Livewire\Position\PositionList;
use App\Http\Livewire\Security\SecurityList;
use App\Http\Controllers\DashboardController;
use App\Http\Livewire\Authentication\RoleList;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Request\PrintController;
use Spatie\Permission\Middlewares\RoleMiddleware;
use App\Http\Controllers\RequesterProfileController;
use App\Http\Livewire\Authentication\PermissionList;
use App\Http\Livewire\BorrowerType\BorrowerTypeList;
use App\Http\Livewire\PartType\PartTypeList;
use App\Http\Livewire\ServiceRequest\ServiceRequestList;
use App\Http\Livewire\ServiceRequest\ReportList as ServiceRequestReportList;
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

//Route::get('/', [WelcomeController::class, 'index']);
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/get-realtime-count', [RequestController::class, 'count']);
Route::get('/get-realtime-count-service', [RequestController::class, 'countService']);



Route::group(['middleware' => ['role:admin']], function () {
    Route::get('users', UserList::class);
    Route::get('securities', SecurityList::class);

    Route::get('role', RoleList::class);
    Route::get('permission', PermissionList::class);

    Route::get('sexes', SexList::class);
    Route::get('colleges', CollegeList::class);
    Route::get('courses', CourseList::class);
    Route::get('sources', SourceList::class);
    Route::get('statuses', StatusList::class);
    Route::get('borrower_types', BorrowerTypeList::class);
    Route::get('services', ServiceList::class);
    Route::get('positions', PositionList::class);
    Route::get('options', OptionList::class);
    Route::get('part-types', PartTypeList::class);


    Route::get('venues', VenueList::class);

    Route::get('trials', TrialList::class);
    //Route::get('requests1', RequestList1::class);

});

Route::group(['middleware' => ['role:admin|president']], function () {
});

Route::group(['middleware' => ['role:admin|vice-president']], function () {
});

Route::group(['middleware' => ['role:admin|head of office|staff']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('borrowers', BorrowerList::class);
    Route::get('operators', OperatorList::class);

    Route::get('categories', CategoryList::class);
    Route::get('types', TypeList::class);
    Route::get('tools', ToolList::class);
    Route::get('parts', PartList::class);

    Route::get('/requesters/{requesterId}/profile', [RequesterProfileController::class, 'index'])->name('rp.index');
    Route::get('tool_reports', ReportList::class)->name('tool_reports');
    Route::get('service_reports', ServiceRequestReportList::class);



    Route::get('logs', LogList::class);
});

Route::group(['middleware' => ['role:admin|president|vice-president|head of office|staff']], function () {
    Route::get('/print/request_letter/{id}', [PrintController::class, 'print_request_letter'])->name('print.request');
});

Route::group(['middleware' => ['role:admin|president|vice-president|head of office|staff|operator']], function () {
    Route::get('requests', RequestList::class)->name('requests');
});
Route::group(['middleware' => ['role:admin|president|vice-president|head of office|staff|technician']], function () {
    Route::get('service_requests', ServiceRequestList::class);
});

Route::get('online-requests', OnlineList::class);

require __DIR__ . '/auth.php';
