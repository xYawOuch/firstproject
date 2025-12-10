const alertBox = document.querySelector(".alert-success");

if (alertBox) {
    setTimeout(() => {
        alertBox.style.opacity = "0";
        alertBox.style.transition = "opacity .4s";

        // remove element completely after fade-out
        setTimeout(() => {
            alertBox.remove();
        }, 400);
    }, 2500);
}
