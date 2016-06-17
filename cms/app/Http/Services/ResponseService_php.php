<?php 

namespace App\Http\Services;

class ResponseService
{
    const RESPONSE_SUCCESS = 'SUCCESS';
    const RESPONSE_BAD_REQUEST = 'BAD_REQUEST';
    const RESPONSE_NOT_FOUND = 'NOT_FOUND';
    const RESPONSE_UNAUTHORIZED = 'UNAUTHORIZED';
    const RESPONSE_INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';
    const RESPONSE_FORBIDDEN = 'FORBIDDEN';

    const STATUS_CODE_SUCCESS = 200;
    const STATUS_CODE_BAD_REQUEST = 400;
    const STATUS_CODE_UNAUTHORIZED = 401;
    const STATUS_CODE_FORBIDDEN = 403;
    const STATUS_CODE_NOT_FOUND = 404;
    const STATUS_CODE_INTERNAL_SERVER_ERROR = 500;

    /**
     *
     * @param string $message
     * @param array $data
     * @param string|integer $code
     * @param string $response
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     */
    public static function success($message, Array $data, $code = 200, $response = 'SUCCESS', $headers = [])
    {
        return response(self::prepareResponse($message, $data, $code, $response), $code, $headers);
    }

    /**
     *
     * @param string $message
     * @param array $data
     * @param string|integer $code
     * @param string $response
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\Response|\Illuminate\Contracts\Routing\ResponseFactory
     * @throws \Exception
     */
    public static function error($message, Array $data, $code = 400, $response = 'BAD_REQUEST', $headers = [])
    {
        if(self::acceptedStatusCode($code)) {
            return response(self::prepareResponse($message, $data, $code, $response), $code, $headers);
        }
    }

    public static function prepareResponse($message, $data, $code, $response)
    {
        return [
            'http_code' => $code,
            'response_code' => $response,
            'response_msg' => $message,
            'data' => $data
        ];
    }

    public static function acceptedStatusCode($code)
    {
        if (!in_array(
                $code,
                [
                    self::STATUS_CODE_SUCCESS,
                    self::STATUS_CODE_BAD_REQUEST,
                    self::STATUS_CODE_UNAUTHORIZED,
                    self::STATUS_CODE_FORBIDDEN,
                    self::STATUS_CODE_NOT_FOUND,
                    self::STATUS_CODE_INTERNAL_SERVER_ERROR
                ]
            )
        ) {
            throw new \Exception("Http code ({$code}) is not supported yet");
        }

        return true;
    }
}
