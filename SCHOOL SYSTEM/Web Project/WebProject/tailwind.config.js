/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      zIndex: {
        '-1': '-1',
      },
      flexGrow: {
        '5' : '5'
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
