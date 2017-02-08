<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Wait'), ['action' => 'edit', $wait->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Wait'), ['action' => 'delete', $wait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wait->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Waits'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wait'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Notifies'), ['controller' => 'Notifies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Notify'), ['controller' => 'Notifies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facilities'), ['controller' => 'Facilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facility'), ['controller' => 'Facilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserveables'), ['controller' => 'Reserveables', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserveable'), ['controller' => 'Reserveables', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="waits view large-9 medium-8 columns content">
    <h3><?= h($wait->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $wait->has('user') ? $this->Html->link($wait->user->id, ['controller' => 'Users', 'action' => 'view', $wait->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Notify') ?></th>
            <td><?= $wait->has('notify') ? $this->Html->link($wait->notify->name, ['controller' => 'Notifies', 'action' => 'view', $wait->notify->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Facility') ?></th>
            <td><?= $wait->has('facility') ? $this->Html->link($wait->facility->name, ['controller' => 'Facilities', 'action' => 'view', $wait->facility->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('End') ?></th>
            <td><?= h($wait->end) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($wait->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Central Latitude') ?></th>
            <td><?= $this->Number->format($wait->central_latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Central Longitude') ?></th>
            <td><?= $this->Number->format($wait->central_longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= $this->Number->format($wait->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Size') ?></th>
            <td><?= $this->Number->format($wait->size) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Succession') ?></th>
            <td><?= $this->Number->format($wait->succession) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Must') ?></th>
            <td><?= $this->Number->format($wait->must) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Max Price') ?></th>
            <td><?= $this->Number->format($wait->max_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($wait->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($wait->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($wait->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Start') ?></th>
            <td><?= h($wait->start) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Reserveables') ?></h4>
        <?php if (!empty($wait->reserveables)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Wait Id') ?></th>
                <th scope="col"><?= __('Confirmed') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($wait->reserveables as $reserveables): ?>
            <tr>
                <td><?= h($reserveables->id) ?></td>
                <td><?= h($reserveables->wait_id) ?></td>
                <td><?= h($reserveables->confirmed) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reserveables', 'action' => 'view', $reserveables->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reserveables', 'action' => 'edit', $reserveables->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reserveables', 'action' => 'delete', $reserveables->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserveables->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
