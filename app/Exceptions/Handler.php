<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
    
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
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
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof QueryException) {
            $codigo = $exception->errorInfo[1];
            return response()->json([
                'data' => $exception->getMessage()
            ], 400);
        }

        if ($exception instanceof ModelNotFoundException &&
             $request->wantsJson()) {
            return response()->json([
                'data' => 'Resource not found'
            ], 404);
        }

        if ($exception instanceof ValidationException) {
            return response()->json([
                'data' => $exception->validator->errors()->getMessages()
            ], 400);
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json([
                'data' => 'The method is not supported for this route'
            ], 405);
        }

        return parent::render($request, $exception);
    }
}
