<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<!--    <link rel="stylesheet" href="../../assets/css/loader_style.css">-->
<!--    <script  src="../../assets/js/loader_script.js"></script>-->
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Abril+Fatface&display=swap');
    *, *::before, *::after {
        box-sizing: border-box;
    }

    body {
        font-family: 'Abril Fatface', cursive;
        font-size: 20px;
        color:#30419B;
    }

    .wrap-loader {
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        height: 100vh;
        background: #fff;
    }

    .loader {
        position: relative;
        width: 20rem;
        height: 20rem;
    }
    .loader::before {
        z-index: 1;
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 8.6956521739rem;
        height: 8.6956521739rem;
        background: #fff;
        border-radius: 50%;
    }
    .loader .box {
        position: absolute;
        width: 10rem;
        height: 10rem;
        overflow: hidden;
    }
    .loader .box::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        opacity: 0.1;
    }
    .loader .box:nth-child(1) {
        top: 0;
        left: 0;
    }
    .loader .box:nth-child(1)::before {
        top: 50%;
        left: 50%;
        background: #990000;
        -webkit-animation: lightMe1 4s ease-out infinite normal;
        animation: lightMe1 4s ease-out infinite normal;
    }
    .loader .box:nth-child(2) {
        top: 0;
        right: 0;
    }
    .loader .box:nth-child(2)::before {
        top: 50%;
        right: 50%;
        background: #CC0000;
        -webkit-animation: lightMe2 4s ease-out infinite normal;
        animation: lightMe2 4s ease-out infinite normal;
    }
    .loader .box:nth-child(3) {
        bottom: 0;
        right: 0;
    }
    .loader .box:nth-child(3)::before {
        bottom: 50%;
        right: 50%;
        background: #EC000090;
        -webkit-animation: lightMe3 4s ease-out infinite normal;
        animation: lightMe3 4s ease-out infinite normal;
    }
    .loader .box:nth-child(4) {
        bottom: 0;
        left: 0;
    }
    .loader .box:nth-child(4)::before {
        bottom: 50%;
        left: 50%;
        background: #EC000050;
        -webkit-animation: lightMe4 4s linear infinite normal;
        animation: lightMe4 4s linear infinite normal;
    }
    .loader .wrap-text {
        z-index: 2;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 40px;
        height: 40px;
        overflow: hidden;
    }
    .loader .text {
        position: relative;
        width: 40px;
        height: 40px;
        line-height: 40px;
        -webkit-animation: slider 8s ease-in infinite;
        animation: slider 8s ease-in infinite;
    }
    .loader .text span {
        display: block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        font-size: 2em;
        color: #000;
    }

    .loader-text {
        color: #000;
        -webkit-transform: translateY(-2rem);
        transform: translateY(-2rem);
        letter-spacing: 6px;
        opacity: .2;
        -webkit-animation: blink 1s ease-out infinite alternate;
        animation: blink 1s ease-out infinite alternate;
    }

    @-webkit-keyframes lightMe1 {
        0% {
            opacity: 0.1;
        }
        25% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }

    @keyframes lightMe1 {
        0% {
            opacity: 0.1;
        }
        25% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }
    @-webkit-keyframes lightMe2 {
        0% {
            opacity: 0.1;
        }
        25% {
            opacity: 0.1;
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes lightMe2 {
        0% {
            opacity: 0.1;
        }
        25% {
            opacity: 0.1;
        }
        50% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }
    @-webkit-keyframes lightMe3 {
        0% {
            opacity: 0.1;
        }
        50% {
            opacity: 0.1;
        }
        75% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes lightMe3 {
        0% {
            opacity: 0.1;
        }
        50% {
            opacity: 0.1;
        }
        75% {
            opacity: 1;
        }
        100% {
            opacity: 1;
        }
    }
    @-webkit-keyframes lightMe4 {
        0% {
            opacity: 0.1;
        }
        75% {
            opacity: 0.1;
        }
        100% {
            opacity: 1;
        }
    }
    @keyframes lightMe4 {
        0% {
            opacity: 0.1;
        }
        75% {
            opacity: 0.1;
        }
        100% {
            opacity: 1;
        }
    }
    @-webkit-keyframes slider {
        0% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        10.5% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        11.1% {
            -webkit-transform: translateY(-40px);
            transform: translateY(-40px);
        }
        22.2% {
            -webkit-transform: translateY(-40px);
            transform: translateY(-40px);
        }
        23% {
            -webkit-transform: translateY(-80px);
            transform: translateY(-80px);
        }
        25% {
            -webkit-transform: translateY(-80px);
            transform: translateY(-80px);
        }
        37.5% {
            -webkit-transform: translateY(-120px);
            transform: translateY(-120px);
        }
        47.5% {
            -webkit-transform: translateY(-120px);
            transform: translateY(-120px);
        }
        50% {
            -webkit-transform: translateY(-160px);
            transform: translateY(-160px);
        }
        60% {
            -webkit-transform: translateY(-160px);
            transform: translateY(-160px);
        }
        62.5% {
            -webkit-transform: translateY(-200px);
            transform: translateY(-200px);
        }
        72.5% {
            -webkit-transform: translateY(-200px);
            transform: translateY(-200px);
        }
        75% {
            -webkit-transform: translateY(-240px);
            transform: translateY(-240px);
        }
        85% {
            -webkit-transform: translateY(-240px);
            transform: translateY(-240px);
        }
        87.5% {
            -webkit-transform: translateY(-280px);
            transform: translateY(-280px);
        }
        90% {
            -webkit-transform: translateY(-280px);
            transform: translateY(-280px);
        }
        93% {
            -webkit-transform: translateY(-320px);
            transform: translateY(-320px);
        }
        99% {
            -webkit-transform: translateY(-320px);
            transform: translateY(-320px);
        }
    }
    @keyframes slider {
        0% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        10.5% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }
        11.1% {
            -webkit-transform: translateY(-40px);
            transform: translateY(-40px);
        }
        22.2% {
            -webkit-transform: translateY(-40px);
            transform: translateY(-40px);
        }
        23% {
            -webkit-transform: translateY(-80px);
            transform: translateY(-80px);
        }
        25% {
            -webkit-transform: translateY(-80px);
            transform: translateY(-80px);
        }
        37.5% {
            -webkit-transform: translateY(-120px);
            transform: translateY(-120px);
        }
        47.5% {
            -webkit-transform: translateY(-120px);
            transform: translateY(-120px);
        }
        50% {
            -webkit-transform: translateY(-160px);
            transform: translateY(-160px);
        }
        60% {
            -webkit-transform: translateY(-160px);
            transform: translateY(-160px);
        }
        62.5% {
            -webkit-transform: translateY(-200px);
            transform: translateY(-200px);
        }
        72.5% {
            -webkit-transform: translateY(-200px);
            transform: translateY(-200px);
        }
        75% {
            -webkit-transform: translateY(-240px);
            transform: translateY(-240px);
        }
        85% {
            -webkit-transform: translateY(-240px);
            transform: translateY(-240px);
        }
        87.5% {
            -webkit-transform: translateY(-280px);
            transform: translateY(-280px);
        }
        90% {
            -webkit-transform: translateY(-280px);
            transform: translateY(-280px);
        }
        93% {
            -webkit-transform: translateY(-320px);
            transform: translateY(-320px);
        }
        99% {
            -webkit-transform: translateY(-320px);
            transform: translateY(-320px);
        }
    }
    @-webkit-keyframes blink {
        from {
            opacity: .2;
        }
        to {
            opacity: .75;
        }
    }
    @keyframes blink {
        from {
            opacity: .2;
        }
        to {
            opacity: .75;
        }
    }
</style>
<div class="wrap-loader">
  <div class="loader">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="wrap-text">
      <div class="text"><span>W</span><span>I</span><span>N</span><span>D</span><span>S</span><span>O</span><span>N</span>
      </div>
    </div>
  </div>
</div>

</html>