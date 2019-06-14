<?php
Route::get('test',function(){
 return view('mtest');
});
//Website
// Route::post('Register', 'SiteController@register');
// Route::get('Register/{key}', 'SiteController@updateRegister');
// Route::get('VerifyCode', 'SiteController@verifyCode');
// Route::post('CreateUserAccount', 'SiteController@createUserAccount');
// Route::post('CheckLogin', 'SiteController@checkLogin');

// Route::get('JobByCategory/{slug}', 'SiteController@jobByCategory');
// Route::get('JobDetails/{product_id}', 'SiteController@productDetails');
// Route::get('Search/Read', 'SearchController@search');
// Route::get('Job', 'JobController@index');
// Route::post('Job/Read', 'JobController@read');
// Route::get('Customer/Project', 'CustomerController@index');
// Route::post('Customer/Read', 'CustomerController@read');

//matul login
Route::get('/user_registration', 'UserController@user_registration');
Route::post('/all_users', 'UserController@all_users');
Route::post('first_login', 'SiteController@checkLogin');

Route::get('getstarvalue','ReviewController@get_review_num');
Route::get('checkrole', 'UserController@checkrole');
Route::get('create_user_custom_ac', 'UserController@create_user_custom_ac');
Route::get('/custom_login', 'UserController@custom_login');
Route::get('changepin','UserController@changepin');
Route::post( 'changepin','UserController@changepinsave');
Route::get( 'resetpin', 'UserController@resetpin');
Route::get( 'resetconfirm/{data}', 'UserController@resetconfirm');
Route::post( 'resetpin', 'UserController@resetpinsave');


//frelancer and pro
Route::group(['middleware' => 'admin_guard'], function () {
    Route::get('freelancer-dash', 'DashController@index');
    Route::get('pro-dash', 'DashController@index1');
    Route::get('freelancer_edit_profile/{id}', 'FreelancerController@freelancer_edit_profile');
    Route::post('save_profile_image', 'UserController@save_profile_image');
    Route::post('Post_Work', 'JobController@saveJob');
    Route::post('post_a_proposal', 'ProjectController@post_a_proposal');
    Route::post('post_a_job_proposal', 'ProjectController@post_a_job_proposal');


    Route::get('personal_order/{id}', 'ProjectController@personal_order');
    Route::get('pro_personal_order/{id}', 'JobController@personal_order');
    Route::get('single_project_details/{id}', 'ProjectController@single_project_details');
    Route::get('project_delivery/{proposal}', 'ProjectController@delivery');
    Route::post('project_delivery/{proposal}', 'ProjectController@delivery_save');
    Route::get('project_cancel_request/{proposal}', 'ProjectController@project_cancel');
    Route::post('project_extend_time_request/{proposal}', 'ProjectController@extend_time');
    Route::post('add_commnet', 'ProjectController@add_commnet');
    Route::post('add_personal_note', 'UserController@add_personal_note');

    Route::get('Freelancer/FindProject', 'ProjectController@index');
    Route::post('Freelancer/Read', 'ProjectController@indexAjax');
    Route::get('Freelancer/CreateProfile', 'FreelancerController@createProfile');
    Route::post('Freelancer/editProfile', 'FreelancerController@editProfile');

    Route::get('pro/Job/Find', 'ProController@findjob');

    Route::post('Pro/Read', 'ProjectController@indexAjax');
    Route::get('Pro/CreateProfile', 'ProController@createProfile');
    Route::post('Pro/AddProfile', 'ProController@addProfile');
    Route::get('pro_personal_cv/{id}', 'ProController@pro_personal_cv');
    Route::post( 'save_cv_cover_image', 'ProController@save_cv_cover_image');
    Route::get( 'pro_cv/{id}', 'ProController@pro_cv');
    Route::get( 'edit_cv/{id}', 'ProController@edit_cv');
    Route::post( 'Pro/create_cv', 'ProController@pro_create_cv');
    Route::post( 'Pro/edit_cv/{id}', 'ProController@edit_cv_save');
    Route::get('export_pdt/{id}', 'ProController@export_pdt');

    Route::get('Worker_Details/{id}', 'FreelancerController@Worker_Details');
    Route::get('personal_review/{id}', 'FreelancerController@personal_review');
    Route::get('Job/ProjectCreate', 'ProjectController@projectCreate');
    Route::get('Job/CreateCompany', 'JobController@createCompany');
    Route::get('Job/Create', 'JobController@createJob');
});
Route::group(['prefix' => 'Gig','middleware'=> 'admin_guard'], function () {
    Route::get('mygigs', 'GigController@index');
    Route::get('create', 'GigController@create');
    Route::post('create', 'Gigcontroller@store');
});


