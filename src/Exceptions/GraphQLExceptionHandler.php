<?php

namespace Adeel3330\GraphQLHelper\Exceptions;

class GraphQLExceptionHandler
{
    public static function handle(\Throwable $e)
    {
        return [
            'errors' => [
                [
                    'message' => $e->getMessage(),
                ]
            ]
        ];
    }
}