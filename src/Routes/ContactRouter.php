<?php

use App\Http\Route;


// *********** VIEWS *************//
Route::get(PATH_CONTACT, 'ContactController@index');
// *********** End VIEWS *************//

Route::post("/contact", 'ContactController@send');