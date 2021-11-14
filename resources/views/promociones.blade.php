<x-app2-layout title="Promociones">

    <main>
        <x-filtro_desplegable />

        <div id="content-products" class=" w-full">
            <div
                class=" grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
                <div class="border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="block w-full h-cardsm relative md:h-cardmd lg:h-cardlg ">
                        <div
                            class=" absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class=" w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class=" w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p1.jpg') }}" alt="">
                    </a>
                    <div class=" flex flex-col justify-center items-center">
                        <h5 class=" pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class=" text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class=" absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class=" w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class=" w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p2.jpg') }}" alt="">
                    </a>
                    <div class=" flex flex-col justify-center items-center">
                        <h5 class=" pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class=" text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class=" absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class=" w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class=" w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p4.jpg') }}" alt="">
                    </a>
                    <div class=" flex flex-col justify-center items-center">
                        <h5 class=" pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class=" text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
                <div class="border-gray-200 border-2 rounded-md p-1 ">
                    <a href="" class="block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
                        <div
                            class=" absolute top-1.5 -left-0.5 w-auto flex justify-start items-start content-start flex-col z-8 ">
                            <span
                                class=" w-16 text-xs text-center h-5 leading-5 mb-1 text-white rounded-sm bg-red-600 lg:w-20 lg:pb-6 lg:text-base">20%
                                OFF</span>
                        </div>
                        <img class=" w-full h-full object-cover object-center "
                            src="{{ Storage::url('images/website/p3.jpg') }}" alt="">
                    </a>
                    <div class=" flex flex-col justify-center items-center">
                        <h5 class=" pt-1.5 text-sm text-center uppercase lg:text-base">Tenda</h5>
                        <p class=" text-center lg:text-lg">
                            <span style="opacity: .5;text-decoration:line-through;">$100.000</span> |
                            <span>$80.000</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</x-app2-layout>
