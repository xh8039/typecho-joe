<style type="text/css" id="qj_dh_css">
    .qjdh_no5 {
        transform: scale(1)
    }

    .qjdh_no5>div:nth-child(1) {
        -webkit-animation: ball-pulse-sync .6s -.14s infinite ease-in-out;
        animation: ball-pulse-sync .6s -.14s infinite ease-in-out
    }

    .qjdh_no5>div:nth-child(2) {
        -webkit-animation: ball-pulse-sync .6s -70ms infinite ease-in-out;
        animation: ball-pulse-sync .6s -70ms infinite ease-in-out
    }

    .qjdh_no5>div:nth-child(3) {
        -webkit-animation: ball-pulse-sync .6s 0s infinite ease-in-out;
        animation: ball-pulse-sync .6s 0s infinite ease-in-out
    }

    .qjdh_no5>div {
        background-color: #ec6a21;
        width: 15px;
        height: 15px;
        border-radius: 100%;
        margin: 4px;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        display: inline-block
    }

    @keyframes ball-pulse-sync {
        33% {
            -webkit-transform: translateY(10px);
            transform: translateY(10px)
        }

        66% {
            -webkit-transform: translateY(-10px);
            transform: translateY(-10px)
        }

        to {
            -webkit-transform: translateY(0);
            transform: translateY(0)
        }
    }
</style>
<div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
    <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
        <div class="qjdh_no5">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>