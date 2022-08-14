<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class ProductCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $userID = Session::get('user_details');
        // dd($userID->user_type);
        if($userID->user_type == 'admin')
            return true;
        else
            return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cat_id' => 'required|numeric|exists:product_categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|bail|max:200|',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'quantity' => 'required|integer',
            'description' => 'required',
        ];
    }

    public function messages() {
        return [
            'cat_id.required' => 'Choose which category this product belongs.',
            'name.required' => 'Product name is required.',
            'price.required' => 'Product price is required.',
            'quantity.required' => 'Product quantity is required.',
            'description.required' => 'Product description is required.',
            'image.required' => 'Product image is required.',
            'image.mimes' => 'huh.',
            'image.image' => 'File uploaded is not an image.',
            'image.max' => 'File uploaded exceed required size.',
        ];
    }
}
