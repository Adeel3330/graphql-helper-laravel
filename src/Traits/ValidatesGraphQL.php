<?php

namespace Adeel3330\GraphQLHelper\Traits;

trait ValidatesGraphQL
{
    protected function validate($args)
    {
        if (method_exists($this, 'rules')) {
            validator($args, $this->rules())->validate();
        }
    }
}