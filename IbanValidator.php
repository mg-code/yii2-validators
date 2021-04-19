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
        $this->pattern = '#^([A-Z]{2}[0-9]{2})(?=(?:[A-Z0-9]){9,30}$)((?:[A-Z0-9]{3,5}){2,7})([A-Z0-9]{1,3})?$#';
        parent::init();
    }
}
