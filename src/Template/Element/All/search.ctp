<?= $this->Form->create('Search',['class'=>'inline-block','type'=>'GET','url'=>['controller'=>'users','action'=>'search']]) ?>
<div class="col-md-6">
<?= $this->Form->input('search',['label'=>false,'id'=>'s','class'=>'form-control','autocomplete'=>'off','placeholder'=>'Buscar...']) ?>
</div>
<?= $this->Form->end();
