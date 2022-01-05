<div class="col-2">
    <nav class="personal-sidebar">

        <div class="personal-sidebar__header">
            <img src="<?= $_SESSION['user']['avatar'];?>" alt="" class="personal-sidebar__avatar js-trigger-profile" >
            <div class="personal-sidebar__profile"  >
                <h3 class="username"><?= $_SESSION['user']['name'];?></h3>
                <div class="edit js-trigger-profile"><i class="fas fa-pen"></i> Sửa Hồ Sơ</div>
            </div>
        </div>

        <ul class="personal-sidebar__list">

            <li class="personal-sidebar__item">
                <span id="personal-sidebar__nav-1" class="personal-sidebar__nav" focus="#account" >
                   <svg  class="svg-icon" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 512 512"><g data-name="&lt;Group&gt;"><path fill="#ed664c" d="M389.25 403.71v24.83a218.018 218.018 0 0 1-266.5 0V403.71a133.25 133.25 0 0 1 266.5 0zM304.09 124.82a67.514 67.514 0 1 1-47.64-19.67A67.064 67.064 0 0 1 304.09 124.82z"/><path fill="#fdc75b" d="M256,38c120.4,0,218,97.6,218,218a217.579,217.579,0,0,1-84.75,172.54V403.71a133.25,133.25,0,0,0-266.5,0v24.83A217.579,217.579,0,0,1,38,256C38,135.6,135.6,38,256,38Zm67.76,134.46a67.158,67.158,0,1,0-19.67,47.63A67.064,67.064,0,0,0,323.76,172.46Z"/><path d="M256,28A228.09,228.09,0,0,0,52.1,358.141a230.034,230.034,0,0,0,64.528,78.309,228.02,228.02,0,0,0,278.735,0A230.007,230.007,0,0,0,459.9,358.141,228.045,228.045,0,0,0,256,28ZM132.75,423.557V403.71a123.25,123.25,0,0,1,246.5,0v19.847a208.024,208.024,0,0,1-246.5,0Zm266.5-16.749v-3.1c0-78.988-64.262-143.25-143.25-143.25A143.257,143.257,0,0,0,112.75,403.71v3.1A206.439,206.439,0,0,1,48,256C48,141.309,141.309,48,256,48s208,93.309,208,208A206.444,206.444,0,0,1,399.25,406.808Z"/><path d="M256.45,95.15a77.158,77.158,0,1,0,54.713,22.6A76.787,76.787,0,0,0,256.45,95.15Zm40.566,117.872a57.513,57.513,0,1,1,16.745-40.562A56.931,56.931,0,0,1,297.016,213.022Z"/></g></svg>
                    Tài Khoản Của Tôi
                </span>
                <ul class="personal-sidebar__subnav">
                    <li id="personal-sidebar__subnav-item-1" class="personal-sidebar__subnav-item" focus=".profile">Hồ Sơ</li>
                    <li id="personal-sidebar__subnav-item-2" class="personal-sidebar__subnav-item" focus=".bank">Ngân Hàng</li>
                    <li id="personal-sidebar__subnav-item-3" class="personal-sidebar__subnav-item" focus=".address">Địa Chỉ</li>   
                    <li id="personal-sidebar__subnav-item-4" class="personal-sidebar__subnav-item" focus=".update-password">Đổi Mật Khẩu</li>
                </ul>
            </li>

            <li class="personal-sidebar__item">
                <a id="personal-sidebar__nav-2" class="personal-sidebar__nav" focus="#purchase"  href="./Personal/purchase">
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64"><path fill="#FBB03B" stroke="#000" stroke-miterlimit="10" stroke-width="2" d="M51.9,8.2h-8.4v2.1c0,2-1.7,3.5-3.8,3.5H24.3
                    c-2.1,0-3.8-1.6-3.8-3.5V8.2h-8.4c-1.3,0-2.3,1-2.3,2.3v49c0,1.3,1.1,2.3,2.3,2.3h39.8c1.3,0,2.3-1,2.3-2.3v-49
                    C54.2,9.3,53.2,8.2,51.9,8.2z M33.2,57c-3.7,0-6.7-2.9-6.7-6.5s3-6.5,6.7-6.5c3.7,0,6.7,2.9,6.7,6.5S36.8,57,33.2,57z"/><path fill="#F7931E" stroke="#000" stroke-miterlimit="10" stroke-width="2" d="M43.5,6.1v4.2c0,2-1.7,3.5-3.8,3.5H24.3
                    c-2.1,0-3.8-1.6-3.8-3.5V6.1c0-2,1.7-3.6,3.8-3.6h15.3C41.8,2.6,43.5,4.2,43.5,6.1z"/><line x1="17.6" x2="48.8" y1="21.3" y2="21.3" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"/><line x1="17.6" x2="48.8" y1="27.6" y2="27.6" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"/><line x1="17.6" x2="48.8" y1="33.8" y2="33.8" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"/><line x1="17.6" x2="48.8" y1="40.1" y2="40.1" fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2"/><path fill="#0FF" stroke="#000" stroke-miterlimit="10" stroke-width="2" d="M39.8,50.5c0,3.6-3,6.5-6.7,6.5
                    c-3.7,0-6.7-2.9-6.7-6.5s3-6.5,6.7-6.5C36.8,43.9,39.8,46.8,39.8,50.5z"/><path fill="none" stroke="#000" stroke-miterlimit="10" stroke-width="2" d="M36.4,48l-3.8,4.6c-0.6,0.5-1.3,0.3-1.7-0.4
                    L30,50.5"/></svg>
                    Đơn Mua
                </a>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" focus="#notify">
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#eabe06" d="M51.97,23.69,23.69,51.97l-3.54-3.53.39-2.73a4.518,4.518,0,0,0-1.27-3.82l-4.78-4.77L8.84,31.46A15.963,15.963,0,0,1,9.4,8.31a14.81,14.81,0,0,1,2.46-1.83,10.259,10.259,0,0,1,1.03-.56A16.467,16.467,0,0,1,31.78,9.16l5.34,5.33,4.77,4.78a4.518,4.518,0,0,0,3.82,1.27l2.73-.39Z"/><path fill="#f9d438" d="M51.97,23.69,27.24,48.42,24,45.18l.39-2.72a4.508,4.508,0,0,0-1.27-3.82l-4.78-4.78-5.65-5.65a15.977,15.977,0,0,1-.83-21.73,10.259,10.259,0,0,1,1.03-.56A16.467,16.467,0,0,1,31.78,9.16l5.34,5.33,4.77,4.78a4.518,4.518,0,0,0,3.82,1.27l2.73-.39Z"/><path fill="#d1aa09" d="M12.89,5.92a13.234,13.234,0,0,0-1.71.98c-.01,0-.02.01-.03.02A16.409,16.409,0,0,0,9.4,8.31,15.416,15.416,0,0,0,7,11.05c-.15.19-.27.38-.4.58v.01c-.01.01-.02.03-.03.04-.24.39-.46.78-.67,1.19a3.979,3.979,0,0,1-.6-.5,5,5,0,0,1,0-7.07,4.653,4.653,0,0,1,1.09-.82c.02-.01.03-.02.05-.03A4.679,4.679,0,0,1,8.08,3.9a5,5,0,0,1,4.29,1.4,4.4,4.4,0,0,1,.4.46C12.81,5.81,12.85,5.86,12.89,5.92Z"/><path fill="#e2bf2d" d="M12.89,5.92a13.234,13.234,0,0,0-1.71.98c-.01,0-.02.01-.03.02A16.409,16.409,0,0,0,9.4,8.31,15.416,15.416,0,0,0,7,11.05,4.98,4.98,0,0,1,8.08,3.9a5,5,0,0,1,4.29,1.4,4.4,4.4,0,0,1,.4.46C12.81,5.81,12.85,5.86,12.89,5.92Z"/><path fill="#d1aa09" d="M44.77,36.28l-8.49,8.49c-1.19,1.06-2.35,2.02-3.46,2.89a.219.219,0,0,1-.05.03c-4.51,3.52-8.07,5.3-9.08,4.28-1.54-1.53,3.33-8.91,10.92-16.57a.647.647,0,0,1,.08-.09L35,35c2.11-2.11,4.21-4.03,6.18-5.67.02-.02.05-.04.07-.06,5.27-4.36,9.59-6.72,10.72-5.58C53.24,24.95,50.15,30.19,44.77,36.28Z"/><path fill="#d6b116" d="M46.74,45.82a4.865,4.865,0,0,1-.43.49,5.995,5.995,0,0,1-10.03-5.79l-3.4-3.4,4.24-4.24.03.03,3.37,3.37a5.99,5.99,0,0,1,6.22,9.54Z"/><path fill="#e8c221" d="M46.74,45.82a5.987,5.987,0,0,1-9.34-6.37L34,36.05l3.15-3.14,3.37,3.37a5.99,5.99,0,0,1,6.22,9.54Z"/><path fill="gold" d="M44.567,53.148a8.555,8.555,0,0,1-1.8-.174,1,1,0,0,1,.458-1.948,6.962,6.962,0,0,0,6.064-1.733,6.867,6.867,0,0,0,1.732-6.067,1,1,0,0,1,1.95-.452,8.988,8.988,0,0,1-2.268,7.933A8.542,8.542,0,0,1,44.567,53.148Z"/><path fill="gold" d="M46.868,59.006a11.654,11.654,0,0,1-2.244-.2,1,1,0,0,1,.4-1.959A10.011,10.011,0,0,0,56.847,45.028a1,1,0,0,1,1.959-.4,12.477,12.477,0,0,1-3.273,10.909A12.074,12.074,0,0,1,46.868,59.006Z"/><path d="M42.071,49.069a6.97,6.97,0,0,0,3.984-12.738c3.7-4.264,8.9-11.078,6.623-13.352l-3.536-3.536a1,1,0,0,0-.849-.283l-2.72.39a3.539,3.539,0,0,1-2.971-.99L32.489,8.448A17.6,17.6,0,0,0,13.171,4.694c-.031-.033-.058-.066-.091-.1A6,6,0,0,0,4.6,13.08c.026.026.052.047.078.072A16.927,16.927,0,0,0,8.13,32.172L18.56,42.6a3.523,3.523,0,0,1,.99,2.969l-.39,2.722a1,1,0,0,0,.283.849l3.536,3.536a2.045,2.045,0,0,0,1.51.555c3,0,8.3-4.109,11.843-7.177a7.091,7.091,0,0,0,.789.965A6.953,6.953,0,0,0,42.071,49.069Zm5-7a5,5,0,1,1-9.823-1.288,1,1,0,0,0-.259-.968l-2.674-2.674c.458-.477.913-.953,1.394-1.434s.96-.948,1.429-1.4l2.679,2.679a1.01,1.01,0,0,0,.968.259,4.99,4.99,0,0,1,6.286,4.825Zm-2.864-6.662a6.981,6.981,0,0,0-3.364-.224l-2.249-2.25c6.846-6.321,11.707-8.912,12.631-8.582l.014.014C51.494,25.038,50.074,28.709,44.205,35.409Zm-38.2-29.4a3.966,3.966,0,0,1,5.252-.333,16.415,16.415,0,0,0-2.54,1.892,17.165,17.165,0,0,0-3.048,3.69,3.967,3.967,0,0,1,.336-5.249ZM19.974,41.188,9.544,30.758a15,15,0,0,1,.523-21.711,14.066,14.066,0,0,1,3.271-2.236A15.549,15.549,0,0,1,31.075,9.862L41.188,19.974a5.551,5.551,0,0,0,4.666,1.556l2.227-.319,1.512,1.512c-5.449,1.775-14.812,11.082-15.3,11.57q-1.044,1.044-2.021,2.078c-1.606,1.7-8.08,8.749-9.539,13.232l-1.522-1.522.319-2.228A5.534,5.534,0,0,0,19.974,41.188ZM24.423,51.3c-.353-.83,1.886-5.511,8.516-12.707l2.246,2.245a6.98,6.98,0,0,0,.226,3.363C28.675,50.1,25,51.511,24.423,51.3Z"/><path d="M50.707,50.707a8.988,8.988,0,0,0,2.268-7.933,1,1,0,0,0-1.95.452,6.867,6.867,0,0,1-1.732,6.067,6.962,6.962,0,0,1-6.064,1.733,1,1,0,0,0-.458,1.948,9.024,9.024,0,0,0,7.936-2.267Z"/><path d="M57.624,43.847a1,1,0,0,0-.777,1.181A10.011,10.011,0,0,1,45.028,56.847a1,1,0,0,0-.4,1.959,11.654,11.654,0,0,0,2.244.2,12.074,12.074,0,0,0,8.665-3.473,12.477,12.477,0,0,0,3.273-10.909A1,1,0,0,0,57.624,43.847Z"/></svg>
                    Thông Báo
                </span>
                <ul class="personal-sidebar__subnav">
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__update-bill">Cập Nhật Đơn Hàng</li>
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__sale">Khuyến Mãi</li>
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__wallet">Cập Nhật Ví</li>
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__activity">Hoạt Động</li>
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__rated">Cập Nhật Đánh Giá</li>
                    <li class="personal-sidebar__subnav-item" focus=".personal-notify__update-hevy">Cập Nhật Hevy</li>
                </ul>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" focus="#voucher">
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36"><g font-family="sans-serif" font-size="45.121" font-weight="400" letter-spacing="0" transform="translate(0 -1016.362)" word-spacing="0"><path fill="#25b39e" d="m 4.00094,1030.3621 0,12 21,0 0,-12 -21,0 z"/><path d="M 11.572266,1024.3613 C 10.71037,1024.3613 10,1025.0716 10,1025.9336 l 0,3.0449 1,0 0,-3.0449 c 0,-0.3253 0.247001,-0.5723 0.572266,-0.5723 l 21.857422,0 c 0.325264,0 0.570312,0.247 0.570312,0.5723 l 0,12.8574 c 0,0.3251 -0.245104,0.5703 -0.570312,0.5703 l -7.294922,0 0,1 7.294922,0 c 0.861951,0 1.570312,-0.7084 1.570312,-1.5703 l 0,-12.8574 c 0,-0.862 -0.708417,-1.5723 -1.570312,-1.5723 l -21.857422,0 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 10.5,1026.3613 0,1 23.5,0 0,2 -7.5,0 0,1 8.5,0 0,-4 -24.5,0 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path fill="#f8b84e" stroke="#000" d="m 26.701095,1032.0291 a 2.0000086,2.0000086 0 0 1 2.389738,0.6197 2.0000086,2.0000086 0 0 1 -0.03281,2.4686 2.0000086,2.0000086 0 0 1 -2.405364,0.556"/><circle cx="30.501" cy="1033.862" r="2" fill="#25b39e" stroke="#000"/><path d="M 3.5722656,1028.3613 C 2.7103689,1028.3613 2,1029.0717 2,1029.9336 l 0,12.8574 c 0,0.8619 0.7103127,1.5703 1.5722656,1.5703 l 21.8574224,0 C 26.29164,1044.3613 27,1043.6529 27,1042.791 l 0,-12.8574 c 0,-0.8619 -0.708416,-1.5723 -1.570312,-1.5723 l -21.8574224,0 z m 0,1 21.8574224,0 c 0.325267,0 0.570312,0.247 0.570312,0.5723 l 0,12.8574 c 0,0.3251 -0.245101,0.5703 -0.570312,0.5703 l -21.8574224,0 C 3.2470537,1043.3613 3,1043.1161 3,1042.791 l 0,-12.8574 c 0,-0.3253 0.2469976,-0.5723 0.5722656,-0.5723 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 14.501953,1032.3613 c -2.203211,0 -4.000033,1.7968 -4,4 3e-5,2.2032 1.796834,4 4,4 2.203167,0 3.998017,-1.7968 3.998047,-4 3.3e-5,-2.2032 -1.794836,-4 -3.998047,-4 z m 0,1 c 1.662766,0 2.998072,1.3373 2.998047,3 -2.2e-5,1.6628 -1.335315,3 -2.998047,3 -1.662731,0 -2.999977,-1.3372 -3,-3 -2.5e-5,-1.6627 1.337235,-3 3,-3 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" fill-rule="evenodd" d="M19.5 1033.3613l0 1 2 0 0-1-2 0zM20.5 1035.8613l0 1 3 0 0-1-3 0zM19.5 1038.3613l0 1 2 0 0-1-2 0zM7.5 1033.3613l0 1 2 0 0-1-2 0zM5.5 1035.8613l0 1 3 0 0-1-3 0zM7.5 1038.3613l0 1 2 0 0-1-2 0z" color="#000" font-size="medium" overflow="visible"/></g></svg>
                    Kho Voucher
                </span>
            </li>

            <li class="personal-sidebar__item">
                <span class="personal-sidebar__nav" focus="#cent">
                    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64"><path fill="#ed995a" d="M40.4,51.45,38,52.58l-.11.02A6.888,6.888,0,0,0,35,47.59V44l5.4,2.55A2.677,2.677,0,0,1,40.4,51.45Z"/><path fill="#e2884b" d="M37.762,52.866a1,1,0,0,1-.973-.777,5.692,5.692,0,0,0-2.311-3.649A1,1,0,0,1,34,47.586V43.935a1,1,0,0,1,2,0v3.126a7.967,7.967,0,0,1,2.738,4.582,1,1,0,0,1-.752,1.2A1.012,1.012,0,0,1,37.762,52.866Z"/><path fill="#02966c" d="M35,43.16V38a3,3,0,0,0-6,0v6.41L26.18,45,20,46.29l-1,.21-2.46.51-1.41-6.75L7.97,5.89,19,3.59l1-.21L21.82,3H31.88l8.15,39.11Z"/><polygon fill="#02966c" points="55.97 5.84 54.76 11.73 47.54 46.98 38.72 45.17 37.89 45 32.85 43.97 24.03 42.16 32.05 3 42.12 3 44 3.39 45 3.59 50.12 4.64 55.97 5.84"/><rect width="24" height="42" x="20" y="3" fill="#02966c"/><path fill="#38ce98" d="M55.97,5.84l-1.21,5.89a6,6,0,0,1-4.64-7.09Z"/><path fill="#f9e280" d="M44,19.528a6,6,0,0,1,0,8.944Z"/><path fill="#11aa7b" d="M20,3H32a0,0,0,0,1,0,0V28.242A7.758,7.758,0,0,1,24.242,36H20a0,0,0,0,1,0,0V3A0,0,0,0,1,20,3Z"/><path fill="#02966c" d="M35,38v5.16l-6,1.25V38a3,3,0,0,1,6,0Z"/><path fill="#38ce98" d="M9.191 11.765a6 6 0 0 0 4.649-7.1L7.967 5.891zM20 19.53v8.93a5.864 5.864 0 0 1-1.87-3.24A5.972 5.972 0 0 1 20 19.53z"/><path fill="#39d8a3" d="M45.88,25.2A5.9,5.9,0,0,1,44,28.46V19.53A6,6,0,0,1,45.88,25.2Z"/><polygon fill="#038e63" points="20 3.39 20 46.29 19 46.5 19 3.59 20 3.39"/><path fill="#38ce98" d="M22.412,45.783a6,6,0,0,0-7.1-4.65l1.224,5.874Z"/><path fill="#39d8a3" d="M20 9a6 6 0 0 0 6-6H20zM44 9a6 6 0 0 1-6-6h6z"/><circle cx="32" cy="24" r="6" fill="#39d8a3"/><rect width="2" height="2" x="31" y="12" fill="#39d8a3"/><path fill="#39d8a3" d="M26,45a6,6,0,0,0-6-6v6Z"/><polygon fill="#038e63" points="45 3.59 45 45 44 45 44 3.39 45 3.59"/><path fill="#38ce98" d="M41.663,45.777A6,6,0,0,1,48.745,41.1l-1.2,5.877Z"/><path fill="#39d8a3" d="M38,45a6,6,0,0,1,6-6v6Z"/><path fill="#f7aa6b" d="M38,54c0,3.87-2.24,7-5,7H20L14,48l1-8h.03l.1.26,1.41,6.75L26.18,45H29V38a3,3,0,0,1,6,0v9.59a3.617,3.617,0,0,1,.32.22c.11.08.21.16.32.25a3.833,3.833,0,0,1,.29.28,1.848,1.848,0,0,1,.14.14c.06.07.13.14.19.22a6.318,6.318,0,0,1,1,1.65,3.656,3.656,0,0,1,.18.46,1.336,1.336,0,0,1,.07.18.7.7,0,0,1,.06.19,5.9,5.9,0,0,1,.17.6c.06.27.11.54.15.82a4.019,4.019,0,0,1,.06.5,1.526,1.526,0,0,1,.03.3C37.99,53.6,38,53.8,38,54Z"/><path fill="#f9b378" d="M32,35V46.53A15.484,15.484,0,0,1,22,61H20L14,48l1-8h.03l.1.26,1.41,6.75L26.18,45H29V38a3,3,0,0,1,3-3Z"/><path d="M39,24a7,7,0,1,0-7,7A7.008,7.008,0,0,0,39,24Zm-7,5a5,5,0,1,1,5-5A5.006,5.006,0,0,1,32,29Z"/><rect width="2" height="2" x="31" y="12"/><path d="M9.524,18.2l1.959-.4-1.106-5.367a7.006,7.006,0,0,0,4.6-6.994L19,4.609V19.115a7.019,7.019,0,0,0-1.863,6.3A6.936,6.936,0,0,0,19,28.877V40.471a7.014,7.014,0,0,0-2.937-.459L11.9,19.83l-1.959.4L14,39.923l-.994,7.953a1,1,0,0,0,.084.543l6,13a1,1,0,1,0,1.816-.838L15.028,47.84l.229-1.83.244,1.182a1,1,0,0,0,.979.8,1.022,1.022,0,0,0,.256-.033L24.13,46H28v3.813a1,1,0,0,0,2,0V38a2,2,0,0,1,4,0v9.586a1,1,0,0,0,.478.854C36.01,49.377,37,51.56,37,54c0,3.252-1.832,6-4,6a1,1,0,0,0,0,2c3.309,0,6-3.589,6-8,0-.258-.02-.511-.038-.765l1.861-.879A3.706,3.706,0,0,0,43,49a3.617,3.617,0,0,0-.639-2.051l4.95,1.021a1.064,1.064,0,0,0,.2.02,1,1,0,0,0,.98-.8l2.889-14.017-1.959-.4-1.492,7.24A7.016,7.016,0,0,0,45,40.468v-11.6a6.928,6.928,0,0,0,1.856-3.455A7.021,7.021,0,0,0,45,19.122V4.61l4.013.827a7,7,0,0,0,4.6,6.994L49.831,30.792l1.959.4L56.972,6.057A1,1,0,0,0,56.2,4.876L44.875,2.542A.99.99,0,0,0,44,2H20a.99.99,0,0,0-.874.54L7.8,4.876a1,1,0,0,0-.777,1.181ZM21,44V40.1A5.016,5.016,0,0,1,24.9,44Zm-4.529-2.006A5,5,0,0,1,19,42.7V45a.967.967,0,0,0,.055.274l-1.809.479ZM32,34a4,4,0,0,0-4,4v6H26.92A7,7,0,0,0,21,38.08V9.92A7,7,0,0,0,26.92,4H37.08A7,7,0,0,0,43,9.92V38.08a7.006,7.006,0,0,0-5.9,5.805L36,43.366V38A4,4,0,0,0,32,34Zm7.1,10A5.016,5.016,0,0,1,43,40.1V44Zm.868,6.547-1.362.643A7.829,7.829,0,0,0,36,47.062V46h.893l3.076,1.453a1.676,1.676,0,0,1,0,3.094Zm7.553-8.553-.786,3.815-1.842-.38A.971.971,0,0,0,45,45V42.7A4.994,4.994,0,0,1,47.522,41.994Zm6.5-31.543a5.014,5.014,0,0,1-3.031-4.605l3.818.787ZM43,7.9A5.016,5.016,0,0,1,39.1,4H43ZM24.9,4A5.016,5.016,0,0,1,21,7.9V4ZM13,5.846a5.016,5.016,0,0,1-3.032,4.606L9.181,6.633Z"/></svg>
                    Hevy Xu
                </span>
            </li>

        </ul>
    </nav>
</div>

