<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
            'nama' => 'required',
            'nrp' => ['required', 'numeric', Rule::unique('users')->ignore($this->id)],
            'username' => ['required', 'min:5', 'max:20', 'alpha_num', Rule::unique('users')->ignore($this->id)],
            'role_id' => 'required',
            'bidang_id' => 'required',
            'subbidang_id' => 'required',
            'pangkat_id' => 'required',
            'jabatan_id' => 'required',
        ];
    }
}
