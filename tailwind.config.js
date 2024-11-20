/** @type {import('tailwindcss').Config} */
export default {
  content: ["./public/**/*.php"],
  theme: {
    extend: {
      colors: {
        primary: '#007bff', // Blue
        secondary: '#343a40', // Dark gray
        accent: '#6c757d', // Lighter gray
      },
    },
  },
  plugins: [],
}

