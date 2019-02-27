<?php /* /var/www/html/teste/SistemaDeTarefas/resources/views/nova-Tarefa.blade.php */ ?>
<?php $__env->startSection('content'); ?>
      <div class="container">
            <div class="form-sec">

                <form name="formTarefa" id="qryform" method="post" action="<?php echo e(route('tarefas.store')); ?>" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                    <input type="hidden" name="status" value="1">
                    <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                    <div class="form-group">
                        <label>Nome da tarefa</label>
                        <input type="text" class="form-control" id="name" placeholder="Insira o nome da tarefa" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" id="iq" placeholder="Insira a descrição da tarefa" required></textarea>
                    </div>


                    <button type="submit" class="btn btn-lg  btn-success">Enviar</button>
                    <a href="/tarefas" class="btn btn-lg  btn-danger"> Voltar</a>
                </form>
            </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>