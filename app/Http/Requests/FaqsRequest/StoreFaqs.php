<?php

namespace App\Http\Requests\FaqsRequest;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\FaqsModel;
use App\User;

class StoreFaqs extends FormRequest
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
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'content' => ['required'],
            'photo' => ['required','image','mimes:jpeg,bmp,png,gif,svg,pdf','max:2048']
        ];
    }
}
