<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;

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

// Web API Routes
Route::post('/registration', [UserController::class, 'UserRegistration']);
Route::post('/login', [UserController::class, 'UserLogin']);
Route::post('/otp', [UserController::class, 'sendOTPCode']);
Route::post('/verify-otp', [UserController::class, 'verifyOTPCode']);
Route::post('/resetPass', [UserController::class, 'resetPass'])
    ->middleware(TokenVerificationMiddleware::class);
Route::get('/user-profile', [UserController::class, 'userProfile'])->middleware(TokenVerificationMiddleware::class);
Route::post('/updateProfile', [UserController::class, 'updateProfile'])->middleware(TokenVerificationMiddleware::class);

// User Logout
Route::get('/logout', [UserController::class, 'logout']);

// Page Routes
Route::get('/', [HomeController::class, 'home']);
Route::get('/userLogin', [UserController::class, 'loginPage']);
Route::get('/userRegistration', [UserController::class, 'registrationPage']);
Route::get('/sendOTP', [UserController::class, 'sendOtpPage']);
Route::get('/verifyOtp', [UserController::class, 'verifyOtpPage']);
Route::get('/resetPass', [UserController::class, 'resetPassPage'])
    ->middleware(TokenVerificationMiddleware::class);
Route::get('/dashboard', [DashboardController::class, 'dashboardPage'])
    ->middleware(TokenVerificationMiddleware::class);
Route::get('/userProfile', [UserController::class, 'profilePage'])
    ->middleware(TokenVerificationMiddleware::class);
Route::get('/categoryPage', [CategoryController::class, 'CategoryPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/customerPage', [CustomerController::class, 'CustomerPage'])->middleware(TokenVerificationMiddleware::class);
Route::get('/productPage', [ProductController::class, 'ProductPage'])->middleware(TokenVerificationMiddleware::class);



// Category API
Route::post("/create-category",[CategoryController::class,'CategoryCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-category",[CategoryController::class,'CategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-category",[CategoryController::class,'CategoryDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-category",[CategoryController::class,'CategoryUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/category-by-id",[CategoryController::class,'CategoryByID'])->middleware([TokenVerificationMiddleware::class]);


// Customer API
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);


// Product Api
Route::post("/create-product",[ProductController::class,'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/product-by-id",[ProductController::class,'ProductByID'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-product",[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-product",[ProductController::class,'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);





