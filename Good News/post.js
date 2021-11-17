var background = document.getElementById("outer-modal");
var modal = document.getElementById("inner-modal");

var title = document.getElementById("title");
var message = document.getElementById("message");



document.getElementById("create-post").onclick = () => {
    background.style.visibility = "visible";
    modal.style.visibility = "visible";
    
}
document.getElementById("cancel").onclick = () => {
    background.style.visibility = "hidden";
    modal.style.visibility = "hidden";
    title.value = "";
    message.value = "";
    document.getElementById("file").value == "";
    document.getElementById("filename"). innerHTML = "No file chosen.";
}
function clearForm(){
    background.style.visibility = "hidden";
    modal.style.visibility = "hidden";
    title.value = "";
    message.value = "";
    document.getElementById("file").value == "";
    document.getElementById("filename"). innerHTML = "No file chosen.";
}






window.addEventListener("DOMContentLoaded", () => {
    setInterval(() => {
        var images = document.querySelectorAll('img');

        for (var i = 0; i < images.length; i++) {
            if(images[i].getAttribute('src') === ""){
                images[i].style.display = "none";
            }
        }
    }, 1);
});