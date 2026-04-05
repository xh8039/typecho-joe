<style type="text/css" id="qj_dh_css">
    .qjdh_no8 {
        height: 50px;
        width: 50px;
        -webkit-transform: rotate(45deg);
        transform: rotate(45deg);
        -webkit-animation: l_xx 1.5s infinite;
        animation: l_xx 1.5s infinite
    }

    .qjdh_no8>div {
        width: 25px;
        height: 25px;
        background-color: #f54a71;
        float: left
    }

    .qjdh_no8>div:nth-child(1) {
        -webkit-animation: o_one 1.5s infinite;
        animation: o_one 1.5s infinite
    }

    .qjdh_no8>div:nth-child(2) {
        -webkit-animation: o_two 1.5s infinite;
        animation: o_two 1.5s infinite
    }

    .qjdh_no8>div:nth-child(3) {
        -webkit-animation: o_three 1.5s infinite;
        animation: o_three 1.5s infinite
    }

    .qjdh_no8>div:nth-child(4) {
        -webkit-animation: o_four 1.5s infinite;
        animation: o_four 1.5s infinite
    }

    @-webkit-keyframes l_xx {
        to {
            -webkit-transform: rotate(-45deg)
        }
    }

    @-webkit-keyframes o_one {
        30% {
            -webkit-transform: translate(0, -50px) rotate(-180deg)
        }

        to {
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @keyframes o_one {
        30% {
            transform: translate(0, -50px) rotate(-180deg);
            -webkit-transform: translate(0, -50px) rotate(-180deg)
        }

        to {
            transform: translate(0, 0) rotate(-180deg);
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @-webkit-keyframes o_two {
        30% {
            -webkit-transform: translate(50px, 0) rotate(-180deg)
        }

        to {
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @keyframes o_two {
        30% {
            transform: translate(50px, 0) rotate(-180deg);
            -webkit-transform: translate(50px, 0) rotate(-180deg)
        }

        to {
            transform: translate(0, 0) rotate(-180deg);
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @-webkit-keyframes o_three {
        30% {
            -webkit-transform: translate(-50px, 0) rotate(-180deg)
        }

        to {
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @keyframes o_three {
        30% {
            transform: translate(-50px, 0) rotate(-180deg);
            -webkit-transform: translate(-50px, 0) rotate(-180deg)
        }

        to {
            transform: translate(0, 0) rotate(-180deg);
            -webkit-transform: rtranslate(0, 0) rotate(-180deg)
        }
    }

    @-webkit-keyframes o_four {
        30% {
            -webkit-transform: translate(0, 50px) rotate(-180deg)
        }

        to {
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }

    @keyframes o_four {
        30% {
            transform: translate(0, 50px) rotate(-180deg);
            -webkit-transform: translate(0, 50px) rotate(-180deg)
        }

        to {
            transform: translate(0, 0) rotate(-180deg);
            -webkit-transform: translate(0, 0) rotate(-180deg)
        }
    }
</style>
<div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
    <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
        <div class="qjdh_no8">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>