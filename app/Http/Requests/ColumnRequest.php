<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColumnRequest extends FormRequest{

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    : bool{
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    : array{
        return [
            'name'     => ['required', 'string', 'max:255'],
            'board_id' => ['required', 'integer', 'exists:boards,id'],
            'position' => ['nullable', 'numeric'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    : array{
        return [
            'name.required'     => 'Name is required',
            'name.string'       => 'Name must be a string',
            'name.max'          => 'Name must not be greater than 255 characters',
            'board_id.required' => 'Board ID is required',
            'board_id.integer'  => 'Board ID must be an integer',
            'board_id.exists'   => 'Board ID must exist in the boards table',
            'position.numeric'  => 'Position must be a number',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes()
    : array{
        return [
            'name'     => 'column name',
            'board_id' => 'board ID',
            'position' => 'position',
        ];
    }
}
