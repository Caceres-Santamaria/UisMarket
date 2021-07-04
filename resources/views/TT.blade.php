@extends('layouts/layout')

@section('title', '¿Quiénes somos?')
@section('css')

@endsection
@section('scriptHeader')

@endsection
@section('contenido')
<main class="grid-in-contenido my-14 mx-28 text-base text-justify">

  <h1 class="flex justify-center font-semibold text-3xl mb-4"><i class="fas fa-exclamation-triangle text-yellow-400"></i>Términos y Condiciones</h1>

  <p class="mb-3"> UIS MARKET es una iniciativa de estudiantes UIS con el objetivo de impulsar la compra local de diferentes sectores 
    y ofrecer una plataforma para que los emprendedores locales UIS, puedan exhibir su marca y darse a conocer.
    Las siguientes condiciones generales de uso aplican a todos los emprendimientos publicados en la plataforma de
    UIS MARKET.</p>
  
  <ul class="list-disc ml-4">
    <li>Los precios de los productos son asignados directamente por los emprendedores de cada marca, UIS MARKET solo es un intermediario.</li>
    <li>La logística de entrega/distribución de productos depende del emprendedor que se encuentra ubicado en el área metropolitana de Bucaramanga.</li>
    <li>El valor de los domicilios/envíos deberán ser consultados con cada emprendedor.</li>
    <li>Si el comprador se encuentra ubicado fuera del área metropolitana de Bucaramanga debe ponerse en contacto directamente con el emprendedor de la marca.</li>
    <li class="underline">UIS market no es responsable del envío o de los productos ni del estado de entrega</li>
  </ul>
  <ol class="list-decimal ml-4">
    <li class="font-bold text-lg my-3"><h3>Inscripción </h3>
    <p class="font-thin text-base">Es obligatorio completar el formulario de inscripción en todos sus campos con datos válidos y verídicos para poder
    utilizar los servicios que brinda UIS Market. El futuro Usuario deberá completarlo con su información personal de 
    manera exacta, precisa y verdadera y asume el compromiso de actualizar sus datos personales de ser necesario. UIS 
    Market NO se responsabiliza por la certeza de los datos personales provistos por sus usuarios. 

El usuario accederá a su cuenta personal mediante el ingreso de su usuario y clave de seguridad personal elegida, este 
se obliga a mantener la confidencialidad de su clave de seguridad. La cuenta es personal, única e intransferible, y está 
prohibido que un mismo usuario inscriba o posea más de una cuenta, en caso contrario, UIS Market podrá cancelar, suspender
o inhabilitar las cuentas. Cabe destacar que está prohibida la venta o transferencia de la cuenta bajo ningún título.

UIS Market se reserva el derecho de rechazar cualquier solicitud de inscripción o de cancelar una inscripción previamente
aceptada, sin que esté obligado a comunicar o exponer las razones de su decisión y sin que esto genere algún derecho a 
indemnización o compensación.

Uis Market se reserva el derecho de solicitar algún comprobante y/o dato adicional a efectos de corroborar que el
emprendedor que va a publicar su tienda sea integrante de la comunidad UIS, así como de suspender temporal o 
definitivamente a aquellos emprendedores cuyos datos no hayan podido ser confirmados. En estos casos de inhabilitación, 
se dará de baja todos los artículos publicados, así como las ofertas realizadas, sin que ello genere algún derecho de 
compensación.</p>
</li>
    <li class="font-bold text-lg my-3"><h3>Publicación de bienes y/o servicios</h3>
    <p class="font-thin text-base">El Usuario deberá ofrecer a la venta, los bienes y/o servicios en las categorías y subcategorías apropiadas.
    Las publicaciones podrán incluir textos descriptivos, gráficos, fotografías y otros contenidos pertinentes para 
    la venta del bien o la contratación del servicio, siempre que no violen ninguna regla o política de UIS Market. 
    El producto ofrecido por el emprendedor debe ser exactamente descrito en cuanto a sus condiciones y características 
    relevantes. Se entiende que mediante la inclusión del bien o servicio en UIS Market, el emprendedor acepta que tiene
      la intención y el derecho de vender el bien por él ofrecido, o está facultado para ello y lo tiene disponible para 
      su entrega inmediata o para el plazo especificado en la publicación. </p>
      </li>

    <li class="font-bold text-lg my-3"><h3>Artículos Prohibidos</h3>
    <p class="font-thin text-base">A continuación, se encuentra el listado de productos y servicios cuyo ofrecimiento, publicación, compra o venta están
    prohibidos por UIS Market por políticas internas y/o para garantizar el cumplimiento de alguna ley vigente según sea 
    el caso. Los vendedores son exclusivos responsables de la ley y la legalidad y legitimidad de los artículos que ofrecen.
    UIS Market no se hace responsable por la existencia de productos que infrinjan las políticas o cualquier ley o
    resolución judicial vigente en el sitio web.
  UIS Market podrá finalizar las publicaciones que no cumplan con las políticas anteriormente mencionadas por eso se 
  recomienda revisar este listado antes de publicar un artículo.</p>

  <ul class="list-disc ml-4 font-thin text-base">
    <li>Armas municiones y material explosivo</li>
    <li>Estupefacientes y sustancias prohibidas</li>
    <li>Fauna</li>
    <li>Fuegos artificiales</li>
    <li>Huesos, órganos y residuos humanos</li>
    <li>Tabaco y productos relacionados</li>
    <li>Medicamentos y productos para la salud</li>
    <li>Productos y servicios financieros</li>
    <li>Listas de correos y base de datos personales</li>
    <li>Productos o servicios para adultos</li>
    <li>Violencia y discriminación</li>
    <li>Publicaciones que violen derechos de propiedad intelectual</li>
    <li>Documentos legales y personales</li>
    <li>Programas o servicios para hackear dispositivos electrónicos</li>
    <li>Loterías o productos de azar</li>
    <li>Publicaciones con fines distintos a la venta de un producto y servicio</li>
    <li>Productos que requieran autorización de organismos estatales</li>
    <li>Seguros</li>
    <li>Vehículos</li>
    <li>Entradas para espectáculos y partidos de fútbol</li>
    <li>Cajas misteriosas</li>
    <li>Productos inseguros</li>
    <li>Equipamiento médico y productos relacionados</li>
  </ul>
