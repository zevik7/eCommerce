<nav class="category-bar">
    <h3 class="category-bar__title title">
        <i class="far fa-list-alt category-header__icon"></i> Danh mục hàng
    </h3>
    <ul id="category-bar__list" class="category-bar__list" 
    activeItem = "<?php if(isset($_GET['category'])) echo $_GET['category'];?>">
        <li>
            <a id="" class="fs-category-bar__item category-bar__item
            <?php if (!isset($_GET['category'])) echo "active"; ?>" href="#"> 
                <span> Tất cả</span>
            </a>
        </li>
        <li>
            <a id="1" class="fs-category-bar__item category-bar__item
            <?php if (isset($_GET['category']) && $_GET['category'] == 1) echo "active";?>"
            href="<?php echo replaceUrlParams('category', 1) ?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="2 0 28 28"><path fill="#ffcc5c" d="M21.057 11.311L15.5 10l-5.502 1.3c-2.986.595-4.801 1.636-4.801 2.751 0 1.785 4.651 3.253 10.303 3.253s10.303-1.469 10.303-3.253c0-1.108-1.792-2.142-4.746-2.74z"/><path fill="#f7b546" d="M21.057 11.311L15.5 10l-1.999.472 3.555.839c2.954.597 4.746 1.632 4.746 2.74 0 1.569-3.594 2.893-8.303 3.19.648.041 1.316.063 2 .063 5.652 0 10.303-1.469 10.303-3.253.001-1.108-1.791-2.142-4.745-2.74z"/><path fill="#ffcc5c" d="M20.148 6.663a1.791 1.791 0 0 0-2.732-1.056l-.425.283a2.688 2.688 0 0 1-2.982 0l-.425-.283a1.792 1.792 0 0 0-2.732 1.056L9.677 13.48c0 1.016 2.607 1.839 5.823 1.839s5.823-.823 5.823-1.839l-1.175-6.817z"/><path fill="#f7b546" d="M20.148 6.663c-.244-.975-1.21-1.502-2.117-1.305.044.098.09.195.117.305l1.175 6.817c0 1.016-2.607 1.839-5.823 1.839-1.386 0-2.657-.153-3.656-.409.614.808 2.91 1.409 5.656 1.409 3.216 0 5.823-.823 5.823-1.839l-1.175-6.817z"/><path fill="#4c6d86" d="M20.995 11.578c-.049.946-2.489 1.708-5.495 1.708s-5.446-.762-5.495-1.708l-.328 1.902c0 1.016 2.607 1.839 5.823 1.839s5.823-.823 5.823-1.839l-.328-1.902z"/><path fill="#41667d" d="M20.995 11.578c-.026.493-.71.933-1.777 1.244-.509.852-2.873 1.497-5.719 1.497-1.386 0-2.657-.153-3.656-.409.228.3.689.571 1.318.793l.042.014c.205.071.426.137.663.198l.022.005a11.28 11.28 0 0 0 .787.166c.253.044.519.082.793.114l.141.016a17.297 17.297 0 0 0 1.891.101c3.216 0 5.823-.823 5.823-1.839l-.328-1.9z"/><path fill="#d5e5f1" d="M14.092 24c.207-.581.757-1 1.408-1s1.201.419 1.408 1h1.042c-.232-1.14-1.242-2-2.449-2s-2.217.86-2.449 2h1.04zM19.5 21.304h-8a.5.5 0 0 1 0-1h8a.5.5 0 0 1 0 1z"/><path fill="#99b5ce" d="M16.014 22.059c-.003.045-.014.088-.014.134v.333c0 .206.035.403.066.6a1.5 1.5 0 0 1 .841.874h1.042a2.502 2.502 0 0 0-1.935-1.941zM16.232 21.304H19.5a.5.5 0 0 0 0-1h-1.611c-.72 0-1.338.408-1.657 1zM11 20.804a.5.5 0 0 0 .5.5h3.268a1.88 1.88 0 0 0-1.657-1H11.5a.5.5 0 0 0-.5.5zM13.051 24h1.042c.143-.401.456-.715.847-.877.031-.196.06-.392.06-.597v-.333c0-.046-.01-.089-.014-.134A2.502 2.502 0 0 0 13.051 24z"/><path fill="#3c3b42" d="M20.278 26.304h1.667a1.89 1.89 0 0 0 1.889-1.889v-2.852a1.26 1.26 0 0 0-1.259-1.259H18.39a1.89 1.89 0 0 0-1.889 1.889v.333c0 1.143.508 2.168 1.31 2.86a3.756 3.756 0 0 0 2.467.918z"/><path fill="#d5e5f1" d="M24.333 22.138h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1z"/><path fill="#2b2a2f" d="M17.65 20.454a1.89 1.89 0 0 0-.15.739v.333a3.778 3.778 0 0 0 3.778 3.778h1.667c.262 0 .512-.054.739-.15a1.89 1.89 0 0 1-1.739 1.15h-1.667a3.778 3.778 0 0 1-3.778-3.778v-.333a1.89 1.89 0 0 1 1.15-1.739z"/><path fill="#3c3b42" d="M10.722 26.304H9.056a1.89 1.89 0 0 1-1.889-1.889v-2.852a1.26 1.26 0 0 1 1.259-1.259h4.185a1.89 1.89 0 0 1 1.889 1.889v.333a3.777 3.777 0 0 1-3.778 3.778z"/><path fill="#2b2a2f" d="M13.35 20.454c.096.227.15.476.15.739v.333a3.778 3.778 0 0 1-3.778 3.778H8.056c-.262 0-.512-.054-.739-.15a1.89 1.89 0 0 0 1.739 1.15h1.667a3.778 3.778 0 0 0 3.778-3.778v-.333a1.892 1.892 0 0 0-1.151-1.739z"/><path fill="#d5e5f1" d="M7.667 22.138h-1a.5.5 0 0 1 0-1h1a.5.5 0 0 1 0 1z"/><path fill="#99b5ce" d="M7.667 21.138h-.5a.5.5 0 0 1 0 1h.5a.5.5 0 0 0 0-1zM23.333 22.138h.5a.5.5 0 0 1 0-1h-.5a.5.5 0 0 0 0 1z"/></svg>
                <span> Thời trang</span> 
            </a>
        </li>
        <li>
            <a id="2" class="fs-category-bar__item category-bar__item category-bar__item--shoe
            <?php if (isset($_GET['category']) && $_GET['category'] == 2) echo "active";?>" 
            href="<?php echo replaceUrlParams('category', 2) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 47.5 47.5" viewBox="-2 12 48 48"><defs><clipPath id="a" clipPathUnits="userSpaceOnUse"><path d="M 0,38 38,38 38,0 0,0 0,38 Z"/></clipPath></defs><g clip-path="url(#a)" transform="matrix(1.25 0 0 -1.25 0 47.5)"><path fill="#ccd6dd" d="m 0,0 c 0,-0.828 -0.672,-1.5 -1.5,-1.5 l -33,0 c -0.829,0 -1.5,0.672 -1.5,1.5 0,0.828 0.671,1.5 1.5,1.5 l 33,0 C -0.672,1.5 0,0.828 0,0" transform="translate(37 2.5)"/><path fill="#55acee" d="m 0,0 c 0,0 -0.522,-0.063 -1.05,-2.158 -0.526,-2.089 -0.342,-4.063 -0.344,-6.656 -0.001,-0.671 1.045,-1.082 1.045,-1.082 L 33.17,-9.937 c 0,0 1.048,0.443 1.048,1.079 0.003,1.354 -0.67,5.237 -5.071,5.237 -1.047,0 -5.27,-0.049 -8.537,2.341 -1.208,0.882 -5.86,2.852 -7.953,3.934 C 10.563,3.738 10.473,-1.094 6.283,-1.088 2.094,-1.082 2.095,-0.004 0,0" transform="translate(2.452 13.613)"/><path fill="#269" d="M 0,0 -0.61,1.783 C 2.086,2.706 3.007,4.471 3.045,4.545 L 4.736,3.714 C 4.686,3.611 3.475,1.189 0,0" transform="translate(13.312 9.98)"/><path fill="#269" d="M 0,0 -0.611,1.783 C 2.086,2.707 3.031,4.52 3.04,4.537 L 4.735,3.713 C 4.684,3.61 3.473,1.19 0,0" transform="translate(18.043 7.697)"/><path fill="#3b88c3" d="m 0,0 -34,0 c -0.552,0 -1,0.447 -1,1 0,0.553 0.448,1 1,1 L 0,2 C 0.553,2 1,1.553 1,1 1,0.447 0.553,0 0,0" transform="translate(36 3)"/></g></svg>
                <span> Giày</span>
            </a>
        </li>
        <li>
            <a id="3" class="fs-category-bar__item category-bar__item
            <?php if (isset($_GET['category']) && $_GET['category'] == 3) echo "active";?>" 
            href="<?php echo replaceUrlParams('category',3) ?>"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="3" viewBox="0 0 32 32"><g style="line-height:125%" font-family="sans-serif" font-size="45.121" font-weight="400" letter-spacing="0" transform="translate(0 -1020.362)" word-spacing="0"><path style="isolation:auto;mix-blend-mode:normal" fill="#f8b84e" d="m 6.9999995,1030.0477 c -1.2995888,1.8494 -1.9979228,4.0542 -2,6.3145 0.00488,2.2556 0.7030862,4.4553 2,6.3008 z M 25,1030.0614 l 0,12.6153 c 1.299589,-1.8494 1.997923,-4.0542 2,-6.3145 -0.0049,-2.2556 -0.703086,-4.4553 -2,-6.3008 z" color="#000" overflow="visible"/><path d="m 8.5,1022.3613 a 0.50005,0.50005 0 0 0 -0.5,0.5 l 0,27 a 0.50005,0.50005 0 0 0 0.5,0.5 l 15,0 a 0.50005,0.50005 0 0 0 0.5,-0.5 l 0,-27 a 0.50005,0.50005 0 0 0 -0.5,-0.5 l -15,0 z m 0.5,1 14,0 0,26 -14,0 0,-26 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" fill-rule="evenodd" d="m 14,1024.3613 0,1 4,0 0,-1 -4,0 z" color="#000" font-size="medium" overflow="visible"/><path style="isolation:auto;mix-blend-mode:normal" fill="#25b39e" d="m 10,1026.3622 12,0 0,19 -12,0 z" color="#000" overflow="visible"/><path d="m 17,1047.3622 a 1,1 0 0 1 -1,1 1,1 0 0 1 -1,-1 1,1 0 0 1 1,-1 1,1 0 0 1 1,1 z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal"/><path style="isolation:auto;mix-blend-mode:normal" fill="#f8b84e" d="m 21.495404,1036.3634 a 4.9999871,4.9999871 0 0 1 -4.999987,5 4.9999871,4.9999871 0 0 1 -4.999987,-5 4.9999871,4.9999871 0 0 1 4.999987,-5 4.9999871,4.9999871 0 0 1 4.999987,5 z" color="#000" overflow="visible"/><path d="m 10.503906,1031.375 0,1 0.5,0 0.703125,0 0.5,0 0,-1 -0.5,0 -0.703125,0 -0.5,0 z m 1.726563,0.9863 0,1 0.5,0 6.576172,0 -0.972657,3 -4.804687,0 -0.5,0 0,1 0.5,0 5.167969,0 a 0.50005,0.50005 0 0 0 0.474609,-0.3457 l 1.298828,-4 a 0.50005,0.50005 0 0 0 -0.474609,-0.6543 l -7.265625,0 -0.5,0 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 12.138672,1031.3613 a 0.50005,0.50005 0 0 0 -0.458984,0.6231 l 1.679687,7 a 0.50005,0.50005 0 0 0 0.486328,0.3847 l 4.154297,0 a 0.50005,0.50005 0 1 0 0,-1 l -3.759766,0 -1.589843,-6.6171 a 0.50005,0.50005 0 0 0 -0.511719,-0.3907 z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="M13.960938 1038.3652c-.82209 0-1.498066.676-1.498047 1.4981-.000019.8221.675957 1.5 1.498047 1.5.822089 0 1.500018-.6779 1.5-1.5.000018-.8221-.677911-1.4981-1.5-1.4981zm0 1c.281375 0 .500006.2162.5.4981.000006.2819-.218625.5-.5.5-.281376 0-.498054-.2181-.498047-.5-.000007-.2819.216671-.4981.498047-.4981zM17.917969 1038.3652c-.82209 0-1.500018.676-1.5 1.4981-.000018.8221.67791 1.5 1.5 1.5.822089 0 1.498065-.6779 1.498047-1.5.000018-.8221-.675958-1.4981-1.498047-1.4981zm0 1c.281375 0 .498053.2162.498047.4981.000006.2819-.216672.5-.498047.5-.281375 0-.500006-.2181-.5-.5-.000006-.2819.218625-.4981.5-.4981z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" fill-rule="evenodd" d="m 15.859375,1034.3613 0,1 3.595703,0 0,-1 -3.595703,0 z" color="#000" font-size="medium" overflow="visible"/><path d="M25.886719 1029.8242l.261719.4278.464843.7636.0078.012.02148.047.226563.4453.892578-.4511-.226563-.4473-.04102-.08-.01953-.033-.472656-.7773-.261719-.4258zm1.371093 2.5332l.154297.4746.169922.5215.002 0 .0957.3985.117187.4863.972656-.2344-.117187-.4863-.09766-.4024-.0098-.037-.181641-.5586-.154297-.4746zm.671876 2.7988l.04297.4981.01563.1953.0059.7656.0059.5 1-.01-.0059-.5-.0059-.7812-.002-.037-.01758-.2188-.04297-.498zm-.140626 3.3321l-.152343.6816-.07617.25-.146485.4785.957032.293.144531-.4785.08203-.2695.0098-.037.158203-.7011.107422-.4883L27.898438 1038zm-.923828 2.7226l-.144531.3028-.0039.01-.310547.5312-.251953.4317.863281.5058.251953-.4316.314453-.5391.01758-.035.164063-.3379.21875-.4512-.900391-.4355zM6.1132812 1029.8242l-.2617187.4278-.4648437.7636-.00781.012-.021484.047-.2265625.4453-.8925782-.4511.2265626-.4473.041016-.08.019531-.033.4726563-.7773.2617187-.4258zm-1.3710937 2.5332l-.1542969.4746-.1699218.5215-.00195 0-.095703.3985-.1171875.4863-.9726562-.2344.1171874-.4863.097656-.4024.00977-.037.1816407-.5586.1542968-.4746zm-.671875 2.7988l-.042969.4981-.015625.1953-.00586.7656-.00586.5-1-.01.00586-.5.00586-.7812.00195-.037.017578-.2188.042969-.498zm.140625 3.3321l.1523437.6816.076172.25.1464844.4785-.9570313.293-.1445312-.4785-.082031-.2695-.00977-.037-.1582031-.7011-.1074219-.4883L4.1015625 1038zm.9238281 2.7226l.1445313.3028.00391.01.3105469.5312.2519531.4317-.8632812.5058-.2519531-.4316-.3144532-.5391-.017578-.035-.1640625-.3379-.21875-.4512.9003906-.4355z" color="#000" font-size="medium" overflow="visible" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/></g></svg>
                <span> Đồ công nghệ</span>
            </a>
        </li>
        <li>
            <a id="4" class="fs-category-bar__item category-bar__item item-book
            <?php if (isset($_GET['category']) && $_GET['category'] == 4) echo "active";?>" 
            href="<?php echo replaceUrlParams('category', 4) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 -5 76 76"><path fill="#efd3b4" stroke="#5f363a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M24.33,31.85h12a0,0,0,0,1,0,0V69.5a6,6,0,0,1-6,6h0a6,6,0,0,1-6-6V31.85a0,0,0,0,1,0,0Z" transform="rotate(90 30.345 53.685)"/><path fill="#ffdd7d" stroke="#5f363a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M55.49,46.67a1,1,0,0,1-1,1h-40a6,6,0,0,0-6,6V10.32a6,6,0,0,1,6-6h40a1,1,0,0,1,1,1Z"/><line x1="52.18" x2="17.56" y1="53.69" y2="53.69" fill="none" stroke="#5f363a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/><polygon fill="#cbc46d" stroke="#5f363a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" points="29.55 21.96 24.05 18.01 18.55 21.96 18.55 4.3 29.55 4.3 29.55 21.96"/><line x1="55.49" x2="52.18" y1="59.7" y2="59.7" fill="none" stroke="#5f363a" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"/></svg>
                <span> Sách</span>
            </a>
        </li>
        <li>
            <a id="5" class="fs-category-bar__item category-bar__item category-bar__item--gift
            <?php if (isset($_GET['category']) && $_GET['category'] == 5) echo "active";?>" 
            href="<?php echo replaceUrlParams('category', 5) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 37 37"><g font-family="sans-serif" font-size="45.121" font-weight="400" letter-spacing="0" transform="translate(0 -1020.362)" word-spacing="0" style="line-height:125%"><path fill="#25b39e" stroke="#000" stroke-dashoffset="2" stroke-linecap="round" stroke-linejoin="round" style="isolation:auto;mix-blend-mode:normal" d="M3.5 1027.8622l25 0 0 5-25 0zM4.5 1032.8622l23 0 0 16.9999-23 0z" color="#000" overflow="visible"/><path fill="#f8b84e" stroke="#000" stroke-dashoffset="2" stroke-linecap="round" stroke-linejoin="round" style="isolation:auto;mix-blend-mode:normal" d="M14.5 1027.8622l3 0 0 21.9999-3 0zM18.174545 1023.8622a4.521091 4.5758314 0 0 1 2.325455 4l-4.521091 0z" color="#000" overflow="visible"/><path fill="#f8b84e" stroke="#000" stroke-dashoffset="2" stroke-linecap="round" stroke-linejoin="round" style="isolation:auto;mix-blend-mode:normal" d="m 13.825456,1023.8622 a 4.521091,4.5758314 0 0 0 -2.325456,4 l 4.521091,0 z" color="#000" overflow="visible"/><path fill="none" stroke="#000" d="m 14,1032.8622 4,0"/></g></svg>
                <span> Quà tặng</span>
            </a>
        </li>
        <li>
            <a id="6" class="fs-category-bar__item category-bar__item category-bar__item--lip
            <?php if (isset($_GET['category']) && $_GET['category'] == 6) echo "active";?>" 
            href="<?php echo replaceUrlParams('category', 6) ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -5 52 52"><symbol id="New_Symbol_14" viewBox="-6.5 -6.5 13 13"><path fill="#ffd4c3" stroke="#504b46" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M0-6c2.2 0 4.1 1.5 4.7 3.5C6.3-2.5 6.4 0 5 0v1c0 2.8-2.2 5-5 5s-5-2.2-5-5V0c-1.4 0-1.3-2.5.2-2.5C-4.1-4.5-2.2-6 0-6z"/><circle cx="-1.6" cy="-.1" r=".1" fill="#ffc258"/><path fill="#4f4b45" d="M-1.6.5c-.3 0-.6-.3-.6-.6s.2-.7.6-.7c.3 0 .6.3.6.7s-.3.6-.6.6z"/><circle cx="1.6" cy="-.1" r=".1" fill="#ffc258"/><path fill="#4f4b45" d="M1.6.5C1.3.5 1 .2 1-.1s.3-.6.6-.6.6.3.6.6-.2.6-.6.6z"/><circle cx="-3" cy="-1.5" r=".5" fill="#fabfa5"/><circle cx="3" cy="-1.5" r=".5" fill="#fabfa5"/><path fill="none" stroke="#504b46" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M-1.2-3c.8-.5 1.7-.5 2.5 0"/></symbol><g id="Icons"><g id="XMLID_1868_"><ellipse id="XMLID_6800_" cx="24" cy="40.8" fill="#45413c" opacity=".15" rx="13.6" ry="1.9"/><path id="XMLID_421_" fill="#ff6196" d="M24 35.2s-4.2.3-11.5-4.8c-4.5-3.1-7.7-4.9-9.2-5.7-.6-.3-1-.9-1-1.6 0-.6.3-1.2.8-1.5 2-1.3 7.5-5.3 11-10.9C20 1.4 24 7.1 24 7.1s4-5.7 9.8 3.6c3.5 5.6 9 9.6 11 10.9.5.3.8.9.8 1.5 0 .7-.4 1.3-1 1.6-1.5.8-4.7 2.6-9.2 5.7-7.2 5.1-11.4 4.8-11.4 4.8z"/><path id="XMLID_515_" fill="#ff87af" d="M2.4 23.2c0 .4.4.7.9.8 1.5.4 4.7 1.4 9.2 3.2 7.3 2.9 11.5 2.7 11.5 2.7s4.2.2 11.5-2.7c4.5-1.8 7.7-2.8 9.2-3.2.6-.2.9-.5.9-.8H2.4z"/><path id="XMLID_514_" fill="#ff87af" d="M3.3 24.7s.1 0 .1.1c2.2-1.5 7.4-5.3 10.7-10.7 3.5-5.6 6.3-5.8 8-5 1.1.5 2.4.5 3.5 0 1.7-.7 4.5-.5 8 5 3.4 5.4 8.5 9.3 10.7 10.7 0 0 .1 0 .1-.1.6-.3 1-.9 1-1.6 0-.6-.3-1.2-.8-1.5-2-1.3-7.5-5.3-11-10.9C28 1.4 24 7.1 24 7.1s-4-5.7-9.8 3.6c-3.5 5.6-9 9.6-11 10.9-.5.3-.8.9-.8 1.5 0 .7.4 1.3.9 1.6z"/><path id="XMLID_420_" fill="none" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M24 35.2s-4.2.3-11.5-4.8c-4.5-3.1-7.7-4.9-9.2-5.7-.6-.3-1-.9-1-1.6 0-.6.3-1.2.8-1.5 2-1.3 7.5-5.3 11-10.9C20 1.4 24 7.1 24 7.1s4-5.7 9.8 3.6c3.5 5.6 9 9.6 11 10.9.5.3.8.9.8 1.5 0 .7-.4 1.3-1 1.6-1.5.8-4.7 2.6-9.2 5.7-7.2 5.1-11.4 4.8-11.4 4.8z"/><path id="XMLID_511_" fill="#525252" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M24 23.2c3.5 0 4.6.1 10.8.7s10.8-.7 10.8-.7-5.3-.7-10.8-3.5-7.5-3.5-10.8-3.5c-3.3 0-5.3.8-10.8 3.5-5.5 2.8-10.8 3.5-10.8 3.5s4.6 1.3 10.8.7 7.3-.7 10.8-.7z"/><path id="XMLID_510_" fill="#fff" stroke="#45413c" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M24 20.7c4.2 0 8.3-.1 12.1-.3-.4-.2-.9-.4-1.3-.6-5.5-2.8-7.5-3.5-10.8-3.5-3.3 0-5.3.8-10.8 3.5-.4.2-.9.4-1.3.6 3.8.2 7.9.3 12.1.3z"/></g></g></svg>
                <span> Mỹ phẩm</span>
            </a>
        </li>
    </ul>
</nav> 