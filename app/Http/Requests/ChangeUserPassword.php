<?php

namespace App\Http\Requests;

use App\Auth;
use App\Rules\CurrentPassword;
use Illuminate\Foundation\Http\FormRequest;

class ChangeUserPassword extends FormRequest
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
            'current_password' => [(Auth::user()->password_change_at != null) ? 'required' : '', new CurrentPassword],
            'password' => ['required', 'confirmed', 'min:8'],
        ];
    }
}
