<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardRequest extends FormRequest{

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
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'board_id'    => ['required', 'integer', 'exists:boards,id'],
            'column_id'   => ['required', 'integer', 'exists:columns,id'],
            'created_by'  => ['required', 'integer', 'exists:users,id'],
            'assigned_to' => ['nullable', 'integer', 'exists:users,id'],
            'position'    => ['nullable', 'numeric'],
            'due_date'    => ['nullable', 'date', 'after_or_equal:today'],
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
            'title.required'          => 'Title is required',
            'title.string'            => 'Title must be a string',
            'title.max'               => 'Title must not be greater than 255 characters',
            'description.string'      => 'Description must be a string',
            'description.max'         => 'Description must not be greater than 255 characters',
            'board_id.required'       => 'Board ID is required',
            'board_id.integer'        => 'Board ID must be an integer',
            'board_id.exists'         => 'Board ID must exist in the boards table',
            'column_id.required'      => 'Column ID is required',
            'column_id.integer'       => 'Column ID must be an integer',
            'column_id.exists'        => 'Column ID must exist in the columns table',
            'created_by.required'     => 'Created by is required',
            'created_by.integer'      => 'Created by must be an integer',
            'created_by.exists'       => 'Created by must exist in the users table',
            'assigned_to.integer'     => 'Assigned to must be an integer',
            'assigned_to.exists'      => 'Assigned to must exist in the users table',
            'position.numeric'        => 'Position must be a number',
            'due_date.date'           => 'Due date must be a date',
            'due_date.after_or_equal' => 'Due date must be after or equal to today',
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
            'title'       => 'title',
            'description' => 'description',
            'board_id'    => 'board ID',
            'column_id'   => 'column ID',
            'created_by'  => 'created by',
            'assigned_to' => 'assigned to',
            'position'    => 'position',
            'due_date'    => 'due date',
        ];
    }
}
