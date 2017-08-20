<?php namespace bot\object;

/**
 * This object represents a sticker set.
 *
 * @method bool hasName()
 * @method bool hasTitle()
 * @method bool hasContainsMasks()
 * @method bool hasStickers()
 * @method string getName($default = null)
 * @method string getTitle($default = null)
 * @method bool getContainsMasks($default = null)
 * @method Sticker[] getStickers($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class StickerSet
 * @package bot\object
 * @link https://core.telegram.org/bots/api#stickerset
 */
class StickerSet extends Object
{

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'stickers' => Sticker::className()
        ];
    }
}