//end of freelancer and pro
//customer 

Route::group(['middleware' => 'admin_guard'], function () {
    Route::get('customer-dash', 'DashController@index2');
    Route::get('given_order/{id}', 'CustomerController@given_order');
    Route::get('request_on_job/{id}', 'CustomerController@request_on_job');
    Route::post('proposal_accept', 'CustomerController@proposal_accept');
    Route::get('response_to_notification/{id}', 'CustomerController@response_to_notification');

    Route::get('Customer/FindFreelancer', 'FreelancerController@getFreelancer');
    Route::get('Customer/FindPro', 'ProController@getPro');
    Route::post('Customer/ReadFreelancer', 'FreelancerController@getFreelancerAjax');
    Route::post('customer/editProfile', 'CustomerController@editProfile');
    Route::post('Customer/ReadPro', 'ProController@getProAjax');
    Route::get('customer_profile_public_view/{id}', 'CustomerController@public_profile');
    Route::get('customer_edit_profile/{id}', 'CustomerController@customer_edit_profile');
    Route::get('customer_personal_review/{id}', 'CustomerController@customer_personal_review');
});

//end of customer

Route::group(['prefix' => 'chores' ], function () {
    Route::get('/create', 'ChoreController@create');
    Route::get('/view', 'ChoreController@index');
    Route::get('/add', 'ChoreController@create');
    Route::post('/store', 'ChoreController@store');
    Route::get('/details/{id}', 'ChoreController@show');
    Route::post('/proposal/{id}', 'ChoreController@proposal'); 
    Route::get('wishlist', 'ChoreController@wishlist');
    Route::get('/admin', 'ChoreController@admin');
    Route::get('/mywishlist', 'ChoreController@mywishlist');
    Route::get('/my_active_task', 'ChoreController@my_active_task')->name('MY Active Task');
    Route::get('/proposal_received', 'ChoreController@proposal_received')->name('Proposal Received');
    Route::get('/my_proposals', 'ChoreController@my_proposals')->name('My Proposals');
    Route::get('/task_i_get_pay', 'ChoreController@task_i_get_pay')->name('Task From where I get pay');
    Route::get('/task_i_pay', 'ChoreController@task_i_pay')->name('Task I pay for');
    Route::get('/proposal_accept/{id}','ChoreController@accept');
    Route::get( '/proposal_denied/{id}','ChoreController@denied');

});
Route::group(['prefix' => 'service'], function () {
    Route::get('add', 'ServicesController@index');
    Route::post('/store', 'ServicesController@store');
    Route::get('/details/{id}', 'ServicesController@show');
    Route::post('/proposal/{id}', 'ServicesController@proposal');
    Route::get( 'sold_service', 'ServicesController@sold_service');
    Route::get('proposal_received', 'ServicesController@proposal_received');
    Route::get('my_service', 'ServicesController@my_service');
    Route::get( 'my_active_service', 'ServicesController@my_active_service');
    // Route::get('purchased_service', 'ServicesController@purchased_service');
    Route::get('/proposal_accept/{id}', 'ServicesController@accept');
    Route::get('/proposal_denied/{id}', 'ServicesController@denied');
});

Route::get('/', 'DashboardController@home')->name('Home');
Route::post('HomeAjaxCategories', 'SiteController@homeAjaxCategories');
Route::get('JobDetails/{id}', 'JobController@JobDetails');
Route::get('JobApply/{id}', 'JobController@jobApply');
Route::post('GetCities', 'FreelancerController@getCities');
Route::get('Login', 'UserController@login')->name('Login');
Route::post('CheckLogin', 'SiteController@checkLogin');
//matul
Route::get('LogOut', 'SiteController@logOut');
Route::get( 'logoutfromadmin', 'SiteController@logoutfromadmin');
//end matul
Route::get('Message', 'MessageController@index');

