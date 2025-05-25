<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found | {{ config('app.name', 'Blog & Book') }}</title>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans|PT+Sans+Narrow');

        body {
            overflow: hidden;
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
        }

        .not-found {
            position: relative;
            overflow: hidden;
            margin: 0 -20vw;
            height: 110vh;
        }

        [class*="wave"] {
            position: absolute;
        }

        .sky-bg {
            background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524821915/404/bg-1_gvybzk.svg);
            height: 100%;
            position: absolute;
            width: 100%;
            bottom: 0;
            left: 0;
        }

        .wave-1 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-1.svg); }
        .wave-2 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-2.svg); }
        .wave-3 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-3.svg); }
        .wave-4 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-4.svg); }
        .wave-5 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-5.svg); }
        .wave-6 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-6.svg); }
        .wave-7 { background: url(http://res.cloudinary.com/andrewhani/image/upload/v1524501869/404/wave-7.svg); }

        [class*="wave"] {
            height: calc(100% - 250px);
            width: 100%;
            position: absolute;
            bottom: 0;
            left: 0;
        }

        .wave-4 {
            height: calc(100% - 430px);
        }

        .wave-lost {
            position: absolute;
            top: 20%;
            left: 50%;
            color: #fff;
            font-size: 20rem;
            animation: surf 2s cubic-bezier(0.65, 0.05, 0.36, 1);
        }

        .wave-lost span {
            float: left;
            animation: float 3s ease-in infinite;
        }

        .wave-lost span:nth-child(2) {
            animation-delay: 2.5s;
        }

        .wave-lost span:nth-child(3) {
            animation-delay: 4.5s;
        }

        .wave-island {
            position: absolute;
            top: 130px;
            left: 20%;
            padding: 10px;
            width: 170px;
        }

        .wave-message {
            position: absolute;
            bottom: 100px;
            left: 50%;
            padding-right: 50%;
            height: auto !important;
            color: #fff;
            font-size: 3rem;
            text-align: left;
            animation: wave-message 1s cubic-bezier(0.65, 0.05, 0.36, 1);
        }

        .boat {
            position: absolute;
            top: 0;
            right: 15%;
            width: 150px;
            animation: boat 15s cubic-bezier(0.65, 0.05, 0.36, 1) infinite;
        }

        @keyframes boat {
            0% {
                transform-origin: left;
                transform: rotate(-15deg) translate3d(400px, 0px, 0px);
            }
            20% {
                transform-origin: left;
                transform: rotate(15deg) translate3d(-20vw, 0, 0px);
            }
            25% {
                transform-origin: left;
                transform: rotate(-7deg) translate3d(-25vw, 0, 0px);
            }
            50% {
                transform-origin: left;
                transform: rotate(5deg) translate3d(-50vw, 0, 0px);
            }
            60% {
                transform-origin: left;
                transform: rotate(-1deg) translate3d(-60vw, 0, 0px);
            }
            100% {
                transform-origin: left;
                transform: rotate(2deg) translate3d(-100vw, 0, 0px);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: rotate(3deg) translate3d(0px, -10px, 0px);
            }
            50% {
                transform: rotate(-3deg) translate3d(0px, 10px, 0px);
            }
        }

        @keyframes surf {
            0% {
                transform-origin: right;
                transform: rotate(15deg) translate3d(0, 800px, 0);
            }
            30% {
                transform-origin: right;
                transform: rotate(15deg) translate3d(0, 500px, 0);
            }
            100% {
                transform-origin: right;
                transform: rotate(0) translate3d(0, 0, 0px);
            }
        }

        @keyframes wave-message {
            0% {
                transform: translate3d(0, 120%, 0);
            }
            100% {
                transform: translate3d(0, 0, 0);
            }
        }
    </style>
</head>
<body>
    <div class="not-found parallax">
        <div class="sky-bg"></div>
        <div class="wave-7"></div>
        <div class="wave-6"></div>
        <a class="wave-island" href="{{ route('home') }}">
            <img src="http://res.cloudinary.com/andrewhani/image/upload/v1524501929/404/island.svg" alt="Island">
        </a>
        <div class="wave-5"></div>
        <div class="wave-lost wrp">
            <span>4</span>
            <span>0</span>
            <span>4</span>
        </div>
        <div class="wave-4"></div>
        <div class="wave-boat">
            <img class="boat" src="http://res.cloudinary.com/andrewhani/image/upload/v1524501894/404/boat.svg" alt="Boat">
        </div>
        <div class="wave-3"></div>
        <div class="wave-2"></div>
        <div class="wave-1"></div>
        <div class="wave-message">
            <p>You're lost</p>
            <p>Click <strong>Tree</strong> on the island to return home</p>
        </div>
    </div>

    <script>
        var parallax = function(e) {
            var windowWidth = $(window).width();
            if (windowWidth < 768) return;
            var halfFieldWidth = $(".parallax").width() / 2,
                halfFieldHeight = $(".parallax").height() / 2,
                fieldPos = $(".parallax").offset(),
                x = e.pageX,
                y = e.pageY - fieldPos.top,
                newX = (x - halfFieldWidth) / 30,
                newY = (y - halfFieldHeight) / 30;
            $('.parallax [class*="wave"]').each(function(index) {
                $(this).css({
                    transition: "",
                    transform:
                        "translate3d(" + index * newX + "px," + index * newY + "px,0px)"
                });
            });
        },
        stopParallax = function() {
            $('.parallax [class*="wave"]').css({
                transform: "translate(0px,0px)",
                transition: "all .7s"
            });
            setTimeout(function() {
                $('.parallax [class*="wave"]').css("transition", "");
            }, 700);
        };

        $(document).ready(function() {
            $(".not-found").on("mousemove", parallax);
            $(".not-found").on("mouseleave", stopParallax);
        });
    </script>
</body>
</html>
