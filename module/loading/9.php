 <style type="text/css" id="qj_dh_css">
     .qjdh_no9 {
         transform: scale(1)
     }

     .qjdh_no9>div {
         display: inline-block;
         margin: 5px;
         width: 4px;
         height: 35px;
         border-radius: 2px;
         background-color: #11d4c5;
         -webkit-animation-fill-mode: both;
         animation-fill-mode: both;
         -webkit-animation: line-scale-pulse-out .9s -.6s infinite cubic-bezier(.85, .25, .37, .85);
         animation: line-scale-pulse-out .9s -.6s infinite cubic-bezier(.85, .25, .37, .85)
     }

     .qjdh_no9>div:nth-child(2),
     .qjdh_no9>div:nth-child(4) {
         -webkit-animation-delay: -.4s !important;
         animation-delay: -.4s !important
     }

     .qjdh_no9>div:nth-child(1),
     .qjdh_no9>div:nth-child(5) {
         -webkit-animation-delay: -.2s !important;
         animation-delay: -.2s !important
     }

     @-webkit-keyframes line-scale-pulse-out {
         0% {
             -webkit-transform: scaley(1);
             transform: scaley(1)
         }

         50% {
             -webkit-transform: scaley(.4);
             transform: scaley(.4)
         }
     }

     @keyframes line-scale-pulse-out {

         0%,
         to {
             -webkit-transform: scaley(1);
             transform: scaley(1)
         }

         50% {
             -webkit-transform: scaley(.4);
             transform: scaley(.4)
         }

         to {
             -webkit-transform: scaley(1);
             transform: scaley(1)
         }
     }
 </style>
 <div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
     <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
         <div class="qjdh_no9">
             <div></div>
             <div></div>
             <div></div>
             <div></div>
             <div></div>
         </div>
     </div>
 </div>