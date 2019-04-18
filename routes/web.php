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

// ALL USER WITHOUT AUTH

Route::get('/',['as'=>'home','uses'=>'ArtifactController@index']);

Route::get('/faq',['as'=>'faq','uses'=>'ArtifactController@faq']);

Route::get('/home',['as'=>'home','uses'=>'ArtifactController@index']);

Route::get('test-email','MailController@test_email');

//Daftar kelas
Route::get('/daftar-pengajar', ['as'=>'daftar_pengajar','uses'=>'UserController@daftar_pengajar']);

Auth::routes();

Route::get('/auth/redirect/{social_login}', 'Auth\SocialAuthController@redirectToProvider')->name('social-login');
Route::get('auth/{social_login}/callback', 'Auth\SocialAuthController@handleProviderCallback');

// Course
Route::prefix('course')->group(function () {
	Route::get('{id}', function ($id) {
		return redirect()->route('course', $id);
	});
	Route::get('/c/{id}',['as'=>'course','uses'=>'CourseController@detailVar2']);
	Route::get('/v1/{id}',['as'=>'course-var1','uses'=>'CourseController@detailVar1']);
	Route::get('/v2/{id}',['as'=>'course-var2','uses'=>'CourseController@detailVar2']);
	Route::post('/review/submit/', ['as'=>'course_review_submit','uses'=>'CourseController@course_review_post']);
	Route::get('/',['as'=>'courses','uses'=>'CourseController@index']);
	Route::get('/category/{id_category}',['as'=>'courses-category','uses'=>'CourseController@category']);
});


