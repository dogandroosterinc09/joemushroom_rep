<?php

namespace App\Http\Requests\TeamRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TeamMember;
use App\User;

class StoreTeam extends FormRequest
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
            'memFname' => ['required', 'string', 'max:255'],
            'memLname' => ['required', 'string', 'max:255'],
            'memPosition' => ['required', 'string', 'max:255'],
            'memPic' => ['required','image','mimes:jpeg,bmp,png,gif,svg,pdf','max:2048'],
            // 'memFile' => ['required','max:5000'],
            // 'memFile' => ['required','image','mimes:jpeg,bmp,png,gif,svg,pdf','max:2048'],
            'memBio' => ['required', 'string']
        ];
    }
}
