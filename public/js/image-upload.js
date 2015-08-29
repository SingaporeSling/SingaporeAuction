// getElementById
function $id(id) {
    return document.getElementById(id);
}

// output information
function Output(msg) {
    var m = $id("messages");
    m.innerHTML = msg + m.innerHTML;
}

// call initialization file
if (window.File && window.FileList && window.FileReader) {
    Init();
}

// initialize
function Init() {

    var fileselect = $id("fileselect"),
        filedrag = $id("filedrag"),
        submitbutton = $id("submitbutton");

    // file select
    fileselect.addEventListener("change", FileSelectHandler, false);

    // is XHR2 available?
    var xhr = new XMLHttpRequest();
    if (xhr.upload) {

        filedrag.addEventListener("dragover", FileDragHover, false);
        filedrag.addEventListener("dragleave", FileDragHover, false);
        filedrag.addEventListener("drop", FileSelectHandler, false);
        filedrag.style.display = "block";

        // remove submit button
        submitbutton.style.display = "none";
    }
}

// file drag hover
function FileDragHover(e) {
    e.stopPropagation();
    e.preventDefault();
    e.target.className = (e.type == "dragover" ? "hover" : "");
}


// file selection
function FileSelectHandler(e) {

    // cancel event and hover styling
    FileDragHover(e);

    // fetch FileList object
    var files = e.target.files || e.dataTransfer.files;

    // process all File objects
    for (var i = 0, f; f = files[i]; i++) {
        ParseFile(f);
    }

    UploadFile(files, 0);

}

function ParseFile(file) {

    if (file.type.indexOf("image") == 0) {
        var reader = new FileReader();
        reader.onload = function(e) {
            Output(
                "<p><strong>" + file.name + ":</strong><br />" +
                '<img src="' + e.target.result + '" /></p>'
            );
        }
        reader.readAsDataURL(file);
    }

}

function UploadFile(files, key) {

    if (typeof files[key] !== 'undefined') {

        var xhr = new XMLHttpRequest();
        if (xhr.upload) {

            xhr.open("POST", $id("upload").action, true);
            var formData = new FormData();
            formData.append('file',files[key]);
            xhr.send(formData);

            xhr.onreadystatechange = function() {
                if (xhr.readyState==4 && xhr.status==200) {
                    UploadFile(files, key + 1);
                }
            }
        }

    }

}