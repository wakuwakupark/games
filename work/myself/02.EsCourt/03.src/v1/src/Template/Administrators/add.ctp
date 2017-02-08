<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Administrators'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menber Types'), ['controller' => 'MenberTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menber Type'), ['controller' => 'MenberTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facilities'), ['controller' => 'Facilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Facility'), ['controller' => 'Facilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="administrators form large-9 medium-8 columns content">
    <?= $this->Form->create($administrator) ?>
    <fieldset>
        <legend><?= __('Add Administrator') ?></legend>
        <?php
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('crawler_path');
            echo $this->Form->input('reserver_path');
            echo $this->Form->input('name');
            echo $this->Form->input('postcode');
            echo $this->Form->input('address');
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('tel');
            echo $this->Form->input('member_type_id', ['options' => $menberTypes, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
