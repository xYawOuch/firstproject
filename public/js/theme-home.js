// theme-toggle.js
document.addEventListener("DOMContentLoaded", () => {
    const toggleBtn = document.getElementById("theme-toggle");
    const icon = document.getElementById("theme-icon");

    // Load previously saved theme
    const savedTheme = localStorage.getItem("theme");
    if (savedTheme === "dark") {
        document.body.classList.add("dark");
        toggleBtn.setAttribute("aria-pressed", "true");
        icon.textContent = "☀️";
    }

    toggleBtn.addEventListener("click", () => {
        const isDark = document.body.classList.toggle("dark");

        toggleBtn.setAttribute("aria-pressed", isDark ? "true" : "false");
        icon.textContent = isDark ? "☀️" : "🌙";

        // Save preference
        localStorage.setItem("theme", isDark ? "dark" : "light");
    });
});
