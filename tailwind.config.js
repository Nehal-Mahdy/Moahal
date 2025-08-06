/**
 * @type {import('tailwindcss/tailwind-config').TailwindConfig }
 */
module.exports = {
  future: {
    hoverOnlyWhenSupported: true,
  },
  content: ['./**/*.{php,html}', './src/**/*.{js,ts}'],
     theme: {
    screens: {
      largeScreen: { min: "1282px", max: "1600px" },
      lab: { min: "1200px", max: "1281px" },
      tab: { min: "992px", max: "1199px" },
      md: { min: "992px" },
      mintab: { min: "768px", max: "991px" },
      mob: { max: "767px" },
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
      },
    },
    extend: {
      colors: {
        primary: "#EBF1FA",
        secondary: "#CDD9EA",
        bgBtn: "#3773C9",
      },
      fontFamily: {
        cairo: ["Cairo", "sans-serif"], 
        roboto: ["Roboto", "sans-serif"],
      },
    },
  },
  plugins: [],
};
