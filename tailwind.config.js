/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode:'class',
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      width: {
        '01': '120px',
      },
      height:{
        '02':'70px',
      },
    },
    fontFamily: {
      bebas: ['Bebas Neue', 'cursive'],
      ubuntu:['Ubuntu', 'sans-serif'],
      popin:['Poppins', 'sans-serif'],
      roboto:['Roboto', 'sans-serif'],
    },
  },
  plugins: [],
}