/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'danger': '#E63946',
      'secondary': '#6b7280',
      'dark': '#17203F',
      'blue': '#5473FF',
      'gray': '#F9FAFF',
      'white': '#fff',
    },
    extend: {},
  },
  plugins: [],
}
