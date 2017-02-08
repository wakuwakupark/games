<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Menber Types'), ['controller' => 'MenberTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menber Type'), ['controller' => 'MenberTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Waits'), ['controller' => 'Waits', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Wait'), ['controller' => 'Waits', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('deleted', ['empty' => true]);
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('postcode');
            echo $this->Form->input('address');
            echo $this->Form->input('tel');
            echo $this->Form->input('family_name');
            echo $this->Form->input('first_name');
            echo $this->Form->input('birthday', ['empty' => true]);
            echo $this->Form->input('member_type_id', ['options' => $menberTypes, 'empty' => true]);
            echo $this->Form->input('gender');
            echo $this->Form->input('job_id', ['options' => $jobs, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
