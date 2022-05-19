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
Auth::routes([
  'register' => false,
  'reset' => false,
  'verify' => false,
]);
Route::group([ 'prefix' => '', 'namespace' => 'Frontend'],function(){
    Route::get('sitemap.xml', 'SitemapController@sitemap')->name('frontend.sitemap.index');
    Route::get('language/{locale}', 'LangController@index')->name('frontend.locale');
    Route::get('change/{locale}','LangController@changelocale')->name('change.locale');
    Route::get('', 'HomeController@index')->name('frontend.home.index');
    Route::get('{slug}.html', 'HomeController@slug')->name('frontend.slug');
    Route::get('get-district-list','LocationController@getDistrictList')->name('frontend.district.index');
    Route::get('get-ward-list','LocationController@getWardList')->name('frontend.ward.index');
});

Route::group(['prefix' => 'newsletters','namespace' => 'Backend'], function(){
    Route::post('/store', 'NewsletterController@store')->name('backend.newsletter.store');
});

Route::group([ 'prefix' => 'contact','namespace' => 'Backend'],function(){
    Route::post('/store', 'ContactformController@store')->name('backend.contactform.store');
    Route::get('/refereshcapcha', 'ContactformController@refereshCapcha')->name('refereshcapcha');
});


Route::group([ 'prefix' => 'administrator' , 'middleware' => ['auth'] ,'namespace' => 'Backend'],function(){
    Route::get('', 'DashboardController@index')->name('backend.dashboard.index');
    Route::post('/down-web', 'IndexController@down_web')->name('down_web')
    ->middleware('role:maintain_down');
    Route::post('/up-web', 'IndexController@up_web')->name('up_web')
    ->middleware('role:maintain_up');
    // Route::get('change/{locale}','IndexController@changelocale')->name('change.locale');
    Route::post('reset-pass-maintain','IndexController@reset_pass_maintain')->name('reset.pass.maintain');
    Route::get('crop-size/{size}','IndexController@crop_size');
    Route::get('delete-demo','IndexController@delete_demo_data')->name('delete.demo');



    ////////CONFIG////////
    Route::group(['prefix' => 'config'], function(){
        Route::group(['prefix' => 'language'], function(){
            Route::get('', 'LanguageController@index')->name('backend.language.index')->middleware('role:language_all');
            Route::post('store', 'LanguageController@store')->name('backend.language.store')->middleware('role:language_add');
            Route::put('{id}/update', 'LanguageController@update')->name('backend.language.update')->middleware('role:language_edit');
            Route::delete('{id}/destroy', 'LanguageController@destroy')->name('backend.language.destroy')->middleware('role:language_del');
        });

        Route::group(['prefix' => 'thumb'], function(){
            Route::get('', 'ThumbController@index')->name('backend.thumb.index')->middleware('role:thumbsize_all');
            Route::post('store', 'ThumbController@store')->name('backend.thumb.store')->middleware('role:thumbsize_add');
            Route::put('{id}/update', 'ThumbController@update')->name('backend.thumb.update')->middleware('role:thumbsize_edit');
            Route::delete('{id}/destroy', 'ThumbController@destroy')->name('backend.thumb.destroy')->middleware('role:thumbsize_del');
            Route::delete('/deletemultiple', 'ThumbController@deletemultiple')->name('backend.thumb.deletemultiple')
            ->middleware('role:thumbsize_del');
        });

        Route::group(['prefix' => 'hideshow'], function(){
            Route::get('', 'HideshowController@index')->name('backend.hideshow.index')->middleware('role:menu_all');
            Route::post('store', 'HideshowController@store')->name('backend.hideshow.store')->middleware('role:menu_add');
            Route::put('{id}/update', 'HideshowController@update')->name('backend.hideshow.update')->middleware('role:menu_edit');
            Route::get('hideshow', 'HideshowController@hideShow')->name('backend.hideshow.hideshow')->middleware('role:menu_edit');
            Route::get('hideall', 'HideshowController@hideAll')->name('backend.hideall.hideshow')->middleware('role:menu_edit');
            Route::get('showall', 'HideshowController@showAll')->name('backend.showall.hideshow')->middleware('role:menu_edit');
            Route::get('multihideshow', 'HideshowController@multihideshow')->name('backend.hideshow.multihideshow')->middleware('role:menu_edit');
        });

        Route::resource('sources', 'SourceController')->middleware('role:modsource_all');

        Route::group(['prefix' => 'sources'], function(){
            Route::get('ajax/load/sources', 'SourceController@load')->name('ajax.load.sources')->middleware('role:modsource_all');
            Route::post('ajax/push/sources', 'SourceController@push')->name('ajax.push.sources')->middleware('role:modsource_all');
        });

        Route::group(['prefix' => 'users'], function(){
            Route::get('add_account', 'UserController@addaccount')->name('backend.user.addaccount')
            ->middleware('role:admin_add');
            Route::get('', 'UserController@index')->name('backend.user.index')
            ->middleware('role:admin_add');
            Route::get('create', 'UserController@create')->name('backend.user.create')
            ->middleware('role:admin_add');
            Route::get('editinfo', 'UserController@editinfo')->name('backend.user.editinfo')
            ->middleware('role:admin_edit');
            Route::get('editpassword', 'UserController@editpassword')->name('backend.user.editpassword')
            ->middleware('role:admin_edit');
            Route::get('changeStatus', 'UserController@changeStatus')->name('backend.user.changestatus')
            ->middleware('role:admin_edit');
            Route::post('store', 'UserController@store')->name('backend.user.store')
            ->middleware('role:admin_add');
            Route::put('updateinfo', 'UserController@updateinfo')->name('backend.user.updateinfo')
            ->middleware('role:admin_edit');
            Route::put('updatepassword', 'UserController@updatepassword')->name('backend.user.updatepassword')
            ->middleware('role:admin_edit');
            Route::delete('{id}/destroy', 'UserController@destroy')->name('backend.user.destroy')
            ->middleware('role:admin_del');
            Route::delete('deletemultiple', 'UserController@deletemultiple')->name('backend.user.deletemultiple')
            ->middleware('role:admin_del');
            Route::get('status', 'UserController@status')->name('backend.user.status')
            ->middleware('role:admin_edit');
            Route::get('changeStt', 'UserController@changeStt')->name('backend.user.changestt')
            ->middleware('role:admin_edit');
        });
        Route::group(['prefix' => 'roles'], function(){
            Route::resource('role', 'RoleController')
            ->middleware('role:grouprole_all');
            Route::delete('deletemultiple', 'RoleController@deletemultiple')->name('role.deletemultiple')
            ->middleware('role:grouprole_edit');

        });
    });
    ///////////////


    Route::get('/clear-cache', 'IndexController@clear')->name('clear-cache');
    Route::get('/linkstorage', function () {
        // Artisan::call('storage:link');
        $targetFolder = $_SERVER['DOCUMENT_ROOT'].'/storage/app/public';
        $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/public/storage';
        symlink($targetFolder,$linkFolder);
        return redirect()->back();
    });


    // Route::group(['prefix' => 'video'], function(){
    //     Route::get('edit', 'VideoindexController@edit')->name('backend.videoindex.edit')
    //     ->middleware('role:video_edit');
    //     Route::put('update', 'VideoindexController@update')->name('backend.videoindex.update')
    //     ->middleware('role:video_update');

    // });
    //




    Route::group(['prefix' => 'procatones'], function(){
        Route::get('', 'ProcatoneController@index')->name('backend.procatone.index')
        ->middleware('role:procatone_all');
        Route::get('create', 'ProcatoneController@create')->name('backend.procatone.create')
        ->middleware('role:procatone_add');
        Route::get('{id}/edit', 'ProcatoneController@edit')->name('backend.procatone.edit')
        ->middleware('role:procatone_edit');
        Route::post('store', 'ProcatoneController@store')->name('backend.procatone.store')
        ->middleware('role:procatone_add');
        Route::put('{id}/update', 'ProcatoneController@update')->name('backend.procatone.update')
        ->middleware('role:procatone_edit');
        Route::delete('{id}/destroy', 'ProcatoneController@destroy')->name('backend.procatone.destroy')
        ->middleware('role:procatone_del');
        Route::delete('/deletemultiple', 'ProcatoneController@deletemultiple')->name('backend.procatone.deletemultiple')
        ->middleware('role:procatone_del');
        Route::get('isFeatured', 'ProcatoneController@ChangeIsFeatured')->name('backend.procatone.isfeatured')
        ->middleware('role:procatone_edit');
        Route::get('hideShow', 'ProcatoneController@hideShow')->name('backend.procatone.hideshow')
        ->middleware('role:procatone_edit');
        Route::get('isNew', 'ProcatoneController@isNew')->name('backend.procatone.isnew')
        ->middleware('role:procatone_edit');
        Route::get('changeStt', 'ProcatoneController@changeStt')->name('backend.procatone.changestt')
        ->middleware('role:procatone_edit');

    });

    Route::group(['prefix' => 'procattwos'], function(){
        Route::get('', 'ProcattwoController@index')->name('backend.procattwo.index')
        ->middleware('role:procattwo_all');
        Route::get('create', 'ProcattwoController@create')->name('backend.procattwo.create')
        ->middleware('role:procattwo_add');
        Route::get('{id}/edit', 'ProcattwoController@edit')->name('backend.procattwo.edit')
        ->middleware('role:procattwo_edit');
        Route::post('store', 'ProcattwoController@store')->name('backend.procattwo.store')
        ->middleware('role:procattwo_add');
        Route::put('{id}/update', 'ProcattwoController@update')->name('backend.procattwo.update')
        ->middleware('role:procattwo_edit');
        Route::delete('{id}/destroy', 'ProcattwoController@destroy')->name('backend.procattwo.destroy')
        ->middleware('role:procattwo_del');
        Route::delete('/deletemultiple', 'ProcattwoController@deletemultiple')->name('backend.procattwo.deletemultiple')
        ->middleware('role:procattwo_del');
        Route::get('isFeatured', 'ProcattwoController@ChangeIsFeatured')->name('backend.procattwo.isfeatured')
        ->middleware('role:procattwo_del');
        Route::get('hideShow', 'ProcattwoController@hideShow')->name('backend.procattwo.hideshow')
        ->middleware('role:procattwo_edit');
        Route::get('isNew', 'ProcattwoController@isNew')->name('backend.procattwo.isnew')
        ->middleware('role:procattwo_edit');
        Route::get('changeStt', 'ProcattwoController@changeStt')->name('backend.procattwo.changestt')
        ->middleware('role:procattwo_edit');
    });
    Route::group(['prefix' => 'procatthrees'], function(){
        Route::get('', 'ProcatthreeController@index')->name('backend.procatthree.index')
        ->middleware('role:procatthree_all');
        Route::get('create', 'ProcatthreeController@create')->name('backend.procatthree.create')
        ->middleware('role:procatthree_add');
        Route::get('{id}/edit', 'ProcatthreeController@edit')->name('backend.procatthree.edit')
        ->middleware('role:procatthree_edit');
        Route::post('store', 'ProcatthreeController@store')->name('backend.procatthree.store')
        ->middleware('role:procatthree_add');
        Route::put('{id}/update', 'ProcatthreeController@update')->name('backend.procatthree.update')
        ->middleware('role:procatthree_edit');
        Route::delete('{id}/destroy', 'ProcatthreeController@destroy')->name('backend.procatthree.destroy')
        ->middleware('role:procatthree_del');
        Route::delete('/deletemultiple', 'ProcatthreeController@deletemultiple')->name('backend.procatthree.deletemultiple')
        ->middleware('role:procatthree_del');
        Route::get('isFeatured', 'ProcatthreeController@ChangeIsFeatured')->name('backend.procatthree.isfeatured')
        ->middleware('role:procatthree_edit');
        Route::get('hideShow', 'ProcatthreeController@hideShow')->name('backend.procatthree.hideshow')
        ->middleware('role:procatthree_edit');
        Route::get('isNew', 'ProcatthreeController@isNew')->name('backend.procatthree.isnew')
        ->middleware('role:procatthree_edit');
        Route::get('changeStt', 'ProcatthreeController@changeStt')->name('backend.procatthree.changestt')
        ->middleware('role:procatthree_edit');
        Route::post('select', 'ProcatthreeController@select')->name('backend.procatthree.select')
        ->middleware('role:procatthree_edit');
    });
    Route::group(['prefix' => 'products'], function(){
        Route::get('', 'ProductController@index')->name('backend.product.index')
        ->middleware('role:product_all');
        Route::get('create', 'ProductController@create')->name('backend.product.create')
        ->middleware('role:product_add');
        Route::get('{id}/edit', 'ProductController@edit')->name('backend.product.edit')
        ->middleware('role:product_edit');
        Route::post('store', 'ProductController@store')->name('backend.product.store')
        ->middleware('role:product_add');
        Route::put('{id}/update', 'ProductController@update')->name('backend.product.update')
        ->middleware('role:product_edit');
        Route::delete('{id}/destroy', 'ProductController@destroy')->name('backend.product.destroy')
        ->middleware('role:product_del');
        Route::delete('deletemultiple', 'ProductController@deletemultiple')->name('backend.product.deletemultiple')
        ->middleware('role:product_del');
        Route::delete('{id}/delete', 'ProductController@delete')->name('backend.product.delete')
        ->middleware('role:product_del');
        Route::get('isFeatured', 'ProductController@ChangeIsFeatured')->name('backend.product.isfeatured')
        ->middleware('role:product_edit');
        Route::get('isNew', 'ProductController@ChangeIsNew')->name('backend.product.isnew')
        ->middleware('role:product_edit');
        Route::get('hideShow', 'ProductController@hideShow')->name('backend.product.hideshow')
        ->middleware('role:product_edit');
        Route::get('changeStt', 'ProductController@changeStt')->name('backend.product.changestt')
        ->middleware('role:product_edit');
        Route::post('select', 'ProductController@select')->name('backend.product.select')
        ->middleware('role:product_edit');
        Route::post('select-option', 'ProductController@select_option')->name('backend.product.select_option')
        ->middleware('role:product_edit');
        Route::delete('delete-all-image-detail', 'ProductController@delete_all_image_detail')->name('backend.product.delete_all_image')
        ->middleware('role:product_edit');
        Route::delete('delete-choose-image-detail', 'ProductController@deletemultiple_imgdetail')->name('backend.product.deletemultiple_imgdetail')
        ->middleware('role:product_edit');
    });
    Route::group(['prefix' => 'contact'], function(){
        Route::get('edit', 'ContactController@edit')->name('backend.contact.edit');
        Route::put('update', 'ContactController@update')->name('backend.contact.update');
    });

    Route::group(['prefix' => 'author'], function(){
        Route::get('edit', 'AuthorController@edit')->name('backend.author.edit');
        Route::put('update', 'AuthorController@update')->name('backend.author.update');
    });
    Route::group(['prefix' => 'orders'], function(){
        Route::get('', 'OrderController@index')->name('backend.order.index')
        ->middleware('role:billing_all');
        Route::get('create', 'OrderController@create')->name('backend.order.create')
        ->middleware('role:billing_add');
        Route::get('{id}/edit', 'OrderController@edit')->name('backend.order.edit')
        ->middleware('role:billing_edit');
        Route::put('{id}/update', 'OrderController@update')->name('backend.order.update')
        ->middleware('role:billing_edit');
        Route::delete('{id}/destroy', 'OrderController@destroy')->name('backend.order.destroy')
        ->middleware('role:billing_del');
        // Route::delete('{id}/destroyorderdetail', 'OrderController@destroyorderdetail')->name('backend.order.destroyorderdetail')->middleware('role:billing_del');
        Route::delete('deletemultiple', 'OrderController@deletemultiple')->name('backend.order.deletemultiple')
        ->middleware('role:billing_del');
        Route::get('changeStt', 'OrderController@changeStt')->name('backend.order.changestt')->middleware('role:billing_edit');
        Route::get('get-district-list','OrderController@getDistrictList')->name('backend.district.index')
        ->middleware('role:billing_all');
        Route::post('', 'OrderController@postSearchTable')->name('backend.order.postSearchTable')->middleware('role:billing_all');
        Route::get('get-ward-list','OrderController@getWardList')->name('backend.ward.index')
        ->middleware('role:billing_all');
    });
    Route::resource('newsletter', 'NewsletterController')
    ->middleware('role:mailletter_all');
    Route::group(['prefix' => 'newsletters'], function(){
        Route::delete('deletemultiple', 'NewsletterController@deletemultiple')->name('newsletter.delete.multiple')
        ->middleware('role:mailletter_del');
        Route::post('sendmultiple', 'NewsletterController@sendmultiple')->name('newsletter.send.multiple');
        Route::post('sendall', 'NewsletterController@sendall')->name('newsletter.send.all');
    Route::get('subscribe', 'NewsletterController@sendEmail');
    });
    Route::group(['prefix' => 'contactforms'], function(){
        Route::get('', 'ContactformController@index')->name('backend.contactform.index')
        ->middleware('role:contactletter_all');
        Route::get('{id}/edit', 'ContactformController@edit')->name('backend.contactform.edit')
        ->middleware('role:contactletter_edit');
        Route::put('{id}/update', 'ContactformController@update')->name('backend.contactform.update')
        ->middleware('role:contactletter_update');
        Route::delete('{id}/destroy', 'ContactformController@destroy')->name('backend.contactform.destroy')
        ->middleware('role:contactletter_del');
        Route::delete('deletemultiple', 'ContactformController@deletemultiple')->name('backend.contactform.deletemultiple')
        ->middleware('role:contactletter_del');
        Route::get('Read', 'ContactformController@Read')->name('backend.contactform.read')
        ->middleware('role:contactletter_edit');
        Route::get('changeStt', 'ContactformController@changeStt')->name('backend.contactform.changestt')
        ->middleware('role:contactletter_edit');
    });
    Route::group(['prefix' => 'servis' ], function(){
        Route::get('', 'ServiController@index')->name('backend.servi.index')
        ->middleware('role:services_all');
        Route::get('create', 'ServiController@create')->name('backend.servi.create')
        ->middleware('role:services_add');
        Route::get('{id}/edit', 'ServiController@edit')->name('backend.servi.edit')
        ->middleware('role:services_edit');
        Route::post('store', 'ServiController@store')->name('backend.servi.store')
        ->middleware('role:services_add');
        Route::put('{id}/update', 'ServiController@update')->name('backend.servi.update')
        ->middleware('role:services_edit');
        Route::delete('{id}/destroy', 'ServiController@destroy')->name('backend.servi.destroy')
        ->middleware('role:services_del');
        Route::delete('deletemultiple', 'ServiController@deletemultiple')->name('backend.servi.deletemultiple')
        ->middleware('role:services_del');
        Route::get('isFeatured', 'ServiController@ChangeIsFeatured')->name('backend.servi.isfeatured')
        ->middleware('role:services_edit');
        Route::get('hideShow', 'ServiController@hideShow')->name('backend.servi.hideshow')
        ->middleware('role:services_edit');
        Route::get('changeStt', 'ServiController@changeStt')->name('backend.servi.changestt')
        ->middleware('role:services_edit');
    });

    Route::group(['prefix' => 'gallery'], function(){
        Route::get('', 'GalleryController@index')->name('backend.gallery.index');
        Route::get('create', 'GalleryController@create')->name('backend.gallery.create');
        Route::get('{id}/edit', 'GalleryController@edit')->name('backend.gallery.edit');
        Route::post('store', 'GalleryController@store')->name('backend.gallery.store');
        Route::delete('{id}/destroy', 'GalleryController@destroy')->name('backend.gallery.destroy');
        Route::put('{id}/update', 'GalleryController@update')->name('backend.gallery.update');
        Route::delete('deletemultiple', 'GalleryController@deletemultiple')->name('backend.gallery.deletemultiple');
        Route::get('hideShow', 'GalleryController@hideShow')->name('backend.gallery.hideshow');
        Route::get('changeStt', 'GalleryController@changeStt')->name('backend.gallery.changestt');
        Route::delete('{id}/delete', 'GalleryController@delete')->name('backend.gallery.delete');

    });


    Route::group(['prefix' => 'recruitments'], function(){
        Route::get('', 'RecruitmentController@index')->name('backend.recruitment.index')
        ->middleware('role:recruit_all');
        Route::get('create', 'RecruitmentController@create')->name('backend.recruitment.create')
        ->middleware('role:recruit_add');
        Route::get('{id}/edit', 'RecruitmentController@edit')->name('backend.recruitment.edit')
        ->middleware('role:recruit_edit');
        Route::post('store', 'RecruitmentController@store')->name('backend.recruitment.store')
        ->middleware('role:recruit_add');
        Route::put('{id}/update', 'RecruitmentController@update')->name('backend.recruitment.update')
        ->middleware('role:recruit_edit');
        Route::delete('{id}/destroy', 'RecruitmentController@destroy')->name('backend.recruitment.destroy')
        ->middleware('role:recruit_del');
        Route::delete('deletemultiple', 'RecruitmentController@deletemultiple')->name('backend.recruitment.deletemultiple')->middleware('role:recruit_del');
        Route::get('isFeatured', 'RecruitmentController@ChangeIsFeatured')->name('backend.recruitment.isfeatured')
        ->middleware('role:recruit_edit');
        Route::get('hideShow', 'RecruitmentController@hideShow')->name('backend.recruitment.hideshow')
        ->middleware('role:recruit_edit');
        Route::get('changeStt', 'RecruitmentController@changeStt')->name('backend.recruitment.changestt')
        ->middleware('role:recruit_edit');
    });

    Route::group(['prefix' => 'svcategories'], function(){
        Route::get('', 'SvcategoryController@index')->name('backend.svcategory.index')
        ->middleware('role:svcate_all');
        Route::get('create', 'SvcategoryController@create')->name('backend.svcategory.create')
        ->middleware('role:svcate_add');
        Route::get('{id}/edit', 'SvcategoryController@edit')->name('backend.svcategory.edit')
        ->middleware('role:svcate_edit');
        Route::post('store', 'SvcategoryController@store')->name('backend.svcategory.store')
        ->middleware('role:svcate_add');
        Route::put('{id}/update', 'SvcategoryController@update')->name('backend.svcategory.update')
        ->middleware('role:svcate_edit');
        Route::delete('{id}/destroy', 'SvcategoryController@destroy')->name('backend.svcategory.destroy')
        ->middleware('role:svcate_del');
        Route::delete('deletemultiple', 'SvcategoryController@deletemultiple')->name('backend.svcategory.deletemultiple')
        ->middleware('role:svcate_del');
        Route::get('hideShow', 'SvcategoryController@hideShow')->name('backend.svcategory.hideshow')
        ->middleware('role:svcate_edit');
        Route::get('changeStt', 'SvcategoryController@changeStt')->name('backend.svcategory.changestt')
        ->middleware('role:svcate_edit');
        Route::get('isFeatured', 'SvcategoryController@ChangeIsFeatured')->name('backend.svcategory.isfeatured')
        ->middleware('role:svcate_edit');
    });
    Route::group(['prefix' => 'newcatones'], function(){
        Route::get('', 'NewcatoneController@index')->name('backend.newcatone.index')
        ->middleware('role:newcatone_all');
        Route::get('create', 'NewcatoneController@create')->name('backend.newcatone.create')
        ->middleware('role:newcatone_add');
        Route::get('{id}/edit', 'NewcatoneController@edit')->name('backend.newcatone.edit')
        ->middleware('role:newcatone_edit');
        Route::post('store', 'NewcatoneController@store')->name('backend.newcatone.store')
        ->middleware('role:newcatone_add');
        Route::put('{id}/update', 'NewcatoneController@update')->name('backend.newcatone.update')
        ->middleware('role:newcatone_edit');
        Route::delete('{id}/destroy', 'NewcatoneController@destroy')->name('backend.newcatone.destroy')
        ->middleware('role:newcatone_del');
        Route::delete('deletemultiple', 'NewcatoneController@deletemultiple')->name('backend.newcatone.deletemultiple')
        ->middleware('role:newcatone_del');
        Route::get('hideShow', 'NewcatoneController@hideShow')->name('backend.newcatone.hideshow')
        ->middleware('role:newcatone_edit');
        Route::get('changeStt', 'NewcatoneController@changeStt')->name('backend.newcatone.changestt')
        ->middleware('role:newcatone_edit');
    });
    Route::group(['prefix' => 'newcattwos'], function(){
        Route::get('', 'NewcattwoController@index')->name('backend.newcattwo.index')
        ->middleware('role:newcattwo_all');
        Route::get('create', 'NewcattwoController@create')->name('backend.newcattwo.create')
        ->middleware('role:newcattwo_add');
        Route::get('{id}/edit', 'NewcattwoController@edit')->name('backend.newcattwo.edit')
        ->middleware('role:newcattwo_edit');
        Route::post('store', 'NewcattwoController@store')->name('backend.newcattwo.store')
        ->middleware('role:newcattwo_add');
        Route::put('{id}/update', 'NewcattwoController@update')->name('backend.newcattwo.update')
        ->middleware('role:newcattwo_edit');
        Route::delete('{id}/destroy', 'NewcattwoController@destroy')->name('backend.newcattwo.destroy')
        ->middleware('role:newcattwo_del');
        Route::delete('deletemultiple', 'NewcattwoController@deletemultiple')->name('backend.newcattwo.deletemultiple')
        ->middleware('role:newcattwo_del');
        Route::get('hideShow', 'NewcattwoController@hideShow')->name('backend.newcattwo.hideshow')
        ->middleware('role:newcattwo_edit');
        Route::get('changeStt', 'NewcattwoController@changeStt')->name('backend.newcattwo.changestt')
        ->middleware('role:newcattwo_edit');
        Route::get('isNew', 'NewcattwoController@isNew')->name('backend.newcattwo.isnew')
        ->middleware('role:newcattwo_edit');
        Route::get('isFeatured', 'NewcattwoController@ChangeIsFeatured')->name('backend.newcattwo.isfeatured')
        ->middleware('role:newcattwo_edit');

    });
    Route::group(['prefix' => 'posts'], function(){
        Route::get('', 'PostController@index')->name('backend.post.index')
        ->middleware('role:post_all');
        Route::get('create', 'PostController@create')->name('backend.post.create')
        ->middleware('role:post_add');
        Route::get('{id}/edit', 'PostController@edit')->name('backend.post.edit')
        ->middleware('role:post_edit');
        Route::post('store', 'PostController@store')->name('backend.post.store')
        ->middleware('role:post_add');
        Route::put('{id}/update', 'PostController@update')->name('backend.post.update')
        ->middleware('role:post_edit');
        Route::delete('{id}/destroy', 'PostController@destroy')->name('backend.post.destroy')
        ->middleware('role:post_del');
        Route::delete('deletemultiple', 'PostController@deletemultiple')->name('backend.post.deletemultiple')
        ->middleware('role:post_del');
        Route::get('isFeatured', 'PostController@ChangeIsFeatured')->name('backend.post.isfeatured')
        ->middleware('role:post_edit');
        Route::get('hideShow', 'PostController@hideShow')->name('backend.post.hideshow')
        ->middleware('role:post_edit');
        Route::get('changeStt', 'PostController@changeStt')->name('backend.post.changestt')
        ->middleware('role:post_edit');
        Route::post('select-option', 'PostController@select_option')->name('backend.post.select_option')
        ->middleware('role:post_edit');
        Route::post('select', 'PostController@select')->name('backend.post.select')
        ->middleware('role:post_edit');

    });
    Route::group(['prefix' => 'slider'], function(){
        Route::get('', 'SliderController@index')->name('backend.slider.index')
        ->middleware('role:slider_all');
        Route::get('create', 'SliderController@create')->name('backend.slider.create')
        ->middleware('role:slider_add');
        Route::get('{id}/edit', 'SliderController@edit')->name('backend.slider.edit')
        ->middleware('role:slider_edit');
        Route::post('store', 'SliderController@store')->name('backend.slider.store')
        ->middleware('role:slider_add');
        Route::delete('{id}/destroy', 'SliderController@destroy')->name('backend.slider.destroy')
        ->middleware('role:slider_del');
        Route::put('{id}/update', 'SliderController@update')->name('backend.slider.update')
        ->middleware('role:slider_del');
        Route::delete('deletemultiple', 'SliderController@deletemultiple')->name('backend.slider.deletemultiple')
        ->middleware('role:slider_del');
        Route::get('hideShow', 'SliderController@hideShow')->name('backend.slider.hideshow')
        ->middleware('role:slider_edit');
        Route::get('changeStt', 'SliderController@changeStt')->name('backend.slider.changestt')
        ->middleware('role:slider_edit');
    });

    Route::group(['prefix' => 'partner'], function(){
        Route::get('', 'PartnerController@index')->name('backend.partner.index')
        ->middleware('role:partner_all');
        Route::get('create', 'PartnerController@create')->name('backend.partner.create')
        ->middleware('role:partner_add');
        Route::get('{id}/edit', 'PartnerController@edit')->name('backend.partner.edit')
        ->middleware('role:partner_del');
        Route::post('store', 'PartnerController@store')->name('backend.partner.store')
        ->middleware('role:partner_add');
        Route::delete('{id}/destroy', 'PartnerController@destroy')->name('backend.partner.destroy')
        ->middleware('role:partner_del');
        Route::put('{id}/update', 'PartnerController@update')->name('backend.partner.update')
        ->middleware('role:partner_edit');
        Route::delete('deletemultiple', 'PartnerController@deletemultiple')->name('backend.partner.deletemultiple')
        ->middleware('role:partner_del');
        Route::get('hideShow', 'PartnerController@hideShow')->name('backend.partner.hideshow')
        ->middleware('role:partner_edit');
        Route::get('changeStt', 'PartnerController@changeStt')->name('backend.partner.changestt')
        ->middleware('role:partner_edit');
    });

    Route::group(['prefix' => 'other'], function(){
        Route::get('', 'SliderController@index')->name('backend.other.index');
        Route::get('create', 'SliderController@create')->name('backend.other.create');
        Route::get('{id}/edit', 'SliderController@edit')->name('backend.other.edit');
        Route::post('store', 'SliderController@store')->name('backend.other.store');
        Route::delete('{id}/destroy', 'SliderController@destroy')->name('backend.other.destroy');
        Route::put('{id}/update', 'SliderController@update')->name('backend.other.update');
        Route::delete('deletemultiple', 'SliderController@deletemultiple')->name('backend.other.deletemultiple');
        Route::get('hideShow', 'SliderController@hideShow')->name('backend.other.hideshow');
        Route::get('changeStt', 'SliderController@changeStt')->name('backend.other.changestt');
    });
    Route::group(['prefix' => 'videocats'], function(){
        Route::get('', 'VideocatController@index')->name('backend.videocat.index')
        ->middleware('role:catemedia_all');
        Route::get('create', 'VideocatController@create')->name('backend.videocat.create')
        ->middleware('role:catemedia_add');
        Route::get('{id}/edit', 'VideocatController@edit')->name('backend.videocat.edit')
        ->middleware('role:catemedia_edit');
        Route::post('store', 'VideocatController@store')->name('backend.videocat.store')
        ->middleware('role:catemedia_add');
        Route::put('{id}/update', 'VideocatController@update')->name('backend.videocat.update')
        ->middleware('role:catemedia_edit');
        Route::delete('{id}/destroy', 'VideocatController@destroy')->name('backend.videocat.destroy')
        ->middleware('role:catemedia_del');
        Route::delete('/deletemultiple', 'VideocatController@deletemultiple')->name('backend.videocat.deletemultiple')
        ->middleware('role:catemedia_del');
        Route::get('isFeatured', 'VideocatController@ChangeIsFeatured')->name('backend.videocat.isfeatured')
        ->middleware('role:catemedia_edit');
        Route::get('hideShow', 'VideocatController@hideShow')->name('backend.videocat.hideshow')
        ->middleware('role:catemedia_edit');
        Route::get('isNew', 'VideocatController@isNew')->name('backend.videocat.isnew')
        ->middleware('role:catemedia_edit');
        Route::get('changeStt', 'VideocatController@changeStt')->name('backend.videocat.changestt')
        ->middleware('role:catemedia_edit');
    });
    Route::group(['prefix' => 'videos'], function(){
        Route::resource('video', 'VideoController')
        ->middleware('role:media_all');
        Route::delete('deletemultiple', 'VideoController@deletemultiple')->name('video.delete.multiple')
        ->middleware('role:media_del');
        Route::get('hideShow', 'VideoController@hideShow')->name('backend.video.hideshow')
        ->middleware('role:media_edit');
        Route::get('changeStt', 'VideoController@changeStt')->name('backend.video.changestt')
        ->middleware('role:media_edit');
    });
    Route::group(['prefix' => 'pages'], function(){
        Route::get('', 'PageController@index')->name('backend.page.index')
        ->middleware('role:static_page_all');
        Route::get('/create', 'PageController@create')->name('backend.page.create')
        ->middleware('role:static_page_add');
        Route::post('/store', 'PageController@store')->name('backend.page.store')
        ->middleware('role:static_page_add');
        Route::get('{id}/edit', 'PageController@edit')->name('backend.page.edit')
        ->middleware('role:static_page_edit');
        Route::put('{id}/update', 'PageController@update')->name('backend.page.update')
        ->middleware('role:static_page_edit');
        Route::delete('{id}/destroy', 'PageController@destroy')->name('backend.page.destroy')
        ->middleware('role:static_page_del');
        Route::get('hideShow', 'PageController@hideShow')->name('backend.page.hideshow')
        ->middleware('role:static_page_edit');
    });

    Route::group(['prefix' => 'settings'], function(){
        Route::get('edit', 'SettingController@edit')->name('backend.setting.edit')
        ->middleware('role:webconfig_all');
        Route::put('update', 'SettingController@update')->name('backend.setting.update');
    });

    Route::group(['prefix' => 'tags'], function(){
        Route::get('', 'TagController@index')->name('backend.tag.index')
        ->middleware('role:tag_all');
        Route::get('create', 'TagController@create')->name('backend.tag.create')
        ->middleware('role:tag_add');
        Route::get('{id}/edit', 'TagController@edit')->name('backend.tag.edit')
        ->middleware('role:tag_edit');
        Route::post('store', 'TagController@store')->name('backend.tag.store')
        ->middleware('role:tag_add');
        Route::put('{id}/update', 'TagController@update')->name('backend.tag.update')
        ->middleware('role:tag_edit');
        Route::delete('{id}/destroy', 'TagController@destroy')->name('backend.tag.destroy')
        ->middleware('role:tag_del');
        Route::delete('deletemultiple', 'TagController@deletemultiple')->name('backend.tag.deletemultiple')
        ->middleware('role:tag_del');
        Route::get('hideShow', 'TagController@hideShow')->name('backend.tag.hideshow')
        ->middleware('role:tag_edit');
        Route::get('changeStt', 'TagController@changeStt')->name('backend.tag.changestt')
        ->middleware('role:tag_edit');
    });
    Route::resource('feeship', 'FeeshipController')
    ->middleware('role:feeship_all');
    Route::post('select', 'FeeshipController@select')->name('feeship.select');
    Route::post('dataship', 'FeeshipController@data')->name('feeship.data');
    Route::post('update-ship', 'FeeshipController@update_ship')->name('update_ship.data');
    Route::delete('deletemultiple', 'FeeshipController@deletemultiple')->name('feeship.deletemultiple');

    Route::group(['prefix' => 'coupons'], function(){
        Route::resource('coupon', 'CouponController')
        ->middleware('role:coupon_all');
        Route::get('hideShow', 'CouponController@hideShow')->name('backend.coupon.hideshow')
        ->middleware('role:coupon_edit');
        Route::get('changeStt', 'CouponController@changeStt')->name('backend.coupon.changestt')
        ->middleware('role:coupon_edit');
        Route::delete('deletemultiple', 'CouponController@deletemultiple')->name('backend.coupon.deletemultiple')
        ->middleware('role:coupon_del');
    });

    Route::post('short-day', 'DashboardController@shortday')->name('backend.shortday.store');
    //FILE MANAGER
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','role:filemanager']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
    Route::get('quan-li-file', 'IndexController@filemanager')->name('file_manager')
    ->middleware('role:filemanager');
        ///////////GGANALYTICS//////////////////////
    Route::prefix('browser')->middleware(['role:ana_browser'])->group(function () {
        Route::get('/', 'AnalyticsController@browser')->name('api.browser');
        Route::get('/yesterday', 'AnalyticsController@browser_yesterday')->name('api.browser.yesterday');
        Route::get('/7-day', 'AnalyticsController@browser_7day')->name('api.browser.7day');
        Route::get('/week', 'AnalyticsController@browser_thisweek')->name('api.browser.thisweek');
        Route::get('/30-day', 'AnalyticsController@browser_30day')->name('api.browser.30day');
        Route::get('/month', 'AnalyticsController@browser_thismonth')->name('api.browser.thismonth');
        Route::get('/year', 'AnalyticsController@browser_thisyear')->name('api.browser.thisyear');
    });


    Route::prefix('access')->middleware(['role:ana_access'])->group(function () {
        Route::get('/', 'AnalyticsController@access')->name('api.access');
        Route::get('/yesterday', 'AnalyticsController@access_yesterday')->name('api.access.yesterday');
        Route::get('/7-day', 'AnalyticsController@access_7day')->name('api.access.7day');
        Route::get('/week', 'AnalyticsController@access_thisweek')->name('api.accesss.thisweek');
        Route::get('/30-day', 'AnalyticsController@access_30day')->name('api.access.30day');
        Route::get('/month', 'AnalyticsController@access_thismonth')->name('api.access.thismonth');
        Route::get('/year', 'AnalyticsController@access_thisyear')->name('api.access.thisyear');
    });

    Route::prefix('keyword')->group(function () {
        Route::get('/', 'AnalyticsController@keyword')->name('api.keyword');
        Route::get('/yesterday', 'AnalyticsController@keyword_yesterday')->name('api.keyword.yesterday');
        Route::get('/7-day', 'AnalyticsController@keyword_7day')->name('api.keyword.7day');
        Route::get('/week', 'AnalyticsController@keyword_thisweek')->name('api.keywords.thisweek');
        Route::get('/30-day', 'AnalyticsController@keyword_30day')->name('api.keyword.30day');
        Route::get('/month', 'AnalyticsController@keyword_thismonth')->name('api.keyword.thismonth');
        Route::get('/year', 'AnalyticsController@keyword_thisyear')->name('api.keyword.thisyear');
    });

    Route::prefix('country')->middleware(['role:ana_country'])->group(function () {
        Route::get('/', 'AnalyticsController@country')->name('api.country');
        Route::get('/yesterday', 'AnalyticsController@country_yesterday')->name('api.country.yesterday');
        Route::get('/7-day', 'AnalyticsController@country_7day')->name('api.country.7day');
        Route::get('/week', 'AnalyticsController@country_thisweek')->name('api.country.thisweek');
        Route::get('/30-day', 'AnalyticsController@country_30day')->name('api.country.30day');
        Route::get('/month', 'AnalyticsController@country_thismonth')->name('api.country.thismonth');
        Route::get('/year', 'AnalyticsController@country_thisyear')->name('api.country.thisyear');
    });

    Route::prefix('pageview')->middleware(['role:ana_site'])->group(function () {
        Route::get('/', 'AnalyticsController@pageview')->name('api.pageview');
        Route::get('/yesterday', 'AnalyticsController@pageviewyesterday')->name('api.pageview.yesterday');
        Route::get('/7-day', 'AnalyticsController@pageview7day')->name('api.pageview.7day');
        Route::get('/week', 'AnalyticsController@pageviewweek')->name('api.pageview.thisweek');
        Route::get('/30-day', 'AnalyticsController@pageview30day')->name('api.pageview.30day');
        Route::get('/month', 'AnalyticsController@pageviewthismonth')->name('api.pageview.thismonth');
        Route::get('/year', 'AnalyticsController@pageviewthisyear')->name('api.pageview.thisyear');
    });

    Route::prefix('device')->middleware(['role:ana_device'])->group(function () {
        Route::get('/', 'AnalyticsController@device')->name('api.device');
        Route::get('/yesterday', 'AnalyticsController@deviceyesterday')->name('api.device.yesterday');
        Route::get('/7-day', 'AnalyticsController@device7day')->name('api.device.7day');
        Route::get('/week', 'AnalyticsController@deviceweek')->name('api.device.thisweek');
        Route::get('/30-day', 'AnalyticsController@device30day')->name('api.device.30day');
        Route::get('/month', 'AnalyticsController@devicethismonth')->name('api.device.thismonth');
        Route::get('/year', 'AnalyticsController@devicethisyear')->name('api.device.thisyear');
    });

    Route::prefix('referral')->middleware(['role:ana_ref'])->group(function () {
        Route::get('/', 'AnalyticsController@referral')->name('api.referral');
        Route::get('/yesterday', 'AnalyticsController@referralyesterday')->name('api.referral.yesterday');
        Route::get('/7-day', 'AnalyticsController@referral7day')->name('api.referral.7day');
        Route::get('/week', 'AnalyticsController@referralweek')->name('api.referral.thisweek');
        Route::get('/30-day', 'AnalyticsController@referral30day')->name('api.referral.30day');
        Route::get('/month', 'AnalyticsController@referralthismonth')->name('api.referral.thismonth');
        Route::get('/year', 'AnalyticsController@referralthisyear')->name('api.referral.thisyear');
    });

    Route::prefix('dashboard')->middleware(['role:ana_general'])->group(function () {
        Route::get('/', 'AnalyticsController@dashboard')->name('api.dashboard');
        Route::get('/yesterday', 'AnalyticsController@dashboardyesterday')->name('api.dashboard.yesterday');
        Route::get('/7-day', 'AnalyticsController@dashboard7day')->name('api.dashboard.7day');
        Route::get('/week', 'AnalyticsController@dashboardweek')->name('api.dashboard.thisweek');
        Route::get('/30-day', 'AnalyticsController@dashboard30day')->name('api.dashboard.30day');
        Route::get('/month', 'AnalyticsController@dashboardthismonth')->name('api.dashboard.thismonth');
        Route::get('/year', 'AnalyticsController@dashboardthisyear')->name('api.dashboard.thisyear');
    });
});
// Custom cart
Route::group(['prefix' => 'order'], function(){
    Route::get('view', 'CartCustomController@view')->name('order.view');
    Route::get('add-now/{id}', 'CartCustomController@add_now')->name('order.now');
    Route::post('add-now-quantity', 'CartCustomController@add_now_quantity')->name('order.now.quantity');
    Route::get('add-to-cart-quantity/{id}', 'CartCustomController@add_to_cart_quantity')->name('order.tocart.quantity');
    Route::get('add/{id}', 'CartCustomController@add')->name('order.add');
    Route::get('remove/{id}', 'CartCustomController@remove')->name('order.remove');
    Route::get('update/{id}', 'CartCustomController@update')->name('order.update');
    Route::get('clear', 'CartCustomController@clear')->name('order.clear');
    Route::post('update-cart', 'CartCustomController@update_cart')->name('order.update_cart');
});
// Checkout cart
Route::group(['prefix' => 'checkout'], function(){
    Route::get('', 'OrderController@form')->name('checkout');
    Route::post('', 'OrderController@submit_form')->name('checkout');
    Route::get('checkout-success', 'OrderController@success')->name('frontend.checkout.success');
    Route::post('feeship-select-home', 'OrderController@selecthome')->name('feeship.select.home');
    Route::post('calculate-fee', 'OrderController@calculate_fee')->name('calculate.fee');
    Route::get('delete-fee', 'OrderController@delete_fee')->name('delete.fee');
});
// End Custom Cart
// Account register
Route::get('register-account', 'AccountController@registeraccount')->name('frontend.home.registeraccount');
Route::post('register-account', 'AccountController@postregisteraccount')->name('frontend.home.registeraccount.post');
// Route::get('home-login', 'AccountController@homelogin')->name('frontend.home.login')->middleware('verified');

