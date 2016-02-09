
        const CANVAS_W = 2000;
        const CANVAS_H = 150;
        const IMAGE_W  = 90;
        const IMAGE_H  = 80;
        const RIGHT    = CANVAS_W - IMAGE_W;
        const BOTTOM   = CANVAS_H - IMAGE_H;
        
        var con;
        var image;
        
        var x  = 0;
        var y  = 0;
        var dx = 10;
        var dy = 7;
        
        function init()
        {
            con = document.getElementById("canvas")
                          .getContext("2d");
            con.strokeStyle = "aliceblue";
            con.fillStyle = "aliceblue";
            image = new Image();
			image.src = "preview.jpg";
            setInterval(draw, 100);
        }
        
        function draw()
		{
			if(x >= CANVAS_W)
			{
				con.clearRect(0, 0, CANVAS_W, CANVAS_H);

			}
			else
			{
			con.fillRect(0, 0, CANVAS_W, CANVAS_H);
            con.strokeRect(0, 0, CANVAS_W, CANVAS_H);
            con.drawImage(image, x, y, IMAGE_W, IMAGE_H);
            x += dx;
			}
        }
