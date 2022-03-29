module.exports = {
  mode: 'jit',
  darkMode: 'class',
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      colors: {
        'discord': {
          600: '#99AAB5',
          700: '#5865F2',
          800: '#2C2F33',
          900: '#23272A',
        },
      },
    },
  },
  plugins: [],
}
