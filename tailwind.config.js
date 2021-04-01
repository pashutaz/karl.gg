module.exports = {
    purge: [
        './resources/views/**/*.blade.php',
        './resources/scss/**/*.scss',
        './resources/js/**/*.js',
        './resources/js/**/*.vue',
    ],
    theme: {
        extend: {}
    },
    variants: {},
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
    ]
}
