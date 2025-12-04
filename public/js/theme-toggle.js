document.addEventListener("DOMContentLoaded", () => {
    const btn = document.getElementById("theme-toggle");
    const icon = document.getElementById("theme-icon");

    function current() {
        return localStorage.getItem("theme") || "dark";
    }

    function apply(theme) {
        // Smooth transition class
        document.documentElement.classList.add("theme-transition");

        document.documentElement.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
        btn.setAttribute("aria-pressed", theme === "light");
        icon.textContent = theme === "light" ? "☀️" : "🌙";

        // Remove class after animation
        setTimeout(() => {
            document.documentElement.classList.remove("theme-transition");
        }, 350);
    }

    btn.addEventListener("click", () => {
        apply(current() === "dark" ? "light" : "dark");
    });

    // Initial load
    apply(current());
});
