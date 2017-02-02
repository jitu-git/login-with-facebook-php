# login-with-facebook-php
create login with facebook in core php
First of all create a new [facebook app](https://developers.facebook.com/apps/)  and get the `APP_ID` and `APP_SECRET_KEY`.

Now time to install [`facebook sdk`](https://developers.facebook.com/docs/php/gettingstarted)  directly or by `composer`

By composer create a file in your directory `composer.json`

    {
      "require" : {
        "facebook/php-sdk-v4" : "~5.0"
      }
    }
and run command `composer install`    and `facebook phpsdk` will download in your directory.
Now create a file `index.php` and configure facebook sdk.

    session_start();
    require_once __DIR__ . '/vendor/autoload.php';
    $fb = new Facebook\Facebook([
        'app_id' => 'APP_ID',
        'app_secret' => 'APP_SECRET_KEY',
        'default_graph_version' => 'v2.5',
    ]);
   
  Generate login url - 

       $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email']; // optional
        $loginUrl = $helper->getLoginUrl($baseUrl.'login-callback.php', $permissions);
         <a href="<?php echo $loginUrl ; ?>" class="form-facebook-button">Facebook</a>

[See Demo here](https://www.maxmarks.in/demo/login-with-facebook-php/)
