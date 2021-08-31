module.exports = {
    purge: [],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            inset: {
                'calc': 'calc(100% + 3px)',
            },
            zIndex: {
                '1': '1',
                '8': '8',
            },
            height: {
                'cardsm': 'calc(((100vw - 4.6rem)/2)+20px)',
                'cardmd': 'calc((100vw - 9rem)/3)',
                'cardlg': 'calc(((100vw - 10.8rem)/4)+20px)',
            },
            width: {
              'cardsm': 'calc((100vw - 4.6rem)/2)',
              'cardmd': 'calc((100vw - 9rem)/3)',
              'cardlg': 'calc((100vw - 10.8rem)/4)',
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

            },
            gridTemplateRows: {
                '3m': 'auto 1fr auto',
                'lg': '80px 40px',
                'detalle':'repeat(2, auto)',
            },
            gridTemplateColumns: {
                'mm': 'minmax(min-content, 1fr)',
                '121': '1fr 2fr 1fr',
                'cardsm': 'repeat(auto-fit, minmax(130px, calc((100% - 3rem)/2)))',
                'cardmd': 'repeat(auto-fit, minmax(136px, calc((100% - 5rem)/3)))',
                'cardlg': 'repeat(auto-fit, minmax(136px, calc((100% - 7rem)/4)))',
                'full': '100%',
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
                'ModernSans' : ['ModernSans', 'sans-serif'],

            },
            lineHeight: {
                'extra-loose': '3',
                'extra-lg': '5rem',
            }
        },


    },
    variants: {
        extend: {
            transform: ['hover', 'focus','active','last'],
            outline: ['hover', 'focus','active','last'],
            cursor: ['hover', 'focus','active','last'],
            borderWidth: ['hover', 'focus','active','last'],
            borderStyle: ['hover', 'focus','active','last'],
            borderColor: ['hover', 'focus','active','last'],
            backgroundColor:['hover', 'focus','active','last'],
            inset:['hover', 'focus','active','last'],
            visibility:['hover', 'focus','active','last'],
        },
    },
    plugins: [
        require('@savvywombat/tailwindcss-grid-areas')
    ],
}