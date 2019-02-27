<?php /* /var/www/html/teste/SistemaDeTarefas/resources/views/alterar-tarefas.blade.php */ ?>
<?php $__env->startSection('content'); ?>
      <br><br>
      <div class="container">
            <div class="form-sec">

                <form name="formTarefa" id="qryform" method="POST" action="<?php echo e(route('tarefas.update')); ?>"
                          enctype="multipart/form-data">
                        <?php echo method_field('put'); ?>

                        <?php echo e(csrf_field()); ?>

                        <input type="hidden" name="id" value="<?php echo e($tarefas->id); ?>">
                    <input type="hidden" name="status" value="<?php echo e($tarefas->status); ?>">
                    <input type="hidden" name="user_id" value="<?php echo e($tarefas->user_id); ?>">
                    <div class="form-group">
                        <label>Nome da tarefa</label>
                        <input type="text" class="form-control" id="name" placeholder="Insira o nome da tarefa" name="nome" required value="<?php echo e($tarefas->nome); ?>">
                    </div>
                    <div class="form-group">
                        <label>Descrição</label>
                        <textarea name="descricao" class="form-control" id="iq" placeholder="Insira a descrição da tarefa" required ><?php echo e($tarefas->descricao); ?></textarea>
                    </div>


                    <button type="submit" class="btn btn-lg  btn-success">Alterar</button>
                    <a href="/tarefas" class="btn btn-lg  btn-danger"> Voltar</a>
                </form>
            </div>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>