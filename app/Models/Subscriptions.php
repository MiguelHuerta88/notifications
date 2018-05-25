<?php
namespace App\Models;

use App\Models\BaseModel;

/**
 * Created by PhpStorm.
 * User: miguelhuerta
 * Date: 5/22/18
 * Time: 1:42 PM
 */
class Subscriptions extends BaseModel
{
    /**
     * Table to use
     *
     * @var string
     */
    protected $table = 'subscriptions';

    public $timestamps = false;

    /**
     * Validation rules that apply for this Model. When inserting or updating
     *
     * @var array
     */
    protected $rules = [
        'site_id'       => 'required|integer',
        'user_id'       => 'sometimes|required|integer',
        'endpoint'      => 'required|string',
        'subscription'  => 'required|json'
    ];

    /**
     * Mass Assignment Fillable list
     *
     * @var array
     */
    protected $fillable = ['endpoint', 'subscription', 'site_id', 'user_id'];

    /**
     * Get the validation rules to use
     *
     * @return array
     */
    public function getValidationRules()
    {
        return $this->rules;
    }
}