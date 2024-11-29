import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.js',
    ],
    theme: {
      extend: {
        colors: {
          primary: '#246d40', // Couleur principale (vert foncé)
          secondary: '#efa220', // Couleur secondaire (orange)
          accent: '#2b528b', // Couleur d'accent (bleu foncé)
        },
      },
    },
    plugins: [],
  }
  
