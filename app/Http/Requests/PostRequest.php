<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class PostRequest extends FormRequest
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
            'title' => 'required|unique:posts,id,'.$this->id.'|min:5|max:255',
            'tags' => 'required|min:3|max:255',
            'intro' => 'required|min:50|max:5000',
            'text' => 'nullable|min:30',
        ];
    }


    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Titulok článku je povinný.',
            'title.unique' => 'Titulok článku sa už v databáze nachádza.',
            'title.min' => 'Titulok článku musí obsahovať minimálne :min znakov.',
            'title.max' => 'Titulok článku môže obsahovať maximálne :max znakov.',
            'tags.required' => 'Tagy článku je povinný.',
            'tags.min' => 'Tagy článku musí obsahovať minimálne :min znakov.',
            'tags.max' => 'Tagy článku môže obsahovať maximálne :max znakov.',
            'intro.required' => 'Úvod článku/Krátky článok je povinné.',
            'intro.min' => 'Úvod článku/Krátky článok musí obsahovať minimálne :min znakov.',
            'intro.max' => 'Úvod článku/Krátky článok môže obsahovať maximálne :max znakov.',
            'text.min' => 'Text článku musí obsahovať minimálne :min znakov.',

        ];
    }


    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'user_id' => auth()->user()->id ?? 1,
        ]);
    }
}
