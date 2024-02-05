/**
 * Container Plugin - modifies Tailwind’s default container.
 */

/** @type {import('tailwindcss').Config} */
module.exports = {
  corePlugins: {
    preflight: false,
  },
  content: [
    '../widgets/*.php',
    './src/scss/**/*.scss',
    './src/js/**/*.js',
  ],
  theme: {
    colors: {
      'dark-grey': '#636569',
      'darker-grey': '#414A50',
      'airbali-theme': '#D75C00',
      black: '#000',
      white: '#ffffff'
    },
  },
}

