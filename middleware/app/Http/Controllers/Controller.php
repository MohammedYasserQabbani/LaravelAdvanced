<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    /**
     * Return success with json response
     * 
     * @param mixed $data
     * @param string $message
     * @param int $statuseCode
     * @return JsonResponse
     */

    public function success(mixed $data,string $message ="okay",int $statuseCode = 200):JsonResponse
    {
        return response()->json([
            'data' => $data,
            'success' => true,
            'message' => $message,
        ],$statuseCode);
    }
    /**
     * Return as error with json response
     *
     *@param string $message
     *@param int $statuseCode
     *@return JsonResponse
     */
    public function error(string $message,int $statuseCode = 400):JsonResponse
    {
        return response()->json([
            'data' => null,
            'success' => false,
            'message' =>$message
        ],$statuseCode);
    }
}
