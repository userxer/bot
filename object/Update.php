<?php namespace bot\object;

/**
 * This object represents an incoming update.
 * At most one of the optional parameters can be present in any given update.
 *
 * @method bool hasUpdateId()
 * @method bool hasMessage()
 * @method bool hasEditedMessage()
 * @method bool hasChannelPost()
 * @method bool hasEditedChannelPost()
 * @method bool hasInlineQuery()
 * @method bool hasChosenInlineResult()
 * @method bool hasCallbackQuery()
 * @method bool hasShippingQuery()
 * @method bool hasPreCheckoutQuery()
 * @method int getUpdateId($default = null)
 * @method Message getMessage($default = null)
 * @method Message getEditedMessage($default = null)
 * @method Message getChannelPost($default = null)
 * @method Message getEditedChannelPost($default = null)
 * @method InlineQuery getInlineQuery($default = null)
 * @method ChosenInlineResult getChosenInlineResult($default = null)
 * @method CallbackQuery getCallbackQuery($default = null)
 * @method ShippingQuery getShippingQuery($default = null)
 * @method PreCheckoutQuery getPreCheckoutQuery($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Update
 * @package bot\object
 * @link https://core.telegram.org/bots/api#update
 */
class Update extends Object
{

    /**
     * @return null|Chat
     */
    public function getChat()
    {
        if ($this->hasMessage()) {
            return $this->getMessage()->getChat();
        }
        if ($this->hasEditedMessage()) {
            return $this->getEditedMessage()->getChat();
        }
        if ($this->hasChannelPost()) {
            return $this->getChannelPost()->getChat();
        }
        if ($this->hasEditedChannelPost()) {
            return $this->getEditedChannelPost()->getChat();
        }

        return null;
    }

    /**
     * @return null|User
     */
    public function getFrom()
    {
        if ($this->hasMessage()) {
            return $this->getMessage()->getFrom();
        }
        if ($this->hasEditedMessage()) {
            return $this->getEditedMessage()->getFrom();
        }
        if ($this->hasChannelPost()) {
            return $this->getChannelPost()->getFrom();
        }
        if ($this->hasEditedChannelPost()) {
            return $this->getEditedChannelPost()->getFrom();
        }
        if ($this->hasInlineQuery()) {
            return $this->getInlineQuery()->getFrom();
        }
        if ($this->hasChosenInlineResult()) {
            return $this->getChosenInlineResult()->getFrom();
        }
        if ($this->hasCallbackQuery()) {
            return $this->getCallbackQuery()->getFrom();
        }
        if ($this->hasShippingQuery()) {
            return $this->getShippingQuery()->getFrom();
        }
        if ($this->hasPreCheckoutQuery()) {
            return $this->getPreCheckoutQuery()->getFrom();
        }

        return null;
    }

    /**
     * Every object have relations with other object,
     * in this method we introduce all object we have relations.
     *
     * @return array of objects
     */
    protected function relations()
    {
        return [
            'message' => Message::className(),
            'edited_message' => Message::className(),
            'channel_post' => Message::className(),
            'edited_channel_post' => Message::className(),
            'inline_query' => InlineQuery::className(),
            'chosen_inline_result' => ChosenInlineResult::className(),
            'callback_query' => CallbackQuery::className(),
            'shipping_query' => ShippingQuery::className(),
            'pre_checkout_query' => PreCheckoutQuery::className()
        ];
    }
}