<?php namespace bot\object;

/**
 * This object represents a message.
 *
 * @method bool hasMessageId()
 * @method bool hasFrom()
 * @method bool hasDate()
 * @method bool hasChat()
 * @method bool hasForwardFrom()
 * @method bool hasForwardFromChat()
 * @method bool hasForwardFromMessageId()
 * @method bool hasForwardDate()
 * @method bool hasReplyToMessage()
 * @method bool hasEditDate()
 * @method bool hasText()
 * @method bool hasEntities()
 * @method bool hasAudio()
 * @method bool hasDocument()
 * @method bool hasGame()
 * @method bool hasPhoto()
 * @method bool hasSticker()
 * @method bool hasVideo()
 * @method bool hasVoice()
 * @method bool hasVideoNote()
 * @method bool hasNewChatMembers()
 * @method bool hasCaption()
 * @method bool hasContact()
 * @method bool hasLocation()
 * @method bool hasVenue()
 * @method bool hasNewChatMember()
 * @method bool hasLeftChatMember()
 * @method bool hasNewChatTitle()
 * @method bool hasNewChatPhoto()
 * @method bool hasDeleteChatPhoto()
 * @method bool hasGroupChatCreated()
 * @method bool hasSupergroupChatCreated()
 * @method bool hasChannelChatCreated()
 * @method bool hasMigrateToChatId()
 * @method bool hasMigrateFromChatId()
 * @method bool hasPinnedMessage()
 * @method bool hasInvoice()
 * @method bool hasSuccessfulPayment()
 * @method int getMessageId($default = null)
 * @method User getFrom($default = null)
 * @method int getDate($default = null)
 * @method Chat getChat($default = null)
 * @method User getForwardFrom($default = null)
 * @method Chat getForwardFromChat($default = null)
 * @method int getForwardFromMessageId($default = null)
 * @method int getForwardDate($default = null)
 * @method Message getReplyToMessage($default = null)
 * @method int getEditDate($default = null)
 * @method string getText($default = null)
 * @method MessageEntity[] getEntities($default = null)
 * @method Audio getAudio($default = null)
 * @method Document getDocument($default = null)
 * @method Game getGame($default = null)
 * @method PhotoSize[] getPhoto($default = null)
 * @method Sticker getSticker($default = null)
 * @method Video getVideo($default = null)
 * @method Voice getVoice($default = null)
 * @method VideoNote getVideoNote($default = null)
 * @method User[] getNewChatMembers($default = null)
 * @method string getCaption($default = null)
 * @method Contact getContact($default = null)
 * @method Location getLocation($default = null)
 * @method Venue getVenue($default = null)
 * @method User getNewChatMember($default = null)
 * @method User getLeftChatMember($default = null)
 * @method string getNewChatTitle($default = null)
 * @method PhotoSize[] getNewChatPhoto($default = null)
 * @method true getDeleteChatPhoto($default = null)
 * @method true getGroupChatCreated($default = null)
 * @method true getSupergroupChatCreated($default = null)
 * @method true getChannelChatCreated($default = null)
 * @method int getMigrateToChatId($default = null)
 * @method int getMigrateFromChatId($default = null)
 * @method Message getPinnedMessage($default = null)
 * @method Invoice getInvoice($default = null)
 * @method SuccessfulPayment getSuccessfulPayment($default = null)
 *
 * @author Mehdi Khodayari <mehdi.khodayari.khoram@gmail.com>
 * @since 2.0.1
 *
 * Class Message
 * @package bot\object
 * @link https://core.telegram.org/bots/api#message
 */
class Message extends Object
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
            'from' => User::className(),
            'chat' => Chat::className(),
            'forward_from' => User::className(),
            'forward_from_chat' => Chat::className(),
            'reply_to_message' => Message::className(),
            'entities' => MessageEntity::className(),
            'audio' => Audio::className(),
            'document' => Document::className(),
            'game' => Game::className(),
            'photo' => PhotoSize::className(),
            'sticker' => Sticker::className(),
            'video' => Video::className(),
            'voice' => Voice::className(),
            'video_note' => VideoNote::className(),
            'contact' => Contact::className(),
            'location' => Location::className(),
            'venue' => Venue::className(),
            'new_chat_member' => User::className(),
            'left_chat_member' => User::className(),
            'new_chat_photo' => PhotoSize::className(),
            'pinned_message' => Message::className(),
            'invoice' => Invoice::className(),
            'successful_payment' => SuccessfulPayment::className()
        ];
    }
}