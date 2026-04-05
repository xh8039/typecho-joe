<style type="text/css" id="qj_dh_css">
    .qjdh_no7 {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        margin: auto;
        width: 50px;
        height: 50px
    }

    .qjdh_no7:before {
        top: 59px;
        height: 5px;
        border-radius: 50%;
        background: #000;
        opacity: .1;
        animation: box-loading-shadow .5s linear infinite
    }

    .qjdh_no7:after,
    .qjdh_no7:before {
        position: absolute;
        left: 0;
        width: 50px;
        content: ""
    }

    .qjdh_no7:after {
        top: 0;
        height: 50px;
        border-radius: 3px;
        background: #15c574;
        animation: box-loading-animate .5s linear infinite
    }

    @keyframes box-loading-animate {
        17% {
            border-bottom-right-radius: 3px
        }

        25% {
            transform: translateY(9px) rotate(22.5deg)
        }

        50% {
            border-bottom-right-radius: 40px;
            transform: translateY(18px) scale(1, .9) rotate(45deg)
        }

        75% {
            transform: translateY(9px) rotate(67.5deg)
        }

        to {
            transform: translateY(0) rotate(90deg)
        }
    }

    @keyframes box-loading-shadow {

        0%,
        to {
            transform: scale(1, 1)
        }

        50% {
            transform: scale(1.2, 1)
        }
    }
</style>
<div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
    <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
        <div class="qjdh_no7"></div>
    </div>
</div>