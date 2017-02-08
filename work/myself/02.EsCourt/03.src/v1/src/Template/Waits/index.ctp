<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Wait'), ['action' => 'add']) ?></li>
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
<div class="waits index large-9 medium-8 columns content">
    <h3><?= __('Waits') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('notify_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('facility_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('central_latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('central_longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('distance') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end') ?></th>
                <th scope="col"><?= $this->Paginator->sort('size') ?></th>
                <th scope="col"><?= $this->Paginator->sort('succession') ?></th>
                <th scope="col"><?= $this->Paginator->sort('must') ?></th>
                <th scope="col"><?= $this->Paginator->sort('max_price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($waits as $wait): ?>
            <tr>
                <td><?= $this->Number->format($wait->id) ?></td>
                <td><?= h($wait->created) ?></td>
                <td><?= h($wait->modified) ?></td>
                <td><?= h($wait->deleted) ?></td>
                <td><?= $wait->has('user') ? $this->Html->link($wait->user->id, ['controller' => 'Users', 'action' => 'view', $wait->user->id]) : '' ?></td>
                <td><?= $wait->has('notify') ? $this->Html->link($wait->notify->name, ['controller' => 'Notifies', 'action' => 'view', $wait->notify->id]) : '' ?></td>
                <td><?= $wait->has('facility') ? $this->Html->link($wait->facility->name, ['controller' => 'Facilities', 'action' => 'view', $wait->facility->id]) : '' ?></td>
                <td><?= $this->Number->format($wait->central_latitude) ?></td>
                <td><?= $this->Number->format($wait->central_longitude) ?></td>
                <td><?= $this->Number->format($wait->distance) ?></td>
                <td><?= h($wait->start) ?></td>
                <td><?= h($wait->end) ?></td>
                <td><?= $this->Number->format($wait->size) ?></td>
                <td><?= $this->Number->format($wait->succession) ?></td>
                <td><?= $this->Number->format($wait->must) ?></td>
                <td><?= $this->Number->format($wait->max_price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $wait->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $wait->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wait->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wait->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
