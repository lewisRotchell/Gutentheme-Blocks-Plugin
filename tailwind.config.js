/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{php,js}"],
  theme: {
    extend: {
      colors: {
        'primary': '#D91C21',
        'secondary': '#2A2A2A',
        'tertiary': '#A8BBB0',
        'base': '#FFFFFF',
        'contrast': '#000000',
        'highlight': '#BF0009',
        'darkgrey': '#151f29',
      }
    },
  },
  plugins: [],
  corePlugins: {
    preflight: false,
  }
}
