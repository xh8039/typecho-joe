<style type="text/css" id="qj_dh_css">
    .qjdh_no10 {
        position: relative;
        transform: translate(-29.99px, -37.51px)
    }

    .qjdh_no10>div:nth-child(1) {
        animation-name: ql-1
    }

    .qjdh_no10>div:nth-child(1),
    .qjdh_no10>div:nth-child(2) {
        animation-delay: 0;
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite
    }

    .qjdh_no10>div:nth-child(2) {
        animation-name: ql-2
    }

    .qjdh_no10>div:nth-child(3) {
        animation-name: ql-3;
        animation-delay: 0;
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite
    }

    .qjdh_no10>div {
        position: absolute;
        width: 18px;
        height: 18px;
        border-radius: 100%;
        background: #ff00a3
    }

    .qjdh_no10>div:nth-of-type(1) {
        top: 50px
    }

    .qjdh_no10>div:nth-of-type(2) {
        left: 25px
    }

    .qjdh_no10>div:nth-of-type(3) {
        top: 50px;
        left: 50px
    }

    @keyframes ql-1 {
        33% {
            transform: translate(25px, -50px)
        }

        66% {
            transform: translate(50px, 0)
        }

        to {
            transform: translate(0, 0)
        }
    }

    @keyframes ql-2 {
        33% {
            transform: translate(25px, 50px)
        }

        66% {
            transform: translate(-25px, 50px)
        }

        to {
            transform: translate(0, 0)
        }
    }

    @keyframes ql-3 {
        33% {
            transform: translate(-50px, 0)
        }

        66% {
            transform: translate(-25px, -50px)
        }

        to {
            transform: translate(0, 0)
        }
    }
</style>
<div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
    <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
        <div class="qjdh_no10">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>