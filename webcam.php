<!doctype html>

<html lang="en">
<head>
    <title>Take Photo</title>
    <?php include_once('./includes/minimal_head.php'); ?>
    <link rel="stylesheet" type="text/css" href="css/webcam-style.css">
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
    <form id="faceRecognitionForm" action="post.php" method="post">
        <input type="hidden" name="imgData" id="imgData" value=""/>
        <div id="pre_take_buttons">
            <input type=button name="snapshot" id="snapshot" value="Take a photo" onClick="preview_snapshot()">
        </div>
        <div id="post_take_buttons" style="display:none">
            <input type=button value="&#171; Take another" onClick="cancel_preview()">
            <button type="submit" onClick="save_photo()">Submit photo &#187;</button>
            <div class="switch_box ">
            <input onclick="check()" type="checkbox" id="editFaces" name="editFaces" value="editFaces" type="checkbox" class="checkbox switch_1">
            <label for="editFaces">Blur Faces</label>
            </div><br>
        </div>
    </form>

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">

        var form = document.getElementById('faceRecognitionForm');
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

        function check() {
            form.action = (getCheckbox().checked ) ? "FaceRecognition/face_recognition.php" : "post.php";
        }

        let getCheckbox = () => document.querySelector('#editFaces');
    </script>

</body>
</html>
