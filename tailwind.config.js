/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors:{
        'inr-yellow': '#FFC400',
        'inr-black': '#282828',
        'inr-white': '#121212'
      }
    },
  },
  plugins: [],
}
