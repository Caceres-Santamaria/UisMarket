  <div class="w-full md:px-10 lg:px-10">

      <div class="splide__container  ">
          <div class="splide " id="splide_tiendas">
              <div class="splide__track">
                  <ul class="splide__list">
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy"
                                      class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy"
                                      class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy"
                                      class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy"
                                      class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>
                      <li class="splide__slide">
                          <div class=" card-producto border-gray-200 border-2 rounded-md p-1">
                              <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                                  <img loading="lazy"
                                      class="card-producto__img w-full h-full object-cover object-center"
                                      src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                              </a>
                              <div class="flex flex-col justify-center items-center">
                                  <h5
                                      class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                      nombre
                                      del producto</h5>
                              </div>
                          </div>
                      </li>



                  </ul>
              </div>
          </div>
      </div>
  </div>
  </div>
  <div class="flex justify-center w-full">
      <button class="bg-primario-n text-white rounded-lg m-6 w-7/12 h-8 md:w-4/12 lg:w-48 lg:h-9">Ver todas las
          tiendas</button>
  </div>


  @section('scriptFooter')
      <script>
          new Splide('#splide_tiendas', {
              rewind: true,
              width: '100%',
              direction: 'ltr',
              isNavigation: true,
              pagination: false,
              gap: '1rem',
              cover: true,
              perMove: 1,
              perPage: 4,
              breakpoints: {
                  '2400': {
                      perPage: 4,
                  },
                  '1199': {
                      perPage: 4,
                  },
                  '991': {
                      perPage: 3,
                  },
                  '767': {
                      perPage: 3,
                  },
                  '575': {
                      perPage: 2,
                      width: '100vw',
                  },
              }
          }).mount();
      </script>
  @endsection
