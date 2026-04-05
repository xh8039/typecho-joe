<style type="text/css" id="qj_dh_css">
    .qjdh_no4 {
        width: 50px;
        height: 50px;
        background-color: #1b96b9;
        -webkit-animation: rotateplane 1s infinite ease-in-out;
        animation: rotateplane 1s infinite ease-in-out
    }

    @-webkit-keyframes rotateplane {
        0% {
            -webkit-transform: perspective(120px)
        }

        50% {
            -webkit-transform: perspective(120px) rotateY(180deg)
        }

        to {
            -webkit-transform: perspective(120px) rotateY(180deg) rotateX(180deg)
        }
    }

    @keyframes rotateplane {
        0% {
            transform: perspective(120px) rotateX(0deg) rotateY(0deg);
            -webkit-transform: perspective(120px) rotateX(0deg) rotateY(0deg)
        }

        50% {
            transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg);
            -webkit-transform: perspective(120px) rotateX(-180.1deg) rotateY(0deg)
        }

        to {
            transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg);
            -webkit-transform: perspective(120px) rotateX(-180deg) rotateY(-179.9deg)
        }
    }
</style>
<div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
    <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
        <div class="qjdh_no4"></div>
    </div>
</div>