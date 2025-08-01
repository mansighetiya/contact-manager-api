<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BaseFormRequest;

/**
 * Class StoreContactRequest
 */
class StoreContactRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for storing a contact
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|digits_between:10,15',
        ];
    }
}
