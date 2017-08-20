<?php namespace bot\method;

use bot\object\Error;

/**
 * Use this method to restrict a user in a supergroup.
 * The bot must be an administrator in the supergroup for this to
 * work and must have the appropriate admin rights.
 * Pass True for all boolean parameters to lift restrictions
 * from a user. Returns True on success.
 *
 * @method true|Error send()
 * @method bool hasChatId()
 * @method bool hasUserId()
 * @method bool hasUntilDate()
 * @method bool hasCanSendMessages()
 * @method bool hasCanSendMediaMessages()
 * @method bool hasCanSendOtherMessages()
 * @method bool hasCanAddWebPagePreviews()
 * @method $this setChatId($integer)
 * @method $this setUserId($integer)
 * @method $this setUntilDate($integer)
 * @method $this setCanSendMessages($boolean)
 * @method $this setCanSendMediaMessages($boolean)
 * @method $this setCanSendOtherMessages($boolean)
 * @method $this setCanAddWebPagePreviews($boolean)
 * @method $this delChatId()
 * @method $this delUserId()
 * @method $this delUntilDate()
 * @method $this delCanSendMessages()
 * @method $this delCanSendMediaMessages()
 * @method $this delCanSendOtherMessages()
 * @method $this delCanAddWebPagePreviews()
 * @method int getChatId($default = null)
 * @method int getUserId($default = null)
 * @method int getUntilDate($default = null)
 * @method bool getCanSendMessages($default = null)
 * @method bool getCanSendMediaMessages($default = null)
 * @method bool getCanSendOtherMessages($default = null)
 * @method bool getCanAddWebPagePreviews($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class restrictChatMember
 * @package bot\method
 * @link https://core.telegram.org/bots/api#restrictchatmember
 */
class restrictChatMember extends Method
{

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return true;
    }
}