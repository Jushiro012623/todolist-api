<?php

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Mockery\Exception\InvalidOrderException;
use Symfony\Component\Console\Exception\CommandNotFoundException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //if($request->is('api/*')) {
        // if($request->is('api/*')){

        //     if($exceptions instanceof InvalidOrderException ){
        //             return response()->json([
        //                 'message' => $exceptions->getMessage(),
        //                 'status'  => false
        //             ], 500);
        //         }
            
        //         if($exceptions instanceof CommandNotFoundException ){
        //             return response()->json([
        //                 'message' => $exceptions->getMessage(),
        //                 'status'  => false
        //             ], 404);
        //         }
            
        //         if($exceptions instanceof MethodNotAllowedHttpException ){
        //             return response()->json([
        //                 'message' => 'Method not allowed',
        //                 'status'  => false
        //             ], 405);
        //         }
            
        //         if($exceptions instanceof NotFoundHttpException){
        //             return response()->json([
        //                 // 'message' => $e->getMessage(),
        //                 'message' => 'Record not found.',
        //                 'status'  => false
        //             ], 404);
        //         }
        // }
        

    })->create();
