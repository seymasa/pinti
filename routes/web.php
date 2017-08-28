<?php

/**
 * FRONT-OFFICE
 */

Route::group(["as" => "front.", "namespace" => "Front"], function(){
    Route::get("/", ["as" => "home.index", "uses" => "HomeController@index"]);
});

/**
 * APPLICATION
 */

Route::group(["as" => "app.", "namespace" => "App", "prefix" => "app"], function(){

    // User Authenticated Group
    Route::group(["middleware" => ["auth"]], function(){

        Route::get("/", ["as" => "dashboard.index", "uses" => "DashboardController@index"]);

        Route::get('logout', function(){
            auth()->logout();
        });

    });

    // Guest Group
    Route::group(["middleware" => ["guest"]], function(){

        Route::group(["as" => "auth."], function(){
            Route::get("login", ["as" => "login", "uses" => "AuthController@login"]);
            Route::post("login", ["as" => "login", "uses" => "AuthController@doLogin"]);

            Route::get("register", ["as" => "register", "uses" => "AuthController@register"]);
            Route::post("register", ["as" => "register", "uses" => "AuthController@doRegister"]);
        });

    });
});