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


Route::get('/home', function(){
	return redirect()->route('home');
});

Route::get('/',['as'=>'home','uses'=>'ArtifactController@index']);

Route::get('test-email','MailController@test_email');

//ALL USER WITHOUT REGISTRATION
Route::prefix('course')->group(function () {
	Route::get('{id}',['as'=>'course','uses'=>'CourseController@detail']);
	Route::post('{id}', ['as'=>'course_review_post','uses'=>'CourseController@course_review_post']);
	Route::get('/',['as'=>'courses','uses'=>'CourseController@index']);
});


Route::prefix('topik')->group(function () {
	Route::get('{id}',['as'=>'topik','uses'=>'TopikController@detail']);
	Route::post('{id}', ['as'=>'topik_komentar_post','uses'=>'TopikController@topik_komentar_post']);
});


Auth::routes();
//NEED REGISTRATION
Route::group(['middleware'=>'auth'],function(){
	// Middleware for User Profile
	Route::prefix('user')->group(function () {
		Route::get('profil', 'UserController@index')->name('user-profil');
		Route::post('edit', 'UserController@edit')->name('user-update');
		Route::get('change_password', 'UserController@change_password')->name('change-password');
		Route::post('change_password/submit', 'UserController@change_password_submit')->name('change-password-submit');

	});



	// TUTOR
	Route::prefix('tutor')->group(function () {

			// COURSE
			Route::prefix('course')->group(function () {
				Route::get('', 'CourseController@get_course')->name('course-index');

				Route::get('create', 'CourseController@create')->name('course-create');

				Route::get('update/{id}', 'CourseController@update')->name('course-update');

				Route::post('submit', 'CourseController@submit')->name('course-submit');

				Route::get('delete/{id}', 'CourseController@delete')->name('course-delete');

				Route::get('detail/{id}', 'CourseController@get_course_detail')->name('course-detail');
			});

			// TOPIK
			Route::prefix('topik')->group(function () {
				Route::get('crate/{id}', 'TopikController@create')->name('topik-create');

				Route::get('update/{id}', 'TopikController@update')->name('topik-update');

				Route::post('submit', 'TopikController@submit')->name('topik-submit');

				Route::get('delete/{id}', 'TopikController@delete')->name('topik-delete');

				Route::get('detail/{id}', 'TopikController@get_topik_detail')->name('topik-detail');
			});


			// Pertanyaan Topik
		Route::prefix('pertanyaan-topik')->group(function () {
				Route::get('create/{id}', 'PertanyaanTopikController@create')->name('pertanyaan-topik-create');

				Route::get('update/{id}', 'PertanyaanTopikController@update')->name('pertanyaan-topik-update');

				Route::post('submit', 'PertanyaanTopikController@submit')->name('pertanyaan-topik-submit');

				Route::get('delete/{id}', 'PertanyaanTopikController@delete')->name('pertanyaan-topik-delete');
			});

			//tutor history pembelian_detail
			Route::get('history-pembelian-course', ['as'=>'history_pembelian_course','uses'=>'TutorController@history_pembelian_course']);
			//update profle
			Route::post('{id}/update', 'TutorController@update')->name('tutor-update');


	});

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

	});


	// Pembelian Course
	Route::resource('course-order', 'CourseOrderController');

	Route::get('/buy/{course_id}',['as'=>'buy-course','uses'=>'CourseOrderController@addToCart']);
	Route::post('/remove-from-cart',['as'=>'remove-from-cart','uses'=>'CourseOrderController@removeFromCart']);
	Route::get('/cart',['as'=>'cart','uses'=>'CourseOrderController@showCart']);
	Route::post('/checkout',['as'=>'checkout','uses'=>'CourseOrderController@checkout']);

	// Upload bukti pembayaran
	Route::post('/store-payment-proof',['as'=>'store-payment-proof','uses'=>'CourseOrderController@storePaymentProof']);
	Route::post('/payment-proof',['as'=>'payment-proof','uses'=>'CourseOrderController@sendPaymentProof']);

	//Kelas Saya
	Route::get('/kelas-saya', ['as'=>'kelas_saya','uses'=>'UserController@kelas_saya']);




		// notifikasi
		Route::get('/notifications',['as'=>'notifications','uses'=>'UserController@getAllNotifications']);
		Route::post('/visit-and-delete-notification',['as'=>'visit-and-delete-notification','uses'=>'UserController@visitAndDeleteNotification']);


	});

Route::get('/test',['as'=>'test','uses'=>'CourseOrderController@test']);

Route::resource('tutor', 'TutorController');
