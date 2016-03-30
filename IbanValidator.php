<?php
namespace mgcode\validators;

use Yii;
use yii\validators\RegularExpressionValidator;

/**
 * Validates IBAN number
 * How to use:
 * ```php
 * public function rules()
 * {
 *     return [
 *         [['attribute'], 'mgcode\validators\IbanValidator'],
 *     ];
 * }
 * ```
 */
class IbanValidator extends RegularExpressionValidator
{
    /** @inheritdoc */
    public function init()
    {
        $this->pattern = '#^[a-zA-Z]{2}[0-9]{2}[a-zA-Z0-9]{4}[0-9]{7}([a-zA-Z0-9]?){0,16}$#';
        parent::init();
    }
}