// NEED AUTH
Route::group(['middleware'=>'auth'], function() {
	// USER
	Route::prefix('user')->group(function () {
		Route::get('profil', 'UserController@index')->name('user-profil');
		Route::post('edit', 'UserController@edit')->name('user-update');
		Route::get('change_password', 'UserController@change_password')->name('change-password');
		Route::post('change_password/submit', 'UserController@change_password_submit')->name('change-password-submit');

	});

	// TUTOR
	Route::prefix('tutor')->group(function() {

		// Update profle
		Route::get('/', 'TutorController@show')->name('show-tutor');
		Route::get('edit', 'TutorController@edit')->name('edit-tutor');
		Route::post('update', 'TutorController@update')->name('tutor-update');

		// dashboard
		Route::get('/dashboard', 'TutorController@showDashboard')->name('tutor-dashboard');

		// TUTOR COURSE
		Route::prefix('course')->group(function () {
			Route::get('/', 'CourseController@get_course')->name('course-index');

			Route::get('create', 'CourseController@create')->name('course-create');

			Route::get('update/{id}', 'CourseController@update')->name('course-update');

			Route::post('submit', 'CourseController@submit')->name('course-submit');

			Route::get('delete/{id}', 'CourseController@delete')->name('course-delete');

			Route::get('detail/{id}', 'CourseController@get_course_detail')->name('course-detail');

			Route::get('publish/{id}', 'CourseController@publishCourse')->name('publish-course');

			Route::get('/{courseID}/tutor-course', 'CourseController@addTutor')->name('add-tutor-course');

			Route::get('/{courseID}/tutor-course/{tutorID}/edit', 'CourseController@editTutor')->name('edit-tutor-course');

			Route::get('/{courseID}/tutor-course/{tutorID}/delete', 'CourseController@deleteTutor')->name('delete-tutor-course');

			Route::post('tutor-course-submit', 'CourseController@storeTutor')->name('tutor-course-submit');

			Route::get('/{courseId}/sales', 'TutorController@showCourseSales')->name('sales-course');



		});

		// TUTOR TOPIK
		Route::prefix('topik')->group(function () {
			Route::get('create/{idCourse}', 'TopikController@create')->name('topik-create');

			Route::get('update/{id}', 'TopikController@update')->name('topik-update');

			Route::post('submit', 'TopikController@submit')->name('topik-submit');

			Route::get('delete/{id}', 'TopikController@delete')->name('topik-delete');

			Route::get('detail/{id}', 'TopikController@get_topik_detail')->name('topik-detail');
		});


		// TUTOR Pertanyaan Topik
		Route::prefix('pertanyaan-topik')->group(function () {
			Route::get('create/{id}', 'PertanyaanTopikController@create')->name('pertanyaan-topik-create');

			Route::get('update/{id}', 'PertanyaanTopikController@update')->name('pertanyaan-topik-update');

			Route::post('submit', 'PertanyaanTopikController@submit')->name('pertanyaan-topik-submit');

			Route::get('delete/{id}', 'PertanyaanTopikController@delete')->name('pertanyaan-topik-delete');
		});

		Route::prefix('saldo-transaction')->group(function () {

			Route::get('/show', 'TutorController@showTutorSaldoTransaction')->name('show-transaction');
			Route::post('/create', 'TutorController@createTutorSaldoTransaction')->name('create-transaction');

		});


	});

	// ADMIN
	Route::prefix('admin')->group(function () {
		Route::prefix('approve-payment')->group(function () {

			//approve admin
			Route::get('{id}', ['as'=>'approve_payment_detail','uses'=>'AdminController@approve_payment_detail']);
			Route::post('{id}', ['as'=>'approve_payment_detail_post','uses'=>'AdminController@approve_payment_detail_post']);
			Route::get('', ['as'=>'approve_payment','uses'=>'AdminController@approve_payment']);
		});
		// Menambahkan tutor baru
		Route::get('create-tutor',['as'=>'create-tutor','uses'=>'AdminController@createTutor']);
		Route::post('store-tutor',['as'=>'store-tutor','uses'=>'AdminController@storeNewTutor']);

		// setujui pembelian kelas dengan sharing fb
		Route::get('approve-purchase-fb',['as'=>'approve-purchase-fb','uses'=>'AdminController@approvePaymentWithSharing']);

		Route::get('all-sales',['as'=>'sales','uses'=>'AdminController@getAllSales']);


		Route::prefix('tutor-saldo-transaction')->group(function () {

			Route::get('', 'AdminController@showTutorSaldoTransaction')->name('show-tutor-saldo-transaction');
			Route::get('{id}', 'AdminController@showTutorSaldoTransactionDetail')->name('show-tutor-saldo-transaction-detail');
			Route::post('{id}', 'AdminController@updateTutorSaldoTransactionDetail')->name('show-tutor-saldo-transaction-update');
		});



	});

	// MURID

	// Pembelian Course

	// Route::get('/buy/{course_id}/free',['as'=>'buy-free-course','uses'=>'CourseOrderController@buyFreeCourse']);

	Route::get('/buy/success/',['as'=>'purchase-success','uses'=>'CourseOrderController@purchaseSuccess']);

	Route::get('/buy/{course_id}',['as'=>'buy-course','uses'=>'CourseOrderController@buyCourse']);

	Route::post('/remove-from-cart',['as'=>'remove-from-cart','uses'=>'CourseOrderController@removeFromCart']);

	Route::get('/cart',['as'=>'cart','uses'=>'CourseOrderController@showCart']);

	Route::get('/course-order',['as'=>'course-order','uses'=>'CourseOrderController@showAllCourseOrder']);

	Route::get('/review-order/{order_no}',['as'=>'review-order','uses'=>'CourseOrderController@show']);

	Route::post('/checkout',['as'=>'checkout','uses'=>'CourseOrderController@checkout']);

	Route::post('/checkout-success',['as'=>'checkout-success','uses'=>'CourseOrderController@checkoutSuccess']);

	// Upload bukti pembayaran
	Route::post('/store-payment-proof',['as'=>'store-payment-proof','uses'=>'CourseOrderController@storePaymentProof']);
	Route::get('/course-order/{order_no}/payment-proof/',['as'=>'payment-proof','uses'=>'CourseOrderController@sendPaymentProof']);

	// MURID Kelas Saya
	Route::get('/kelas-saya', ['as'=>'kelas_saya','uses'=>'UserController@kelas_saya']);


	// Referral Murid
	Route::get('/referral', ['as'=>'referral','uses'=>'UserController@referral']);




	// MURID TOPIK
	Route::prefix('topik')->group(function () {
		Route::get('{id}',['as'=>'topik','uses'=>'TopikController@detail']);
		Route::post('{id}', ['as'=>'topik_komentar_post','uses'=>'TopikController@topik_komentar_post']);

		Route::get('subscribe-course/{id}', 'CourseController@subscribe_course')->name('subscribe-course');
	});


	// NOTIFIKASI
	Route::get('/notifications',['as'=>'notifications','uses'=>'UserController@getAllNotifications']);
	Route::post('/visit-and-delete-notification',['as'=>'visit-and-delete-notification','uses'=>'UserController@visitAndDeleteNotification']);

});
