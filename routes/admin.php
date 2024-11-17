<?php

use Illuminate\Support\Facades\Route;

//admin login route
Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');

//admin routes
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'is_admin'], function(){
	Route::get('/admin/home', 'AdminController@admin')->name('admin.home');
	Route::get('/admin/logout', 'AdminController@logout')->name('admin.logout');
	Route::get('/admin/password/change', 'AdminController@passwordchange')->name('admin.password.change');
	Route::post('/admin/password/update', 'AdminController@passwordupdate')->name('admin.password.update');

	//user route
	Route::group(['prefix'=>'user'],function(){
		Route::get('/', 'UserController@index')->name('user.index');
		Route::get('/delete/{id}', 'UserController@destroy')->name('user.delete');
		Route::get('/edit/{id}', 'UserController@edit')->name('user.edit');
		Route::post('/update', 'UserController@userupdate')->name('user.update');
	}); //end user group route

	//category route
	Route::group(['prefix'=>'category'],function(){
		Route::get('/', 'CategoryController@index')->name('category.index');
		Route::post('/store', 'CategoryController@store')->name('category.store');
		Route::get('/edit/{id}', 'CategoryController@edit');
		Route::post('/update', 'CategoryController@update')->name('category.update');
		Route::get('/delete/{id}', 'CategoryController@destroy')->name('category.delete');
	}); //end category group route

	//subcategory route
	Route::group(['prefix'=>'subcategory'],function(){
		Route::get('/', 'SubcategoryController@index')->name('subcategory.index');
		Route::post('/store', 'SubcategoryController@store')->name('subcategory.store');
		Route::get('/edit/{id}', 'SubcategoryController@edit');
		Route::post('/update', 'SubcategoryController@update')->name('subcategory.update');
		Route::get('/delete/{id}', 'SubcategoryController@destroy')->name('subcategory.delete');
	}); //end subcategory group route

	//childcategory route
	Route::group(['prefix'=>'childcategory'],function(){
		Route::get('/', 'ChildcategoryController@index')->name('childcategory.index');
		Route::post('/store', 'ChildcategoryController@store')->name('childcategory.store');
		Route::get('/edit/{id}', 'ChildcategoryController@edit');
		Route::post('/update', 'ChildcategoryController@update')->name('childcategory.update');
		Route::get('/delete/{id}', 'ChildcategoryController@destroy')->name('childcategory.delete');
	}); //end childcategory group route

	//slider route
	Route::group(['prefix'=>'slider'],function(){
		Route::get('/', 'SliderController@index')->name('manage.slider');
		Route::post('/store', 'SliderController@store')->name('slider.store');
		Route::get('/edit/{id}', 'SliderController@edit');
		Route::post('/update', 'SliderController@update')->name('slider.update');
		Route::get('/delete/{id}', 'SliderController@destroy')->name('slider.delete');
	}); //end slider group route

	//notice route
	Route::group(['prefix'=>'notice'],function(){
		Route::get('/', 'NoticeController@index')->name('manage.notice');
		Route::post('/store', 'NoticeController@store')->name('notice.store');
		Route::get('/edit/{id}', 'NoticeController@edit');
		Route::post('/update', 'NoticeController@update')->name('notice.update');
		Route::get('/delete/{id}', 'NoticeController@destroy')->name('notice.delete');
	}); //end notice group route

	//setting route
	Route::group(['prefix'=>'setting'],function(){
		//seo route
		Route::group(['prefix'=>'seo'],function(){
			Route::get('/', 'SettingController@index')->name('seo.setting');
			Route::post('/update/{id}', 'SettingController@update')->name('seo.setting.update');
		}); //end seo group route

		//smtp route
		Route::group(['prefix'=>'smtp'],function(){
			Route::get('/', 'SettingController@smtp')->name('smtp.setting');
			Route::post('/update/{id}', 'SettingController@smtpupdate')->name('smtp.setting.update');
		}); //end smtp group route

		//page route
		Route::group(['prefix'=>'page'],function(){
			Route::get('/', 'PageController@index')->name('page.index');
			Route::get('/create', 'PageController@create')->name('create.page');
			Route::post('/store', 'PageController@store')->name('store.page');
			Route::get('/delete/{id}', 'PageController@destroy')->name('delete.page');
			Route::get('/edit/{id}', 'PageController@edit')->name('edit.page');
			Route::post('/update/{id}', 'PageController@update')->name('update.page');
		}); //end page group route

		//website setting route
		Route::group(['prefix'=>'website'],function(){
			Route::get('/', 'SettingController@setting')->name('website.setting');
			Route::post('/update/{id}', 'SettingController@websiteupdate')->name('website.setting.update');
		}); //end website setting group route

	}); //end setting group route

	//about route
	Route::group(['prefix'=>'about'],function(){
		Route::get('/', 'AboutController@index')->name('about.index');
		Route::post('/store', 'AboutController@store')->name('about.store');
		Route::get('/edit/{id}', 'AboutController@edit');
		Route::post('/update', 'AboutController@update')->name('about.update');
		Route::delete('/delete/{id}', 'AboutController@destroy')->name('about.delete');
	}); //end slider group route

	//video gallery route
	Route::group(['prefix'=>'gallery'],function(){
		Route::get('/', 'GalleryController@videoindex')->name('video.gallery');
		Route::post('/video/store', 'GalleryController@videostore')->name('video.store');
		Route::get('/video/edit/{id}', 'GalleryController@videoedit');
		Route::post('/video/update', 'GalleryController@videoupdate')->name('video.update');
		Route::delete('/video/delete/{id}', 'GalleryController@videodestroy')->name('video.delete');
	}); //end video gallery group route

	//photo gallery route
	Route::group(['prefix'=>'photo'],function(){
		Route::get('/', 'PhotoController@photoindex')->name('photo.index');
		Route::post('/store', 'PhotoController@photostore')->name('photo.store');
		Route::get('/deactive/{id}', 'PhotoController@deactive');
		Route::get('/active/{id}', 'PhotoController@active');
		Route::get('/edit/{id}', 'PhotoController@photoedit')->name('photo.edit');
		Route::post('/update', 'PhotoController@photoupdate')->name('photo.update');
		Route::delete('/delete/{id}', 'PhotoController@photodestroy')->name('photo.delete');
	}); //end photo gallery group route

	//event route
	Route::group(['prefix'=>'event'],function(){
		Route::get('/', 'EventController@index')->name('event.index');
		Route::post('/store', 'EventController@store')->name('eventnews.store');
		Route::get('/edit/{id}', 'EventController@edit');
		Route::post('/update', 'EventController@update')->name('event.update');
		Route::delete('/delete/{id}', 'EventController@destroy')->name('event.delete');
	}); //end event group route

	//cp message route
	Route::group(['prefix'=>'cp'],function(){
		Route::get('/', 'CpmessController@index')->name('cp.index');
		Route::post('/store', 'CpmessController@store')->name('cp.store');
		Route::get('/edit/{id}', 'CpmessController@edit');
		Route::post('/update', 'CpmessController@update')->name('cp.update');
		Route::delete('/delete/{id}', 'CpmessController@destroy')->name('cp.delete');
	}); //end cp message group route

	//administration route
	Route::group(['prefix'=>'administration'],function(){
		Route::get('/', 'AdministrationController@index')->name('ad.index');
		Route::post('/store', 'AdministrationController@store')->name('ad.store');
		Route::get('/edit/{id}', 'AdministrationController@edit');
		Route::post('/update', 'AdministrationController@update')->name('ad.update');
		Route::delete('/delete/{id}', 'AdministrationController@destroy')->name('ad.delete');
	}); //end administration group route

	//members route
	Route::group(['prefix'=>'member'],function(){
		Route::get('/', 'MemberController@index')->name('member.index');
		Route::post('/store', 'MemberController@store')->name('member.store');
		Route::get('/edit/{id}', 'MemberController@edit');
		Route::post('/update', 'MemberController@update')->name('member.update');
		Route::delete('/delete/{id}', 'MemberController@destroy')->name('member.delete');
	}); //end members group route

	//researcher route
	Route::group(['prefix'=>'all-researcher'],function(){
		Route::get('/create', 'ResearcherController@create')->name('professor.create');
		Route::get('/', 'ResearcherController@index')->name('professor.index');
		Route::post('/store', 'ResearcherController@store')->name('professor.store');
		Route::get('/edit/{id}', 'ResearcherController@edit')->name('professor.edit');
		Route::post('/update', 'ResearcherController@update')->name('professor.update');
		Route::get('/delete/{id}', 'ResearcherController@destroy')->name('professor.delete');
	}); //end chair professor group route

	//archive route
	Route::group(['prefix'=>'archive'],function(){
		Route::get('/', 'ArchiveController@index')->name('archive.index');
		Route::post('/store', 'ArchiveController@store')->name('archive.store');
		Route::get('/edit/{id}', 'ArchiveController@edit');
		Route::post('/update', 'ArchiveController@update')->name('archive.update');
		Route::delete('/delete/{id}', 'ArchiveController@destroy')->name('archive.delete');
	}); //end archive group route

	//publication route
	Route::group(['prefix'=>'publication'],function(){
		Route::get('/create', 'PublicationController@create')->name('publication.create');
		Route::get('/', 'PublicationController@index')->name('publication.index');
		Route::post('/store', 'PublicationController@store')->name('publication.store');
		Route::get('/edit/{id}', 'PublicationController@edit')->name('publication.edit');
		Route::post('/update', 'PublicationController@update')->name('publication.update');
		Route::get('/delete/{id}', 'PublicationController@destroy')->name('publication.delete');
	}); //end publication group route

	//artical route
	Route::group(['prefix'=>'artical'],function(){
		Route::get('/create', 'ArticalController@create')->name('artical.create');
		Route::get('/', 'ArticalController@index')->name('artical.index');
		Route::post('/store', 'ArticalController@store')->name('artical.store');
		Route::get('/delete/{id}', 'ArticalController@destroy')->name('artical.delete');
	}); //end artical group route

	//author route
	Route::group(['prefix'=>'author'],function(){
		Route::get('/', 'AuthorController@index')->name('author.index');
		Route::post('/store', 'AuthorController@store')->name('author.store');
		Route::get('/edit/{id}', 'AuthorController@edit');
		Route::post('/update', 'AuthorController@update')->name('author.update');
		Route::delete('/delete/{id}', 'AuthorController@destroy')->name('author.delete');
	}); //end author group route

	//eadvisor route
	Route::group(['prefix'=>'advisor'],function(){
		Route::get('/', 'EadvisorController@index')->name('advisor.index');
		Route::post('/store', 'EadvisorController@store')->name('advisor.store');
		Route::get('/edit/{id}', 'EadvisorController@edit');
		Route::post('/update', 'EadvisorController@update')->name('advisor.update');
		Route::delete('/delete/{id}', 'EadvisorController@destroy')->name('advisor.delete');
	}); //end eadvisor group route

	//eadvisor route
	Route::group(['prefix'=>'editor-boards'],function(){
		Route::get('/', 'EboardController@index')->name('board.index');
		Route::post('/store', 'EboardController@store')->name('board.store');
		Route::get('/edit/{id}', 'EboardController@edit');
		Route::post('/update', 'EboardController@update')->name('board.update');
		Route::delete('/delete/{id}', 'EboardController@destroy')->name('board.delete');
	}); //end eadvisor group route

	//honor board route
	Route::group(['prefix'=>'honor-board'],function(){
		Route::get('/create', 'HonorBoardController@create')->name('honor.create');
		Route::get('/', 'HonorBoardController@index')->name('honor.index');
		Route::post('/store', 'HonorBoardController@store')->name('honor.store');
		Route::get('/edit/{id}', 'HonorBoardController@edit')->name('honor.edit');
		Route::post('/update', 'HonorBoardController@update')->name('honor.update');
		Route::get('/delete/{id}', 'HonorBoardController@destroy')->name('honor.delete');
	}); //end honor board group route

	//newsletter route
	Route::group(['prefix'=>'newsletter'],function(){
		Route::get('/', 'SettingController@newsletter')->name('newsletter.index');
		Route::get('/delete/{id}', 'SettingController@destroy')->name('newsletter.delete');
	}); //end honor board group route


}); //end all group route