<?php

namespace Adeel3330\GraphQLHelper\Base;

use Adeel3330\GraphQLHelper\Traits\ValidatesGraphQL;

abstract class Resolver
{
    use ValidatesGraphQL;

    public function resolve($root, $args)
    {
        $this->validate($args);

        try {
            return $this->handle($args);
        } catch (\Throwable $e) {
            return $this->error($e);
        }
    }

    abstract public function rules(): array;

    abstract public function handle($args);

    protected function error(\Throwable $e)
    {
        return app('graphql-helper')->error($e->getMessage());
    }
}