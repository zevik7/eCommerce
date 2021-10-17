<div id="purchase" class="personal-body">
       <div class="purchase__menu">
            <a id="all-purchases" class="purchase__menu-nav purchase-active" focus=".all-purchases" href="./Personal/purchase">
                Tất cả
            </a>
            <a id="awaiting-approval"  class="purchase__menu-nav" focus=".awaiting-approval" href="./Personal/purchase/?status=waiting">
                Chờ xác nhận
            </a>
            <a id="preparing"  class="purchase__menu-nav" focus=".preparing" href="./Personal/purchase/?status=preparing">
                Chờ lấy hàng
            </a>
            <a id="delivering" class="purchase__menu-nav" focus=".delivering"  href="./Personal/purchase/?status=delivering">
                Đang giao
            </a>
            <a id="delivered" class="purchase__menu-nav" focus=".delivered"  href="./Personal/purchase/?status=done">
                Đã giao
            </a>
            <a id="cancel"  class="purchase__menu-nav" focus=".cancel" href="./Personal/purchase/?status=cancel">
                Đã hủy
            </a>  
       </div>
       
       <div class="purchase-container">
            <div class="all-purchases">
                <?php
                    if (isset($data['Purchase']) && sizeof(json_decode($data['Purchase'], true)) > 0)
                    {   
                        
                ?>
                <div class="all-purchases__search">
                    <div class="all-purchases__search-icon"><i class="fas fa-search"></i></div>
                    <input type="text" class="all-purchases__search-input input" placeholder="Tìm kiếm theo tên shop, ID đơn hàng hoặc tên sản phẩm">
                </div>
                <div class="purchases__list">
                    <?php
                        if (isset($data['Purchase']))
                        {   
                            $decode = json_decode($data['Purchase'], true);
                            $total = 0;
                            $previousOrderID = 0;
                            foreach($decode as $value)
                            {
                                $total += $value['orderDetailPrice'] * $value['orderDetailQuantity'];
                                if($value['orderId'] != $previousOrderID){  
                    ?>
                    <div class="purchase__list-header">
                        <div class="purchase__list-header-item">
                            <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g transform="translate(0 -1020.362)"><path style="isolation:auto;mix-blend-mode:normal" fill="#25b39e" d="m 7.513312,1033.9345 c -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 l 0,12 11,0 0,-12.209 c -0.170555,-0.065 -0.344029,-0.1264 -0.5,-0.2187 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 z" color="#000" overflow="visible"/><path d="M4.0136719 1031.3418l0 16.4883 1 0 0-16.4883-1 0zm24.0000001 0l0 17.0195-9.285156 0 0 1 9.75 0 .03516 0a.50004997.50004997 0 0 0 .5-.5l0-17.5195-1 0zM4.9414062 1021.3613a.50005.50005 0 0 0-.4667968.3223l-3.4277344 9 .9335938.3574 3.3066406-8.6797 22.4531246 0 3.306641 8.6797.933594-.3574-3.427735-9-.46875.6777 0-1-23.1425778 0z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5136719,1047.3613 a 0.50004997,0.50004997 0 0 0 -0.5,0.5 l 0,0.9375 0,2.0625 a 0.50004997,0.50004997 0 0 0 0.3457031,0.4746 0.50004997,0.50004997 0 0 0 0.048828,0.014 0.50004997,0.50004997 0 0 0 0.097656,0.012 0.50004997,0.50004997 0 0 0 0.00781,0 l 16.9648441,0 0.03516,0 a 0.50004997,0.50004997 0 0 0 0.09961,-0.01 0.50004997,0.50004997 0 0 0 0.400391,-0.4903 l 0,-3 -0.0078,0.01 a 0.50004997,0.50004997 0 0 0 -0.492187,-0.5078 l -17.0000001,0 z m 0.5,1 16.0000001,0 0,2 -16.0000001,0 0,-1.5625 0,-0.4375 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 18.519531,1048.3613 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l -0.0078,-0.01 0,2 a 0.50004997,0.50004997 0 0 0 0.5,0.5 l 10.472657,0 0,-1 -9.972657,0 0,-1 9.972657,0 0,-1 -10.472657,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="M28.513672 1047.3613a.50005.50005 0 0 0-.5.5l0 3a.50005.50005 0 0 0 .345703.4746.50005.50005 0 0 0 .04883.014.50005.50005 0 0 0 .09766.012.50005.50005 0 0 0 .0078 0l2.964844 0 .03516 0a.50005.50005 0 0 0 .09961-.01.50005.50005 0 0 0 .400391-.4903l0-3-.0078.01a.50005.50005 0 0 0-.492187-.5078l-3 0zm.5 1l2 0 0 2-2 0 0-2zM4.4960938 1030.8418a.50004997.50004997 0 0 0-.4921876.5059l0 16.4511a.50004997.50004997 0 1 0 1 0l0-16.4511a.50004997.50004997 0 0 0-.5078124-.5059zm14.0195312 1.4473a.50004997.50004997 0 0 0-.492187.5078l0 16.0644a.50004997.50004997 0 1 0 1 0l0-16.0644a.50004997.50004997 0 0 0-.507813-.5078zM20.513672 1038.3613c-.276131 0-.499972.2239-.5.5l0 10c.000028.2761.223869.5.5.5l5.964844 0 .03516 0c.276131 0 .499972-.2239.5-.5l0-10.5246-.5.02 0 0zm.5 1l5 0 0 9-5 0z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5058594,1030.3652 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5059 l 0,0.4902 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 l 0,-0.4902 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5059 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 4.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 7.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993511,0 2.0000001,-0.9006 2.0000001,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373515,1 -1.0000001,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 10.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 13.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 16.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 19.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 22.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 25.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 31.505859,1030.3125 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l 0,0.541 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 l 0,-0.541 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5078 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" fill-rule="evenodd" d="M22.013672 1042.3613l0 2 1 0 0-2-1 0zM8.5664062 1035.1387l-2 4 .8945313.4472 2-4-.8945313-.4472zM10.566406 1037.1387l-2.4999998 5 .8945313.4472 2.5000005-5-.894532-.4472z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path d="m 4.9414062,1021.3613 a 0.50005,0.50005 0 0 0 -0.4667968,0.3223 l -3.4277344,9 0.9335938,0.3574 3.3066406,-8.6797 22.4531246,0 3.306641,8.6797 0.933594,-0.3574 -3.427735,-9 -0.0059,0.01 a 0.50005,0.50005 0 0 0 -0.462891,-0.3301 l -23.1425778,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 1.5058594,1030.3652 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5059 l 0,0.4902 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 l 0,-0.4902 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5059 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 4.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993513,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373514,1 -1,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 7.5058594,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.4921875,0.5058 c 0,1.0994 0.9006486,2 2,2 1.0993511,0 2.0000001,-0.9006 2.0000001,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.4373515,1 -1.0000001,1 -0.5626487,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.5078125,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 10.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 13.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 16.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 19.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 22.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 25.505859,1030.8555 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5058 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5058 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path d="m 31.505859,1030.3125 a 0.50004997,0.50004997 0 0 0 -0.492187,0.5078 l 0,0.541 c 0,0.5627 -0.437351,1 -1,1 -0.562649,0 -1,-0.4373 -1,-1 a 0.50004997,0.50004997 0 1 0 -1,0 c 0,1.0994 0.900649,2 2,2 1.099351,0 2,-0.9006 2,-2 l 0,-0.541 a 0.50004997,0.50004997 0 0 0 -0.507813,-0.5078 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path style="isolation:auto;mix-blend-mode:normal" fill="#f8b84e" d="m 5.976283,1023.3621 -2.76953,7.2695 a 1.50015,1.50015 0 0 1 1.30664,-0.7695 1.50015,1.50015 0 0 1 1.5,1.5 1.499995,1.5 0 0 1 1.5,-1.5 1.499995,1.5 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 1.5,-1.5 1.50015,1.50015 0 0 1 1.5,1.5 1.50015,1.50015 0 0 1 0.002,-0.09 1.50015,1.50015 0 0 1 2.80274,-0.6445 l -2.76763,-7.2657 -21.07422,0 z m -2.92773,7.6836 -0.0352,0.094 0,0.2031 a 1.50015,1.50015 0 0 1 0.0352,-0.2969 z m 26.92968,0 a 1.50015,1.50015 0 0 1 0.03516,0.2968 l 0,-0.2031 -0.0352,-0.094 z m 0.0352,0.3164 c 0,0.034 -0.0361,0.054 -0.0371,0.088 l 0.0352,0 0.002,-0.088 z" color="#000" overflow="visible"/><path fill="#25b39e" fill-rule="evenodd" d="m 22.013312,1041.3622 0,-1 3,0 0,7 -3,0 0,-2 2,0 0,-4 z"/><path style="isolation:auto;mix-blend-mode:normal" fill="#25b39e" d="m 22.513312,1033.9345 c -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.354699,0 -0.684054,-0.088 -1,-0.209 l 0,3.209 7,0 0,-3 c -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 -0.444901,0.2634 -0.953826,0.4277 -1.5,0.4277 -0.546174,0 -1.055099,-0.1643 -1.5,-0.4277 z" color="#000" overflow="visible"/></g></svg>
                            <p class="where">Mã đơn hàng: <?php echo $value['orderId']; $previousOrderID = $value['orderId'];?></p>
                            <button class="btn btn-outline-primary">
                                <svg class="purchase-svg-icon svg-color-primary" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 16 16" viewBox="0 0 16 16"><g display="none"><line x1="5.5" x2="7.5" y1="3.5" y2="3.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><line x1="5.5" x2="9.5" y1="5.5" y2="5.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><line x1="5.5" x2="10.5" y1="7.5" y2="7.5" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"/><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M1.5,0.5c-0.6,0-1,0.4-1,1v13l4-4h10c0.6,0,1-0.4,1-1v-8c0-0.6-0.4-1-1-1h-11"/></g><path d="M5.5 4h2C7.8 4 8 3.8 8 3.5S7.8 3 7.5 3h-2C5.2 3 5 3.2 5 3.5S5.2 4 5.5 4zM5.5 6h4C9.8 6 10 5.8 10 5.5S9.8 5 9.5 5h-4C5.2 5 5 5.2 5 5.5S5.2 6 5.5 6zM5.5 8h5C10.8 8 11 7.8 11 7.5S10.8 7 10.5 7h-5C5.2 7 5 7.2 5 7.5S5.2 8 5.5 8z"/><path d="M14.5,0h-11C3.2,0,3,0.2,3,0.5S3.2,1,3.5,1h11C14.8,1,15,1.2,15,1.5v8c0,0.3-0.2,0.5-0.5,0.5h-10c-0.1,0-0.3,0.1-0.4,0.1
                                L1,13.3V1.5C1,1.2,1.2,1,1.5,1C1.8,1,2,0.8,2,0.5S1.8,0,1.5,0C0.7,0,0,0.7,0,1.5v13c0,0.2,0.1,0.4,0.3,0.5c0.1,0,0.1,0,0.2,0
                                c0.1,0,0.3-0.1,0.4-0.1L4.7,11h9.8c0.8,0,1.5-0.7,1.5-1.5v-8C16,0.7,15.3,0,14.5,0z"/></svg>
                                Chat ngay
                            </button>
                        </div>
                        <div class="purchase__list-header-item">
                                <svg class="purchase-svg-icon svg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g transform="translate(17 -1672.362)"><path fill="#f8b84e" d="m 5.37809,1692.3622 -1.381527,0 0,-0.7797 0,-3.2203 10.503969,0 0,4 -2.953792,0"/><path fill="#4bbfeb" d="m 3.996563,1682.3622 5.730587,0 4.766237,6.0198 -10.503919,-0.02 z"/><path fill="none" stroke="#2b4255" stroke-linecap="round" stroke-linejoin="round" d="m 6.000136,1689.362 1.01436,0"/><path fill="#f17f53" fill-rule="evenodd" d="m 14.500155,1691.3622 0,-1 -1.492879,0 c -0.676161,-0.01 -0.676161,1.0096 0,1 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/><path fill="#f8b84e" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 4.498874,1682.3518 -0.5,0 -0.0059,5.9918 c 2.8e-5,0.2761 0.223869,0.5 0.5,0.5 l 9.504278,0.017 c 0.428638,-4e-4 0.658155,-0.5046 0.376953,-0.8281 l -4.334356,-5.5195 c -0.09444,-0.1086 -0.231088,-0.1712 -0.375,-0.1719 -2.171834,0 -5.165975,0.011 -5.165975,0.011 z m 0.5,0.9898 4.439453,0 3.455451,4.5176 -7.900763,-0.014 0.0059,-4.5039 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path fill="#f8b84e" fill-rule="evenodd" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 7.493015,1682.8611 0,6 1,0 0,-6 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/><path fill="#25b39e" d="m -16.5,1684.4852 0,-5.123 20.5,0 0,13.0001 -6.1621384,0 -2.4543194,0 -7.6811982,0 -4.202344,0 0,-5.1711"/><path fill="#34485c" d="m -14.168175,1694.3623 -2.831825,0 0,-2 4.330756,0 5.8002374,0 7.01425554,0 3.99965936,0 6.1586787,0 4.696413,0 0,2 -3.295236,0 -8.9121551,0 -7.9997522,0 z"/><path fill="#576d7e" d="m 8.000016,1691.3622 a 4,4 0 0 0 -3.86914,3 l 1.30664,0 6.009766,0 0.421875,0 a 4,4 0 0 0 -3.869141,-3 z"/><circle cx="-9" cy="1696.362" r="1" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round"/><g transform="translate(1 -1.5)"><circle cx="7" cy="1696.862" r="3" fill="#2b4255"/><circle cx="7" cy="1696.862" r="1" fill="#e9eded"/></g><path fill="#e9eded" d="m -16.5,1685.3652 5.332593,0 0.01467,-0.5029 0.0067,-1.5001 3.3152369,2.9919 -3.3333699,3.0083 0.0067,-1.5 -0.0099,-0.5001 -5.332593,0"/><g transform="translate(-16.5 -.5)"><path fill="#576d7e" d="m 7.500011,1691.8622 a 4,4 0 0 0 -3.86914,3 l 1.30664,0 6.009766,0 0.421875,0 a 4,4 0 0 0 -3.869141,-3 z"/><g transform="translate(.5 -1)"><circle cx="7" cy="1696.862" r="3" fill="#2b4255"/><circle cx="7" cy="1696.862" r="1" fill="#e9eded"/></g></g><path fill="#f17f53" fill-rule="evenodd" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m -16.5,1691.3622 0,-1 1.9785,0 a 0.50005,0.50005 0 1 1 0,1 l -1.9785,0 z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible"/></g></svg>    
                                <span class="shipped">
                                <?php
                                    if($value['orderStatus'] == 'done')  echo 'Giao hàng thành công ';
                                    if($value['orderStatus'] == 'waiting')  echo 'Đang chờ xác nhận';
                                    if($value['orderStatus'] == 'delivering')  echo 'Đang giao hàng';
                                ?>
                                    
                                </span>
                                <i class="help far fa-question-circle"></i>
                                <div class="separation"></div>
                                <span class="rated">ĐÃ ĐÁNH GIÁ</span>
                        </div>
                    </div>
                    <?php } ?>

                    <table class="purchases__list-table">
                        <tr class="purchases__row">
                            <td class="purchases__row-img">
                                <img src="<?php echo $value['imageUrl'];?>" alt=""></div>
                            </td>
                            <td class="purchases__row-content">
                                <p class="purchases__row-title"><?php echo $value['productName']; ?></p>
                                <p class="purchases__row-category">Phân loại hàng:<?php echo $value['productTypeName'];?></p>
                                <p class="purchases__row-quantity">x<?php echo $value['orderDetailQuantity'];?></p>
                            </td>
                            <td class="purchases__row-price">
                                <p><?php echo viPrice($value['orderDetailPrice'] * $value['orderDetailQuantity'], 'VND');?></p>
                            </td>
                        </tr>
                    </table>
                    
                    <?php
                        $nextValue = next($decode);
                        if((isset($nextValue['orderId']) && $nextValue['orderId'] != $value['orderId']) || !isset($nextValue['orderId'])){
                            $previousOrderID = null;
                    ?>
                    <div class="purchase__list-total">
                        <p>Đặt lúc:</p>
                        <span class="time"><?php echo $value['orderDate'];?></span>
                        <svg class="purchase-svg-icon" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"><g font-family="sans-serif" font-size="45.121" font-weight="400" letter-spacing="0" transform="translate(0 -1020.362)" word-spacing="0"><path fill="#f8b84e" d="m 13.399386,1024.3393 c -0.12645,0.162 -0.237481,0.2727 -0.398438,0.4004 l 0,10.0359 6,0 0,-10.0359 c -0.160964,-0.1277 -0.271981,-0.2384 -0.398438,-0.4004 z"/><path fill="#25b39e" d="m 4.4657916,1036.3393 c -0.1834743,0 -0.2519532,0.089 -0.2519532,0.2129 l 0,13.623 c 0,0.1239 0.068582,0.211 0.2519532,0.211 l 23.2832034,0 c 0.183373,0 0.251953,-0.087 0.251953,-0.211 l 0,-1.8359 -8.931641,0 -2.068359,-2.0273 0,-3.1543 0,-1.7871 2.068359,-2.0274 8.931641,0 0,-2.791 c 0,-0.1239 -0.06848,-0.2129 -0.251953,-0.2129 l -23.2832034,0 z m 15.8281254,6.0039 -0.292969,0.2871 0,0.5274 0,1.8945 0.292969,0.2871 7.707031,0 0,-2.9961 -7.707031,0 z"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 9.4960938,1022.3125 a 0.50005,0.50005 0 0 0 -0.1347657,0.019 l -7.3476562,1.9688 c -0.7228197,0.1937 -1.16048017,0.9509 -0.9667969,1.6738 l 2.3808594,8.8887 a 0.50054772,0.50054772 0 1 0 0.9667968,-0.2598 l -2.3808593,-8.8867 c -0.054783,-0.2045 0.053082,-0.3944 0.2578125,-0.4492 l 7.3496094,-1.9688 a 0.50005,0.50005 0 0 0 -0.125,-0.9863 z" color="#000" font-size="medium" overflow="visible"/><path d="m 8.490204,1026.7077 c -0.533244,0.1429 -0.849683,0.693 -0.706556,1.2272 0.143152,0.5342 0.690743,0.8468 1.223987,0.7039 0.532955,-0.1428 0.851017,-0.6873 0.707864,-1.2216 -0.143127,-0.5341 -0.69234,-0.8523 -1.225295,-0.7095 l 0,0 z"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M9.3457031 1024.4238a.50005.50005 0 0 0-.1328125.02l-4.5996094 1.2324a.50005.50005 0 0 0-.3535156.6113c.078394.2926-.085135.5748-.3671875.6504a.50005.50005 0 0 0-.3535156.6113l1.9394531 7.2344a.50005.50005 0 1 0 .9648438-.2598l-1.8632813-6.9531c.3421088-.2544.529929-.5808.5761719-1.0058l4.3164062-1.1563a.50005.50005 0 0 0-.1269531-.9844zM22.492188 1022.3125a.50005.50005 0 0 0-.111329.9863l7.34961 1.9688c.20473.055.312595.2447.257812.4492l-2.382812 8.8906a.50054782.50054782 0 1 0 .966797.2598l2.382812-8.8926c.193683-.7229-.243977-1.4801-.966797-1.6738l-7.347656-1.9688a.50005.50005 0 0 0-.148437-.019z" color="#000" font-size="medium" overflow="visible"/><path d="m 23.511686,1026.7077 c 0.533244,0.1429 0.849683,0.693 0.706556,1.2272 -0.143152,0.5342 -0.690743,0.8468 -1.223987,0.7039 -0.532955,-0.1428 -0.851017,-0.6873 -0.707864,-1.2216 0.143127,-0.5341 0.69234,-0.8523 1.225295,-0.7095 l 0,0 z"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 22.640625,1024.4238 a 0.50005,0.50005 0 0 0 -0.111328,0.9844 l 4.316406,1.1563 c 0.04624,0.425 0.234063,0.7514 0.576172,1.0058 l -1.886719,7.0391 a 0.50028924,0.50028924 0 1 0 0.966797,0.2578 l 1.960938,-7.3184 a 0.50005,0.50005 0 0 0 -0.353516,-0.6113 c -0.282053,-0.076 -0.445582,-0.3578 -0.367187,-0.6504 a 0.50005,0.50005 0 0 0 -0.353516,-0.6113 l -4.59961,-1.2324 a 0.50005,0.50005 0 0 0 -0.148437,-0.02 z" color="#000" font-size="medium" overflow="visible"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 4.4648438,1034.3398 c -1.2323803,0 -2.25,0.9883 -2.25,2.211 l 0,13.623 c 0,1.2227 1.0176197,2.211 2.25,2.211 l 23.2851562,0 c 1.23238,0 2.25,-0.9883 2.25,-2.211 l 0,-13.623 c 0,-1.2227 -1.01762,-2.211 -2.25,-2.211 l -23.2851562,0 z m 0,1 23.2851562,0 c 0.707926,0 1.25,0.5375 1.25,1.211 l 0,13.623 c 0,0.6735 -0.542074,1.211 -1.25,1.211 l -23.2851562,0 c -0.7079274,0 -1.25,-0.5375 -1.25,-1.211 l 0,-13.623 c 0,-0.6735 0.5420726,-1.211 1.25,-1.211 z" color="#000" font-size="medium" overflow="visible"/><path fill-rule="evenodd" style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 19.476562,1040.3418 18,1041.7891 l 0,1.3671 0,2.7364 1.476562,1.4472 10.523438,0 0,-6.998 -0.5,0 -10.023438,0 z m 0.410157,1 9.113281,0 0,4.998 -9.113281,0 L 19,1045.4727 l 0,-2.3165 0,-0.9472 0.886719,-0.8672 z" color="#000" font-size="medium" overflow="visible"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M21.431641 1042.4785c-.783827 0-1.431642.6478-1.431641 1.4317-.000001.7838.647814 1.4296 1.431641 1.4296.783826 0 1.429688-.6458 1.429687-1.4296.000001-.7839-.645861-1.4317-1.429687-1.4317zm0 1c.243222 0 .429687.1881.429687.4317 0 .2435-.186465.4296-.429687.4296-.243223 0-.431641-.1861-.431641-.4296 0-.2436.188418-.4317.431641-.4317zM10.367188 1020.3398c-.7483902 0-1.3652349.6169-1.3652349 1.3653l0 12.8515a.50005.50005 0 1 0 .9999999 0l0-12.8515c0-.2116.153369-.3653.365235-.3653l11.267578 0c.211864 0 .365234.1537.365234.3653l0 12.8515a.50005.50005 0 1 0 1 0l0-12.8515c0-.7484-.616845-1.3653-1.365234-1.3653l-11.267578 0z" color="#000" font-size="medium" overflow="visible"/><path d="m 16.000848,1024.3401 c 0.552055,0 1.0001,0.4495 1.0001,1.0025 0,0.5531 -0.448045,0.9967 -1.0001,0.9967 -0.551756,0 -0.9999,-0.4436 -0.9999,-0.9967 0,-0.553 0.448144,-1.0025 0.9999,-1.0025 l 0,0 z"/><path style="line-height:125%;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="m 12.523438,1022.3398 a 0.50005,0.50005 0 0 0 -0.5,0.5 c 0,0.3029 -0.22951,0.5332 -0.521485,0.5332 a 0.50005,0.50005 0 0 0 -0.5,0.5 l 0,10.8321 a 0.50005,0.50005 0 1 0 1,0 l 0,-10.543 c 0.395299,-0.1573 0.65985,-0.4246 0.814453,-0.8223 l 6.369141,0 c 0.154619,0.3977 0.419139,0.665 0.814453,0.8223 l 0,10.543 a 0.50005,0.50005 0 1 0 1,0 l 0,-10.8321 a 0.50005,0.50005 0 0 0 -0.5,-0.5 c -0.291975,0 -0.521484,-0.2303 -0.521484,-0.5332 a 0.50005,0.50005 0 0 0 -0.5,-0.5 l -6.955078,0 z" color="#000" font-size="medium" overflow="visible"/><path d="m 13.000948,1032.8425 c 0,0.1841 0.15433,0.3307 0.338526,0.3279 l 0.291514,0 c 0.137417,0.6531 0.666671,1.1648 1.331824,1.1648 0.775157,0 1.369736,-0.6936 1.369736,-1.498 0,-0.4864 0.330361,-0.8314 0.702832,-0.8314 0.372588,0 0.701783,0.345 0.701783,0.8314 0,0.4865 -0.329311,0.8316 -0.701783,0.8316 -0.450746,-0.013 -0.450746,0.6728 0,0.6664 0.655938,0 1.123249,-0.5219 1.262883,-1.1648 l 0.364538,0 c 0.450863,0.014 0.450863,-0.6728 0,-0.6663 l -0.365705,0 c -0.140334,-0.6424 -0.605079,-1.1648 -1.260316,-1.1648 -0.70295,0 -1.368453,0.4985 -1.368453,1.4511 0,0.014 0,0.023 0,0.035 0,0 0,0.013 0,0.013 0,0.4864 -0.330477,0.8316 -0.702832,0.8316 -0.36769,0 -0.690466,-0.3373 -0.699216,-0.8134 0,-0.013 0,-0.025 0,-0.037 0.014,-0.4754 0.330711,-0.8122 0.697817,-0.8122 0.450745,0.014 0.450745,-0.6726 0,-0.6662 -0.665155,0 -1.194523,0.5116 -1.331824,1.1647 l -0.291632,0 c -0.188161,0 -0.341558,0.1503 -0.338408,0.3384 z" color="#000" font-size="medium" letter-spacing="normal" overflow="visible" word-spacing="normal" style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal"/></g></svg>
                        <p>Tổng số tiền:</p>
                        <span><?php echo viPrice($total, 'VND');?></span>
                    </div>
                    <div class="purchase__list-footer">
                        <p>không nhận được đánh giá</p>
                        <button class="btn btn-primary">Mua lần nữa</button>
                        <button class="btn btn-outline-primary">Liên hệ người bán</button>
                    </div>

                    <?php
                        $total = 0;
                        }
                    }
                    ?>
                </div>

                <?php      
                    }
                }
                    else {   
                ?>
                <div class="purchases__list">
                    <div class="purchases__empty">
                        <img src="public/img/system/emptylist.png" alt="Danh sách trống">
                        <p>Chưa có đơn hàng</p>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
       </div>
</div>
