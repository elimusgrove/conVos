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
                    <li><a style="letter-spacing: 0.1em;;" href="#">History</a></li>
                    <li>|</li>
                    <li><a style="letter-spacing: 0.1em;" href="#">Sign In</a></li>
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
        <h1>What is conVo?</h1>
        <p style="background-color: rgba(0,0,0,.5);">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias aliquam dolorem ea eius enim esse ex excepturi expedita ipsa itaque labore, laudantium magnam natus nemo nesciunt numquam, officia optio perspiciatis praesentium quidem quis, rem repellendus repudiandae rerum similique soluta sunt velit vitae voluptate? Harum in inventore iure officiis repudiandae voluptate. Ab aperiam cum deleniti dolores eos facere impedit inventore iste iure laborum minima, minus nihil officiis quas quisquam quo quos tenetur totam ut voluptatem. Aspernatur autem dolorum earum itaque nesciunt nihil nobis, possimus rem tenetur voluptatibus. Aliquid culpa cumque deleniti, ea earum in mollitia officiis ullam voluptate. Aut, tenetur.</p>
    </div>

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
