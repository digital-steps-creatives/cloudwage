<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WorkPlanRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        $rules = [
            'shift_id' => 'required',
            'days_of_week' => 'required'
        ];

        if ($this->method() == 'PUT') {
            $rules [] = ['name' => 'required|unique:work_plans,name,' . $this->work_plans];

            return $rules;
        }

        $rules [] = ['name' => 'required|unique:work_plans'];

        return $rules;
    }
}
