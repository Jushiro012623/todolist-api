<?php

namespace App\Traits;

trait ApiResponse
{
    protected function message($message, $status ,$data = []){
        return response()->json([
           'message' => $message,
           'status' => $status,
           'data' => $data
        ], $status);
    }

    // protected function error($message, $status){
    //     return response()->json([
    //        'message' => $message,
    //        'status' => $status
    //     ], $status);
    // }
}