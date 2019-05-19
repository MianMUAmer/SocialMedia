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


//Encode image to base64 string
function encodeImageFileAsURL() {

    var filesSelected = document.getElementById("fileupload").files;
    if (filesSelected.length > 0) {
        var fileToLoad = filesSelected[0];

        var fileReader = new FileReader();

        fileReader.onload = function (fileLoadedEvent) {
            var srcData = fileLoadedEvent.target.result; // <--- data: base64
            removeElement("outputimg");
            var newImage = document.createElement('img');
            newImage.src = srcData;

            document.getElementById("output").innerHTML = newImage.outerHTML;

            //Store the value of encoded string in the hidden div object for sending it in the $_POST array
            document.getElementById("imgURL").value = document.getElementById("output").innerHTML.toString();
            
            console.log(document.getElementById("output").innerHTML.toString());
            alert(srcData);
        }
        fileReader.readAsDataURL(fileToLoad);
    }
}

function removeElement(elementId) {
    // Removes an element from the document
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}