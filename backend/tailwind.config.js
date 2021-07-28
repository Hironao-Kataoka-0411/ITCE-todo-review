module.exports = {
  purge: [

    './storage/framework/views/*.php',
    './resources/views/tasks.blade.php',
    './resources/js/app.js',
    './resources/**/*.vue',


  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