//Job
//chat of matul
Route::post('comming_soon','UserController@comming_soon');

Route::get( '/chatdashboard', 'ChatmessageController@index')->name('chatdashboard');
Route::get('/privateChat/{chatRoomId}', 'PrivateChatController@rtnChatBox')->name('privateChat');
Route::post('/send/{id}', 'PrivateChatController@store');
Route::post('/geturl', 'PrivateChatController@geturl');
Route::post('/timeformate', 'PrivateChatController@timeformate');
Route::post('/setuserlocalutc', 'PrivateChatController@setuserlocalutc');
Route::get('/getlogedinusertime', 'PrivateChatController@getlogedinusertime')->name('getlogedinusertime');

Route::post('/getOldMessage', 'ChatController@getOldMessage');
Route::post('/chatSpam/{id}', 'ChatController@spam');
Route::post('/chatReport/{id}', 'ChatController@report');
Route::get('/chatsearch', 'ChatSearchController@search')->name('chatsearch');
Route::get('/defaullevelsearch', 'ChatSearchController@defaullevelsearch')->name('defaullevelsearch');
Route::get('/levelsearch', 'ChatSearchController@levelsearch')->name('levelsearch');
Route::get('/unreadsearch', 'ChatSearchController@unreadsearch')->name('unreadsearch');
Route::get('/indeviduallevelsearch', 'ChatSearchController@indeviduallevelsearch')->name('indeviduallevelsearch');

Route::post('/setonline', 'ChatController@setonline');
Route::post('/setoffline', 'ChatController@setoffline');
Route::post('/getallOnlineUser', 'ChatController@getallOnlineUser');
Route::post('/readwrite', 'ChatController@readwrite');

Route::get('/levelset', 'LevelController@index')->name('levelset');
Route::get('/getOldLevel', 'LevelController@getOldLevel');
Route::post('/addcustomlevel', 'LevelController@custom');
Route::get('/leveldel/{id}', 'LevelController@delete')->name('leveldel');
Route::get('/starchat/{id}', 'LevelController@starchat')->name('starchat');
Route::get('/delallchat/{id}', 'LevelController@delallchat');
Route::get('/getmessagepopup', 'messagepopController@index')->name('messagepop');
Route::get('/getmessagepopupcross', 'messagepopController@getmessagepopupcross');

Route::get('/gmtime', 'PrivateChatController@test');

Route::get('/sendemailforunread', 'PrivateChatController@sendemailforunread');
Route::post('/sendmail', 'PrivateChatController@sendmail');


//end of matul

Route::get('Job/CreateResume', 'JobController@createResume');
Route::post('Job/AddCompany', 'JobController@addCompany');
// Route::get('Job/Find', 'JobController@findJob');
Route::post('Job/Read', 'JobController@findJobAjax');
Route::get('Job/Details', 'JobController@JobDetaials');

//Company
Route::get('Company/Details', 'CompanyController@index');

//ScholarShip
Route::get('ScholarShip', 'ScholarShipController@index');
Route::post('ScholarShipReadAjax', 'ScholarShipController@readAjax');
Route::get('ScholarShip/Details/{id}', 'ScholarShipController@scholarShipDetails');
//Courses
Route::get('Courses', 'CoursesController@index');
Route::post('CoursesReadAjax', 'CoursesController@coursesAjax');
Route::get('Courses/Details/{id}', 'CoursesController@coursesDetails');


