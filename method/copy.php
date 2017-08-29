<?php namespace bot\method;

use bot\object\Error;
use bot\object\Message;
use bot\keyboard\Keyboard;

/**
 * Use this method to forward messages of any kind.
 * On success, the sent Message is returned.
 *
 * @method Message|Error send()
 * @method bool hasChatId()
 * @method bool hasDisableNotification()
 * @method bool hasReplyToMessageId()
 * @method bool hasReplyMarkup()
 * @method $this setChatId($integer)
 * @method $this setDisableNotification($boolean)
 * @method $this setReplyToMessageId($integer)
 * @method $this setReplyMarkup($markup)
 * @method $this remChatId()
 * @method $this remDisableNotification()
 * @method $this remReplyToMessageId()
 * @method $this remReplyMarkup()
 * @method string|int getChatId($default = null)
 * @method bool getDisableNotification($default = null)
 * @method int getReplyToMessageId($default = null)
 * @method Keyboard getReplyMarkup($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class copy
 * @package bot\method
 * @link https://core.telegram.org/bots/api#forwardmessage
 */
class copy extends Method
{

    /**
     * copy constructor.
     * @param string $token
     * @param Message $msg
     */
    public function __construct($token, Message $msg)
    {
        $params = $this->getParamsFromMessage($msg);
        parent::__construct($token, $params);
    }

    /**
     * Every method have a response.
     * @return string the class's name.
     */
    protected function response()
    {
        return Message::className();
    }

    /**
     * Message to array params for resend to telegram.
     * @param Message $msg
     * @return array
     */
    private function getParamsFromMessage(Message $msg)
    {
        $params = [];

        if ($msg->hasCaption()) {
            $params['caption'] = $msg->getCaption();
        }

        // sendMessage
        if ($msg->hasText()) {
            $params['method'] = 'sendMessage';
            $params['text'] = $msg->getText();
        }

        // sendPhoto
        if ($msg->hasPhoto()) {
            /* @var \bot\object\PhotoSize $photo */
            $photos = $msg->getPhoto();
            $photo = end($photos);

            $params['method'] = 'sendPhoto';
            $params['photo'] = $photo->getFileId();
        }

        // sendVideo
        if ($msg->hasVideo()) {
            $params['method'] = 'sendVideo';
            $params['video'] = $msg->getVideo()->getFileId();
        }

        // sendVideoNote
        if ($msg->hasVideoNote()) {
            $params['method'] = 'sendVideoNote';
            $params['video_note'] = $msg->getVideoNote()->getFileId();
        }

        // sendAudio
        if ($msg->hasAudio()) {
            $params['method'] = 'sendAudio';
            $params['audio'] = $msg->getAudio()->getFileId();
        }

        // sendVoice
        if ($msg->hasVoice()) {
            $params['method'] = 'sendVoice';
            $params['voice'] = $msg->getVoice()->getFileId();
        }

        // sendSticker
        if ($msg->hasSticker()) {
            $params['method'] = 'sendSticker';
            $params['sticker'] = $msg->getSticker()->getFileId();
        }

        // sendDocument
        if ($msg->hasDocument()) {
            $params['method'] = 'sendDocument';
            $params['document'] = $msg->getDocument()->getFileId();
        }

        // sendContact
        if ($msg->hasContact()) {
            $contact = $msg->getContact();
            $params['method'] = 'sendContact';
            $params['phone_number'] = $contact->getPhoneNumber();
            $params['first_name'] = $contact->getFirstName();

            if ($contact->hasLastName()) {
                $params['last_name'] = $contact->getLastName();
            }
        }

        // sendLocation
        if ($msg->hasLocation()) {
            $location = $msg->getLocation();
            $params['method'] = 'sendLocation';
            $params['latitude'] = $location->getLatitude();
            $params['longitude'] = $location->getLongitude();
        }

        // sendVenue
        if ($msg->hasVenue()) {
            $venue = $msg->getVenue();
            $location = $venue->getLocation();

            $params['method'] = 'sendVenue';
            $params['latitude'] = $location->getLatitude();
            $params['longitude'] = $location->getLongitude();

            $params['title'] = $venue->getTitle();
            $params['address'] = $venue->getAddress();

            if ($venue->hasFoursquareId()) {
                $params['foursquare_id'] = $venue->getFoursquareId();
            }
        }

        return $params;
    }
}