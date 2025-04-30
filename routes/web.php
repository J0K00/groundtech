<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\EngineerAuthController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Engineer\GeotechnicalReportController;
use App\Http\Controllers\Engineer\HomeController;

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/login', function () {
    return view('login');
})->name('login');



Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
    Route::get('/login', function () {
        return view('admin.login');
    })->name('admin.login');
    Route::get('/register', function () {
        return view('admin.register');
    })->name('admin.register');
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


// Routes d'authentification des utilisateurs
Route::prefix('user')->group(function () {
    Route::get('/register', [UserAuthController::class, 'showRegisterForm'])->name('user.register');
    Route::post('/register', [UserAuthController::class, 'register']);
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('user.login');
    Route::post('/login', [UserAuthController::class, 'login']);
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('user.logout');
    
    // Routes protégées pour les utilisateurs
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\User\HomeController::class, 'index'])->name('user.home');
        Route::get('/map', [App\Http\Controllers\User\HomeController::class, 'map'])->name('user.map');
    });
});

// Route de déconnexion globale
Route::post('/logout', function () {
    if (auth()->guard('engineer')->check()) {
        auth()->guard('engineer')->logout();
    } elseif (auth()->guard('admin')->check()) {
        auth()->guard('admin')->logout();
    } else {
        auth()->logout();
    }
    return redirect()->route('index');
})->name('logout');

// Routes d'authentification des ingénieurs
Route::prefix('engineer')->group(function () {
    Route::get('/register', [EngineerAuthController::class, 'showRegisterForm'])->name('engineer.register');
    Route::post('/register', [EngineerAuthController::class, 'register']);
    Route::get('/login', [EngineerAuthController::class, 'showLoginForm'])->name('engineer.login');
    Route::post('/login', [EngineerAuthController::class, 'login']);
    Route::post('/logout', [EngineerAuthController::class, 'logout'])->name('engineer.logout');
    
    // Routes protégées pour les ingénieurs
    Route::middleware(['auth:engineer'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('engineer.home');
        Route::get('/map', [HomeController::class, 'map'])->name('engineer.map');

        // Routes pour les rapports géotechniques
        Route::prefix('reports')->name('engineer.reports.')->group(function () {
            Route::get('/', [GeotechnicalReportController::class, 'index'])->name('index');
            Route::get('/create', [GeotechnicalReportController::class, 'create'])->name('create');
            Route::post('/', [GeotechnicalReportController::class, 'store'])->name('store');
            Route::get('/{report}', [GeotechnicalReportController::class, 'show'])->name('show');
            Route::get('/{report}/edit', [GeotechnicalReportController::class, 'edit'])->name('edit');
            Route::put('/{report}', [GeotechnicalReportController::class, 'update'])->name('update');
            Route::post('/{report}/submit', [GeotechnicalReportController::class, 'submit'])->name('submit');
        });
    });
});

// Routes d'authentification des administrateurs
Route::prefix('admin')->group(function () {
    Route::get('/register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    
    // Routes protégées pour les administrateurs
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});
