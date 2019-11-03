<?php
// Begins Session
session_start();

// Testing - uncomment as needed
//var_dump($_SESSION);
//$_SESSION['username'] = 'tester';
//unset($_SESSION['username']);

// If user isn't logged in
if (!isset($_SESSION['username'])) {
// Clear Session
    session_unset();
//    header('Location: ./scripts/register.php');

// do login/register error alerts
    if (isset($_GET['login']) && $_GET['login'] === 'error') {
        ?>
        <script type="text/javascript">alert('Login Credential Error: Please try again!');</script>
    <?php }
    if (isset($_GET['register']) && $_GET['register'] === 'error') {
        ?>
        <script type="text/javascript">alert('Username already taken. Please try a different username.');</script>
    <?php }
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


    <title>conVos App</title>
</head>

<body>
    <header>
        <div class="container">
            <nav id="navbar">
                <ul>
                    <li><a style="letter-spacing: 0.1em;" href="#learn_more">Learn More</a></li>
                    <?php if (!isset($_SESSION['username'])) { ?>
                            <li>|</li>
                    <li><a style="letter-spacing: 0.05em;" href="#sign_in">Log In / Register</a></li>
                    <?php } else { ?>
                    <li><a style="letter-spacing: 0.1em;" href="#history">History</a></li>
                        <li>|</li>
                    <li><a style="letter-spacing: 0.05em;" href="./scripts/logoff.php">Log out</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </header>

    <div id="showcase">

        <div class="ocean">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>

        <h1 style="letter-spacing: 0.1em;">conVos</h1>
        <p style="letter-spacing: 0.05em;background-color: rgba(0,0,0,.5);">Learn more with each conversation</p>
        <a style="letter-spacing: 0.05em" href="#learn_more" class="button">LEARN MORE</a>
    </div>

    <div id="learn_more">
        <h1>What is conVos</h1>
        <p style="background-color: rgba(0,0,0,.5);">The quick and easy-to-use app <b style="background-color: rgba(255,0,255, 0.8);">designed for you.</b><br> conVos provides quick and responsive feedback for live conversations tailored for you.</p>
        <br><p style="background-color: rgba(0,0,0,.5);">Siri, But Better</p>
        <a href="#sign_in" class="button">GET STARTED</a>
    </div>

    <?php if (isset($_SESSION['username'])) { ?>
    <div id="history">
        <div class="tint">
            <p>suh bruh todo</p>
        </div>
    </div>
    <?php } ?>


    <!-- sign up -->
    <?php if (!isset($_SESSION['username'])) { ?>
    <div id="sign_in" class="wrapper">
        <div class="left">
            <div class="inner">
                <h1 style="font-size:2.45em;display:inline;position:relative;right:-22.5vw;top:15vh;background-color:rgba(0,0,0,.5);">DEMO</h1>
                <br><br>
                <img style="display:inline;position:relative;right:-15vw;top:25ex;border-radius:30px;" src='img/image1.gif' alt=”animated” />
            </div>
        </div>
        <div class="right">
            <div id="sign_ons" class="inner">
                <!-- sign in / sign up -->
                <h1 style="font-size:2.45em;display:inline;position:relative;right:-20vw;top:15vh;background-color:rgba(0,0,0,.5);">LOG IN | SIGN UP</h1>
                <form method="post">
                    <input style="position:relative;right:-20vw;top:25vh;" class="param" type="username" name="username" placeholder="username">
                    <br>
                    <input style="position:relative;right:-20vw;top:25vh;" class="param" type="password" name="password" placeholder="password">
                    <br><br>
                    <input formaction="scripts/login.php" type="submit" style="letter-spacing: 0.05em;position:relative; right:-13.5em; top:6em;" href="/scripts/login.php" class="button" value="LOG IN">
                    <input formaction="scripts/register.php" type="submit" style="letter-spacing: 0.05em;position:relative; right:-15.75em; top:6em;" href="./index.php" class="button" value="SIGN UP">
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

<script>// When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the navbar
    var navbar = document.getElementById("navbar");

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
    }
</script>
</body>

</html>