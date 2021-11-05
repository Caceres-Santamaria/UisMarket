<div class="lg:mx-5 md:mx-5 w-sliderprodsm lg:w-sliderprodlg">
    <div class="splide_prod" id="splide_prod">
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <div class=" splide__slide__container card-producto border-gray-200 border-2 rounded-md p-1">
                        <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                            <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                                src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                        </a>
                        <div class="flex flex-col justify-center items-center">
                            <h5 class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                nombre del
                                producto</h5>
                        </div>
                    </div>
                </li>
                <li class="splide__slide">
                    <div class="splide__slide__container card-producto border-gray-200 border-2 rounded-md p-1">
                        <a href="" class=" block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                            <img loading="lazy" class="card-producto__img w-full h-full object-cover object-center"
                                src="{{ Storage::url('images/website/p2.jpg') }}" alt="">
                        </a>
                        <div class="flex flex-col justify-center items-center">
                            <h5 class="card-producto__title line-clamp-1 text-center uppercase text-sm pt-1 lg:text-sm">
                                nombre del
                                producto cnsjdcnsdjcnsdjvnd cjsdcndsjnvsdnvs</h5>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

@section('scriptFooter')
    <script>
        new Splide('#splide_prod', {
            type: 'loop',
            perMove: 1,
            lazyLoad: 'nearby',
            drag: true,
            fixedWidth: '12rem',
            fixedHeight: '14rem',
            gap: '2rem',
            breakpoints: {
                '1024': {
                    fixedWidth: '12rem',
                    fixedHeight: '14rem',
                },
                '768': {
                    fixedWidth: '12rem',
                    fixedHeight: '14rem',
                },
                '640': {
                    fixedWidth: '10rem',
                    fixedHeight: '12rem',
                }
            }
        }).mount();
    </script>
@endsection
