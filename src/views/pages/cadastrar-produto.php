<?=$render('header')?>
<?=$render('aside')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-capitalize"><?= str_replace('-', ' ', $_GET['request']);?></h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row justify-content-center">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cadastro de Produtos</h5>

              <!-- General Form Elements -->
              <form action='<?=$base?>/cadastrar-produto' method='post' enctype='multipart/form-data'>
                <div class="mb-3">
                  <div id="flash"></div>
                </div>
                <div class="mb-3">
                  <label for="inputText" class='form-label'>Nome do Produto:</label>
                  <div class="col-sm-10">
                    <input name="name" type="text" class="form-control">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="inputEmail" class='form-label'>Preço do Produto:</label>
                  <div class="col-sm-10">
                    <input id='valor' name="preco" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="inputNumber" class='form-label'>Quantidade do Produto:</label>
                  <div class="col-sm-10">
                    <input name="qtde" type="text" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="inputNumber" class='form-label'>Imagem do Produto:</label>
                  <div class="col-sm-10">
                    <input name="imagem" type="file" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Cadastrar Produto </button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<script src="https://unpkg.com/imask"></script>
<script>
	IMask(document.getElementById('numero-cliente'), { mask: '(00) 00000-0000' })
</script>

 <?=$render('footer')?>