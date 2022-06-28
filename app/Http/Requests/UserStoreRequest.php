<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'nama' => 'required|min:3',
            'nrp' => 'required|numeric|unique:users,nrp',
            'username' => 'required|min:5|max:20|alpha_num|unique:users,username',
            'password' => 'required|min:8|max:20|confirmed',
            'password_confirmation' => 'required|same:password',
            'role_id' => 'required',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
            'digitalsign' => 'required',
        ];
    }
}
