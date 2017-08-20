## Instructions

### An introduction for developers
Bots are third-party applications that run inside Telegram. Users can interact with bots by sending them messages, commands and [inline requests](https://core.telegram.org/bots#inline-mode). You control your bots using HTTPS requests to our [bot API](https://core.telegram.org/bots/api).

### How do I create a bot?
There's a… bot for that. Just talk to [BotFather](https://telegram.me/botfather) and follow a few simple steps. Once you've created a bot and received your authorization token, head down to the [Bot API manual](https://core.telegram.org/bots/api) to see what you can teach your bot to do.

> You may also like to check out some **code examples** [here »](https://core.telegram.org/bots/samples)

### Require this package with Composer
Install this package through [Composer](https://getcomposer.org/).
Edit your project's `composer.json` file to require `"khoram/bot": "*"` 
**Or** run this command in your command line:
```bash
composer require khoram/bot
```

### Create bot object
After install this package you can use it by ```bot\Bot``` in your yii2 project, example:
```php
<?php 

$bot = new \bot\Bot([
    'token' => '000000:XXXXXXXXXXXXXXXXXXXXXXXXX'
]);
```
> You even can access to **Bot** properties with static mode.

### Telegram bot API
> The Bot API is an HTTP-based interface created for developers keen on building bots for Telegram.
> To learn how to create and set up a bot, please consult our [Introduction to Bots](https://core.telegram.org/bots) and [Bot FAQ](https://core.telegram.org/bots/faq).

There is three ways for use API:
- **by Bot global object:**
  ```php
  <?php
  
  $response = Bot::$api->getMe()->send();
  ```

- **by API object:**
  ```php
  <?php
  
  $token = '000000:XXXXXXXXXXXXXXXXXXXXXXXXX';
  $api = new \bot\API($token);
  
  $response = $api->getMe()->send();
  ```

- **by Method object:**
  ```php
  <?php
  
  $token = '000000:XXXXXXXXXXXXXXXXXXXXXXXXX';
  $getMe = new \bot\method\getMe($token);
  
  $response = $getMe->send();
  ```

## Sending files
There are three ways to send files (photos, stickers, audio, media, etc.):
- If the file is already stored somewhere on the Telegram servers, you don't need to reupload it: each file object has a file_id field, simply pass this file_id as a parameter instead of uploading. There are no limits for files sent this way.
- Provide Telegram with an HTTP URL for the file to be sent. Telegram will download and send the file. 5 MB max size for photos and 20 MB max for other types of content.
- Post the file using multipart/form-data in the usual way that files are uploaded via the browser. 10 MB max size for photos, 50 MB for other files.

### Sending by URL
- When sending by URL the target file must have the correct MIME type (e.g., audio/mpeg for [sendAudio](https://core.telegram.org/bots/api#sendaudio), etc.).
- In [sendDocument](https://core.telegram.org/bots/api#senddocument), sending by URL will currently only work for gif, pdf and zip files.
- To use [sendVoice](https://core.telegram.org/bots/api#sendvoice), the file must have the type audio/ogg and be no more than 1MB in size. 1–20MB voice notes will be sent as files.
- Other configurations may work but we can't guarantee that they will.

### Sending by InputFile
This object represents the contents of a file to be uploaded. Must be posted using multipart/form-data in the usual way that files are uploaded via the browser.
```php
<?php

use bot\Bot;
use bot\InputFile;
use bot\object\Error;

$chat_id = Bot::$chat->getId();
$file = new InputFile('@web/favicon.ico');

$response = Bot::$api->sendPhoto()
    ->setChatId($chat_id)
    ->setPhoto($file)
    ->send();
    
if ($response instanceof Error) {
    // request failed
}
```
> After sending file, the file have save in cache and the next time bot sending this file is faster than the past time, every time file dose change, bot again upload the file and save in cache.

## Formatting options
The Bot API supports basic formatting for messages. You can use bold and italic text, as well as inline links and pre-formatted code in your bots' messages. Telegram clients will render them accordingly. You can use either markdown-style or HTML-style formatting.

Note that Telegram clients will display an **alert** to the user before opening an inline link (‘Open this link?’ together with the full URL).

### Markdown style
To use this mode, pass `Markdown` in the `parse_mode` field when using [sendMessage](https://core.telegram.org/bots/api#sendmessage). Use the following syntax in your message: *[More](https://core.telegram.org/bots/api#markdown-style)*

### HTML style
To use this mode, pass `HTML` in the `parse_mode` field when using [sendMessage](https://core.telegram.org/bots/api#sendmessage). The following tags are currently supported: *[More](https://core.telegram.org/bots/api#html-style)*

**Example:**
```php
<?php

use bot\ParseMode;

$chat_id = Bot::$chat->getId();
$text = '<b>bold: Hello World</b>';
        
Bot::$api->sendMessage()
    ->setParseMode(ParseMode::HTML)
    ->setChatId($chat_id)
    ->setText($text)
    ->send();
```

## Keyboards

### ReplyKeyboardMarkup
Traditional chat bots can of course be taught to understand human language. But sometimes you want some more formal input from the user — and this is where **custom keyboards** can become extremely useful.

Whenever your bot sends a message, it can pass along a special keyboard with predefined reply options (see [ReplyKeyboardMarkup](https://core.telegram.org/bots/api/#replykeyboardmarkup)). Telegram apps that receive the message will display your keyboard to the user. Tapping any of the buttons will immediately send the respective command. This way you can drastically simplify user interaction with your bot.

```php
<?php

use bot\keyboard\ReplyKeyboardMarkup;
use bot\keyboard\button\KeyboardButton;

$button = new KeyboardButton();
$button->setText('Send My Phone Number');
$button->setRequestContact(true);

$button2 = new KeyboardButton();
$button2->setText('Send My Location');
$button2->setRequestLocation(true);

$button3 = new KeyboardButton();
$button3->setText('>> Back <<');

$markup = new ReplyKeyboardMarkup();
$markup->addButton($button);
$markup->addButton($button2, 1);
$markup->addButton($button3, 2, 0);
```

### InlineKeyboardMarkup
There are times when you'd prefer to do things without sending any messages to the chat. For example, when your user is changing settings or flipping through search results. In such cases you can use Inline Keyboards that are integrated directly into the messages they belong to.

Unlike with custom reply keyboards, pressing buttons on inline keyboards doesn't result in messages sent to the chat. Instead, inline keyboards support buttons that work behind the scenes: [callback buttons](https://core.telegram.org/bots/2-0-intro#callback-buttons), [URL buttons](https://core.telegram.org/bots/2-0-intro#url-buttons) and [switch to inline buttons](https://core.telegram.org/bots/2-0-intro#switch-to-inline-buttons).

When callback buttons are used, your bot can update its existing messages (or just their keyboards) so that the chat remains tidy. Check out these sample bots to see inline keyboards in action: [@music](https://telegram.me/music), [@vote](https://telegram.me/vote), [@like](https://telegram.me/like).

> [Read more about inline keyboards and on-the-fly editing »](https://core.telegram.org/bots/2-0-intro#new-inline-keyboards)

```php
<?php

use bot\keyboard\InlineKeyboardMarkup;
use bot\keyboard\button\InlineKeyboardButton;

$button = new InlineKeyboardButton();
$button->setText('Google');
$button->setUrl('https://google.com');
        
$button2 = new InlineKeyboardButton();
$button2->setText('Other Chat');
$button2->setSwitchInlineQueryCurrentChat(true);
        
$button3 = new InlineKeyboardButton();
$button3->setText('Update Text');
$button3->setCallbackData('update_text');
        
$markup = new InlineKeyboardMarkup();
$markup->addButton($button);
$markup->addButton($button, 0);
$markup->addButton($button, 1, 0);
```

### Send Keyboard:
```php
<?php

use bot\ParseMode;

// $markup create before, like sample on top

$chat_id = Bot::$chat->getId();
$text = '<b>bold: Hello World</b>';
        
Bot::$api->sendMessage()
    ->setParseMode(ParseMode::HTML)
    ->setReplyMarkup($markup)
    ->setChatId($chat_id)
    ->setText($text)
    ->send();
```

## InlineQueryResult
This object represents one result of an inline query. Telegram clients currently support results of the following 20 types:

- [InlineQueryResultCachedAudio](https://core.telegram.org/bots/api#inlinequeryresultcachedaudio)
- [InlineQueryResultCachedDocument](https://core.telegram.org/bots/api#inlinequeryresultcacheddocument)
- [InlineQueryResultCachedGif](https://core.telegram.org/bots/api#inlinequeryresultcachedgif)
- [InlineQueryResultCachedMpeg4Gif](https://core.telegram.org/bots/api#inlinequeryresultcachedmpeg4gif)
- [InlineQueryResultCachedPhoto](https://core.telegram.org/bots/api#inlinequeryresultcachedphoto)
- [InlineQueryResultCachedSticker](https://core.telegram.org/bots/api#inlinequeryresultcachedsticker)
- [InlineQueryResultCachedVideo](https://core.telegram.org/bots/api#inlinequeryresultcachedvideo)
- [InlineQueryResultCachedVoice](https://core.telegram.org/bots/api#inlinequeryresultcachedvoice)
- [InlineQueryResultArticle](https://core.telegram.org/bots/api#inlinequeryresultarticle)
- [InlineQueryResultAudio](https://core.telegram.org/bots/api#inlinequeryresultaudio)
- [InlineQueryResultContact](https://core.telegram.org/bots/api#inlinequeryresultcontact)
- [InlineQueryResultGame](https://core.telegram.org/bots/api#inlinequeryresultgame)
- [InlineQueryResultDocument](https://core.telegram.org/bots/api#inlinequeryresultdocument)
- [InlineQueryResultGif](https://core.telegram.org/bots/api#inlinequeryresultgif)
- [InlineQueryResultLocation](https://core.telegram.org/bots/api#inlinequeryresultlocation)
- [InlineQueryResultMpeg4Gif](https://core.telegram.org/bots/api#inlinequeryresultmpeg4gif)
- [InlineQueryResultPhoto](https://core.telegram.org/bots/api#inlinequeryresultphoto)
- [InlineQueryResultVenue](https://core.telegram.org/bots/api#inlinequeryresultvenue)
- [InlineQueryResultVideo](https://core.telegram.org/bots/api#inlinequeryresultvideo)
- [InlineQueryResultVoice](https://core.telegram.org/bots/api#inlinequeryresultvoice)

### Send InlineQueryResultArticle
```php
<?php

use bot\Bot;
use bot\input\InputTextMessageContent;
use bot\inline\InlineQueryResultArticle;

Bot::query('article ${id?, \d+}', function ($id = 1) {

    $inline = Bot::$update->getInlineQuery();
    $input = (new InputTextMessageContent())
        ->setMessageText('Article ID: ' . $id);

    $results[] = (new InlineQueryResultArticle())
        ->setId('article_' . $id)
        ->setTitle('Hello World!!')
        ->setInputMessageContent($input)
        ->setDescription('This is sample.');
        // ->addTo($results);

    $response = Bot::$api->answerInlineQuery()
        ->setCacheTime(300)
        ->setResults($results)
        ->setInlineQueryId($inline->getId())
        ->send();
        
});
```

## Regular Expression
The Bot object useing "Comparator" Class to make easy, and fast to create Bot commands. for Example:
```
/start [action] [value]
```
We have 2 variables in this query send from telegram users.
To set this variables we should create patterns, like this:
```
/start ${action} ${value}
```
Variables can be optional or can have personal pattern, Example:
```
Optional        --> ${param?}
With Pattern    --> ${param, \w+}
Both            --> ${param?, \w+}
```

### Can use Patterns in:
```php
<?php

use bot\Bot;

// Comparator with user text
Bot::text($pattern, $callback);
Bot::editedText($pattern, $callback);

// Comparator with Channel Post
Bot::channelText($pattern, $callback);
Bot::editedChannelText($pattern, $callback);

// Comparator with inlineQuery
Bot::query($pattern, $callback);

// Comparator with ChosenInlineResult
Bot::result($pattern, $callback);

// Comparator with CallbackQuery
Bot::data($pattern, $callback);

// Comparator with ShippingQuery
Bot::shipping($pattern, $callback);

// Comparator with PreCheckoutQuery
Bot::preCheckout($pattern, $callback);
```
