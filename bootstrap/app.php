<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use Illuminate\Contracts\Console\Kernel as ConsoleKernelContract;
use Illuminate\Foundation\Console\Kernel as BaseConsoleKernel;
use App\Console\Commands\MakeModuleLivewire;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();


// 👇 Add this block just below the ->create() line:

app()->singleton(ConsoleKernelContract::class, function ($app) {
    return new class($app, $app['events']) extends BaseConsoleKernel {
        protected function commands(): void
        {
            $this->load(__DIR__ . '/../app/Console/Commands');

            $this->commands([
                MakeModuleLivewire::class,
            ]);
        }
    };
});
