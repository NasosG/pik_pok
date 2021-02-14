// this file is used to detect faces (using facerecognition.js api) and apply basic blurring filters
// it's ok for the scope of our research but would like to implement a smarter feature in the future
// such as blurring/unblurring when user clicks a face and smarter automatic blurring

function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    let byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    let mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    let intArray = new Uint8Array(byteString.length);
    for (let i = 0; i < byteString.length; i++) {
        intArray[i] = byteString.charCodeAt(i);
    }

    return new Blob([intArray], {type: mimeString});
}

// store the data of the original photo
const imageUpload = document.getElementById('imageUpload').attributes.value.textContent;
var image;
var canvas;
var detectionBoxes = [];
var blurred = false;
const container = document.createElement('div');

// load all models
// run asynchronous calls in parrallel, just an optimization
Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
]).then(start);

async function start() {
    //const container = document.createElement('div');
    container.style.position = 'relative';
    document.body.append(container);
    document.body.append('Image Loaded');

    if (image) image.remove();
    if (canvas) canvas.remove();
    image = await faceapi.bufferToImage(dataURItoBlob(imageUpload));
    container.append(image);
    canvas = faceapi.createCanvasFromMedia(image);
    container.append(canvas);

    const displaySize = {
        width: image.width,
        height: image.height
    }
    faceapi.matchDimensions(canvas, displaySize);
    drawImageToCanvas();

    const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors();
    const resizedDetections = faceapi.resizeResults(detections, displaySize);

    resizedDetections.forEach((detection, i) => {
        const box = detection.detection.box;
        detectionBoxes[i] = box;
        //drawBox(box);
    })
    detectionBoxes.forEach((element) => blurring(canvas, element));
}

container.addEventListener('click', toggleBlurred);

function toggleBlurred() {
    if (blurred)
        detectionBoxes.forEach((element) => blurring(canvas, element));
    else
        detectionBoxes.forEach((element) => unblurring(canvas, element, image));

    blurred = !blurred;
}

let getCanvasData = () => canvas.toDataURL("image/jpeg");

function drawImageToCanvas() {
    var ctx = canvas.getContext('2d');
    ctx.drawImage(image, 0, 0);
}

// blurring function
function blurring(canvas, box) {
    let ctx = canvas.getContext('2d');
    ctx.fillStyle = 'rgba(200,200,200,0.9)';
    ctx.filter = 'blur(9px)';
    ctx.fillRect(box.x, box.y, box.width, box.height);
    ctx.filter = 'none';
}

// reset the blurring by using the original stored image
function unblurring(canvas, box, image) {
    let ctx = canvas.getContext('2d');
    ctx.fillStyle = box.color;
    image.x = box.x;
    image.y = box.y;
    ctx.drawImage(image, 0, 0);
    ctx.filter = 'none';
}

// we have the ability to draw an outline, add a label etc.
function drawBox(box) {
    const drawBox = new faceapi.draw.DrawBox(box, {label: 'Face'});
    drawBox.draw(canvas);
}