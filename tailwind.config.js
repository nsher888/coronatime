/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {},
        fontFamily: {
            Inter: ["Inter", "sans-serif"],
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
