<?php

namespace App\Http\Requests\TimeSheet;

use Illuminate\Foundation\Http\FormRequest;

class UpdatetimesheetsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'task_id' => 'required',
            'task_content' => 'required',
            'date'=> 'required',
            'end_date' => 'required',
            'time_spent'=> 'required'
        ];
    }

    public function messages()
    {
        return [
            'task_id.required' => 'task_id không được để trống',
            'task_content.required' => 'content task không được để trống',
            'date.required'=> 'date start không được để trống',
            'end_date.required' => 'date end không được để trống',
            'time_spent.required'=> 'time spent không được để trống'
        ];
    }
}
