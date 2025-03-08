document.addEventListener("DOMContentLoaded", function () {
    let imageUpload = document.getElementById("imageUpload");

    if (imageUpload) {
        imageUpload.addEventListener("change", readURL, true);
    } else {
        console.warn("Element #imageUpload not found. Make sure it exists before loading the script.");
    }

    function readURL() {
        const file = imageUpload.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onloadend = function () {
            let imageElement = document.getElementById("image");
            if (imageElement) {
                imageElement.style.backgroundImage = `url(${reader.result})`;
            } else {
                console.warn("Element #image not found.");
            }
        };
        reader.readAsDataURL(file);
    }
});
