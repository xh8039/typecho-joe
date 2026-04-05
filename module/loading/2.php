 <style type="text/css" id="qj_dh_css">
     .qjdh_no2 {
         width: 50px;
         height: 50px;
         border: 5px solid transparent;
         border-radius: 50%;
         border-top-color: #2aab69;
         border-bottom-color: #2aab69;
         animation: huan-rotate 1s cubic-bezier(0.7, 0.1, 0.31, 0.9) infinite
     }

     @keyframes huan-rotate {
         0% {
             transform: rotate(0)
         }

         to {
             transform: rotate(360deg)
         }
     }
 </style>
 <div class="qjl qj_loading" style="position: fixed;background:var(--main-bg-color);width: 100%;margin-top:-150px;height:300%;z-index: 99999999">
     <div style="position:fixed;top:0;left:0;bottom:0;right:0;display:flex;align-items:center;justify-content:center">
         <div class="qjdh_no2"></div>
     </div>
 </div>