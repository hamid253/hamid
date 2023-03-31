
hamid253
/
hamid
Public
Code
Issues

<?php
// توکن API پنل فروش v2ray
$token = 'your_token';

// اطلاعات کاربری برای اتصال به سرور v2ray
$username = 'admini';
$password = 'admini';
$server = 'http://neth1.konkour.top';

// تعیین متغیرهای دیگر برای ایجاد کانفیگ v2ray
$email = 'example@gmail.com';
$level = '1';
$alterId = '64';

// ایجاد یک نمونه از کلاس cURL برای ارسال درخواست به API پنل فروش v2ray
$ch = curl_init();

// تنظیم پارامترهای ارسال درخواست به API
curl_setopt($ch, CURLOPT_URL, 'https://app.v2raypanel.com/api/create');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// تعیین پارامترهای ارسال درخواست به API
$postData = [
    'token' => $token,
    'email' => $email,
    'server' => $server,
    'username' => $username,
    'password' => $password,
    'level' => $level,
    'alterId' => $alterId,
    'network' => 'tcp',
    'domain' => '',
    'port' => '8080',
    'id' => '',
    'ws_path' => '',
    'ssl' => 'off',
    'tls' => '',
    'status' => '1',
];

// ارسال درخواست به API با استفاده از پارامترهای تنظیم شده
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
$response = curl_exec($ch);

//
<?php
// توکن API پنل فروش v2ray
$token = 'your_token';

// اطلاعات کاربری برای اتصال به سرور v2ray
$username = 'admini';
$password = 'admini';
$server = 'http://neth1.konkour.top';

// تعیین متغیرهای دیگر برای ایجاد کانفیگ v2ray
$email = 'example@gmail.com';
$level = '1';
$alterId = '64';

// ایجاد یک نمونه از کلاس cURL برای ارسال درخواست به API پنل فروش v2ray
$ch = curl_init();

// تنظیم پارامترهای ارسال درخواست به API
curl_setopt($ch, CURLOPT_URL, 'https://app.v2raypanel.com/api/create');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

// تعیین پارامترهای ارسال درخواست به API
$postData = [
    'token' => $token,
    'email' => $email,
    'server' => $server,
    'username' => $username,
    'password' => $password,
    'level' => $level,
    'alterId' => $alterId,
    'network' => 'tcp',
    'domain' => '',
    'port' => '8080',
    'id' => '',
    'ws_path' => '',
    'ssl' => 'off',
    'tls' => '',
    'status' => '1',
];

// ارسال درخواست به API با استفاده از پارامترهای تنظیم شده
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
$response = curl_exec($ch);

// بررسی صحت ارسال درخواست به API و نمایش خطاهای مربوطه
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    // نمایش پاسخ دریافتی از API
    echo $response;
}

// بستن اتصال به API
curl_close($ch);
?>
<?php
// تعریف متغیرها
$botToken = "your_bot_token";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
$update = json_decode($update, true);
$chatId = $update["message"]["chat"]["id"];
$message = $update["message"]["text"];

// تعریف متغیرهای مورد نیاز برای کانفیگ
$username = "admini";
$password = "admini";
$server = "http://neth1.konkour.top";

// اگر کاربر دستور /buy رو ارسال کرد
if (strpos($message, "/buy") === 0) {
    $config = "v2ray://".$username.":".$password."@".$server;
    $paymentLink = "https://example.com/payment"; // لینک پرداخت
    $response = "لطفا برای خریداری کانفیگ به لینک زیر بروید و پس از پرداخت، کانفیگ خود را دریافت کنید:\n\n".$config."\n\n".$paymentLink;
    file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=".urlencode($response));
}
<?php

// تعریف توکن ربات تلگرام
$botToken = 'YOUR_BOT_TOKEN';

// تعریف آدرس پنل v2ray
$v2rayPanelUrl = 'http://neth1.konkour.top';

// تعریف نام کاربری و رمز عبور پنل v2ray
$v2rayPanelUsername = 'admini';
$v2rayPanelPassword = 'admini';

