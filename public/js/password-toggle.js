document.addEventListener("DOMContentLoaded", function () {
    const toggles = document.querySelectorAll(".toggle-password");

    toggles.forEach((btn) => {
        btn.addEventListener("click", function () {
            const targetId = this.getAttribute("data-target");
            const input = document.getElementById(targetId);

            if (!input) return;

            if (input.type === "password") {
                input.type = "text";
                this.textContent = "🙈"; // Hide icon
            } else {
                input.type = "password";
                this.textContent = "👁️"; // Show icon
            }
        });
    });
});
