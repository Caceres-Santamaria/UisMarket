const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    darkMode: false, // or 'media' or 'class'

    theme: {
        extend: {
            inset: {
                'calc': 'calc(100% + 3px)',
                'calc1': 'calc(100% + .5rem)',
                '-logosm': 'calc(-1px - 3rem)',
                '-logomd': 'calc(-1px - 5rem)',
            },
            zIndex: {
                '1': '1',
                '8': '8',
                '5': '5',
                '100': '100',
            },
            boxShadow: {
                redes: '0 0 .5rem rgba(0, 0, 0, 0.42);',
            },
            height: {
                'cardsm': 'calc(((100vw - 4.6rem)/2)+20px)',
                'cardmd': 'calc(((100vw - 10rem)/3)+20px)',
                'cardlg': 'calc(((100vw - 16rem - 4.5rem)/4)+20px)',
                'cardsmt': 'calc((100vw - 4.6rem)/2)',
                'cardmdt': 'calc((100vw - 9rem)/3)',
                'cardlgt': 'calc((100vw - 16rem - 4.5rem)/4)',
            },
            width: {
                'cardsm': 'calc((100vw - 4.6rem)/2)',
                'cardmd': 'calc((100vw - 9rem)/3)',
                'cardlg': 'calc((100vw - 16rem - 4.5rem)/4)',
                'sliderprodsm': '17.5rem',
                'sliderprodlg': '75rem',
            },
            textColor: {
                'inherit': 'inherit',
            },
            colors: {
                primario: {
                    n: '#67B93E',
                    ligth: '#75d545',
                    dark: '#53b51e',
                    dark2: '#469b18',
                    ligth2: '#79e741',
                },
                redes: {
                    fb: '#2E406E',
                    ws: '#4BCA5A',
                    ig: '#D82571',
                },

            },
            gridTemplateRows: {
                '3m': 'auto 1fr auto',
                'lg': '80px 40px',
                'detalle': 'repeat(3, auto)',
                '5auto': 'repeat(5, auto)',
                'auto': 'auto',
                'catalogo': '130px 40px auto',
            },
            gridTemplateColumns: {
                'mm': 'minmax(min-content, 1fr)',
                '121': '1fr 2fr 1fr',
                'cardsm': 'repeat(auto-fit, minmax(130px, calc((100% - 3rem)/2)))',
                'cardmd': 'repeat(auto-fit, minmax(136px, calc((100% - 5rem)/3)))',
                'cardlg': 'repeat(auto-fit, minmax(136px, calc((100% - 7rem)/4)))',
                'full': '100%',
                '5050': '50% 50%',
                '6040': 'calc(60% - .75rem) calc(40% - .75rem)',
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
                'detalle': [
                    'titulo',
                    'precio',
                    'descripcion',
                    'guia',
                    'tallas',
                ],
            },
            fontFamily: {
                'Delius': ['Delius', 'sans-serif'],
                'ModernSans': ['ModernSans', 'sans-serif'],
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            lineHeight: {
                'extra-loose': '3',
                'extra-lg': '5rem',
            }
        },


    },
    variants: {
        extend: {
            transform: ['hover', 'focus', 'active', 'last'],
            outline: ['hover', 'focus', 'active', 'last'],
            cursor: ['hover', 'focus', 'active', 'last'],
            borderWidth: ['hover', 'focus', 'active', 'last'],
            borderStyle: ['hover', 'focus', 'active', 'last'],
            borderColor: ['hover', 'focus', 'active', 'last'],
            backgroundColor: ['hover', 'focus', 'active', 'last'],
            inset: ['hover', 'focus', 'active', 'last'],
            visibility: ['hover', 'focus', 'active', 'last'],
            rounded: ['hover', 'focus', 'active', 'last'],
            padding: ['hover', 'focus', 'active', 'last'],
        },
    },
    plugins: [
        require('@savvywombat/tailwindcss-grid-areas'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
