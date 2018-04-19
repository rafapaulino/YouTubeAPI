# PHP GET TOTAL OF YOUTUBE SUBSCRIBERS 

## Example of use

Install: composer require rafael.paulino/youtube

```php
<?php
require_once 'vendor/autoload.php';

use YouTube\CountChannelSubscribers;

//get api key here https://console.developers.google.com/apis/credentials
$api_key = 'your api key';

//get youtube channel id here: http://johnnythetank.github.io/youtube-channel-name-converter/
$channel_id = 'your channel id';

$subscribers = new CountChannelSubscribers($api_key, $channel_id);
$resultado = $subscribers->getSubscriberCount();
var_dump($resultado);
```
