<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menber Types'), ['controller' => 'MenberTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menber Type'), ['controller' => 'MenberTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Job'), ['controller' => 'Jobs', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passwords'), ['controller' => 'Passwords', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Password'), ['controller' => 'Passwords', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Reserves'), ['controller' => 'Reserves', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Reserve'), ['controller' => 'Reserves', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Waits'), ['controller' => 'Waits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wait'), ['controller' => 'Waits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postcode') ?></th>
            <td><?= h($user->postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tel') ?></th>
            <td><?= h($user->tel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Family Name') ?></th>
            <td><?= h($user->family_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Menber Type') ?></th>
            <td><?= $user->has('menber_type') ? $this->Html->link($user->menber_type->title, ['controller' => 'MenberTypes', 'action' => 'view', $user->menber_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Job') ?></th>
            <td><?= $user->has('job') ? $this->Html->link($user->job->name, ['controller' => 'Jobs', 'action' => 'view', $user->job->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= $this->Number->format($user->gender) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($user->deleted) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Birthday') ?></th>
            <td><?= h($user->birthday) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($user->address)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Passwords') ?></h4>
        <?php if (!empty($user->passwords)): ?>
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
            <?php foreach ($user->passwords as $passwords): ?>
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
    <div class="related">
        <h4><?= __('Related Reserves') ?></h4>
        <?php if (!empty($user->reserves)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Frame Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->reserves as $reserves): ?>
            <tr>
                <td><?= h($reserves->id) ?></td>
                <td><?= h($reserves->created) ?></td>
                <td><?= h($reserves->modified) ?></td>
                <td><?= h($reserves->deleted) ?></td>
                <td><?= h($reserves->user_id) ?></td>
                <td><?= h($reserves->frame_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Reserves', 'action' => 'view', $reserves->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Reserves', 'action' => 'edit', $reserves->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Reserves', 'action' => 'delete', $reserves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reserves->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Waits') ?></h4>
        <?php if (!empty($user->waits)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Notify Id') ?></th>
                <th scope="col"><?= __('Facility Id') ?></th>
                <th scope="col"><?= __('Central Latitude') ?></th>
                <th scope="col"><?= __('Central Longitude') ?></th>
                <th scope="col"><?= __('Distance') ?></th>
                <th scope="col"><?= __('Start') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Succession') ?></th>
                <th scope="col"><?= __('Must') ?></th>
                <th scope="col"><?= __('Max Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->waits as $waits): ?>
            <tr>
                <td><?= h($waits->id) ?></td>
                <td><?= h($waits->created) ?></td>
                <td><?= h($waits->modified) ?></td>
                <td><?= h($waits->deleted) ?></td>
                <td><?= h($waits->user_id) ?></td>
                <td><?= h($waits->notify_id) ?></td>
                <td><?= h($waits->facility_id) ?></td>
                <td><?= h($waits->central_latitude) ?></td>
                <td><?= h($waits->central_longitude) ?></td>
                <td><?= h($waits->distance) ?></td>
                <td><?= h($waits->start) ?></td>
                <td><?= h($waits->end) ?></td>
                <td><?= h($waits->size) ?></td>
                <td><?= h($waits->succession) ?></td>
                <td><?= h($waits->must) ?></td>
                <td><?= h($waits->max_price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Waits', 'action' => 'view', $waits->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Waits', 'action' => 'edit', $waits->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Waits', 'action' => 'delete', $waits->id], ['confirm' => __('Are you sure you want to delete # {0}?', $waits->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
