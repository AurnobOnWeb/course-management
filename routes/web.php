<?php

use App\Http\Controllers\BatchCollectingController;
use App\Http\Controllers\BatchesController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ManualEnrollmentsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\TeacherSalary;
use App\Http\Controllers\ViewPaymentController;
use App\Http\Controllers\visitorController;
use App\Http\Controllers\WebsiteSettingsController;

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

       
        Route::get('/login', function () {
            if (auth()->check()) {
                return redirect()->route('dashboard'); // Redirect to the dashboard if the user is already authenticated
            }
            return view('auth.login');
        });
       
        Route::middleware(['auth', 'verified'])->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'data'])->name('dashboard');
        Route::get('/', [DashboardController::class, 'data'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
        Route::get('/role', [RoleController::class, 'role'])->name('role');
        Route::get('/role-assign-teacher', [RoleController::class, 'roleAssignTeacher'])->name('roleAssignTeacher');
        Route::post('/store-role-user', [RoleController::class, 'storeUser'])->name('userRole');
        Route::get('/view-assign-teacher', [RoleController::class, 'viewTeacherRole'])->name('viewTeacherRole');
        Route::get('/delete-teacher-role/{id}', [RoleController::class, 'deleteTeaceherRole'])->name('deleteTeaceherRole');

        Route::get('/create-role', [RoleController::class, 'CreateRole'])->name('create-role');
        Route::post('/store-role', [RoleController::class, 'storeRole'])->name('store-role');
        Route::get('/role-edit/{id}', [RoleController::class, 'edit'])->name('role-edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('delete');

        Route::resource('course', CourseController::class);
        Route::resource('batches', BatchesController::class);
        Route::resource('teacher', TeacherController::class);
        Route::resource('student', StudentController::class);
        Route::resource('payment', PaymentController::class);
        Route::any('resources/unenrollStudent', StudentController::class)->name('resources.unenrollStudent');
        Route::get('/enrollments', [ManualEnrollmentsController::class, 'index'])->name('enrollments');
        Route::post('/enrollmentsAdd', [ManualEnrollmentsController::class, 'store'])->name('enrollments.store');

        // on click batch appending
        Route::get('/get-batch/{course}', [BatchCollectingController::class, 'getBatch']);

        Route::get('/invoice/{id}', [InvoiceController::class, 'invoice'])->name('invoice');
        Route::get('/payment-dues', [ViewPaymentController::class, 'index'])->name('PaymentDues');
        Route::get('/payment-Full-paid', [ViewPaymentController::class, 'show'])->name('PaymentFull');


        Route::get('/course-report', [ReportController::class, 'courseReport'])->name('courseReport');
        Route::get('/batch-report', [ReportController::class, 'batchReport'])->name('batchReport');
        Route::get('/batch-Finished-report', [ReportController::class, 'batchFinishedReport'])->name('batchFinishedReport');
        Route::put('/batches/{id}/update-status', [ReportController::class, 'updateStatus'])->name('batches.updateStatus');
        Route::get('/batchess', [ReportController::class, 'checkBatchStatus'])->name('batches.checkBatchStatus');

        //website settings
        Route::get('/settings', [WebsiteSettingsController::class, 'websiteSettings'])->name('websiteSettings');
        Route::get('/add-settings', [WebsiteSettingsController::class, 'createSettings'])->name('create-setting');
        Route::post('/store-settings', [WebsiteSettingsController::class, 'storeSettings'])->name('store-settings');
        Route::get('/delete-settings/{id}', [WebsiteSettingsController::class, 'deleteSettings'])->name('deleteSettings');

        //visitors Routes
        Route::get('/visitor', [visitorController::class, 'visitorView'])->name('visitorView');
        Route::get('/visitor-add', [visitorController::class, 'visitorAdd'])->name('visitorAdd');
        Route::post('/store-visitor', [visitorController::class, 'storeVisitor'])->name('storeVisitor');
        Route::get('/visitor-edit/{id}', [visitorController::class, 'visitorEdit'])->name('visitorEdit');
        Route::post('/update-visitor/{id}', [visitorController::class, 'updateVisitor'])->name('updateVisitor');
        Route::get('/delete-visitor/{id}', [visitorController::class, 'deletevisitor'])->name('deletevisitor');

        //Sms Routes
        Route::get('/particular-student', [SmsController::class, 'particularStudent'])->name('particularStudent');
        Route::get('/all-student', [SmsController::class, 'allStudent'])->name('allStudent');
        Route::get('/full-batch', [SmsController::class, 'batchSms'])->name('batchSms');
        Route::get('/full-course', [SmsController::class, 'courseSms'])->name('courseSms');
        Route::get('/particular-teacher', [SmsController::class, 'particularTeacher'])->name('particularTeacher');
        Route::get('/all-teacher', [SmsController::class, 'allTeacher'])->name('allTeacher');
        Route::get('/fetch-student-number', [SmsController::class, 'fetchStudentNumber'])->name('fetch-student-number');
        Route::get('/fetch-teacher-number', [SmsController::class, 'fetchTeacherNumber'])->name('fetch-teacher-number');
       
        

        //Teacher Salary  Routes
        Route::get('/teacher-salary', [TeacherSalary::class, 'index'])->name('teacherSalary');
        Route::post('/store-salary', [TeacherSalary::class, 'storeSalary'])->name('storeSalary');
        Route::put('/update-sallary/{id}', [TeacherSalary::class, 'updateSalary'])->name('updateSalary');
        Route::get('/delete-sallary/{id}', [TeacherSalary::class, 'deleteSalary'])->name('deleteSalary');


    });

   
require __DIR__.'/auth.php';
  