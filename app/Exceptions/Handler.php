<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof FirstTimeLoginException) {
            return redirect()->route('password.request')->with('message', __('You are first time login. Enter your e-mail address to get set password link.'));
        }

        if ($exception instanceof IsPasswordResetByAdmin) {
            return redirect()->route('password.request')->with('message', __('Your password has been reset by admin.'));
        }

        if ($exception instanceof ExpiredAccountException) {
            return response()->view('errors.expired-account', [], 401);
        }

        if ($exception instanceof ExpiredPasswordException) {
            return response()->view('errors.expired-password', [], 401);
        }

        return parent::render($request, $exception);
    }
}
