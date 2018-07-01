<?php

// start coding route for auth
Auth::routes();
Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Admin\LoginController@login')->name('admin_login');
    Route::post('/logout', 'Admin\LoginController@logout')->name('admin_logout');

    Route::get('/users', 'Admin\RegisterController@index')->name('admins');
    Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin_register');
    Route::post('/register', 'Admin\RegisterController@store')->name('admin-store');
    Route::get('/user/view/{id}', 'Admin\RegisterController@view')->name('admin-view');
    Route::get('/user/edit/{id}', 'Admin\RegisterController@edit')->name('admin-edit');
    Route::post('/user/update/{id}', 'Admin\RegisterController@update')->name('admin-update');
    Route::get('/user/destroy/{id}', 'Admin\RegisterController@destroy')->name('admin-destroy');
//end auth

// route for admin pannel
    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    // start coding route for car category
    Route::get('/category', 'CategoryController@index')->name('category');
    Route::post('/category/store', 'CategoryController@store')->name('post-category');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('edit-category');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('update-category');
    Route::get('/category/destroy/{id}', 'CategoryController@destroy')->name('destroy-category');

    // start coding route for car category
    Route::get('/brand', 'BrandController@index')->name('brand');
    Route::post('/brand/store', 'BrandController@store')->name('post-brand');
    Route::get('/brand/edit/{id}', 'BrandController@edit')->name('edit-brand');
    Route::post('/brand/update/{id}', 'BrandController@update')->name('update-brand');
    Route::get('/brand/destroy/{id}', 'BrandController@destroy')->name('destroy-brand');

    // start coding route for car category
    Route::get('/model', 'ModelController@index')->name('model');
    Route::post('/model/store', 'ModelController@store')->name('post-model');
    Route::get('/model/edit/{id}', 'ModelController@edit')->name('edit-model');
    Route::post('/model/update/{id}', 'ModelController@update')->name('update-model');
    Route::get('/model/destroy/{id}', 'ModelController@destroy')->name('destroy-model');
    // start coding route for car category
    Route::get('/color', 'ColorController@index')->name('color');
    Route::post('/color/store', 'ColorController@store')->name('post-color');
    Route::get('/color/edit/{id}', 'ColorController@edit')->name('edit-color');
    Route::post('/color/update/{id}', 'ColorController@update')->name('update-color');
    Route::get('/color/destroy/{id}', 'ColorController@destroy')->name('destroy-color');
    // start coding route for car category
    Route::get('/capacity', 'CapacityController@index')->name('capacity');
    Route::post('/capacity/store', 'CapacityController@store')->name('post-capacity');
    Route::get('/capacity/edit/{id}', 'CapacityController@edit')->name('edit-capacity');
    Route::post('/capacity/update/{id}', 'CapacityController@update')->name('update-capacity');
    Route::get('/capacity/destroy/{id}', 'CapacityController@destroy')->name('destroy-capacity');
    // start coding route for car category
    Route::get('/fual', 'FualController@index')->name('fual');
    Route::post('/fual/store', 'FualController@store')->name('post-fual');
    Route::get('/fual/edit/{id}', 'FualController@edit')->name('edit-fual');
    Route::post('/fual/update/{id}', 'FualController@update')->name('update-fual');
    Route::get('/fual/destroy/{id}', 'FualController@destroy')->name('destroy-fual');
    // start coding route for car category
    Route::get('/city', 'CityController@index')->name('city');
    Route::post('/city/store', 'CityController@store')->name('post-city');
    Route::get('/city/edit/{id}', 'CityController@edit')->name('edit-city');
    Route::post('/city/update/{id}', 'CityController@update')->name('update-city');
    Route::get('/city/destroy/{id}', 'CityController@destroy')->name('destroy-city');

    // start route for add new branch
    Route::get('/branch', 'BranchController@index')->name('branch');
    Route::get('/branch/create', 'BranchController@Create')->name('branch-create');
    Route::post('/branch/add', 'BranchController@store')->name('branch-store');
    Route::get('/branch/view/{id}', 'BranchController@view')->name('branch-view');
    Route::get('/branch/edit/{id}', 'BranchController@edit')->name('branch-edit');
    Route::post('/branch/update/{id}', 'BranchController@update')->name('branch-update');
    Route::get('/branch/destroy/{id}', 'BranchController@destroy')->name('branch-destroy');

    // start route for add Car
    Route::get('/cars', 'CarController@index')->name('cars');
    Route::get('/car/create', 'CarController@Create')->name('car-create');
    Route::post('/car/add', 'CarController@store')->name('car-store');
    Route::get('/car/view/{id}', 'CarController@show')->name('car-view');
    Route::get('/car/edit/{id}', 'CarController@edit')->name('car-edit');
    Route::post('/car/update/{id}', 'CarController@update')->name('car-update');
    Route::get('/car/destroy/{id}', 'CarController@destroy')->name('car-destroy');

    // route for Car feature
    Route::get('/features', 'FeatureController@index')->name('features');
    Route::get('/feature/add', 'FeatureController@create')->name('feature-add');
    Route::post('/feature/add', 'FeatureController@store')->name('feature-store');
    Route::get('/feature/view/{id}', 'FeatureController@show')->name('feature-show');
    Route::get('/feature/edit/{id}', 'FeatureController@edit')->name('feature-edit');
    Route::post('/feature/update/{id}', 'FeatureController@update')->name('feature-update');
    Route::get('/feature/destroy/{id}', 'FeatureController@destroy')->name('feature-destroy');
    /*=======start coding for banner==========*/
    Route::get('/banner', 'BannerController@index')->name('banner');
    Route::post('/banner/store', 'BannerController@store')->name('post-banner');
    Route::get('/banner/view/{id}', 'BannerController@show')->name('show-banner');
    Route::get('/banner/edit/{id}', 'BannerController@edit')->name('edit-banner');
    Route::post('/banner/update/{id}', 'BannerController@update')->name('update-banner');
    Route::get('/banner/destroy/{id}', 'BannerController@destroy')->name('destroy-banner');

