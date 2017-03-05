<div class="row">
    <div class="col-lg-12">
        <h3>The Mandelbrot set with JavaScript</h3>
        <p>The Mandelbrot set has its place in complex dynamics, a field first investigated by the French mathematicians Pierre Fatou and Gaston Julia at the beginning of the 20th century. This fractal was first defined and drawn in 1978 by Robert W. Brooks and Peter Matelski as part of a study of Kleinian groups. On 1 March 1980, at IBM's Thomas J. Watson Research Center in Yorktown Heights, New York, Benoit Mandelbrot first saw a visualization of the set.</p>
        <p><a href="https://en.wikipedia.org/wiki/Mandelbrot_set" target="_blank">Wiki</a></p>
    </div>
</div>
<div class="row">
    <div class="col-lg-9">
        <canvas id="myCanvas" width="800" height="800"></canvas>
    </div>
    <div class="col-lg-3">
        <legend>How to</legend>
        <p>Right click the image for dodgy zoom. The image will zoom in a square from the top right of the cursor on left click.</p>
        <p>Use the form below to enter x, y and scale and click go to zoom in.</p>
        <legend>Controls</legend>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" width=50>&nbsp;&nbsp;&nbsp;X&nbsp;&nbsp;&nbsp;</span>
                <input class="form-control x-val" type="number" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" width=50>&nbsp;&nbsp;&nbsp;Y&nbsp;&nbsp;&nbsp;</span>
                <input class="form-control y-val" type="number" value="">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon" width=50>scale</span>
                <input class="form-control s-val" type="number" value="">
            </div>
        </div>
        <div class="form-group">
            <span class="btn btn-primary js-change-values">Go</span>
            <span class="btn btn-primary js-reset-values">Reset</span>
        </div>       
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <blockquote>
            <p>The Mandelbrot set drawn using JavaScript</p>
            <small><a target="_blank" href="http://slicker.me/fractals/fractals.htm">slicker.me/fractals/fractals.htm</a></small>
        </blockquote>
    </div>
</div>
<script>
    var xmin=-2,ymin=-2,scale=50;
    var x,y,i,xt;
    var cx,cy;
    var color;
    var canvas = document.getElementById('myCanvas');
    canvas.addEventListener("mousedown",zoom,false);
    var context = canvas.getContext('2d');
    mandel();
    function zoom(event)
    {
        xmin=xmin+Math.floor(event.pageX/4)/scale;
        ymin=-Math.floor(event.pageY/4)/scale+200/scale+ymin;
        scale=scale*2;
        mandel();
    }

    function set(x, y, s){
        xmin = Number(x);
        ymin = Number(y);
        scale = s;
        mandel();
    }

    function mandel(){      
        context.clearRect(0, 0, context.canvas.width, context.canvas.height);
        for(x=0;x<200;x++){
            for(y=0;y<200;y++){
                i=0;
                cx=xmin+x/scale;
                cy=ymin+y/scale;
                zx=0;
                zy=0;                        

                do{
                    xt=zx*zy;
                    zx=zx*zx-zy*zy+cx;
                    zy=2*xt+cy;
                    i++;
                }
                while(i<255&&(zx*zx+zy*zy)<4);

                color=i.toString(16);
                context.beginPath();
                context.rect(x*4, 800-y*4, 4, 4);
                context.fillStyle ='#'+color+color+color;
                context.fill();
            }
        }
        $('.x-val').val(xmin);
        $('.y-val').val(ymin);
        $('.s-val').val(scale);
    }

    
    //set(-2, -2, 50);
   // set(-.68, -.74, 1200);
    //draw();

    $('.js-change-values').on('click', function(){
        var x = $('.x-val').val();
        var y = $('.y-val').val();
        var s = $('.s-val').val();

        set(x,y,s);
    });

    $('.js-reset-values').on('click', function(){
        var x = -2;
        var y = -2;
        var s = 50;

        set(x,y,s);
    });
</script>
