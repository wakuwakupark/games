<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Facility'), ['action' => 'add']) ?></li>
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
<div class="facilities index large-9 medium-8 columns content">
    <h3><?= __('Facilities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('crawler_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserver_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('latitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longitude') ?></th>
                <th scope="col"><?= $this->Paginator->sort('administrator_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($facilities as $facility): ?>
            <tr>
                <td><?= $this->Number->format($facility->id) ?></td>
                <td><?= h($facility->created) ?></td>
                <td><?= h($facility->modified) ?></td>
                <td><?= h($facility->deleted) ?></td>
                <td><?= h($facility->name) ?></td>
                <td><?= h($facility->postcode) ?></td>
                <td><?= h($facility->crawler_path) ?></td>
                <td><?= h($facility->reserver_path) ?></td>
                <td><?= $this->Number->format($facility->latitude) ?></td>
                <td><?= $this->Number->format($facility->longitude) ?></td>
                <td><?= $facility->has('administrator') ? $this->Html->link($facility->administrator->name, ['controller' => 'Administrators', 'action' => 'view', $facility->administrator->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $facility->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $facility->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $facility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facility->id)]) ?>
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
