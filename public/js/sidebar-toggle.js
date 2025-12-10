document.addEventListener("DOMContentLoaded", () => {
    const burger = document.querySelector(".hris-burger");
    const sidebar = document.querySelector(".hris-sidebar");

    if (burger && sidebar) {
        const overlay = document.querySelector(".sidebar-overlay");

        burger.addEventListener("click", () => {
            sidebar.classList.toggle("active");
            overlay.classList.toggle("active");
        });

        overlay.addEventListener("click", () => {
            sidebar.classList.remove("active");
            overlay.classList.remove("active");
        });
    }
});
