document.addEventListener("DOMContentLoaded", () => {
    const html = document.documentElement;
    const toggleBtn = document.getElementById("theme-toggle");
    const icon = document.getElementById("theme-icon");

    // 1. Load theme from localStorage
    const savedTheme = localStorage.getItem("theme") || "dark";
    html.setAttribute("data-theme", savedTheme);
    icon.textContent = savedTheme === "dark" ? "☀️" : "🌙";

    // 2. Toggle theme + icon
    toggleBtn.addEventListener("click", () => {
        const currentTheme = html.getAttribute("data-theme");
        const newTheme = currentTheme === "dark" ? "light" : "dark";

        html.setAttribute("data-theme", newTheme);
        localStorage.setItem("theme", newTheme);

        // update icon
        icon.textContent = newTheme === "dark" ? "☀️" : "🌙";
    });
});
