<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "/www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0030)www.yxlgh.com -->
<html xml:lang="en" xmlns="/www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>我爱慧慧</title>
	    
        <link type="text/css" rel="stylesheet" href="./love/default.css">
		<script type="text/javascript" src="./love/jquery.min.js"></script>
		<script type="text/javascript" src="./love/jscex.min.js"></script>
		<script type="text/javascript" src="./love/jscex-parser.js"></script>
		<script type="text/javascript" src="./love/jscex-jit.js"></script>
		<script type="text/javascript" src="./love/jscex-builderbase.min.js"></script>
		<script type="text/javascript" src="./love/jscex-async.min.js"></script>
		<script type="text/javascript" src="./love/jscex-async-powerpack.min.js"></script>
		<script type="text/javascript" src="./love/functions.js" charset="utf-8"></script>
		<script type="text/javascript" src="./love/love.js" charset="utf-8"></script>
	    <style type="text/css">
<!--
.STYLE1 {color: #666666}
-->
        </style>
</head>
    <body> 
        <div id="main">
            <div id="wrap">
                <div id="text">
			        <div id="code">
			        	<span class="say"> ♥ Our Love Story</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> For 慧慧</span><br>
						<span class="say"> </span><br>
                        <span class="say"> ♥ 不经意相识，或许是缘分，或许是注定的。</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> ♥ 第一次认识你，感觉很亲切，总想多看你一眼。</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> ♥ 就算因为误会而淡漠，我还在想念你的好。</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> ♥ 那次你我共同的朋友告诉我，你对我的印象。</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> ♥ 之后不敢再出现在你的面前，或许你是对的。</span><br>
						<span class="say"> </span><br>
			        	<span class="say"> ♥ 我会默默守候着你。</span><br>
                        <span class="say"> </span><br>
                        <span class="say"> ♥ You are my crush girl..永远..</span><br>
						<span class="say"> </span><br>
                        <span class="say"><span class="space"></span> ------ 货货 ------</span>
			        </div>
                </div>
                <div id="clock-box">
                    <span class="STYLE1">我们在一起</span><span class="STYLE1">已经……</span>
                  <div id="clock"></div>
              	</div>
                <canvas id="canvas" width="1100" height="650"></canvas>
            </div>
        </div>
<script>
    (function(){
        var canvas = $('#canvas');
		
        if (!canvas[0].getContext) {
            $("#error").show();
            return false;
        }

        var width = canvas.width();
        var height = canvas.height();
        
        canvas.attr("width", width);
        canvas.attr("height", height);

        var opts = {
            seed: {
                x: width / 2 - 20,
                color: "rgb(190, 26, 37)",
                scale: 2
            },
            branch: [
                [535, 680, 570, 250, 500, 200, 30, 100, [
                    [540, 500, 455, 417, 340, 400, 13, 100, [
                        [450, 435, 434, 430, 394, 395, 2, 40]
                    ]],
                    [550, 445, 600, 356, 680, 345, 12, 100, [
                        [578, 400, 648, 409, 661, 426, 3, 80]
                    ]],
                    [539, 281, 537, 248, 534, 217, 3, 40],
                    [546, 397, 413, 247, 328, 244, 9, 80, [
                        [427, 286, 383, 253, 371, 205, 2, 40],
                        [498, 345, 435, 315, 395, 330, 4, 60]
                    ]],
                    [546, 357, 608, 252, 678, 221, 6, 100, [
                        [590, 293, 646, 277, 648, 271, 2, 80]
                    ]]
                ]] 
            ],
            bloom: {
                num: 700,
                width: 1080,
                height: 650,
            },
            footer: {
                width: 1200,
                height: 5,
                speed: 10,
            }
        }

        var tree = new Tree(canvas[0], width, height, opts);
        var seed = tree.seed;
        var foot = tree.footer;
        var hold = 1;

        canvas.click(function(e) {
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            if (seed.hover(x, y)) {
                hold = 0; 
                canvas.unbind("click");
                canvas.unbind("mousemove");
                canvas.removeClass('hand');
            }
        }).mousemove(function(e){
            var offset = canvas.offset(), x, y;
            x = e.pageX - offset.left;
            y = e.pageY - offset.top;
            canvas.toggleClass('hand', seed.hover(x, y));
        });

        var seedAnimate = eval(Jscex.compile("async", function () {
            seed.draw();
            while (hold) {
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canScale()) {
                seed.scale(0.95);
                $await(Jscex.Async.sleep(10));
            }
            while (seed.canMove()) {
                seed.move(0, 2);
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
        }));

        var growAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.grow();
                $await(Jscex.Async.sleep(10));
            } while (tree.canGrow());
        }));

        var flowAnimate = eval(Jscex.compile("async", function () {
            do {
    	        tree.flower(2);
                $await(Jscex.Async.sleep(10));
            } while (tree.canFlower());
        }));

        var moveAnimate = eval(Jscex.compile("async", function () {
            tree.snapshot("p1", 240, 0, 610, 680);
            while (tree.move("p1", 500, 0)) {
                foot.draw();
                $await(Jscex.Async.sleep(10));
            }
            foot.draw();
            tree.snapshot("p2", 500, 0, 610, 680);

            // 会有闪烁不得意这样做, (＞﹏＜)
            canvas.parent().css("background", "url(" + tree.toDataURL('image/png') + ")");
            canvas.css("background", "#ffe");
            $await(Jscex.Async.sleep(300));
            canvas.css("background", "none");
        }));

        var jumpAnimate = eval(Jscex.compile("async", function () {
            var ctx = tree.ctx;
            while (true) {
                tree.ctx.clearRect(0, 0, width, height);
                tree.jump();
                foot.draw();
                $await(Jscex.Async.sleep(25));
            }
        }));

        var textAnimate = eval(Jscex.compile("async", function () {
		    var together = new Date();
		    together.setFullYear(2014, 10, 02); 			//时间年月日
		    together.setHours(22);						//小时	
		    together.setMinutes(25);					//分钟
		    together.setSeconds(0);					//秒前一位
		    together.setMilliseconds(0);				//秒第二位

		    $("#code").show().typewriter();
            $("#clock-box").fadeIn(500);
            while (true) {
                timeElapse(together);
                $await(Jscex.Async.sleep(1000));
            }
        }));

        var runAsync = eval(Jscex.compile("async", function () {
            $await(seedAnimate());
            $await(growAnimate());
            $await(flowAnimate());
            $await(moveAnimate());

            textAnimate().start();

            $await(jumpAnimate());
        }));

        runAsync().start();
    })();
</script>
</body></html>