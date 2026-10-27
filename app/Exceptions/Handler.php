<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Models\ExceptionLog;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            try {
                ExceptionLog::create([
                    'message' => $e->getMessage(),
                    'file'    => $e->getFile(),
                    'line'    => $e->getLine(),
                    'trace'   => $e->getTraceAsString(),
                    'url'     => request()->fullUrl() ?? null,
                    'method'  => request()->method() ?? null,
                    'ip'      => request()->ip() ?? null,
                    'user_id' => auth()->check() ? auth()->id() : null,
                ]);
            } catch (\Exception $ex) {
                // Prevent infinite loop if DB logging fails
            }
        });
    }

    //SANI: show 500 error on exception
    public function render($request, Throwable $e)
    {
        
        if (app()->environment('production')) 
        {
            return response()->view('errors.500', [], 500);
        }

        return parent::render($request, $e);
    }
    
}
