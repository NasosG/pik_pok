  function dataURItoBlob(dataURI) {
    // convert base64/URLEncoded data component to raw binary data held in a string
    var byteString;
    if (dataURI.split(',')[0].indexOf('base64') >= 0)
        byteString = atob(dataURI.split(',')[1]);
    else
        byteString = unescape(dataURI.split(',')[1]);

    // separate out the mime component
    var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];

    // write the bytes of the string to a typed array
    var ia = new Uint8Array(byteString.length);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }

    return new Blob([ia], {type:mimeString});
}

const imageUpload = document.getElementById('imageUpload').attributes.value.textContent;

Promise.all([
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.ssdMobilenetv1.loadFromUri('./models')
]).then(start)

async function start() {
    const container = document.createElement('div');
    container.style.position = 'relative';
    document.body.append(container);

    let image;
    let canvas;
    document.body.append('Loaded');
    
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
        const detections = await faceapi.detectAllFaces(image).withFaceLandmarks().withFaceDescriptors();
        const resizedDetections = faceapi.resizeResults(detections, displaySize);
        resizedDetections.forEach(detection => {
            const box = detection.detection.box;
            const drawBox = new faceapi.draw.DrawBox(box, {
                label: 'Face'
            })
            drawBox.draw(canvas);
        })
    
}