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
        screens: {
            'sm': '576px',
            // => @media (min-width: 576px) { ... }
            'md': '768px',
            // => @media (min-width: 768px) { ... }
            'lg': '992px',
            // => @media (min-width: 992px) { ... }
            'xl': '1200px',
            // => @media (min-width: 1200px) { ... }
            },
        extend: {
            inset: {
                'calc': 'calc(100% + 3px)',
                '100-5': 'calc(100% + .5rem)',
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
                'full-16': 'calc(100vh - 4rem)',
                'full-3': 'calc(100vh - 3rem)',
                '18': '4.4rem',
                '27': '6.4rem',
            },
            width: {
                'cardsm': 'calc((100vw - 4.6rem)/2)',
                'cardmd': 'calc((100vw - 9rem)/3)',
                'cardlg': 'calc((100vw - 16rem - 4.5rem)/4)',
                'sliderprodsm': '17.5rem',
                'sliderprodlg': '75rem',
                'full-7': 'calc(100% - 7rem)',
                'full-8': 'calc(100% - 8rem)',
                '95%': '95%',
                '5%': '5%',
                '18': '4.4rem',
                '27': '6.4rem',
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
                'black2': {
                    '87': 'rgba(0, 0, 0, 0.87)',
                    '50': 'rgba(0, 0, 0, 0.5)',
                    '30': 'rgba(0, 0, 0, 0.3)',
                },
                'producto': {
                    'agotado': '#3E3E3E',
                    'descuento': '#FF0000'
                }
            },
            gridTemplateRows: {
                '3m': 'auto 1fr auto',
                'lg': '80px 40px',
                'detalle': 'repeat(3, auto)',
                '5auto': 'repeat(5, auto)',
                '4auto': 'repeat(4, auto)',
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
                '12': '3rem',
            },
            transitionTimingFunction: {
                'ease': 'ease',
            },
            rotate: {
                '360': '360deg',
            },
            minHeight: {
                '90px': '90px',
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
            backgroundColor: ['hover', 'focus', 'active', 'last','group-focus'],
            divideColor: ['group-hover'],
            inset: ['hover', 'focus', 'active', 'last'],
            visibility: ['hover', 'focus', 'active', 'last'],
            rounded: ['hover', 'focus', 'active', 'last'],
            padding: ['hover', 'focus', 'active', 'last'],
            rotate: ['active', 'group-hover'],
        },
    },
    plugins: [
        require('@savvywombat/tailwindcss-grid-areas'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio')
    ],
};
