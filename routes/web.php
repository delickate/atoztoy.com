<?php

use Illuminate\Support\Facades\Route;

use App\Models\Category;
use App\Models\Product;
use App\Models\CompanyProfile;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserSessions\UserSessionController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\ShippingMethodController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\OrderController;
// routes/web.php

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactMessageController;












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

Auth::routes();



///////////////////////////////  frontend
Route::get('/', function () 
{
    $categories             = Category::whereNotNull('images')->whereNot('images', '')->inRandomOrder()->limit(6)->get();
    $trendingProducts       = Product::with('category')->where('is_active', true)->inRandomOrder()->limit(4)->get();
    $newProducts            = Product::with('category')->where('is_active', true)->latest()->limit(8)->get();
    $categoryProductGroups  = Category::with(['products' => function ($query) 
                                {
                                    $query->where('is_active', true)->inRandomOrder()->limit(4);
                                }])->whereHas('products', function ($query) 
                                {
                                    $query->where('is_active', true);
                                })->inRandomOrder()->limit(3)->get();

    //$companyProfile         = CompanyProfile::first();
   
    return view('welcome', compact('categories', 'trendingProducts', 'newProducts', 'categoryProductGroups'));
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/shop/products/{product}', [ProductController::class, 'show'])->name('shop.products.show');
//Route::get('/shop/categories/{category}', [CategoryController::class, 'show'])->name('shop.categories.show');
Route::get('/shop/categories/{category?}', [CategoryController::class, 'show'])
    ->name('shop.categories.show');

Route::get('/products/listing', [ProductController::class, 'listing'])
            ->name('products.listing');

        Route::get('/products/{product}', [ProductController::class, 'show'])
            ->name('products.show');

        Route::get('/products/category/{category}', [ProductController::class, 'category'])
            ->name('products.category');



        Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.index');

        Route::post('/cart/add/{product}', [CartController::class, 'add'])
            ->name('cart.add');

        Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])
            ->name('cart.remove');

            // Checkout
       Route::get('/checkout', [CheckoutController::class, 'index'])
            ->name('checkout.index');

        Route::post('/checkout/guest', [CheckoutController::class, 'guest'])
            ->name('checkout.guest');

        Route::get('/checkout/signup', [CheckoutController::class, 'signup'])
            ->name('checkout.signup');

        Route::post('/checkout/signup', [CheckoutController::class, 'storeSignup'])
            ->name('checkout.signup.store');

        Route::post('/checkout/next', [CheckoutController::class, 'next'])
            ->name('checkout.next');
    
        Route::get('/checkout/details', [CheckoutController::class, 'details'])
            ->name('checkout.details');

        Route::post('/checkout/details', [CheckoutController::class, 'saveDetails'])
            ->name('checkout.details.save');

        Route::get('/checkout/payment', [CheckoutController::class, 'payment'])
            ->name('checkout.payment');

        Route::post('/checkout/payment', [CheckoutController::class, 'placeOrder'])
            ->name('checkout.payment.place');

 Route::get('/checkout/success/{order}', [CheckoutController::class, 'success'])
    ->name('checkout.success');

Route::get('/aboutus', function () {  return view('company_profiles.aboutus'); })->name('company_profile.aboutus');

//Route::get('/contact-us', function () {  return view('contact.contactus'); })->name('contact-us');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact-us');

Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

// Route::middleware('guest')->group(function () 
// {
//     Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
//     Route::post('/login', [AuthController::class, 'login']);

//     Route::get('/register', [AuthController::class, 'showRegister']);
//     Route::post('/register', [AuthController::class, 'register']);
// });

// Route::post('/logout', [AuthController::class, 'logout'])
//     ->middleware('auth')
//     ->name('logout');


//SANI: /////////////////////backend
    Route::middleware(['auth'])->group(function () 
    {
        //SANI: user sessions
        Route::get('/sessions', [UserSessionController::class, 'index'])
            ->name('sessions');

        Route::get('/user-sessions/{session_id}/activities', 
        [UserSessionController::class, 'activities']
        )->name('user-sessions.activities');

        Route::get('/user-sessions/{session_id}/audit-logs',
        [UserSessionController::class, 'auditLogs']
        )->name('user-sessions.audit-logs');
    
        //SANI: Change password & their rules
        Route::get('/change-password', [ChangePasswordController::class, 'show'])
        ->name('password.change.form');

        Route::post('/change-password', [ChangePasswordController::class, 'update'])
        ->name('password.change.update');

        Route::resource('company-profiles', CompanyProfileController::class)
            ->only([
                'index',
                'create',
                'store',
                'edit',
                'update',
            ]);

        //SANI: Forcefully change password
        // Route::middleware(['force.password.change'])->group(function () 
        // {
        //     Route::get('/home', [HomeController::class, 'index']);
        // });

        Route::resource('shipping-methods', ShippingMethodController::class);
        Route::resource('payment-methods', PaymentMethodController::class)->except(['show']);

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

        Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

        Route::resource('users', UserController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('categories', CategoryController::class)->except(['show']);
        Route::resource('products', ProductController::class)->except(['show','listing']);
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

        
        Route::get('/admin/contact-messages', [ContactMessageController::class, 'index'])
    ->name('admin.contact-messages.index');

        Route::get('/admin/contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])
    ->name('admin.contact-messages.show');


        //SANI: Exception logs
        Route::get('/test-exception', function () 
        {
            throw new Exception("Test Exception Logging");
        });
    });

//       Route::middleware('auth')->prefix('admin')->group(function () {

//     Route::get('/contact-messages', [ContactMessageController::class, 'index'])
//         ->name('admin.contact-messages.index');

// });
  

        

    
Route::prefix('customer')->name('customer.')->group(function () 
{

    Route::get('/login', [CustomerAuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [CustomerAuthController::class, 'authenticate'])
        ->name('login.authenticate');

    Route::get('/signup', [CustomerAuthController::class, 'signup'])
        ->name('signup');

    Route::post('/signup', [CustomerAuthController::class, 'store'])
        ->name('signup.store');

    Route::post('/logout', [CustomerAuthController::class, 'logout'])
        ->name('logout');

    
});



Route::middleware('auth:customer')->group(function () 
{

    Route::get('/account', function () { return view('customer.account');})->name('customer.account');
    Route::get('/customer/orders', [CustomerController::class, 'myorders'])->name('customer.myorders');
    Route::get('/customer/orders-detail/{order}', [CustomerController::class, 'myordersdetail'])->name('customer.myordersdetail');

        

});

