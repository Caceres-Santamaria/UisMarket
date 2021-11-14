<div
    class=" grid p-2 place-items-stretch gap-y-6 gap-x-7 place-content-start grid-cols-cardsm md:grid-cols-cardmd md:gap-6 md:px-6 md:py-4 lg:grid-cols-cardlg lg:gap-6 lg:px-6 lg:py-4">
    <div class="border border-gray-300 rounded-md p-1 ">
        <a href="{{ route('detalleTien') }}"
            style="background-color:rgb(186, 189, 194)"
            class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

            {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
                src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

            <div
                class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
                <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
                    );transform: ;msFilter:;">
                    <path
                        d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                    </path>
                </svg>
            </div>
        </a>

        <div class=" flex flex-col justify-center items-center">
            <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
        </div>
    </div>



    <div class="border border-gray-300 rounded-md p-1 ">
      <a href="{{ route('detalleTien') }}"
          style="background-image:url('{{ Storage::url('images/website/p4.jpg') }}')"
          class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

          <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
              src="{{ Storage::url('images/logos/logo.png') }}" alt="">

          {{-- <div
              class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
              <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
                  );transform: ;msFilter:;">
                  <path
                      d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                  </path>
              </svg>
          </div> --}}
      </a>

      <div class=" flex flex-col justify-center items-center">
          <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
      </div>
  </div>

  <div class="border border-gray-300 rounded-md p-1 ">
    <a href="{{ route('detalleTien') }}"
        style="background-image:url('{{ Storage::url('images/website/p5.jpg') }}')"
        class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

        {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
            src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

        <div
            class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
            <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
                );transform: ;msFilter:;">
                <path
                    d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
                </path>
            </svg>
        </div>
    </a>

    <div class=" flex flex-col justify-center items-center">
        <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
    </div>
</div>

<div class="border border-gray-300 rounded-md p-1 ">
  <a href="{{ route('detalleTien') }}"
      style="background-image:url('{{ Storage::url('images/website/p6.jpg') }}')"
      class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

      {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
          src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

      <div
          class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
          <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
              );transform: ;msFilter:;">
              <path
                  d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
              </path>
          </svg>
      </div>
  </a>

  <div class=" flex flex-col justify-center items-center">
      <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
  </div>
</div>

<div class="border border-gray-300 rounded-md p-1 ">
  <a href="{{ route('detalleTien') }}"
      style="background-image:url('{{ Storage::url('images/website/p1.jpg') }}')"
      class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

      {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
          src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

      <div
          class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
          <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
              );transform: ;msFilter:;">
              <path
                  d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
              </path>
          </svg>
      </div>
  </a>

  <div class=" flex flex-col justify-center items-center">
      <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
  </div>
</div>


<div class="border border-gray-300 rounded-md p-1 ">
  <a href="{{ route('detalleTien') }}"
      style="background-image:url('{{ Storage::url('images/website/p2.jpg') }}')"
      class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

      {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
          src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

      <div
          class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
          <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
              );transform: ;msFilter:;">
              <path
                  d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
              </path>
          </svg>
      </div>
  </a>

  <div class=" flex flex-col justify-center items-center">
      <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
  </div>
</div>


<div class="border border-gray-300 rounded-md p-1 ">
  <a href="{{ route('detalleTien') }}"
      style="background-image:url('{{ Storage::url('images/website/p3.jpg') }}')"
      class="object-cover bg-center  bg-cover bg-no-repeat flex justify-center items-center w-full h-cardsmt relative md:h-cardmdt lg:h-cardlgt ">

      {{-- <img class="border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 object-cover bg-center  bg-cover bg-no-repeat"
          src="{{ Storage::url('images/logos/logo.png') }}" alt=""> --}}

      <div
          class="flex justify-center items-center border-4 border-gray-400 shadow-2xl rounded-full w-28 h-28 bg-white">
          <svg class="h-20 w-20 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" style="fill: rgb(97, 105, 116
              );transform: ;msFilter:;">
              <path
                  d="M19.148 2.971A2.008 2.008 0 0 0 17.434 2H6.566c-.698 0-1.355.372-1.714.971L2.143 7.485A.995.995 0 0 0 2 8a3.97 3.97 0 0 0 1 2.618V19c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-8.382A3.97 3.97 0 0 0 22 8a.995.995 0 0 0-.143-.515l-2.709-4.514zm.836 5.28A2.003 2.003 0 0 1 18 10c-1.103 0-2-.897-2-2 0-.068-.025-.128-.039-.192l.02-.004L15.22 4h2.214l2.55 4.251zM10.819 4h2.361l.813 4.065C13.958 9.137 13.08 10 12 10s-1.958-.863-1.993-1.935L10.819 4zM6.566 4H8.78l-.76 3.804.02.004C8.025 7.872 8 7.932 8 8c0 1.103-.897 2-2 2a2.003 2.003 0 0 1-1.984-1.749L6.566 4zM10 19v-3h4v3h-4zm6 0v-3c0-1.103-.897-2-2-2h-4c-1.103 0-2 .897-2 2v3H5v-7.142c.321.083.652.142 1 .142a3.99 3.99 0 0 0 3-1.357c.733.832 1.807 1.357 3 1.357s2.267-.525 3-1.357A3.99 3.99 0 0 0 18 12c.348 0 .679-.059 1-.142V19h-3z">
              </path>
          </svg>
      </div>
  </a>

  <div class=" flex flex-col justify-center items-center">
      <h5 class=" text-center uppercase text-sm  lg:text-base py-4">nombre de la tienda</h5>
  </div>
</div>
</div>
