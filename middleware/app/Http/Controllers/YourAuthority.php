<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class YourAuthority extends Controller
{
    /**
     * Welcome message admin
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function admin() :JsonResponse
    {
        return $this->success(null,'Welcome, admin, to the platform');
    }

    /**
     * Welcome message user
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function user() :JsonResponse
    {
        return $this->success(null,'Welcome, user, to the platform');
    }
}
