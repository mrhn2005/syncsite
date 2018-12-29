<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    
    public function handleException($request, Exception $exception)
    {
        return 'hi';
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
         if ($exception instanceof TokenMismatchException){
            //redirect to a form when there is token mismatch
            return redirect()->back()->with('fail',"
            متاسفانه مشکلی پیش آمده است. لطفا دوباره تلاش کنید.
            ");
        }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return redirect()->back();
         }
        // if (config('app.env')=='production'){
        //     if ($exception) {
            
        //         return view('errors.exception');
        //     }
        // }
        
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
   protected function unauthenticated($request, AuthenticationException $exception)
    {
        
         
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        $guard=array_get($exception->guards(),0);
        switch ($guard) {
            case 'customer':
                $login="customer/login";
                break;
            case 'admin':
                $login="admin/login";
                break;
            case 'store':
                $login="store/login";
                break;
            default:
                $login="login";
                break;
        }
         return redirect()->guest(url($login));
    }
}
