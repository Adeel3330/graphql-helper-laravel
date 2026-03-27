<?php

namespace Adeel3330\GraphQLHelper\Facades;

use Illuminate\Support\Facades\Facade;

class GraphQLHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'graphql-helper';
    }
}