// تعریف پیام اولیه که به کاربر ارسال می‌شود
$welcomeMessage = "به فروشگاه v2ray خوش آمدید.\nلطفا ابتدا نام کاربری و رمز عبور خود را وارد کنید:";

// تعریف دستورات ربات تلگرام
$commands = [
    '/start' => 'startCommand',
    '/cancel' => 'cancelCommand',
    '/set_user' => 'setUsernameCommand',
    '/set_pass' => 'setPasswordCommand',
    '/set_server' => 'setServerCommand',
    '/get_config' => 'getConfigCommand',
];

// تعریف متغیرهای ذخیره اطلاعات کاربر
$userData = [
    'username' => null,
    'password' => null,
    'server' => null,
];

// ایجاد یک ارتباط با پنل v2ray
function createV2rayPanelConnection($url, $username, $password)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "username={$username}&password={$password}");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
}

// دریافت کانفیگ v2ray با استفاده از نام کاربری، رمز عبور و آدرس سرور
function getV2rayConfig($username, $password, $server)
{
    $url = $server . "/v2ray/get_config.php?username={$username}&password={$password}";
    $result = file_get_contents($url);

    return $result;
}

// تعریف تابع برای ارسال پیام به کاربر
function sendMessage($chatId, $message, $replyMarkup = null)
{
    $postData = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
        'reply_markup' => $replyMarkup,
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot{$GLOBALS['botToken']}/sendMessage");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
namespace App\Commands;

use Telegram\Bot\Commands\Command;

class StartCommand extends Command
{
    protected $name = "start";

    protected $description = "Start Command to get you started";

    public function handle($arguments)
    {
        $this->replyWithMessage([
            'text' => "Welcome to V2Ray Sales Bot! Here you can buy V2Ray configs to use on your device. To get started, send /buy to see the available options.",
        ]);
    }
}
<?php
$token = 'your_bot_token';
$chat_id = 'your_chat_id';
$server = 'http://neth1.konkour.top';
$port = '10000';
$admin_username = 'admini';
$admin_password = 'admini';

$update = json_decode(file_get_contents('php://input'), true);

if (isset($update["message"])) {
  $message = $update["message"];
  if (isset($message["text"])) {
    $text = $message["text"];
    if ($text == '/start') {
      $reply = "Welcome to V2Ray configuration bot. Please send your username and password in the following format:\n\nUsername:password";
      sendMessage($chat_id, $reply, $token);
    } else if (strpos($text, ':') !== false) {
      $credentials = explode(':', $text);
      if (count($credentials) == 2) {
        $username = $credentials[0];
        $password = $credentials[1];
        if ($username == $admin_username && $password == $admin_password) {
          $config = generateConfig();
          sendDocument($chat_id, $config, $token);
        } else {
          $reply = "Invalid username or password";
          sendMessage($chat_id, $reply, $token);
        }
      } else {
        $reply = "Invalid format. Please send your username and password in the following format:\n\nUsername:password";
        sendMessage($chat_id, $reply, $token);
      }
    } else {
      $reply = "Invalid command. Please send /start to begin.";
      sendMessage($chat_id, $reply, $token);
    }
  }
}

function generateConfig() {
  global $server, $port;
  $config = "
{
  \"inbounds\": [
    {
      \"port\": $port,
      \"protocol\": \"vmess\",
      \"settings\": {
        \"clients\": [
          {
            \"id\": \"" . generateUUID() . "\",
            \"alterId\": 64
          }
        ],
        \"disableInsecureEncryption\": true
      },
      \"streamSettings\": {
        \"network\": \"tcp\",
        \"security\": \"tls\",
        \"tlsSettings\": {
          \"allowInsecure\": true
        }
      }
    }
  ],
  \"outbounds\": [
    {
      \"protocol\": \"freedom\",
      \"settings\": {}
    }
  ]
}
  ";
  return $config;
}

function generateUUID() {
  $data = openssl_random_pseudo_bytes(16);
  $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
  $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
  return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

function sendMessage($chat_id, $reply, $token) {
  $url = "https://api.telegram.org/bot" . $token . "/sendMessage";
  $data = array(
    'chat_id' => $chat_id,
    'text' => $reply
  );
  sendRequest($url, $data);
}
