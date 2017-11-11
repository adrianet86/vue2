<?php

use Illuminate\Http\Request;

Route::get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'v1'], function ()
{
    Route::resource('/application', 'ApplicationController');
    Route::patch('/application/{id}', 'ApplicationController@update');

    Route::get('/country', 'CountryController@index');

    Route::get('/marital-status', function (Request $request) {
        return response()->json([
            ['id' => 'SINGLE', 'label' => 'Single'],
            ['id' => 'MARRIED','label' => 'Married'],
            ['id' => 'DIVORCED', 'label' => 'Divorced'],
            ['id' => 'WIDOWED', 'label' => 'Widowed',]
        ]);
    });
    Route::get('/identity-document-type', function (Request $request) {
        return response()->json([
            ['id' => 'IC', 'label' => 'Identity card'],
            ['id' => 'DL','label' => 'Driver license'],
            ['id' => 'PAS', 'label' => 'Passport'],
        ]);
    });
    Route::get('/gender', function (Request $request) {
        return response()->json([
            ['id' => 'MALE', 'label' => 'Male'],
            ['id' => 'FEMALE','label' => 'Female'],
        ]);
    });
    Route::get('/education', function (Request $request) {
        return response()->json([
            ['id' => 'NONE', 'label' => 'None'],
            ['id' => 'HIGH_SCHOOL','label' => 'High school'],
            ['id' => 'BACHELOR','label' => 'Bachelor'],
            ['id' => 'MASTER','label' => "Master"],
            ['id' => 'MBA','label' => "MBA"],
            ['id' => 'DOCTORATE','label' => "Doctorate"],
        ]);
    });
    Route::get('/purpose', function (Request $request) {
        return response()->json([
            ['id' => 'VACATIONS', 'label' => 'Vacations'],
            ['id' => 'VEHICLE_REPAIR','label' => 'Repair vehicle'],
            ['id' => 'VEHICLE_BUY','label' => 'Buy vehicle'],
            ['id' => 'HOME_BUY','label' => "Buy house"],
            ['id' => 'HOME_IMPROVEMENTS','label' => "Home improvements"],
            ['id' => 'UNEXPECTED_EXPENSES','label' => "Unexpected expenses"],
        ]);
    });
    Route::get('/street-type', function (Request $request) {
        return response()->json([
            ['id' => 'AV', 'label' => 'Avenue'],
            ['id' => 'STREET','label' => 'Street'],
            ['id' => 'SQUARE','label' => 'Square'],
        ]);
    });
    Route::get('/residence-type', function (Request $request) {
        return response()->json([
            ['id' => 'PROPERTY_NO_MORTGAGE', 'label' => 'Property withouth mortgage'],
            ['id' => 'PROPERTY_MORTGAGE', 'label' => 'Property with mortgage'],
            ['id' => 'RENT', 'label' => 'Rent'],
            ['id' => 'BUSINESS', 'label' => 'By your company'],
            ['id' => 'Family', 'label' => 'Family'],
        ]);
    });
    Route::get('/contract-type', function (Request $request) {
        return response()->json([
            ['id' => 'FIXED', 'label' => 'Fixed'],
            ['id' => 'PART_TIME', 'label' => 'Part time'],
        ]);
    });
    Route::get('/professional-sector', function (Request $request) {
        return response()->json([
            ['id' => 'FREELANCE', 'label' => 'Freelance'],
            ['id' => 'PRIVATE', 'label' => 'Private'],
            ['id' => 'PUBLIC', 'label' => 'Public'],
            ['id' => 'PENSIONIST', 'label' => 'Pensionist'],
        ]);
    });
    Route::get('/professional-industry', function (Request $request) {
        return response()->json([
            ['id' => 'TECHNOLOGY', 'label' => 'Technology'],
        ]);
    });
    Route::get('/professional-activity', function (Request $request) {
        return response()->json([
            ['id' => 'ADMINISTRATIVE', 'label' => 'Administrative'],
        ]);
    });
    Route::get('/income-type', function (Request $request) {
        return response()->json([
            ['id' => 'SALARY', 'label' => 'Salary'],
        ]);
    });
    Route::get('/expense-type', function (Request $request) {
        return response()->json([
            ['id' => 'MORTGAGE', 'label' => 'Mortgage'],
            ['id' => 'RENT', 'label' => 'Rent'],
        ]);
    });
    Route::get('/uuid', function (Request $request) {
        return response()->json(['uuid' => \Ramsey\Uuid\Uuid::uuid4()->toString()]);
    });
});

Route::resource('/task', 'TaskController');


