<?php

namespace App\Http\Requests\Contact;

use App\Http\Requests\BaseFormRequest;

/**
 * Class UpdateContactRequest
 */
class UpdateContactRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Validation rules for updating a contact.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
         return [
            'name'  => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:contacts,email,' . $this->contact,
            'phone' => 'sometimes|digits_between:10,15',
        ];
    }
}
