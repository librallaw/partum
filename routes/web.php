<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('home.home');
});


Route::get('/template', function () {
    return view('mail.welcome');
});

Route::get('/about', function () {
    return view('home.about');
});

Route::get('/products', function () {
    return view('home.products');
});

Route::get('/testimonials', function () {
    return view('home.testimonial');
});

Route::get('/faqs', function () {
    return view('home.faq2');
});

Route::get('/privacy', function () {
    return view('home.privacy');
});

Route::get('/products', function () {
    return view('home.products');
});

Route::get('/', function () {
    return view('home.home');
});
/*Route::get('/', 'HomeController@index')->name('home');*/


Route::post('/contact/send', 'DocController@doContactUs')->name("doContactUs");

Auth::routes();



    Route::get('/logout', 'HomeController@logout')->name('logout');

    Route::get('/setup', 'HomeController@setup')->name('setup');
    Route::get('/setup/bank', 'HomeController@addbank')->name('addbank');
//    Route::post('/setup/bank', 'HomeController@doAddBank')->name('doAddBank');
    Route::get('/savings/initial', 'HomeController@showFirstPayment')->name('showFirstPayment');
    Route::post('/savings/initial', 'HomeController@doFirstPayment')->name('doFirstPayment');
    Route::post('/pay2', 'PaymentController@gateway')->name('gateway');
    Route::post('/pay', 'PaymentController@redirectToGateway')->name('pay');
    Route::get('/payment/callback', 'PaymentController@handleGatewayCallback');

    Route::get('/bill/autosave/daily', 'AutosaveController@daily')->name("daily");
    Route::get('/bill/targersavings/daily', 'AutosaveController@daily_target')->name("daily_target");

    Route::group(['middleware' => ['auth']], function () {
        
    Route::get('/home', 'UserController@showDashboard')->name('showDashboard');
    Route::get('/dashboard', 'UserController@showDashboard')->name('showDashboard');
    Route::post('/savings/initial', 'UserController@doFirstPayment')->name('doFirstPayment');


    Route::group(['prefix'=>'profile'],function (){
            Route::get('/', 'UserController@showProfile')->name('showProfile');
            Route::post('edit/pic', 'UserController@doUploadPic')->name("doUploadPic");
            Route::post('edit/password', 'UserController@doChangePassword')->name("doChangePassword");
            Route::post('bank/update', 'UserController@doAddBank')->name("doAddBank");
            Route::post('edit', 'UserController@doEditProfile')->name("doEditProfile");
        });


    Route::group(['prefix'=>'instant-savings'],function (){
        Route::get('view', 'InstantController@showInstantSavings')->name("showInstantSavings");
    });


    Route::group(['prefix'=>'fixed-lock'],function (){
        Route::get('view', 'FixedController@showFixedLock')->name("showFixedLock");
        Route::post('credit', 'FixedController@creditFixed')->name("creditFixed");
    });


  Route::group(['prefix'=>'kids-express'],function (){
        Route::get('create', 'KidsExpressController@showCreateExpress')->name("showCreateExpress");
        Route::get('view', 'KidsExpressController@showViewKidsExpress')->name("showViewKidsExpress")->middleware('kidsexpressexist');
        Route::get('/', 'KidsExpressController@showViewKidsExpress')->middleware('kidsexpressexist');
        Route::post('credit', 'KidsExpressController@creditKidsExpress')->name("creditKidsExpress");
        Route::post('create', 'KidsExpressController@DoAddKidsExpress')->name("DoAddKidsExpress");
    });


    Route::get('/autosave', 'AutosaveController@loadAutosave')->name("loadAutosave");

    Route::post('/credit', 'PaymentController@credit')->name("credit");
        
    Route::get('/faq', 'HomeController@showFaq')->name('showFaq');
    Route::get('/transactions/all', 'TransactionController@showTransactions')->name("showTransactions");

    Route::get('/withdrawal', 'WithdrawalController@showWithdrawal')->name("showWithdrawal");
    Route::post('/withdrawal/process', 'WithdrawalController@processWithdrawal')->name("processWithdrawal");
    Route::get('/turn/off', 'WithdrawalController@turnotpoff')->name("turnotpoff");
    Route::get('/turn/off/final/{otp}', 'WithdrawalController@turnofffinal')->name("turnofffinal");

    Route::get('/deposit', 'DepositController@showDeposit')->name("showDeposit");

    Route::post('/set/autosave', 'AutosaveController@doAutoSave')->name("doAutoSave");
    Route::get('/off/autosave', 'AutosaveController@doAutoSaveOff')->name("doAutoSaveOff");

    Route::get('/user/fixedlock', 'FixedController@showFixedLock')->name("showFixedLock");



    /**
        Savings goal routes starts from here
     **/
        Route::group(["middleware"=>['firstsaving']],function (){

            Route::group(["middleware"=>['goal']],function (){
                Route::post('/savings/goals/credit', 'TargetSavingsController@creditTarget')->name("creditTarget");
                Route::get('/savings/goals', 'TargetSavingsController@showSavingsGoals')->name("showSavingsGoals");
            });

            Route::get('/savings/goals/create', 'TargetSavingsController@createTarget')->name("createTarget");
            Route::post('/savings/goals/create', 'TargetSavingsController@DoaddTarget')->name("DoaddTarget");
        });


    });

