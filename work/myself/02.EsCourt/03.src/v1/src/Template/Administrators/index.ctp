<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Administrator'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menber Types'), ['controller' => 'MenberTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menber Type'), ['controller' => 'MenberTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Facilities'), ['controller' => 'Facilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Facility'), ['controller' => 'Facilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="administrators index large-9 medium-8 columns content">
    <h3><?= __('Administrators') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('deleted') ?></th>
                <th scope="col"><?= $this->Paginator->sort('crawler_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('reserver_path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('postcode') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tel') ?></th>
                <th scope="col"><?= $this->Paginator->sort('member_type_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($administrators as $administrator): ?>
            <tr>
                <td><?= $this->Number->format($administrator->id) ?></td>
                <td><?= h($administrator->created) ?></td>
                <td><?= h($administrator->modified) ?></td>
                <td><?= h($administrator->deleted) ?></td>
                <td><?= h($administrator->crawler_path) ?></td>
                <td><?= h($administrator->reserver_path) ?></td>
                <td><?= h($administrator->name) ?></td>
                <td><?= h($administrator->postcode) ?></td>
                <td><?= h($administrator->email) ?></td>
                <td><?= h($administrator->password) ?></td>
                <td><?= h($administrator->tel) ?></td>
                <td><?= $administrator->has('menber_type') ? $this->Html->link($administrator->menber_type->title, ['controller' => 'MenberTypes', 'action' => 'view', $administrator->menber_type->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $administrator->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $administrator->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?>
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