/*=======start coding for contact==========*/
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact/store', 'ContactController@store')->name('store-contact');
    Route::get('/contact/view/{id}', 'ContactController@show')->name('show-contact');
    Route::get('/contact/edit/{id}', 'ContactController@edit')->name('edit-contact');
    Route::post('/contact/update/{id}', 'ContactController@update')->name('update-contact');

/*=======start coding for contact==========*/
    Route::get('/social', 'SocialController@index')->name('social');
    Route::post('/social/store', 'SocialController@store')->name('store-social');
    Route::get('/social/view/{id}', 'SocialController@show')->name('show-social');
    Route::get('/social/edit/{id}', 'SocialController@edit')->name('edit-social');
    Route::post('/social/update/{id}', 'SocialController@update')->name('update-social');

    /*=======start coding for copyright==========*/
    Route::get('/copyright', 'CopyRightController@index')->name('copyright');
    Route::post('/copyright/store', 'CopyRightController@store')->name('store-copyright');
    Route::post('/copyright/update/', 'CopyRightController@update')->name('update-copyright');

    /*=======start coding for Privacy==========*/
    Route::get('/privacy', 'PrivacyController@index')->name('privacy');
    Route::post('/privacy/store', 'PrivacyController@store')->name('store-privacy');
    Route::post('/privacy/update/', 'PrivacyController@update')->name('update-privacy');
    /*=======start coding for choose==========*/
    Route::get('/choose', 'ChooseController@index')->name('choose');
    Route::post('/choose/store', 'ChooseController@store')->name('store-choose');
    Route::post('/choose/update/', 'ChooseController@update')->name('update-choose');
    /*=======start coding for video==========*/
    Route::get('/videos', 'VideoController@index')->name('videos');
    Route::post('/video/store', 'VideoController@store')->name('store-video');
    Route::post('/video/update/', 'VideoController@update')->name('update-video');

    /*=======start coding for Privacy==========*/
    Route::get('/term', 'TermController@index')->name('term');
    Route::post('/term/store', 'TermController@store')->name('store-term');
    Route::post('/term/update/', 'TermController@update')->name('update-term');

