<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden | {{ config('app.name', 'Blog & Book') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Notable&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Notable', sans-serif;
            word-break: break-all;
            font-size: 5rem;
            line-height: 0.75;
            overflow: hidden;
            text-align: center;
            color: red;
            margin: 0;
            padding: 0;
            background: #000;
            position: relative;
        }

        .glitch-text {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 8rem;
            text-transform: uppercase;
            animation: glitch 1s linear infinite;
            z-index: 100;
        }

        @keyframes glitch {
            2%, 64% {
                transform: translate(-50%, -50%) translate(2px, 0);
            }
            4%, 60% {
                transform: translate(-50%, -50%) translate(-2px, 0);
            }
            62% {
                transform: translate(-50%, -50%) translate(0, 0);
            }
        }

        svg {
            position: absolute;
            left: 10vw;
            top: 10vh;
            width: 80vw;
            height: 80vh;
            z-index: 1;
        }

        .text-container {
            position: relative;
            z-index: 2;
            padding: 20px;
            opacity: 0.1;
        }

        .navigation {
            position: fixed;
            bottom: 2rem;
            left: 0;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        .navigation a {
            color: red;
            text-decoration: none;
            font-size: 1.5rem;
            padding: 1rem 2rem;
            border: 2px solid red;
            transition: all 0.3s ease;
        }

        .navigation a:hover {
            background: red;
            color: black;
        }

        @media (max-width: 768px) {
            body {
                font-size: 3rem;
            }
            .glitch-text {
                font-size: 4rem;
            }
            .navigation a {
                font-size: 1rem;
                padding: 0.5rem 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="text-container">
        @php
            $n = 0;
        @endphp
        @while ($n < 32)
            FORBIDDEN ACCESS DENIED
            @php
                $n++;
            @endphp
        @endwhile
    </div>

    <div class="glitch-text">403</div>

    <div class="navigation">
        <a href="{{ route('home') }}">Go Home</a>
    </div>

    <div>
        <svg viewBox="0 0 24.5 24">
            <defs>
                <filter id="filter" x="-20%" y="-10%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="linearRGB">
                    <feComposite in="colormatrix" in2="SourceAlpha" operator="in" result="composite"/>
                    <feTurbulence type="turbulence" baseFrequency="0 3" numOctaves="5" seed="0" stitchTiles="stitch" result="turbulence1" id="seed-changer"/>
                    <feDisplacementMap in="composite" in2="turbulence1" scale="1" xChannelSelector="R" yChannelSelector="B" result="displacementMap"/>
                </filter>
            </defs>
            <path filter="url(#filter)" d="M12,0A12,12 0 0,1 24,12A12,12 0 0,1 12,24A12,12 0 0,1 0,12A12,12 0 0,1 12,0M12,2A10,10 0 0,0 2,12C2,14.4 2.85,16.6 4.26,18.33L18.33,4.26C16.6,2.85 14.4,2 12,2M12,22A10,10 0 0,0 22,12C22,9.6 21.15,7.4 19.74,5.67L5.67,19.74C7.4,21.15 9.6,22 12,22Z"></path>
        </svg>
    </div>

    <script>
        const seedEl = document.querySelector("#seed-changer");

        // SVG filter animation
        const jigger = () => {
            setTimeout(() => {
                seedEl.setAttribute("seed", Math.random() * 1000);
                jigger();
            }, Math.floor(Math.random() * 550));
        };
        jigger();

        // Text animation
        const sent = "FORBIDDEN ACCESS DENIED";
        const len = sent.length;
        let i = len - 1;

        setInterval(() => {
            document.body.insertAdjacentHTML('afterbegin', sent[i]);
            i--;
            if (i < 0) i = len - 1;
        }, 1000);

        // Glitch effect
        const glitchText = document.querySelector('.glitch-text');
        setInterval(() => {
            const glitch = Math.random() > 0.95;
            if (glitch) {
                glitchText.style.transform = `translate(-50%, -50%) translate(${Math.random() * 10 - 5}px, ${Math.random() * 10 - 5}px)`;
                setTimeout(() => {
                    glitchText.style.transform = 'translate(-50%, -50%)';
                }, 100);
            }
        }, 50);
    </script>
</body>
</html>

.button-hover-slide:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(231, 76, 60, 0.2);
}

/* Gradients and Shadows */
.display-1 {
    text-shadow: 2px 2px 15px rgba(231, 76, 60, 0.1);
}

.btn {
    border-radius: 50px;
    padding: 12px 30px;
    font-weight: 500;
    letter-spacing: 0.5px;
}

/* Responsive Adjustments */
@media (max-width: 576px) {
    .display-1 {
        font-size: 80px !important;
    }
    .h1 {
        font-size: 1.8rem;
    }
    .lead {
        font-size: 1rem;
    }
    .d-flex {
        flex-direction: column;
    }
    .btn {
        width: 100%;
        margin: 5px 0;
    }
    .error-image img {
        max-width: 200px !important;
    }
}
</style>
