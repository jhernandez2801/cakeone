<div class="container">
    <h2>
        My List
        <?= $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Nuevo', ['controller'=>'Bookmarks','action'=>'add'],['class'=>'btn btn-primary pull-right','escape'=>false]) ?>
    </h2>
    <div class="list-group">
        <?php foreach($bookmarks as $bookmark): ?>
            <li  class="list-group-item ">
                <?= $this->Html->link($bookmark->url,null,['target'=>'_blank']) ?>
                <h4 class="list-group-item-heading"><?= h($bookmark->title) ?> </h4>
                <p class="list-group-item-text"><?= h($bookmark->descripcion) ?> </p>
                <br>
                <?= $this->Html->link('Edit',['controller'=>'Bookmarks','action'=>'edit', $bookmark->id],['class'=>'btn btn-sm btn-primary']) ?>
                <?= $this->Form->postLink('Eliminar',['controller'=>'Bookmarks','action'=>'delete',$bookmark->id],['confirm'=>'Eliminar enlace ?' ,'class'=>'btn btn-sm btn-danger']) ?>
            </li>
        <?php endforeach; ?>
    </div>
    <?= $this->element('All/paginate')?>
</div>