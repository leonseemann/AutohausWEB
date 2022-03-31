module.exports = {
  mode: 'jit',
  darkMode: 'class',
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        'discord': {
          600: '#99AAB5',
          700: '#b3e5fc',
          800: '#332F33',
          900: '#23272A',
          'light': '#29b6f6',
          'dark': '#8000ff',
        },
      },
    },
  },
  plugins: [],
}