/*=======start coding for contact==========*/
    Route::get('/about', 'AboutController@index')->name('about');
    Route::post('/about/store', 'AboutController@store')->name('store-about');
    Route::get('/about/view/{id}', 'AboutController@show')->name('show-about');
    Route::get('/about/edit/{id}', 'AboutController@edit')->name('edit-about');
    Route::post('/about/update/{id}', 'AboutController@update')->name('update-about');
// route for service
    Route::get('/services', 'ServiceController@index')->name('services');
    Route::get('/service/add', 'ServiceController@create')->name('service-add');
    Route::post('/service/add', 'ServiceController@store')->name('service-store');
    Route::get('/service/view/{id}', 'ServiceController@show')->name('service-show');
    Route::get('/service/edit/{id}', 'ServiceController@edit')->name('service-edit');
    Route::post('/service/update/{id}', 'ServiceController@update')->name('service-update');
    Route::get('/service/destroy/{id}', 'ServiceController@destroy')->name('service-destroy');
// route for service
    Route::get('/rating', 'RatingController@index')->name('rating');
    Route::get('/rating/add', 'RatingController@create')->name('rating-add');
    Route::post('/rating/add', 'RatingController@store')->name('rating-store');
    Route::get('/rating/edit/{id}', 'RatingController@edit')->name('rating-edit');
    Route::post('/rating/update/{id}', 'RatingController@update')->name('rating-update');
    Route::get('/rating/destroy/{id}', 'RatingController@destroy')->name('rating-destroy');

// route for facility
    Route::get('/facilities', 'FacilityController@index')->name('facilities');
    Route::get('/facility/add', 'FacilityController@create')->name('facility-add');
    Route::post('/facility/add', 'FacilityController@store')->name('facility-store');
    Route::get('/facility/view/{id}', 'FacilityController@show')->name('facility-show');
    Route::get('/facility/edit/{id}', 'FacilityController@edit')->name('facility-edit');
    Route::post('/facility/update/{id}', 'FacilityController@update')->name('facility-update');
    Route::get('/facility/destroy/{id}', 'FacilityController@destroy')->name('facility-destroy');

// route for Review
    Route::get('/reviews', 'ReviewController@index')->name('reviews');
    Route::get('/review/add', 'ReviewController@create')->name('review-add');
    Route::post('/review/add', 'ReviewController@store')->name('review-store');
    Route::get('/review/view/{id}', 'ReviewController@show')->name('review-show');
    Route::get('/review/edit/{id}', 'ReviewController@edit')->name('review-edit');
    Route::post('/review/update/{id}', 'ReviewController@update')->name('review-update');
    Route::get('/review/destroy/{id}', 'ReviewController@destroy')->name('review-destroy');

//start coding for user contact
    Route::get('/User-contact', 'Web_contactController@index')->name('user_contact');
    Route::get('/User-contact/{id}', 'Web_contactController@show')->name('user_contact_show');
    Route::get('/User-contact/edit/{id}', 'Web_contactController@edit')->name('user_contact_edit');
    Route::post('/User-contact/update/{id}', 'Web_contactController@update')->name('user_contact_update');
    Route::get('/User-contact/delete/{id}', 'Web_contactController@destroy')->name('user_contact_destroy');

    /*=======start coding for logo==========*/
    Route::get('/logo_and_header_title', 'LogoTitleController@index')->name('logoandtitle');
    Route::post('/logo_and_header_title/store', 'LogoTitleController@store')->name('post-logoandtitle');
    Route::get('/logo_and_header_title/view/{id}', 'LogoTitleController@show')->name('show-logoandtitle');
    Route::get('/logo_and_header_title/edit/{id}', 'LogoTitleController@edit')->name('edit-logoandtitle');
    Route::post('/logo_and_header_title/update/{id}', 'LogoTitleController@update')->name('update-logoandtitle');
    Route::get('/logo_and_header_title/destroy/{id}', 'LogoTitleController@destroy')->name('destroy-logoandtitle');