</li>
    <li class="font-bold text-lg my-3"><h3>Privacidad de la Información</h3>
    <p class="font-thin text-base">Para utilizar los Servicios ofrecidos por UIS Market, los usuarios deben facilitar determinados datos de carácter personal.
    Dicha información personal se procesa y almacena en servidores con altos estándares de seguridad y protección física y 
    tecnológica. Para más información sobre la privacidad de los datos personales y casos en los que será revelada la información 
    personal, se pueden consultar nuestras <a class="underline" href="{{route('politicas')}}">Políticas de Privacidad</a>.</p>
  </li>

  <li class="font-bold text-lg my-3"><h3>Fallas en el sistema</h3>
    <p class="font-thin text-base">
      Uis Market no se responsabiliza por cualquier daño, perjuicio o pérdida al usuario causados por fallas en el 
      sistema, en el servidor o en Internet. Uis Market tampoco será responsable por cualquier virus que pudiera
      infectar el equipo del usuario como consecuencia del acceso o uso de su sitio web o a raíz de cualquier
        transferencia de datos, archivos, imágenes o textos contenidos en el mismo. Los Usuarios NO podrán atribuir
        responsabilidad alguna debido a perjuicios resultantes de dificultades técnicas o fallas en los sistemas o 
        en Internet. UIS Market no garantiza el acceso y uso continuado o ininterrumpido del sitio web. El sistema
          puede eventualmente no estar disponible debido a dificultades técnicas o fallas de Internet, o por cualquier
          otra circunstancia ajena a UIS Market; en tales casos se intentará restablecerlo con la mayor rapidez posible. 
    </p>
  </li>


  <li class="font-bold text-lg my-3"><h3>Alcance de los servicios de UIS Market</h3>
    <p class="font-thin text-base">
      El usuario reconoce y acepta que UIS Market no es parte en ninguna operación, ni tiene control alguno sobre la 
      calidad, seguridad o legalidad de los artículos anunciados, la veracidad o exactitud de los anuncios, la capacidad
      de los usuarios para vender o comprar artículos. UIS Market no puede asegurar que un usuario completará una compra
        ni podrá verificar la identidad o datos personales ingresados por los usuarios. UIS Market no garantiza la
        veracidad de la publicidad de terceros que aparezca en el sitio y no será responsable por la correspondencia o
          contratos que el usuario celebre con dichos terceros o con otros usuarios.
    </p>
  </li>


  <li class="font-bold text-lg my-3"><h3>Domicilios o envíos</h3>
    <p class="font-thin text-base">
      Los domicilios y envíos serán realizados únicamente en el área metropolitana de Bucaramanga, 
      el medio por el cual estos envíos van a ser realizados queda a disposición del emprendedor que publica su tienda.

    </p>
  </li>


  <li class="font-bold text-lg my-3"><h3>Responsabilidad</h3>
    <p class="font-thin text-base">
      UIS Market sólo pone a disposición de los usuarios un espacio virtual que les permite ponerse en comunicación 
      mediante Internet para encontrar una forma de vender o comprar servicios o bienes.
