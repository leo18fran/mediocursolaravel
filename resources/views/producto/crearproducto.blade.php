<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/postdis.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <script src="{{ asset('js/file.js') }}" defer></script>


    <title>Publicar Post</title>
  </head>

  <body>

    <!-- contenido -->
    <section class="contenido">
      <div class="container">
          <div class="grid">
              <div class="content">
                  <h1>Protejamonos entre Nosotros.</h1>
                  <p>“En el crimen todo es cuestión de forma. Las variantes de la delincuencia no son más que proteísmos de un mismo hecho: la violación de la ley.”</p>
                  <a href="{{ url('producto/') }}"><label><i class="bi bi-arrow-left-square"> Regresar</i></label></a>
                </div>
              <div class="form">
                  <form action="{{ url('/producto') }}" method="post" enctype="multipart/form-data" required>
                    @csrf
                    <div class="flex">
                        <input type="text" name="nombre_producto" id="nombre_producto" placeholder=" Escribe el nombre de producto" required>
                    </div>
                    <div class="flex">
                        <label for="foto" id="selector"><i class="bi bi-upload" ></i> Subir una foto</label>
                        <input type="file" name="foto" id="foto" hidden>
                    </div>
                    <textarea name="direccion_de_entrega" id="direccion_de_entrega" cols="30" rows="8" placeholder="Escriba su direccion" required></textarea>
                    <button type="submit"><i class="bi bi-chat-square-fill"></i> Publicar</button>
                  </form>
              </div>
          </div>
      </div>
      <h2>REGISTRAR PEDIDO</h2>
  </section>
  </body>
</html>
