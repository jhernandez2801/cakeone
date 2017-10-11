<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h2 class="inline-block">
                Usuarios
            </h2>
            <?= $this->element('All/search') ?>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('first_name',['Nombre']) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('last_name',['Apellido']) ?></th>
                            <th scope="col"><?= $this->Paginator->sort('email',['Correo Electronico']) ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody id="table">
                        <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td >
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class'=>'btn btn-sm btn-info'] ) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class'=>'btn btn-sm btn-primary']) ?>
                                <?php if($user->role!='admin'): ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class'=>'btn btn-sm btn-danger']) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
        </div>
        <?= $this->element('All/paginate')?>

    </div>
</div>

