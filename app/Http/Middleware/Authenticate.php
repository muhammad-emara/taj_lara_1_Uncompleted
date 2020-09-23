<?php
    
    namespace App\Http\Middleware;
    
 
    use Illuminate\Auth\Middleware\Authenticate as Middleware;
    use Illuminate\Support\Facades\Request;

    //use Illuminate\Http\Request;
    
    class Authenticate extends Middleware
    {
        /**
         * Get the path the user should be redirected to when they are not authenticated.
         *
         * @param  \Illuminate\Http\Request $request
         *
         * @return string|null
         */
        protected function redirectTo($request)
        {
            if (!$request->expectsJson()) {
                //check if the request prefix is admin or not
                return Request::is('admin/*') ? 'IS ADMIN':'IS NOT ADMIN' ;//route('admin.login') : route('login');//default
            }
    
           
        }
    }
