<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'nullable|min:3|max:50',
            'email'=>'required|email',
            'message'=>'required|min:10|max:1000'
        ];
    }


    public function messages()
    {
        return [
            'name.min'=>'Meno musí obsahovať minimálne :min znakov.',
            'name.max'=>'Meno môže obsahovať maximálne :max znakov.',
            'email.required'=>'Email nemôže byť prázdny.',
            'email.email'=>'Neplatný formát emailovej adresy.',
            'message.required'=>'Správa nemôže byť prázdna.',
            'message.min'=>'Správa musí obsahovať minimálne :min znakov.',
            'message.max'=>'Správa môže obsahovať maximálne :max znakov.',
        ];
    }

}
