<?php /* /var/www/html/teste/SistemaDeTarefas/resources/views/lista-tarefas.blade.php */ ?>
<?php $__env->startSection('content'); ?>

      <br><br>
        <?php if(session('message')): ?>
        <div class="alert alert-success alert-dismissible">
            <a href="#" class="close"
                data-dismiss="alert"
                aria-label="close">&times;</a>
            <?php echo e(session('message')); ?>

        </div>
        <?php endif; ?>
      <div class="container">
        <table class="table">
            <thead class="thead-dark">
                <a href="<?php echo e(route('tarefas.create')); ?>" class="btn btn-success btn-xs pull-right"><b>+</b> Nova Tarefa</a>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Tarefa</th>
                <th scope="col">Descrição</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tarefas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarefa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <?php if($tarefa->user_id == Auth::user()->id): ?>
                    <th scope="row"><?php echo e($tarefa->id); ?></th>
                    <td><?php echo e($tarefa->nome); ?></td>
                    <td><?php echo e($tarefa->descricao); ?></td>
                    <?php if($tarefa->status == 1): ?>
                        <td>Em adamento</td>
                    <?php elseif($tarefa->status == 0): ?>
                        <td>Concluído</td>
                    <?php endif; ?>
                    <td>
                        <a href="<?php echo e(route('tarefas.edit', $tarefa->id)); ?>"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Alterar"><i class="fa fa-pencil"></i>
                        </a>
                        &nbsp;<form style="display: inline-block;" method="POST"
                                    action="<?php echo e(route('tarefas.destroy', $tarefa->id)); ?>"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Excluir"
                                    onsubmit="return confirm('Confirma exclusão?')">
                            <?php echo e(method_field('DELETE')); ?><?php echo e(csrf_field()); ?>

                            <button type="submit" style="background-color: #fff">
                                <a><i class="fa fa-trash"></i></a>
                            </button></form>
                            &nbsp;<form style="display: inline-block;" method="POST"  action="<?php echo e(route('tarefas.update')); ?>"
                                    enctype="multipart/form-data">
                                <?php echo method_field('put'); ?>

                                <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="status" value="0">
                            <input type="hidden" name="id" value="<?php echo e($tarefa->id); ?>">
                            <input type="hidden" name="nome" value="<?php echo e($tarefa->nome); ?>">
                            <input type="hidden" name="descricao" value="<?php echo e($tarefa->descricao); ?>">
                            <input type="hidden" name="user_id" value="<?php echo e($tarefa->user_id); ?>">
                            <button type="submit" style="background-color: #fff">
                                <a><i class="fa fa-check"></i></a>
                            </button></form>
                    </td>
                    <?php endif; ?>
                <tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
      </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>