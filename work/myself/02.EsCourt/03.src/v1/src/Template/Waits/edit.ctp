<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $wait->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $wait->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Waits'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Notifies'), ['controller' => 'Notifies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Notify'), ['controller' => 'Notifies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facilities'), ['controller' => 'Facilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Facility'), ['controller' => 'Facilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserveables'), ['controller' => 'Reserveables', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserveable'), ['controller' => 'Reserveables', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="waits form large-9 medium-8 columns content">
    <?= $this->Form->create($wait) ?>
    <fieldset>
        <legend><?= __('Edit Wait') ?></legend>
        <?php
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->input('notify_id', ['options' => $notifies, 'empty' => true]);
            echo $this->Form->input('facility_id', ['options' => $facilities, 'empty' => true]);
            echo $this->Form->input('central_latitude');
            echo $this->Form->input('central_longitude');
            echo $this->Form->input('distance');
            echo $this->Form->input('start', ['empty' => true]);
            echo $this->Form->input('end');
            echo $this->Form->input('size');
            echo $this->Form->input('succession');
            echo $this->Form->input('must');
            echo $this->Form->input('max_price');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
