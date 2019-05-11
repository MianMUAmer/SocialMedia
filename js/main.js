// For Putting picture in PlaceHolder
var openFile = function (event) {
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function () {
        var dataURL = reader.result;
        var output = document.getElementById('output');
        console.log(input);
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
};

function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("fileupload").files;
    if (filesSelected.length > 0) {
        var fileToLoad = filesSelected[0];

        var fileReader = new FileReader();

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // <--- data: base64

            var newImage = document.createElement('img');
            newImage.src = srcData;

            document.getElementById("output").innerHTML = newImage.outerHTML;
            alert("Converted Base64 version is " + document.getElementById("output").innerHTML);
            console.log("Converted Base64 version is " + document.getElementById("output").innerHTML);
//            el = document.getElementById("imgURL");
//            el.setAttribute("value", document.getElementById("output").textContent);
            document.getElementById("imgURL").value = document.getElementById("output").innerHTML.toString();
            alert(document.getElementById("imgURL").value);
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}