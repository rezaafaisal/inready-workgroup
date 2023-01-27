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
        'inr-yellow-1': '#FFE283',
        'inr-black': '#121212',
        'inr-white': '#f1f1f1',
        'inr-white-1': '#dadada',
      }
    },
  },
  plugins: [],
}
