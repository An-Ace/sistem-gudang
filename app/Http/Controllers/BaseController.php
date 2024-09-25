<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
  
class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message = '', $code = 200)

    {
        $response = [
            'error' => false,
            'data'    => $result,
        ];
        if(!empty($message)){
            $response['message'] = $message;
        }
  
        return response()->json($response, $code);
    }
  
    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $code = 404, $errorMessages = [],)
    {
        $response = [
            'error' => true,
            'message' => $error,
        ];
  
        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
  
        return response()->json($response, $code);
    }
}