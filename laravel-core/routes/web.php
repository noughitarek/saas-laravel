<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', function(){
    return '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Select Dashboard</title>
        <style>
            body {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
            }
            h1 {
                font-size: 2em;
                margin: 0.5em;
            }
            .link-container {
                text-align: center;
            }
            .link-container a {
                display: inline-block;
                margin: 20px;
                padding: 20px;
                background-color: #4CAF50;
                color: white;
                text-decoration: none;
                border-radius: 10px;
                transition: background-color 0.3s, transform 0.3s;
            }
            .link-container a:hover {
                background-color: #45a049;
                transform: scale(1.05);
            }
        </style>
    </head>
    <body>
    
    <div class="link-container">
        <a href='.route('dashboard.admins').'><h1>Admin</h1></a>
        <a href='.route('dashboard.investors').'><h1>Investor</h1></a>
    </div>
    
    </body>
    </html>
    ';
});
require __DIR__.'/admins.php';
require __DIR__.'/investors.php';
