<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="css/style.css">

    <!-- boostrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <title>conVo App</title>
</head>

<body>
    <header>
        <div class="container">
<!--            <img src="img/conVo.png" width="57" height="57" alt="logo" class="logo">-->
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
        <h1>What is <span style="background-color: rgba(255,0,255, 0.5);">conVo</span></h1>
        <p style="background-color: rgba(0,0,0,.5);"><span style="background-color: rgba(255,0,255, 0.5);">conVo</span> is a life-changing service that gives the user new knowledge and makes them seem smart in conversation. Guaranteed to raise IQ by 10 points. Provides quick and response feedback for live conversations designed for you.</p>
        <br><p style="background-color: rgba(0,0,0,.5);">Siri, But Better</p>
        <a href="#sign_in" class="button">GET STARTED</a>
    </div>

    <div id="sign_in" class="wrapper">
        <div class="left">
            <div class="inner">
            </div>
        </div>
        <div class="right">
            <div class="inner"></div>
        </div>
    </div>
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
