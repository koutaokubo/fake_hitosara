<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required | max:100',
            'genre_id'=>'integer',
             'address_code' =>  ['required', 'integer', 'digits:7'],
             'area_id' =>  'integer',
            'address'=>'required| max:200',
            'open_time'=>'required',
            'close_time'=>'required',
            'reserve_limit'=>''
        ];
    }
    public function attributes()
    {
        return [
            'name' => '名前',
            'genre_id'=>'ジャンル',
             'address_code' => '郵便番号',
             'area_id' =>  '都道府県',
            'address'=>'住所',
            'open_time'=>'営業開始時間',
            'close_time'=>'営業終了時間',
            'reserve_limit'=>'予約締切時間'
        ];
    }

     public function messages()
     {
         return [
             'name.required' => ':attributeの入力をお願いします',
             'name.max' => ':attributeは最大100字までです',
             'genre_id.integer' => ':attributeの選択をお願いします',
             'address_code.required' => ':attributeの入力をお願いします',
             'address_code.integer' => ':attributeは数字7字で入力してください',
             'address_code.digits' => ':attributeは数字7字で入力してください',
             'area_id.integer' =>  ':attributeの入力をお願いします',
             'address.required' => ':attributeの入力をお願いします',
             'address.max' => ':attributeは最大200字までです',
             'open_time.required' => ':attributeの入力をお願いします',
             'close_time.required' => ':attributeの選択をお願いします'         

         ];
}
}