Route::get('MyJob', 'JobController@myJob');
Route::group([], function () {
    //Common
  
    Route::post('ActiveJobAjax', 'JobController@getActiveJobAjax');
    Route::post('PendingJobAjax', 'JobController@getPendingJobAjax');
    Route::post('CompeteJobAjax', 'JobController@getCompleteJobAjax');
    Route::post('CancelJobAjax', 'JobController@getCancelJobAjax');
    Route::post('RevisonJobAjax', 'JobController@getRivisionJobAjax');
    Route::post('DisputeJobAjax', 'JobController@getDisputeJobAjax');
    //Message
    Route::get('ChatContacts', 'MessageController@chatContacts');
    Route::get('Conversation/{id}', 'MessageController@getMessagesFor');
    Route::post('Conversation/send', 'MessageController@send');
    //ScholarShip
    Route::post('ScholarShip/Apply', 'ScholarShipController@applyScholarship');
    //Customer
   
    Route::post('Customer/SaveProject', 'ProjectController@saveProject');
    //Company
    Route::get('Compay/OverView', 'CompanyController@overView');
    Route::post('Compay/JobHistoryAjax', 'CompanyController@getJobHistoryAjax');
    Route::post('Compay/AppliedJobAjax', 'CompanyController@getAppliedJobAjax');
    Route::post('Compay/InvitationJobAjax', 'CompanyController@getInvitationJobAjax');
    //Job
    Route::post('Job/Publish', 'JobController@saveJob');
    Route::post('Job/Apply', 'JobController@applyJob');
    Route::post('Job/JobSeekerAppliedJobAjax', 'JobController@getJobSeekerAppliedJobAjax');
    Route::post('Job/JobSeekerMatchJobAjax', 'JobController@getJobSeekerMatchJobAjax');
    Route::post('Job/JobSeekerInvitationJobAjax', 'JobController@getJobSeekerInvitationJobAjax');
    //Users
    Route::get('MyProfile', 'UserController@userUpdateView');

});

/*
-------------------------------------------------------
Backend
-------------------------------------------------------
 */

