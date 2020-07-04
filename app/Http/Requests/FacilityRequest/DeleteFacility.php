<?php

namespace App\Http\Requests\FacilityRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FacilityModel;
use App\User;

class DeleteFacility extends FormRequest
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
        return [
            'id' => ['required'],
        ];
    }
}
