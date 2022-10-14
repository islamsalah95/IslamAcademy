<?php
namespace App\Traits;
/**
 *
 */
trait ApiTraits
{
public static function successMessage(string $message="", int $statusCode=200){
return response()->json([
    'success'=>true,
    'message'=>$message,
    'data'=>(object)[],
    'errors'=>(object)[],
],$statusCode);}



public static function errorMessage(array $errors,string $message='',int $statusCode=404){
return response()->json([
    'success'=>false,
    'message'=>$message,
    'data'=>(object)[],
    'errors'=>(object)$errors,
], $statusCode);}


public static function data(array $data,string $message='',int $statusCode=200){
    return response()->json([
        'success'=>true,
        'message'=>$message,
        'data'=>(object)$data,
        'errors'=>(object)[],
    ],$statusCode);
}



}


