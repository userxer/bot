<?php namespace bot\object;

/**
 * This object contains basic information about an invoice.
 *
 * @method bool hasTitle()
 * @method bool hasDescription()
 * @method bool hasStartParameter()
 * @method bool hasCurrency()
 * @method bool hasTotalAmount()
 * @method string getTitle($default = null)
 * @method string getDescription($default = null)
 * @method string getStartParameter($default = null)
 * @method string getCurrency($default = null)
 * @method int getTotalAmount($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Invoice
 * @package bot\object
 * @link https://core.telegram.org/bots/api#invoice
 */
class Invoice extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [];
    }
}