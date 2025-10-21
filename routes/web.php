<?php

use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

route::resource('home', ProdutoController::class);
