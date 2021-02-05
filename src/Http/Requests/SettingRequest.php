<?php

namespace Pratiksh\Laramin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'sometimes|max:255',
            'discription' => 'nullable|max:4000',
            'keywords' => 'nullable|max:255',
            'author' => 'nullable|max:255',
            'logo' => 'nullable|file|image|max:2000',
            'favicon' => 'nullable|file|image|max:500',
            'og_title' => 'nullable|max:255',
            'og_discription' => 'nullable|max:2000',
            'og_image' => 'nullable|file|image|max:3000',
            'phone_no' => 'nullable',
            'address' => 'nullable|max:255',
            'email' => 'nullable',
            'map' => 'nullable',
            'excerpt' => 'nullable|max:3000',
            'about_us' => 'nullable|max:3000',
            'why_us' => 'nullable|max:3000',
            'slogan' => 'nullable',
            'facebook' => 'nullable|max:255',
            'instagram' => 'nullable|max:255',
            'twitter' => 'nullable|max:255',
            'banner' => 'sometimes|file|image|max:3000'
        ];
    }
}
