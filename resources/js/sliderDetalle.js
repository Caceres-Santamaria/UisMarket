document.addEventListener('DOMContentLoaded', function() {
  var secondarySlider = new Splide('#secondary-slider', {
      rewind: true,
      width: '100%',
      direction: 'ltr',
      isNavigation: true,
      gap: 0,
      pagination: false,
      cover: true,
      lazyLoad: 'sequential',
      arrows: false,
      breakpoints: {
          '2400': {
              fixedWidth: 85,
              fixedHeight: 85,
              height: 85,
              width: '30vw',
          },
          '1199': {
              height: 85,
              width: '38vw',
              fixedWidth: 85,
              fixedHeight: 85,
          },
          '991': {
              fixedWidth: 80,
              fixedHeight: 80,
              height: 80,
              width: '40vw',
          },
          '767': {
              fixedWidth: 80,
              fixedHeight: 80,
              height: 80,
              width: 320,
          },
          '575': {
              fixedWidth: 80,
              fixedHeight: 80,
              height: 80,
              width: 320,
          }
      }
  }).mount();

  var primarySlider = new Splide('#primary-slider', {
      type: 'fade',
      // heightRatio: 1,
      pagination: false,
      arrows: false,
      cover: true,
      lazyLoad: 'sequential',
      rewind: true,
      breakpoints: {
          '2400': {
              fixedWidth: '30vw',
              fixedHeight: '30vw',
              width: '30vw',
              arrows: true,
          },
          '1199': {
              fixedWidth: '38vw',
              fixedHeight: '38vw',
              width: '38vw',
              arrows: true,
          },
          '991': {
              fixedWidth: '40vw',
              fixedHeight: '40vw',
              width: '40vw',
              arrows: false,
          },
          '767': {
              fixedWidth: 320,
              fixedHeight: 320,
              width: 320,
              arrows: false,
          },
          '575': {
              fixedWidth: 320,
              fixedHeight: 320,
              width: 320,
              arrows: false,
          }
      }
  }); // do not call mount() here.
  primarySlider.sync(secondarySlider).mount();
});