/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                "blue-rgba": "rgba(32, 41, 243, 0.08)",
                "green-rgba": "rgba(15, 186, 104, 0.08)",
                "yellow-rgba": "rgba(234, 214, 33, 0.08)",
            },
        },
        fontFamily: {
            Inter: ["Inter", "sans-serif"],
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
