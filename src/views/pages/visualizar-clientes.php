<?=$render('header')?>
<?=$render('aside')?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1 class="text-capitalize"><?= str_replace('-', ' ', $_GET['request']);?></h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Clientes Cadastrados</h5>      
              <div class="mb-3">
                  <?php if(!empty($flash)):?>
                    <div class="alert alert-success"><?=$flash?></div>
                  <?php endif;?>
                </div>        
              <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Número</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody id="tabela-clientes">
                      <?php foreach($clientes as $cliente): ?>
                        <tr>
                          <td><?=$cliente['name']?></td>
                          <td><?=$cliente['email']?></td>
                          <td><?=$cliente['number']?></td>
                          <td class="text-dark">
                            <a data-bs-toggle='tooltip' data-bs-placement='top' title='Editar cliente' data-id='<?=$cliente['id']?>' href="<?=$base?>/editar-cliente/<?=$cliente['id']?>" class="btn-sm btn btn-primary">
                              <i class="bi bi-pen"></i>
                            </a>
                            <a href='<?=$base?>/deletar-clientes/<?=$cliente['id']?>' data-bs-toggle='tooltip' data-bs-placement='top' title='Deletar cliente' data-id='<?=$cliente['id']?>' class="deletar btn btn-sm btn-danger">
                              <i class="bi bi-trash"></i>
                            </a>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" title='Adicionar Pagamento' data-id='<?=$cliente['id']?>' class="btn btn-sm btn-success">
                              <i class="bi bi-plus"></i>
                            </button>
                            <!-- MODAL -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <form method='post' action='<?=$base?>/adicionar-pagamento'>
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Adicionar Pagamento</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <div class="row">
                                        <div class="col col-sm-12">
                                          <div class="mb-3">
                                            <label for="" class="form-label">Nome do Pagamento</label>
                                            <input name="name" type="text" class="form-control">
                                          </div>

                                          <div class="mb-3">
                                            <input name='cliente_id' type="hidden" value="<?=$cliente['id']?>">
                                            <label for="" class="form-label">Cliente</label>
                                            <input name="cliente_name" type="text" class="form-control" value='<?=$cliente['name']?>'>
                                          </div>


                                          <div class="mb-3">
                                            <label for="" class="form-label">Valor</label>
                                            <input name="valor" type="text" class="form-control" id="valor">
                                          </div>

                                          <div class="mb-3">
                                            <label for="" class="form-label">Parcelas</label>
                                            <select name="parcelas" class="form-select">
                                              <option value="1">1x</option>
                                              <option value="2">2x</option>
                                              <option value="3">3x</option>
                                              <option value="4">4x</option>
                                              <option value="5">5x</option>
                                              <option value="6">6x</option>
                                              <option value="7">7x</option>
                                              <option value="8">8x</option>
                                              <option value="9">9x</option>
                                              <option value="10">10x</option>
                                              <option value="11">11x</option>
                                              <option value="12">12x</option>
                                            </select>
                                          </div>

                                          <div class="mb-3">
                                            <label for="" class="form-label">Vencimento</label>
                                            <input name="vencimento" type="date" class="form-control w-50">
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                      <input id="Adicionar-pagamento" type="submit" value='Salvar Pagamento' class="btn btn-primary">
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div> <!-- End modal -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
               
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
 <?=$render('footer')?>