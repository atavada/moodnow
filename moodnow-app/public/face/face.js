let video = document.getElementById("video");
let canvas = document.getElementById("overlay");
let ctx = canvas.getContext("2d");
let displaySize;

let width = 640;
let height = 480;

const startStream = () => {
    console.log("START STREAM");
    navigator.mediaDevices
        .getUserMedia({
            video: { width, height },
            audio: false,
        })
        .then((stream) => {
            video.srcObject = stream;
        });
};

console.log(faceapi.nets);

console.log("START LOAD MODEL");
Promise.all([
    faceapi.nets.ageGenderNet.loadFromUri("models"),
    faceapi.nets.ssdMobilenetv1.loadFromUri("models"),
    faceapi.nets.tinyFaceDetector.loadFromUri("models"),
    faceapi.nets.faceLandmark68Net.loadFromUri("models"),
    faceapi.nets.faceRecognitionNet.loadFromUri("models"),
    faceapi.nets.faceExpressionNet.loadFromUri("models"),
]).then(startStream);

async function detect() {
    const detections = await faceapi
        .detectAllFaces(video)
        .withFaceLandmarks()
        .withFaceExpressions();
    console.log(detections);

    const detectionsForSize = faceapi.resizeResults(detections, displaySize);
    canvas.width = displaySize.width;
    canvas.height = displaySize.height;
    faceapi.draw.drawDetections(canvas, detectionsForSize);
    faceapi.draw.drawFaceLandmarks(canvas, detectionsForSize);
    faceapi.draw.drawFaceExpressions(canvas, detectionsForSize);
    // const detectionsWithLandmarks = await faceapi
    //   .detectAllFaces(video)
    //   .withFaceLandmarks()

    // console.log(detectionsWithLandmarks);

    // const detectionsWithLandmarksForSize = faceapi.resizeResults(detectionsWithLandmarks, { width: displaySize.width, height: displaySize.height })

    // const canvas = document.getElementById('overlay')
    // canvas.width = displaySize.width
    // canvas.height = displaySize.height

    // faceapi.drawLandmarks(canvas, detectionsWithLandmarksForSize, { drawLines: true })
}

video.addEventListener("loadedmetadata", () => {
    displaySize = { width: video.videoWidth, height: video.videoHeight };
    faceapi.matchDimensions(canvas, displaySize);

    setInterval(detect, 100);
});
