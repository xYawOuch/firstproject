document.getElementById("theme-toggle").onclick = () => {
    const html = document.documentElement;
    const newTheme = html.dataset.theme === "dark" ? "light" : "dark";
    html.dataset.theme = newTheme;
    localStorage.setItem("theme", newTheme);
};

document.documentElement.dataset.theme =
    localStorage.getItem("theme") || "light";
