<?php
/*
 * configure facebook app
 */
require_once __DIR__.'/config.php';
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo 'Login with facebook in php'; ?></title>

    <link rel="stylesheet" href="<?php echo ('http://www.minmarks.com/demo/codeigniter-validation/assets/demo.css') ?>">
    <link rel="stylesheet" href="<?php echo ('http://www.minmarks.com/demo/codeigniter-validation/assets/form-login.css') ?>">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

</head>


<header>
    <h1>Login with facebook in PHP </h1>
    <a href="https://github.com/jitu-git/login-with-facebook-php">Download</a>


</header>
<ul>
    <li><a target="_blank" href="http://minmarks.com">Previous Year questions</a> </li>
    <li><a target="_blank" href="http://minmarks.com/codes/login-with-facebook-php">Login with facebook article</a> </li>
    <li><a target="_blank" href="http://minmarks.com/codes/form-validation-in-codeigniter/">CI validations</a> </li>
</ul>


<div class="main-content">

    <?php
    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email']; // optional

    if (isset($_SESSION['facebook_access_token'])) {
        // Logged in.]
        $token = $_SESSION['facebook_access_token'];

        $fb->setDefaultAccessToken($token);

        try {
            $response = $fb->get('/me');
            $userNode = $response->getGraphUser();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        echo "<pre>";
        print_r($userNode);
        echo "</pre>";
        echo 'Logged in as ' . $userNode->getName();


        $logout_url = 'https://www.facebook.com/logout.php?next='. $baseUrl .'logout.php/&access_token='.$token;
        echo '<a href="' . $logout_url . '">Log Out</a>';
    }else{
        $loginUrl = $helper->getLoginUrl($baseUrl.'login-callback.php', $permissions);


        ?>
    <form class="form-login" method="post" action="#">
        <div class="form-sign-in-with-social">

            <div class="form-row form-title-row">
                <span class="form-title">Sign in with</span>
            </div>

            <a href="<?php echo $loginUrl ; ?>" class="form-facebook-button">Facebook</a>

        </div>

    </form>

    <?php

    }
    ?>

</div>

</body>

</html>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-78482067-1', 'auto');
    ga('send', 'pageview');

</script>
