<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $facility->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $facility->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Facilities'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Administrators'), ['controller' => 'Administrators', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Administrator'), ['controller' => 'Administrators', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facility Images'), ['controller' => 'FacilityImages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Facility Image'), ['controller' => 'FacilityImages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Frames'), ['controller' => 'Frames', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Frame'), ['controller' => 'Frames', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Waits'), ['controller' => 'Waits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wait'), ['controller' => 'Waits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="facilities form large-9 medium-8 columns content">
    <?= $this->Form->create($facility) ?>
    <fieldset>
        <legend><?= __('Edit Facility') ?></legend>
        <?php
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('name');
            echo $this->Form->input('postcode');
            echo $this->Form->input('address');
            echo $this->Form->input('crawler_path');
            echo $this->Form->input('reserver_path');
            echo $this->Form->input('latitude');
            echo $this->Form->input('longitude');
            echo $this->Form->input('description');
            echo $this->Form->input('administrator_id', ['options' => $administrators, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
