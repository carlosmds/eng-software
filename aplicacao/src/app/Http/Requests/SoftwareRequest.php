<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SoftwareRequest extends FormRequest
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
            'params'                                           => 'required|array',
            'params.repo_data'                                 => 'required|string',
            'params.total_lines_of_test'                       => 'required|integer',
            'params.total_test_cases'                          => 'required|integer',
            'params.total_assertions'                          => 'required|integer',
            'params.total_assertions_unit'                     => 'required|integer',
            'params.assertions_passing_unit'                   => 'required|integer',
            'params.assertions_failing_unit'                   => 'required|integer',
            'params.number_of_feature_tests'                   => 'required|integer',
            'params.number_of_feature_tests_on_last_iteration' => 'required|integer',
            'params.total_assertions_feature'                  => 'required|integer',
            'params.assertions_passing_feature'                => 'required|integer',
            'params.assertions_failing_feature'                => 'required|integer',
        ];
    }
}
