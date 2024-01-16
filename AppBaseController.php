<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;

/**
 * @OA\Server(url="/api")
 * @OA\Info(
 *   title="InfyOm Laravel Generator APIs",
 *   version="1.0.0"
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return response()->json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($data, $message, $code = 200, $silent = false)
    {
        return response()->json([
            'success' => false,
            'data' => $data,
            'message' => $message,
            'silent' => $silent
        ], $code);
    }

    public function sendSuccess($data, $message, $silent = false)
    {
        return response()->json([
            'success' => true,
            'data' => $data,
            'message' => $message,
            'silent' => $silent
        ], 200);
    }
}
