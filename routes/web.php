<?php


use Illuminate\Support\Facades\Route;
use App\Http\Resources\User as UserResource;
use App\User;

// Remove the following when done experimenting
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

Route::get('/user', function () {
    $user = User::find(2);
    return new UserResource($user);
});

Route::get('/users/{user}', function ($id) {
    $user = User::find($id);
    return new UserResource($user);
});

Route::get('/users', function () {
    $users = User::all();
    return UserResource::collection($users);
});

Route::get('/userid', function () {
    return UserResource::collection(User::all()->keyBy->id);
});

Route::get('/userpaginate', function () {
    $users = User::paginate(2);
    return UserResource::collection($users);

});

Route::get('/test', 'CompanyController@index');
//Route::get('/{any}', 'AppController@index')->where('any', '.*');


Route::post('/users', function() {
    $token = Auth::user()->api_token;

    $headers = ['Authorization' => "Bearer $token"];

    dd($headers);
    $payload = [
        'name'       => 'NEW NAME',
        'email'      => 'test@email.NEW',
        'role'       => 2,
        'wins'       => 0,
        'api_token'  => Str::random(32),
    ];



    return $this->json('POST', '/api/users', $payload, $headers)
        ->assertStatus(200)
        ->assertJson(['id' => 1, 'title' => 'Lorem', 'body' => 'Ipsum']);

});



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
    return view('welcome');
});


Auth::routes();
Route::get('/{any}', 'AppController@index')->where('any', '.*');
