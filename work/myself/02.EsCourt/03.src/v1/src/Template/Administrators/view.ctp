<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Administrator'), ['action' => 'edit', $administrator->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Administrator'), ['action' => 'delete', $administrator->id], ['confirm' => __('Are you sure you want to delete # {0}?', $administrator->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Administrators'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrator'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menber Types'), ['controller' => 'MenberTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menber Type'), ['controller' => 'MenberTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facilities'), ['controller' => 'Facilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facility'), ['controller' => 'Facilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="administrators view large-9 medium-8 columns content">
    <h3><?= h($administrator->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Crawler Path') ?></th>
            <td><?= h($administrator->crawler_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserver Path') ?></th>
            <td><?= h($administrator->reserver_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($administrator->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postcode') ?></th>
            <td><?= h($administrator->postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($administrator->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($administrator->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($administrator->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menber Type') ?></th>
            <td><?= $administrator->has('menber_type') ? $this->Html->link($administrator->menber_type->title, ['controller' => 'MenberTypes', 'action' => 'view', $administrator->menber_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($administrator->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($administrator->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($administrator->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($administrator->deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($administrator->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Facilities') ?></h4>
        <?php if (!empty($administrator->facilities)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Postcode') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Crawler Path') ?></th>
                <th scope="col"><?= __('Reserver Path') ?></th>
                <th scope="col"><?= __('Latitude') ?></th>
                <th scope="col"><?= __('Longitude') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Administrator Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($administrator->facilities as $facilities): ?>
            <tr>
                <td><?= h($facilities->id) ?></td>
                <td><?= h($facilities->created) ?></td>
                <td><?= h($facilities->modified) ?></td>
                <td><?= h($facilities->deleted) ?></td>
                <td><?= h($facilities->name) ?></td>
                <td><?= h($facilities->postcode) ?></td>
                <td><?= h($facilities->address) ?></td>
                <td><?= h($facilities->crawler_path) ?></td>
                <td><?= h($facilities->reserver_path) ?></td>
                <td><?= h($facilities->latitude) ?></td>
                <td><?= h($facilities->longitude) ?></td>
                <td><?= h($facilities->description) ?></td>
                <td><?= h($facilities->administrator_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Facilities', 'action' => 'view', $facilities->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Facilities', 'action' => 'edit', $facilities->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Facilities', 'action' => 'delete', $facilities->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facilities->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Passwords') ?></h4>
        <?php if (!empty($administrator->passwords)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Administrator Id') ?></th>
                <th scope="col"><?= __('Username') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($administrator->passwords as $passwords): ?>
            <tr>
                <td><?= h($passwords->id) ?></td>
                <td><?= h($passwords->created) ?></td>
                <td><?= h($passwords->modified) ?></td>
                <td><?= h($passwords->deleted) ?></td>
                <td><?= h($passwords->user_id) ?></td>
                <td><?= h($passwords->administrator_id) ?></td>
                <td><?= h($passwords->username) ?></td>
                <td><?= h($passwords->password) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Passwords', 'action' => 'view', $passwords->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Passwords', 'action' => 'edit', $passwords->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Passwords', 'action' => 'delete', $passwords->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passwords->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
