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
              <h5 class="card-title">Gestão de Pagamentos</h5>      
              <div class="mb-3">
                <div id="flash"></div>
              </div>  
              <!-- Pagamentos Concluidos  -->
              <div class="mb-3 d-flex justify-content-between row">
                <div class="col-md-4">
                  <h5 class="fw-bold d-inline-block text-success"><i class="bi bi-check-circle"></i> Pagamentos Concluídos</h5>
                </div>             
              </div> 
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                  <thead class="table-light">
                    <tr>
                      <th>Nome do pagamento</th>
                      <th>Cliente</th>
                      <th>Valor</th>
                      <th>Vencimento</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody id="tabela-pagamentos">
                    <?php if(isset($pagamentosC)): ?>
                      <?php foreach($pagamentosC as $pagamento):?>
                        <tr>
                          <td><?=$pagamento['name']?></td>
                          <td><?=$pagamento['cliente_name']?></td>
                          <td>R$<?=$pagamento['valor']?></td>
                          <td><?=date('d-m-Y', strtotime($pagamento['vencimento']))?></td>
                          <td><span class='badge bg-success'>Pago</span></td>
                          <td><a data-bs-toggle='tooltip' data-bs-placement='top' title='Deletar Pagamento' href='<?=$base?>/deletar-pagamento/<?=$pagamento['id']?>' class="btn btn-sm btn-danger deletar-pagamento"><i class="bi bi-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              <!-- Fim pagamentos Concluidos -->

              <!-- Pagamentos Pendentes -->
              <div class="mb-3 d-flex justify-content-between row">
                <div class="col-md-4">
                  <h5 class="fw-bold d-inline-block text-danger"><i class="bi bi-x-circle"></i> Pagamentos Pedentes </h5>
                </div>          
              </div>   
              <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                  <thead class="table-light">
                    <tr>
                      <th>Nome do pagamento</th>
                      <th>Cliente</th>
                      <th>Valor</th>
                      <th>Vencimento</th>
                      <th>Status</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody id="tabela-pagamentos">
                    <?php if(isset($pagamentosP)): ?>
                      <?php foreach($pagamentosP as $pagamento):?>
                        <tr>
                          <td><?=$pagamento['name']?></td>
                          <td><?=$pagamento['cliente_name']?></td>
                          <td>R$<?=$pagamento['valor']?></td>
                          <td><?=date('d-m-Y', strtotime($pagamento['vencimento']))?></td>
                          <td><span class='badge bg-danger'>Pendente</span></td>
                          <td>
                            <a data-bs-toggle='tooltip' data-bs-placement='top' title='Deletar Pagamento' href='<?=$base?>/deletar-pagamento/<?=$pagamento['id']?>' class="btn btn-sm btn-danger">
                              <i class="bi bi-trash"></i>
                            </a>

                            <a href='<?="$base/marcar-pago/$pagamento[id]"?>' data-bs-toggle='tooltip' data-bs-placement='top' title='Marcar como pago' class='btn-sm btn btn-success'>
                              <i class='bi bi-check2-circle'></i>
                            </a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
              
              <!-- Fim Pagamentos Pendentes -->
            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
 <?=$render('footer')?>