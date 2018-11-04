<?php
use App\Model\Staff;
use App\Model\Photo;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/staff/{id}/in_photo',function($id){
    $staff  =   Staff::findOrFail($id);
    if($staff->photos()->create(['path'=>'example1.jpg'])){
        return 'Insert success';
    }
    return 'Insert fail';
});

Route::get('/staff/{id}/photos',function($id){
    $staff  =   Staff::findOrFail($id);
    return $staff->photos;
});

Route::get('/staff/{id}/up_photo/{photo_id}',function($id,$photo_id){
    $staff  =   Staff::findOrFail($id);
    return $staff->photos()->where('id',$photo_id)->update(['path'=>'update2.jpg']);
});


Route::get('/staff/{id}/del_photo/{photo_id}',function($id,$photo_id){
    $staff  =   Staff::findOrFail($id);
    return $staff->photos()->where('id',$photo_id)->delete();
});