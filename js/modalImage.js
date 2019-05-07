function clickedThumbImage(thumbImage) {
    console.log("path:");
    console.log(this.src);
    var img = document.getElementById(thumbImage);
    var modal = document.getElementById('modal-image');
    var modalImg = document.getElementById("bigModalImage");
    var captionText = document.getElementById("modal-image-caption");

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.alt;
}

function closeModalImage() {
    var modal = document.getElementById('modal-image');
    modal.style.display = "none";
}