UIS Market no es el propietario de los artículos ofrecido ni los ofrece en venta.
UIS Market no interviene en el perfeccionamiento de las operaciones realizadas entre los usuarios ni en las condiciones
 estipuladas por ellos para las mismas, por esto no será responsable respecto de la existencia, calidad, cantidad, 
 estado o integridad de los bienes ofrecidos o adquiridos por los usuarios, así como de la capacidad para contratar 
 de los usuarios o de la veracidad de los datos personales por ellos ingresados. Cada usuario conoce y acepta ser el
  exclusivo responsable por los artículos que publica para su venta y por las ofertas y/o compras que realiza.
En ningún caso UIS Market será responsable por cualquier daño y/o perjuicio que haya podido sufrir el usuario debido
 a las operaciones realizadas o no realizadas por artículos publicados a través de UIS Market.
UIS Market recomienda actuar con prudencia al momento de realizar operaciones con otros usuarios. UIS Market NO será 
responsable por la realización de compras y/o operaciones con otros usuarios basadas en la confianza depositada en el
 sistema o los servicios brindados por UIS Market.
El único que puede eliminar comentarios de las tiendas es el usuario que realizó dicho comentario y el administrador,
 si este comentario viola alguna de las normas o políticas the UIS Market.

    </p>
  </li>


  <li class="font-bold text-lg my-3"><h3>Sanciones, suspensión de operaciones</h3>
    <p class="font-thin text-base">UIS Market podrá advertir, suspender en forma temporal o inhabilitar definitivamente
      la cuenta de un usuario, una tienda o una publicación, si (a) se quebrantara alguna ley, o cualquiera de las 
      estipulaciones de los Términos y Condiciones Generales y demás políticas de UIS Market; (b) si incumpliera sus 
      compromisos como Usuario; (c) si se incurriera a criterio de Mercado Libre en conductas o actos fraudulentos; 
      (d) no pudiera verificarse la identidad del emprendedor o cualquier información proporcionada por el mismo fuere 
      errónea. En caso de suspensión o inhabilitación de un usuario, todos los artículos que tuviera publicados serán
        removidos del sistema. También se removerán del sistema las ofertas de compra de bienes.
      </p>

      </li>


  <li class="font-bold text-lg my-3"><h3>Prohibiciones</h3>
    <p class="font-thin text-base">Los Usuarios no podrán: (a) manipular los precios de los artículos; (b) 
      dar a conocer sus datos personales o de otros; (c) publicar o vender artículos prohibidos por los Términos 
      y Condiciones Generales, demás políticas de UIS Market o leyes vigentes; (d) insultar o agredir a otros Usuarios; 
      (e) publicar artículos idénticos en más de una publicación.
      Este tipo de actividades será investigado por UIS Market y el infractor podrá ser sancionado con la suspensión o
      cancelación de la oferta e incluso de su registración como Usuario de UIS Market. 
      </p>
      </li>

    <li class="font-bold text-lg my-3"><h3>Obligaciones del Comprador</h3>
      <p class="font-thin text-base">Al comprar un artículo el usuario acepta la obligación dada por las condiciones de venta incluidas en la descripción del
    artículo en la medida en que las mismas no infrinjan las leyes o los Términos y Condiciones Generales y demás políticas 
    de UIS Market. La compra es irrevocable excepto en circunstancias extraordinarias, tales como que el vendedor cambie 
    sustancialmente la descripción del artículo después de realizada alguna compra, que exista un claro error tipográfico, 
    o que no pueda verificar la identidad del vendedor.
    Las compras sólo serán consideradas válidas, una vez hayan sido procesadas por el sistema informático de UIS Market.</p>
</li>

    <li class="font-bold text-lg my-3"><h3>Obligaciones del Vendedor</h3>
    <p class="font-thin text-base">El Usuario Vendedor debe tener capacidad para vender el bien objeto de su oferta. De igual manera, debe cumplir con todas las
    obligaciones regulatorias pertinentes y contar con los permisos y/o autorizaciones exigidas por la normativa aplicable para 
    la venta de los bienes y servicios ofrecidos. El usuario emprendedor deberá cumplir con la normatividad vigente en materia de 
    protección al consumidor, tales como, entregar información veraz, clara y suficiente, indicar el precio por unidad de medida
    en los productos que le sea aplicable, evitar publicidad engañosa en promociones, ofertas o descuentos que le otorgue al
    usuario comprador y cualquier otra obligación derivada de su publicación. El no cumplimiento de dicha obligación dará pie a 
    suspender y/o inhabilitar al usuario vendedor para continuar operando en el sitio. </p>
  </li>
  </ol>
</main>
@endsection