/*=======start coding for contact==========*/
    Route::get('/reservation', 'ReservationController@index')->name('reservation');
    Route::get('/reservation/pending/{id}', 'ReservationController@isPending')->name('isPending');
    Route::get('/reservation/paid/{id}', 'ReservationController@isPaid')->name('ispaid');
    Route::get('/reservation/complate/{id}', 'ReservationController@isComplate')->name('iscomplate');
    Route::get('/reservation/view/{id}', 'ReservationController@show')->name('reservation-view');
    Route::get('/reservation/destroy/{id}', 'ReservationController@destroy')->name('reservation-destroy');

    // route for customer
    Route::get('/customers', 'CustomerController@index')->name('customers');
    Route::get('/customer/view/{id}', 'CustomerController@show')->name('customer-view');
    Route::get('/customer/destroy/{id}', 'CustomerController@destroy')->name('customer-destroy');
}); //end admin prefix

// start route for website

Route::get('/', 'HomeController@index')->name('home');
Route::any('/search', 'HomeController@search')->name('search');
// for service
Route::get('/services', 'Web_servicesController@index')->name('web_service');
Route::get('/service-detials/{id}', 'Web_servicesController@show')->name('web_service_show');
// for Facilities
Route::get('/facilities', 'Web_facilityController@index')->name('web_facility');
Route::get('/facility-detials/{id}', 'Web_facilityController@show')->name('web_facility_show');
// coding route common controller
Route::get('/choose-detials', 'CommonController@Choose')->name('web_choose');
// coding route about
Route::get('/about-us', 'CommonController@About')->name('web_about');
// coding route Privacy
Route::get('/privacy', 'CommonController@Privacy')->name('web_privacy');
// coding route term
Route::get('/term', 'CommonController@Term')->name('web_term');
// coding route for contact
Route::get('/contact', 'Web_contactController@create')->name('web_contact');
Route::post('/contact/store', 'Web_contactController@store')->name('user_contact_store');

// start coding for car
Route::get('/cars', 'Web_carController@index')->name('web_car');
Route::get('/car-details/{id}', 'Web_carController@show')->name('web_car_details');

// for email varifaction route
Route::get('/sendEmailDone/{email}/{verifyToken}', 'Auth\RegisterController@sendEmailDone')->name('sendEmailDone');
//coding for profile route
Route::get('/profile/{id}', 'Web_profileController@index')->name('web_profile');
Route::get('/profile/edit/{id}', 'Web_profileController@edit')->name('web_profile_edit');
Route::post('/profile/update/{id}', 'Web_profileController@update')->name('web_profile_update');

Route::post('/profile/upload/{id}', 'Web_profileController@store')->name('upload_user_photo');
Route::post('/profile/photo/update/{id}', 'Web_profileController@photoUpdate')->name('update_photo');

Route::get('/profile/password/change/{id}', 'Web_profileController@ChangePass')->name('web_pass');

Route::post('profile/password/old', 'Web_profileController@OldPass')->name('old_pass');

Route::group(['prefix' => 'profile/password/change/{id}'], function () {
    Route::get('new_password/', 'Web_profileController@NewPass')->name('new_pass');
    Route::post('new_password/update', 'Web_profileController@UpdatePass')->name('UpdatePass');
});

Route::get('/reservations', 'Web_reservationController@index')->name('web_reservation_all');
Route::get('/reservation/{id}', 'Web_reservationController@create')->name('web_reservation');
Route::post('/reservation/store', 'Web_reservationController@store')->name('web_store');
