<?php
namespace App\Interfaces;

/**
 * Created by PhpStorm.
 * User: miguelhuerta
 * Date: 5/23/18
 * Time: 9:10 AM
 */
interface BaseModelInterface
{
    /**
     * Get validation rules for model
     *
     * @return array
     */
    public function getValidationRules();
}