Route::get('home-login', 'AccountController@homelogin')->name('frontend.home.login');

// Route::post('home-login', 'AccountController@posthomelogin')->name('frontend.home.login')->middleware('verified');
Route::post('home-login', 'AccountController@posthomelogin')->name('frontend.home.login.post');
Route::group(['prefix' => 'account', 'middleware' => 'account'], function(){
    Route::get('home-logout', 'AccountController@logout')->name('frontend.home.logout');
    Route::get('profile', 'AccountController@profile')->name('frontend.account.profile')->middleware('verified');
    Route::get('order-list', 'AccountController@orderlist')->name('frontend.account.orderlist')->middleware('verified');
Route::get('change-password', 'AccountController@changepassword')->name('frontend.account.changepassword')->middleware('verified');
});
// Coupon
Route::post('check_coupon', 'CartCustomController@check_coupon')->name('check_coupon');
Route::get('unset_coupon', 'CartCustomController@unset_coupon')->name('unset_coupon');

//endcoupon

Route::get('auth-verify/{token}', 'AccountController@auth_verify')->name('auth.verify');
Route::get('forget-password', 'AccountController@forget_password')->name('auth.forget_password');
Route::post('forget-password', 'AccountController@post_forget_password')->name('auth.post_forget_password');
Route::get('change-password/{token}', 'AccountController@change_password')->name('auth.change_password');
Route::post('change-password/{token}', 'AccountController@post_change_password')->name('auth.post_change_password');
Route::get('logout', function(){
    \Auth::logout();
    return redirect()->route('login');
});
