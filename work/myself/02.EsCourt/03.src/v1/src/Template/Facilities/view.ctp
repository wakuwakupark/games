<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Facility'), ['action' => 'edit', $facility->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Facility'), ['action' => 'delete', $facility->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facility->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Facilities'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facility'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Administrators'), ['controller' => 'Administrators', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Administrator'), ['controller' => 'Administrators', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Facility Images'), ['controller' => 'FacilityImages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Facility Image'), ['controller' => 'FacilityImages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Frames'), ['controller' => 'Frames', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Frame'), ['controller' => 'Frames', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Waits'), ['controller' => 'Waits', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Wait'), ['controller' => 'Waits', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="facilities view large-9 medium-8 columns content">
    <h3><?= h($facility->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($facility->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Postcode') ?></th>
            <td><?= h($facility->postcode) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Crawler Path') ?></th>
            <td><?= h($facility->crawler_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Reserver Path') ?></th>
            <td><?= h($facility->reserver_path) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Administrator') ?></th>
            <td><?= $facility->has('administrator') ? $this->Html->link($facility->administrator->name, ['controller' => 'Administrators', 'action' => 'view', $facility->administrator->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($facility->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Latitude') ?></th>
            <td><?= $this->Number->format($facility->latitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Longitude') ?></th>
            <td><?= $this->Number->format($facility->longitude) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($facility->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($facility->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Deleted') ?></th>
            <td><?= h($facility->deleted) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Address') ?></h4>
        <?= $this->Text->autoParagraph(h($facility->address)); ?>
    </div>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($facility->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Facility Images') ?></h4>
        <?php if (!empty($facility->facility_images)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Facility Id') ?></th>
                <th scope="col"><?= __('Image Url') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($facility->facility_images as $facilityImages): ?>
            <tr>
                <td><?= h($facilityImages->id) ?></td>
                <td><?= h($facilityImages->created) ?></td>
                <td><?= h($facilityImages->modified) ?></td>
                <td><?= h($facilityImages->deleted) ?></td>
                <td><?= h($facilityImages->facility_id) ?></td>
                <td><?= h($facilityImages->image_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'FacilityImages', 'action' => 'view', $facilityImages->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'FacilityImages', 'action' => 'edit', $facilityImages->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'FacilityImages', 'action' => 'delete', $facilityImages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $facilityImages->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Frames') ?></h4>
        <?php if (!empty($facility->frames)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Deleted') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Reserved') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Court Type Id') ?></th>
                <th scope="col"><?= __('Facility Id') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($facility->frames as $frames): ?>
            <tr>
                <td><?= h($frames->id) ?></td>
                <td><?= h($frames->created) ?></td>
                <td><?= h($frames->modified) ?></td>
                <td><?= h($frames->deleted) ?></td>
                <td><?= h($frames->date) ?></td>
                <td><?= h($frames->reserved) ?></td>
                <td><?= h($frames->name) ?></td>
                <td><?= h($frames->court_type_id) ?></td>
                <td><?= h($frames->facility_id) ?></td>
                <td><?= h($frames->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Frames', 'action' => 'view', $frames->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Frames', 'action' => 'edit', $frames->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Frames', 'action' => 'delete', $frames->id], ['confirm' => __('Are you sure you want to delete # {0}?', $frames->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Waits') ?></h4>
        <?php if (!empty($facility->waits)): ?>
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
            <?php foreach ($facility->waits as $waits): ?>
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
