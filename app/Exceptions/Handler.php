<?php

namespace App\Exceptions;

// use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if($exception instanceof ValidationException) {
            return   $this->convertValidationExceptionToResponse($exception, $request);
          }
          if($exception instanceof ModelNotFoundException) {
   
              return 
              response()->json(['error' => 'Does not exist any model with the specified identificator'],404);
          }
          if($exception instanceof AuthenticationException) {
              return $this->unauthenticated($request, $exception);
          }
          if($exception instanceof AuthorizationException) {
              return response()->json(['error' => $exception->getMessage()],403);
          }
          if($exception instanceof MethodNotAllowedHttpException) {
              return response()->json(['error' => 'Method for this request is invalid'],405);
          }
          if($exception instanceof NotFoundHttpException) {
              return response()->json(['error' => 'The specified URL cannot be found'],404);
          }
          if($exception instanceof HttpException) {
              return response()->json(['error' => $exception->getMessage()], $exception->getStatusCode());
          }
  
          if(config('app.debug')) {
              return parent::render($request, $exception);
          }
          return response()->json(['error' => 'Unexpected Exception Try Again Later'],500);
    }

    /**
     * Convert an authentication exception into a response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return response()->json(['message' => $exception->getMessage()], 401);
    }
    /**
     * Create a response object from the given validation exception.
     *
     * @param  \Illuminate\Validation\ValidationException  $e
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function convertValidationExceptionToResponse(ValidationException $e, $request)
    {
        $errors = $e->validator->errors()->getMessages();

        return response()->json($errors, 422);
    }
}
