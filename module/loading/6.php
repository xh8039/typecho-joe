 <style type="text/css" id="qj_dh_css">
     .qjdh_no6 {
         transform: scale(1) translateY(-30px)
     }

     .qjdh_no6>div:nth-child(2) {
         -webkit-animation-delay: -.4s;
         animation-delay: -.4s
     }

     .qjdh_no6>div:nth-child(3) {
         -webkit-animation-delay: -.2s;
         animation-delay: -.2s
     }

     .qjdh_no6>div {
         position: absolute;
         top: 0;
         left: -30px;
         margin: 2px;
         margin: 0;
         width: 15px;
         width: 60px;
         height: 15px;
         height: 60px;
         border-radius: 100%;
         background-color: #ff3cb2;
         opacity: 0;
         -webkit-animation-fill-mode: both;
         animation-fill-mode: both;
         -webkit-animation: ball-scale-multiple 1s 0s linear infinite;
         animation: ball-scale-multiple 1s 0s linear infinite
     }

     @-webkit-keyframes ball-scale-multiple {
         0% {
             opacity: 0;
             -webkit-transform: scale(0);
             transform: scale(0)
         }

         5% {
             opacity: 1
         }

         to {
             -webkit-transform: scale(1);
             transform: scale(1)
         }
     }

     @keyframes ball-scale-multiple {

         0%,
         to {
             opacity: 0
         }

         0% {
             -webkit-transform: scale(0);
             transform: scale(0)
         }

         5% {
             opacity: 1
         }

         to {
             opacity: 0;
             -webkit-transform: scale(1);
             transform: scale(1)
         }
     }
 </style>
 <div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
     <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
         <div class="qjdh_no6">
             <div></div>
             <div></div>
             <div></div>
         </div>
     </div>
 </div>