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
      bebas: ['Bebas Neue', 'cursive'],
      ubuntu:['Ubuntu', 'sans-serif'],
      popin:['Poppins', 'sans-serif'],
      roboto:['Roboto', 'sans-serif'],
    },
  },
  plugins: [],
}