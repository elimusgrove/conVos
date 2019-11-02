<?php
// Begins Session
session_start();

// If user isn't logged in
var_dump($_SESSION);
if (!isset($_SESSION['username']) || (time() - $_SESSION['login_time'] > 3600)) {
    // Clear Session
    session_unset();
}



?>

<!-- HTML -->
<!doctype html>
<html lang="en">

<head>
    <link rel='icon' href='favicon.ico' type='img/ico'/>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/style.css">

    <!-- boot strap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <title>conVo App</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a style="letter-spacing: 0.1em;" href="#learn_more">Learn More</a></li>
                    <li><a style="letter-spacing: 0.1em;" href="#history">History</a></li>
                    <li>|</li>
                    <li><a style="letter-spacing: 0.1em;" href="#sign_in">Sign In</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="showcase">
        <h1 style="letter-spacing: 0.1em;">conVo</h1>
        <p style="letter-spacing: 0.05em;background-color: rgba(0,0,0,.5);">Learn more with each conversation</p>
        <a style="letter-spacing: 0.05em" href="#learn_more" class="button">LEARN MORE</a>
    </div>

    <div id="learn_more">
        <h1>What is conVo</h1>
        <p style="background-color: rgba(0,0,0,.5);">The quick and easy-to-use app <b style="background-color: rgba(255,0,255, 0.8);">designed for you.</b><br> conVo provides quick and responsive feedback for live conversations tailored to you.</p>
        <br><p style="background-color: rgba(0,0,0,.5);">Siri, But Better</p>
        <a href="#sign_in" class="button">GET STARTED</a>
    </div>

    <!-- Alternative Page: History -->
    <?php if (!isset($_SESSION['username'])) { ?>
    <div id="sign_in" class="wrapper">
        <div class="left">
            <div class="inner">
            </div>
        </div>
        <div class="right">
            <div id="sign_ons" class="inner">
                <!-- sign in / sign up -->
                <form method="post">
                    <input style="position:relative; right:-20vw; top:25vh;" class="param" type="username" name="username" placeholder="username"><br>
                    <input style="position:relative; right:-20vw; top:25vh;" class="param" type="password" name="password" placeholder="password">
                    <br>
                    <br>
                    <a formaction="scripts/login.php" type="submit" style="letter-spacing: 0.05em;position:relative; right:-20vw; top:6em;" href="/scripts/login.php" class="button">LOG IN</a>
                    <a formaction="scripts/register.php" type="submit" style="letter-spacing: 0.05em;position:relative; right:-24vw; top:6em;" href="/scripts/register.php" class="button">SIGN UP</a>
                </form>

            </div>
        </div>
    </div>
    <?php
    } else {
// add history
    }?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function() {
            $('a[href*="#"]')
            // Remove links that don't actually link to anything
                .not('[href="#"]').not('[href="#0"]').click(function (event) {
                    // On-page links
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function () {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>