Route::get('/adminLogin/kkccppss/99mm', 'AdminController@login');
Route::post( 'admin/submission/99','AdminController@submission');
Route::post( 'admin/submission/00/confirm','AdminController@submisson_confirm');
Route::post('admin/ipmatch', 'AdminController@ipmatch')->name('ipmatch');
Route::group(['middleware' => 'master_guard'], function () {
    Route::get('/super_admin_dashboard', 'SuperAdminController@index');
    Route::get( 'superadminLogOut', 'AdminController@adminLogOut');
    Route::get( 'Admin/TaskList','SuperAdminController@tasklist');
    Route::get('Admin/SetQuestion','SuperAdminController@SetQuestion');
    Route::post('Add/question','SuperAdminController@add_question');
    Route::get( 'question_search', 'SuperAdminController@question_search');
    Route::get('Admin/Country', 'Admin\CountryController@index');
    Route::post('Admin/GetCountries', 'Admin\CountryController@getCountries');
    Route::post('Admin/SaveCountry', 'Admin\CountryController@saveCountry');
    Route::post('Admin/GetCountry', 'Admin\CountryController@getCountry');
    Route::post('Admin/UpdateCountry', 'Admin\CountryController@updateCountry');
    Route::post('Admin/DeleteCountry', 'Admin\CountryController@deleteCountry');
    Route::get('Admin/Qualification', 'Admin\QualificationController@index');
    Route::post('Admin/GetQualifications', 'Admin\QualificationController@getQualifications');
    Route::post('Admin/SaveQualification', 'Admin\QualificationController@saveQualification');
    Route::post('Admin/GetQualification', 'Admin\QualificationController@getQualification');
    Route::post('Admin/UpdateQualification', 'Admin\QualificationController@updateQualification');
    Route::post('Admin/DeleteQualification', 'Admin\QualificationController@deleteQualification');
    Route::get('Admin/Skills', 'Admin\SkillController@index');
    Route::post('Admin/GetSkills', 'Admin\SkillController@getSkills');
    Route::post('Admin/SaveSkill', 'Admin\SkillController@saveSkill');
    Route::post('Admin/GetSkill', 'Admin\SkillController@getSkill');
    Route::post('Admin/UpdateSkill', 'Admin\SkillController@updateSkill');
    Route::post('Admin/DeleteSkill', 'Admin\SkillController@deleteSkill');
    Route::get('Admin/Category', 'Admin\CategoryController@index');
    Route::post('Admin/GetCategories', 'Admin\CategoryController@getCategories');
    Route::post('Admin/SaveCategory', 'Admin\CategoryController@saveCategory');
    Route::post('Admin/GetCategory', 'Admin\CategoryController@getCategory');
    Route::post('Admin/UpdateCategory', 'Admin\CategoryController@updateCategory');
    Route::post('Admin/DeleteCategory', 'Admin\CategoryController@deleteCategory');

    Route::get( 'message_to_user', 'SuperAdminController@message_to_user');
    Route::post( 'Send/Message','SuperAdminController@send_message');
    Route::get('review_control','SuperAdminController@review_control')->name( 'datatables');
    Route::get('review_data', 'SuperAdminController@get_review_data')->name( 'datatables.data');
    Route::get( 'delete_review','SuperAdminController@delete_review');
    Route::get( 'create_manager','SuperAdminController@create_manager');
    Route::post( 'create_manager','SuperAdminController@save_manager');
    Route::get( 'manager_permission','SuperAdminController@permission');
    Route::get( 'manager_ground','SuperAdminController@manager_ground');
    Route::get('Delete_admin_manager/{id}','SuperAdminController@deleteadmin');
    Route::post('edit_manager/{id}','SuperAdminController@edit_manager');
    Route::get( 'See_activities_manager/{id}','SuperAdminController@see_activities');
    Route::get('Get_see_activities','SuperAdminController@Get_see_activities')->name('get_see_activities');
    Route::get('manage_general_user','SuperAdminController@manage_general_user');
    Route::get('Get_manage_general_user', 'SuperAdminController@get_manage_general_user')->name( 'get_manage_general_user');
    
    Route::post( 'change_permission','SuperAdminController@change_permission');
    Route::get('Setting', 'DashboardController@setting');  
    
    Route::get( 'Category/freelancer_pro','SuperAdminController@freelancer_pro_category');
    Route::get('getCategory_freelancer_pro','SuperAdminController@getfeelancerProdata')->name( 'freelancerProCategory.data');
    Route::post( 'freelancer_pro_category','SuperAdminController@freelancer_pro_category_save');
    Route::get( 'edit_freelancer_pro_category/{id}',function ($id){
        return view('_admin.freelancer_pro_form')->with('id',$id);
    });
    Route::get( 'delete_freelancer_pro_category','SuperAdminController@delelte_freelancer_category');
    Route::post( 'freelancer_pro_category_edit','SuperAdminController@freelancer_pro_category_edit_save');
    Route::get( 'Category/Job','SuperAdminController@job_category');
    Route::get( 'Category/Chore', 'SuperAdminController@chore_category');
    Route::get('getChoreCategory','SuperAdminController@getChoreCategory')->name('choreCategory.data');
    Route::post('chore_category','SuperAdminController@save_chore_category');
    Route::get( 'delete_chore_category','SuperAdminController@delete_chore_category');
    Route::get('edit_chore_category/{id}',function($id){
        return view('_admin.chore_category_form')->with('id',$id);
    });
    Route::post( 'chore_category_edit', 'SuperAdminController@chore_category_edit_save');
    Route::get( 'Category/Video','SuperAdminController@video_category');
});

Route::get('user_active/{id}','AdminController@user_active');
Route::get( 'user_deactive/{id}','AdminController@user_deactive');
Route::get( 'user_suspend/{id}','AdminController@user_suspend');
Route::get( 'delete_general_user','AdminController@user_delete');
Route::get( 'manage_freelancer','AdminController@manage_freelancer');
Route::get( 'get_manage_freelancer_user','AdminController@get_freelancer')->name('get_manage_freelancer_user');
Route::get( 'manage_singe_freelancer/{id}','AdminController@singlefreelancermanage');
Route::get( 'manage_customer','AdminController@manage_customer');
Route::group([], function () {
    //Dashboard
    Route::get('Dashboard', 'DashboardController@home')->name('dashboard');
   
    //Category
   
    //Country
   
    //Qualification
   
    //Skill
   

   

});


//admin

Route::get('test','ProjectController@test');
Route::get('cv',function (){
    return view('_html.pro.cv');
});