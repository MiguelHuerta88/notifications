<?php
/**
 * Created by PhpStorm.
 * User: miguelhuerta
 * Date: 5/23/18
 * Time: 9:12 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\BaseModelInterface;

class BaseModel extends Model implements BaseModelInterface
{
    /**
     * Get Validation rules for model
     *
     * @return array
     */
    public function getValidationRules()
    {
        return array();
    }
}