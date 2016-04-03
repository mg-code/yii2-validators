<?php
namespace mgcode\validators;

use Yii;
use yii\validators\Validator;

/**
 * Validates european vat number
 * How to use:
 * ```php
 * public function rules()
 * {
 *     return [
 *         [['attribute'], 'mgcode\validators\EuVatNumberValidator'],
 *     ];
 * }
 * ```
 */
class EuVatNumberValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} is invalid.');
        }
    }

    /**
     * @inheritdoc
     */
    protected function validateValue($value)
    {
        $valid = false;
        if(!is_array($value)) {
            foreach($this->patterns() as $pattern) {
                if(preg_match($pattern, $value)) {
                    $valid = true;
                    break;
                }
            }
        }

        return $valid ? null : [$this->message, []];
    }

    protected function patterns()
    {
        return [
            '#^ATU[A-Z0-9]{8,8}$#',
            '#^BE[0-9]{10,10}$#',
            '#^BG[0-9]{9,9}$|^BG[0-9]{10,10}$#',
            '#^CY[0-9]{8,8}[A-Z]{1,1}$#',
            '#^CZ[0-9]{8,10}$#',
            '#^DE[0-9]{9,9}$#',
            '#^DK[0-9]{8,8}$#',
            '#^EE[0-9]{9,9}$#',
            '#^ES[A-Z0-9]{1,1}[0-9]{7,7}[A-Z0-9]{1,1}$#',
            '#^FI[0-9]{8,8}$#',
            '#^FR[A-Z0-9]{2,2}[0-9]{9,9}$#',
            '#^GB[0-9]{9,9}$|^GB[0-9]{12,12}$|^GBGD[0-9]{3,3}$|^GBHA[0-9]{3,3}$#',
            '#^HU[0-9]{8,8}$#',
            '#^IE[0-9]{1,1}[A-Z0-9]{1,1}[0-9]{5,5}[A-Z]{1,1}$|^IE[0-9]{7,7}[A-W]{1,1}[A-I]{1,1}$#',
            '#^IT[0-9]{11,11}$#',
            '#^LT[0-9]{9,9}$|^LT[0-9]{12,12}$#',
            '#^LU[0-9]{8,8}$#',
            '#^LV[0-9]{11,11}$#',
            '#^MT[0-9]{8,8}$#',
            '#^NL[A-Z0-9]{9,9}B[A-Z0-9]{2,2}$#',
            '#^PL[0-9]{10,10}$#',
            '#^PT[0-9]{9,9}$#',
            '#^SE[0-9]{10,10}01$#',
            '#^SI[0-9]{8,8}$#',
            '#^SK[0-9]{10,10}$#',
            '#^RO[1-9]{1,1}[0-9]{1,9}$#',
            '#^EL[0-9]{9,9}$#',
            '#^HR[0-9]{11,11}$#',
        ];
    }
}