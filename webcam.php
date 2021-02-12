<!doctype html>

<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Take Photo</title>

    <link rel='shortcut icon' type='image/x-icon' href='images/logo.png'/>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <!-- font awesome icons kit -->
    <script src="https://kit.fontawesome.com/fac8ebb301.js" crossorigin="anonymous"></script>

    <style type="text/css">
        body { font-family: Helvetica, sans-serif; }
        h2, h3 { margin-top:0; }
        form { margin-top: 15px; }
        form > input { margin-right: 15px; }

        input[type=button],
        button[type=submit] {
            font-family: Helvetica, sans-serif;
            background-color: #F0F0F0;
            font-size: 1.1em;
            letter-spacing: 1.5px;
            color: black;
            border: 1px solid black;
            padding: 14px 20px;
            margin: 8px 0;
            transition-duration: 0.4s;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }

        input[type=button]:hover {
            opacity: 0.8;
            background-color: #555555;
            border: 1px solid #555555;
            color: white;
        }

        button[type=submit]:hover {
            opacity: 0.8;
            background-color: green;
            border: 1px solid green;
            color: white;
        }

        @media only screen and (max-width: 600px) {
            body {
                margin-left: 0px;
            }

            h1, h2, h3, form, form > input {
                margin-left: 10px;
            }

            #results {
                display: none;
            }
        }

        @media only screen and (min-width: 600px) and (max-width: 1250px) {
            body {
                position: relative;
                width: 100%;
                display: block;
            }

            body > * {
                margin-left: auto;
                margin-right: auto;
                width: 570px;
                display: block;
            }

            body > script {
                display: none
            }

            #results {
                display: none;
            }
        }

        @media only screen and (min-width: 1251px) {
            #results {
                float: right;
                margin: 20px;
                padding: 20px;
                border: 1px solid;
                background: #ccc;
            }
        }
	</style>
</head>
<body>
    <div id="results">Your captured image will appear here...</div>
    <h1>Take a photo <i class="fa fa-picture-o" aria-hidden="true"></i></h1>
    <h3><span style="color:#e44d3a;">Press</span> Take a photo &amp; then submit it</h3>

    <div id="my_camera"></div>

    <!-- First, include the Webcam.js JavaScripts Library -->
    <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">

        function set_camera() {
            var mobile_width = window.innerWidth > 600 ? 560 : window.innerWidth;
            Webcam.set({
                // live preview size
                width: mobile_width,
                height: 420,

                // device capture size
                dest_width: 560,
                dest_height: 420,

                // format and quality
                image_format: 'jpeg',
                jpeg_quality: 90
            });

            Webcam.attach('#my_camera');
        }

        set_camera();

        function updateCanvas() {
            if (!freezed && window.innerWidth < 600)
                set_camera();
        }

        //make canvas fluid meaning change camera properties (mostly width) every time the user resizes the window
        window.addEventListener("resize", updateCanvas);

    </script>

    <!-- A button for taking snaps -->
    <form action="post.php" method="post">

        <input type="hidden" name="imgData" id="imgData" value=""/>

        <div id="pre_take_buttons">
            <input type=button name="snapshot" id="snapshot" value="Take a photo" onClick="preview_snapshot()">
        </div>
        <div id="post_take_buttons" style="display:none">
            <input type=button value="&#171; Take another" onClick="cancel_preview()">
            <button type="submit" onClick="save_photo()">Submit photo &#187;</button>
        </div>

    </form>

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">

        // preload shutter audio clip
        var shutter = new Audio();
        shutter.autoplay = false;
        shutter.src = navigator.userAgent.match(/Firefox/) ? 'webcamjs/shutter.ogg' : 'webcamjs/shutter.mp3';

        var freezed = false;

        function preview_snapshot() {
            shutter.play();
            // freeze camera so user can preview pic
            Webcam.freeze();
            freezed = true;
            // swap button sets
            document.getElementById('pre_take_buttons').style.display = 'none';
            document.getElementById('post_take_buttons').style.display = '';
        }

        function cancel_preview() {
            save_photo();
            // cancel preview freeze and return to live camera feed
            Webcam.unfreeze();
            freezed = !freezed;
            // swap buttons back
            document.getElementById('pre_take_buttons').style.display = '';
            document.getElementById('post_take_buttons').style.display = 'none';

        }

        function save_photo() {
            // actually snap photo (from preview freeze) and display it
            Webcam.snap(function (data_uri) {
                // display results in page
                document.getElementById('results').innerHTML =
                    '<h2>Your Previous Photo:</h2>' +
                    '<img src="' + data_uri + '"/>';
                // store the data uri of the photo to our hidden field
                document.getElementById("imgData").value = data_uri;
                //console.log(data_uri);

                // swap buttons back
                document.getElementById('pre_take_buttons').style.display = '';
                document.getElementById('post_take_buttons').style.display = 'none';
            });
        }

    </script>

</body>
</html>
