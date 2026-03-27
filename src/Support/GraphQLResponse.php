<?php

namespace Adeel3330\GraphQLHelper\Support;

class GraphQLResponse
{
    public static function success($data, $message = 'Success')
    {
        return [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function error($message = 'Error', $errors = [])
    {
        return [
            'status' => false,
            'message' => $message,
            'errors' => $errors,
        ];
    }
}