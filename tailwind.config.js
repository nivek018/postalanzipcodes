/** @type {import('tailwindcss').Config} */

const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            fontFamily: {
                Anton: ["Anton", "sans-serif"],
                Caveat: ["Caveat", "cursive"],
                IBMPlexSans: ["IBM Plex Sans", "sans-serif"],
            },
        },
    },
    plugins: [
        // include Flowbite as a plugin in your Tailwind CSS project
        require("flowbite/plugin"),
    ],
}
