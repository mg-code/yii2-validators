<?php
namespace mgcode\validators;

use Yii;
use yii\validators\Validator;

/**
 * Casts integer and float to string.
 * Often used before string validator.
 * How to use:
 * ```php
 * public function rules()
 * {
 *     return [
 *         [['attribute'], 'mgcode\validators\CastNumberToStringValidator'],
 *     ];
 * }
 * ```
 */
class CastNumberToStringValidator extends Validator
{
    /** @inheritdoc */
    public function validateAttribute($model, $attribute)
    {
        if (is_int($model->$attribute) || is_float($model->$attribute)) {
            $model->$attribute = (string) $model->$attribute;
        }
    }
}