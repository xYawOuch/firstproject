document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById("theme-toggle");
    const icon = document.getElementById("theme-icon");

    // Load saved theme
    const savedTheme = localStorage.getItem("theme") || "dark";
    html.setAttribute("data-theme", savedTheme);
    icon.textContent = savedTheme === "dark" ? "☀️" : "🌙";

    toggleBtn.addEventListener("click", () => {
        // Add animation class
        html.classList.add("theme-fade");

        // Detect current theme
        const currentTheme = html.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        // Apply new theme
        html.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);

        // Update icon
        icon.textContent = newTheme === "dark" ? "☀️" : "🌙";

        // Remove transition class after animation
        setTimeout(() => {
            html.classList.remove("theme-fade");
        }, 400); // matches CSS 0.35s
    });
});
