<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CheckAbsWords;
use Illuminate\Support\Facades\Storage;

class StoreLectureRequest extends FormRequest
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
            'name'=>'required|max:16',
            'email'=>'required|email',
            'country'=>'required|max:32',
            'password'=>'required|confirmed|between:4,8',
            'title'=>'required',
            'author_name'=>'required|max:64',
            'author_affiliation'=>'required|max:128',
            'abstract'=>['required',new CheckAbsWords($this->type)],
            'keyword.*'=>'',
            'abstract_file'=>'required',
            'co_name.*'=>'max:16',
            'co_country.*'=>'max:32',
            'co_email.*'=>'max:64',
            'co_cellphone.*'=>'max:14',
            'co_telephone.*'=>'max:14',
        ];
    }

    protected function prepareForValidation()
    {
        foreach($this->co_name as $k=>$v) {
            $co_authors[] = [
                "name"=>$this->co_name[$k],
                "country"=>$this->co_country[$k],
                "affiliation"=>$this->co_affiliation[$k],
                "email"=>$this->co_email[$k],
                "cellphone"=>$this->co_cellphone[$k],
                "telephone"=>$this->co_telephone[$k],
            ];
        }

        $json_de_abstract = json_decode($this->abstract_file[0]);
        foreach($json_de_abstract as $k => $v){
            $abstract_file[$k] = [
                'Original'  => $v->Original,
                'Tmpname'   => $v->Tmpname,
                'Ext'       => $v->Ext
            ];
            if(Storage::disk('tmp')->exists($abstract_file[$k]['Tmpname'])){
                Storage::move('tmp/'.$abstract_file[$k]['Tmpname'],'lecture/'.$abstract_file[$k]['Tmpname']);
            }
        }
        $this->merge([
            'author_info' => [
                'affiliation'=>$this->author_affiliation,
                'name'=>$this->author_name
            ],
            'co_authors' => $co_authors,
            'presenter' => [
                'name'=>$this->ps_name,
                'country'=>$this->ps_country,
                'affiliation'=>$this->ps_affiliation,
                'email'=>$this->ps_email,
                'cellphone'=>$this->ps_cellphone,
                'telephone'=>$this->ps_telephone,
            ],
            'abstract_file' => $abstract_file,
        ]);
    }
}
