<div class="w-full content__body grid grid-cols-cardsm gap-6 p-3.5 place-content-start place-items-stretch md:grid-cols-cardmd md:gap-x-6 md:gap-y-8 md:py-3 md:px-6 lg:grid-cols-cardlg lg:gap-6 lg:py-3 lg:px-6">
  {{-- @isset($productos)
      @forelse($productos as $producto) --}}
      <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
        <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
              {{-- @if($producto->cantidad > 0 || $producto->descuento <= 0)
              <div class="complements">
                  @if($producto->cantidad<=0)
                  <span class="agotado">AGOTADO</span>
                  @endif
                  @if($producto->descuento > 0)
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
                  @endif
              </div>
              @else
              <div class="complements">
                  <span class="agotado">AGOTADO</span>
                  <span class="descuento">{{ intval($producto->descuento*100) }} % OFF</span>
              </div>
              @endif
              <img loading="lazy" class="card-producto__img" src="{{ Storage::url($producto->imagenProductos[0]->nombre_imagen) }}" alt="{{ $producto->imagenProductos[0]->descripcion }}"> --}}
            <img class="card-producto__img w-full h-full object-cover object-center rounded-sm" src="{{ Storage::url('images/website/p1.jpg') }}" alt="">

          </a>

          <div class="card-producto__body flex flex-col justify-center items-center">
              <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase">Brunette

                <div class="star-rating">
                  <a class="text-yellow-500" href="#">★</a>
                  <a class="text-yellow-500" href="#">★</a>
                  <a class="text-yellow-500" href="#">★</a>
                  <a class="text-yellow-500" href="#">★</a>
                  <a class="text-yellow-500" href="#">★</a>
              <div>


              </h5>
              
          </div>
          
      </div>




      <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
        <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
          
        <img class="card-producto__img w-full h-full object-cover object-center rounded-sm" src="{{ Storage::url('images/website/p4.jpg') }}" alt="">

      </a> 
      <div class="card-producto__body flex flex-col justify-center items-center">
          <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase">tienda
            <div class="star-rating">
              <a class="text-yellow-500" href="#">★</a>
              <a class="text-yellow-500" href="#">★</a>
              <a class="text-yellow-500" href="#">★</a>
              <a class="text-yellow-500" href="#">★</a>
              <a class="text-yellow-500" href="#">★</a>
          <div>
          </h5>
          
      </div>
      
  </div>
  <div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
    <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
        
      <img class="card-producto__img w-full h-full object-cover object-center " src="{{ Storage::url('images/website/p5.jpg') }}" alt="">

    </a> 
    <div class="card-producto__body flex flex-col justify-center items-center">
        <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase">TIENDA
          <div class="star-rating">
            <a class="text-yellow-500" href="#">★</a>
            <a class="text-yellow-500" href="#">★</a>
            <a class="text-yellow-500" href="#">★</a>
            <a class="text-yellow-500" href="#">★</a>
            <a class="text-yellow-500" href="#">★</a>
        <div>
        </h5>
        
    </div>
    
</div>


<div class="card-producto border-gray-200 border-2 rounded-md p-1 ">
  <a href="" class="card-producto__link block w-full h-cardsm relative md:h-cardmd lg:h-cardlg">
      
    <img class="card-producto__img w-full h-full object-cover object-center " src="{{ Storage::url('images/website/p6.jpg') }}" alt="">

  </a> 
  <div class="card-producto__body flex flex-col justify-center items-center">
      <h5 class="card-producto__title pt-1.5 text-sm text-center uppercase">TIENDA
        <div class="star-rating">
          <a class="text-yellow-500" href="#">★</a>
          <a class="text-yellow-500" href="#">★</a>
          <a class="text-yellow-500" href="#">★</a>
          <a class="text-yellow-500" href="#">★</a>
          <a class="text-yellow-500" href="#">★</a>
      <div>
      </h5>
      
  </div>
  
</div>
      {{-- @empty
      @endforelse
  @endisset --}}
</div>
{{-- @isset($productos)
  @isset($sort_by)
  {{ $productos->appends(['sort_by' => $sort_by])->links() }}
  @else
  {{ $productos->links() }}
  @endisset
@endisset --}}
