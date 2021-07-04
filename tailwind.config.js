module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            
            textColor: {
                'inherit': 'inherit',
            },
            colors: {
                primario: {
                    n: '#67B93E',
                    ligth: '#8cbf70',
                    dark: '#53b51e',
                },

            },
            gridTemplateRows: {
                '3m': 'auto 1fr auto',
                'lg': '80px 40px',
            },
            gridTemplateColumns: {
                'mm': 'minmax(min-content, 1fr)',
                '121': '1fr 2fr 1fr',
            },
            gridTemplateAreas: {
                'layout': [
                    'header',
                    'contenido',
                    'footer',
                ],
                'foot': [
                    'descripcion',
                    'nosotros',
                    'derechos',
                ],
            },
            fontFamily: {
                'Delius': ['Delius', 'sans-serif'],

            },
            lineHeight: {
                'extra-loose': '3',
                'extra-lg': '5rem',
            }
        },


    },
    variants: {
        extend: {
            transform: ['hover', 'focus'],
            outline: ['hover', 'focus'],
            cursor: ['hover', 'focus'],
            borderWidth: ['hover', 'focus'],
            borderStyle: ['hover', 'focus'],
        },
    },
    plugins: [
        require('@savvywombat/tailwindcss-grid-areas')
    ],
}