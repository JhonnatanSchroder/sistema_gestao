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
              <h5 class="card-title">Cadastro de Clientes</h5>

              <!-- General Form Elements -->
              <form id="form-clientes" method='post' action='<?=$base?>/cadastrar-clientes'>
                <?php if(!empty($flash)):?>
                    <div class="alert alert-success"><?=$flash?></div>
                <?php endif;?>
                <div class="mb-3">
                  <div id="flash"></div>
                </div>
                <div class="mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nome</label>
                  <div class="col-sm-10">
                    <input id="nome-cliente" name="name" type="text" class="form-control">
                  </div>
                </div>
                <div class="mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input id='email-cliente' name="email" type="email" class="form-control">
                  </div>
                </div>

                <div class="mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Numero</label>
                  <div class="col-sm-10">
                    <input id="numero-cliente" name="number" type="text" class="form-control" placeholder="(00) 00000-0000">
                  </div>
                </div>

                <div class="mb-3">
                  <div class="col-sm-10">
                    <input id='cadastrar-cliente' type="submit" class="btn btn-primary" value='Cadastrar Cliente'>
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