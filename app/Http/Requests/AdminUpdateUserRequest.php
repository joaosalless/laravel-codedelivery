<?php

namespace CodeDelivery\Http\Requests;

use CodeDelivery\Http\Requests\Request;

class AdminUpdateUserRequest extends Request
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
            'name'           => 'required|max:255',
            'email'          => 'required|email|max:255',
            'password'       => 'confirmed|min:6',
            'role'           => 'required',
            'client.phone'   => 'required',
            'client.address' => 'required',
            'client.city'    => 'required',
            'client.state'   => 'required',
            'client.zipcode' => 'required',
        ];
    }
}
