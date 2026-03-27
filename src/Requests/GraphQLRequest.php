<?php

namespace Adeel3330\GraphQLHelper\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GraphQLRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return $this->route('resolver')->rules();
    }

    public function validate($args)
    {
        $validator = validator($args, $this->rules());

        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }

        return $validator->validated();
    }
}