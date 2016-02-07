<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Membership Plans'), ['controller' => 'MembershipPlans', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Membership Plan'), ['controller' => 'MembershipPlans', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Visibilities'), ['controller' => 'Visibilities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Visibility'), ['controller' => 'Visibilities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User Contacts'), ['controller' => 'UserContacts', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Contact'), ['controller' => 'UserContacts', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Company') ?></th>
            <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Membership Plan') ?></th>
            <td><?= $user->has('membership_plan') ? $this->Html->link($user->membership_plan->name, ['controller' => 'MembershipPlans', 'action' => 'view', $user->membership_plan->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Theme') ?></th>
            <td><?= $user->has('theme') ? $this->Html->link($user->theme->name, ['controller' => 'Themes', 'action' => 'view', $user->theme->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Language') ?></th>
            <td><?= $user->has('language') ? $this->Html->link($user->language->name, ['controller' => 'Languages', 'action' => 'view', $user->language->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Visibility') ?></th>
            <td><?= $user->has('visibility') ? $this->Html->link($user->visibility->name, ['controller' => 'Visibilities', 'action' => 'view', $user->visibility->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($user->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Name First') ?></th>
            <td><?= h($user->name_first) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Middle') ?></th>
            <td><?= h($user->name_middle) ?></td>
        </tr>
        <tr>
            <th><?= __('Name Last') ?></th>
            <td><?= h($user->name_last) ?></td>
        </tr>
        <tr>
            <th><?= __('Job Title') ?></th>
            <td><?= h($user->job_title) ?></td>
        </tr>
        <tr>
            <th><?= __('Department') ?></th>
            <td><?= h($user->department) ?></td>
        </tr>
        <tr>
            <th><?= __('Membership Number') ?></th>
            <td><?= h($user->membership_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Account Status') ?></th>
            <td><?= h($user->account_status) ?></td>
        </tr>
        <tr>
            <th><?= __('Username') ?></th>
            <td><?= h($user->username) ?></td>
        </tr>
        <tr>
            <th><?= __('Password') ?></th>
            <td><?= h($user->password) ?></td>
        </tr>
        <tr>
            <th><?= __('Pin') ?></th>
            <td><?= h($user->pin) ?></td>
        </tr>
        <tr>
            <th><?= __('Sec Question') ?></th>
            <td><?= h($user->sec_question) ?></td>
        </tr>
        <tr>
            <th><?= __('Sec Question Answer') ?></th>
            <td><?= h($user->sec_question_answer) ?></td>
        </tr>
        <tr>
            <th><?= __('Reset Hash') ?></th>
            <td><?= h($user->reset_hash) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Preferred Contact') ?></th>
            <td><?= $this->Number->format($user->preferred_contact) ?></td>
        </tr>
        <tr>
            <th><?= __('Created By') ?></th>
            <td><?= $this->Number->format($user->created_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified By') ?></th>
            <td><?= $this->Number->format($user->modified_by) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Joined') ?></th>
            <td><?= h($user->date_joined) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Access') ?></th>
            <td><?= h($user->last_access) ?></td>
        </tr>
        <tr>
            <th><?= __('Reset Time') ?></th>
            <td><?= h($user->reset_time) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th><?= __('Membership Level') ?></th>
            <td><?= $user->membership_level ? __('Yes') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Corporate User') ?></th>
            <td><?= $user->corporate_user ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Spoken Languages') ?></h4>
        <?= $this->Text->autoParagraph(h($user->spoken_languages)); ?>
    </div>
    <div class="row">
        <h4><?= __('Biography') ?></h4>
        <?= $this->Text->autoParagraph(h($user->biography)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related User Contacts') ?></h4>
        <?php if (!empty($user->user_contacts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Contact') ?></th>
                <th><?= __('Veriried') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->user_contacts as $userContacts): ?>
            <tr>
                <td><?= h($userContacts->id) ?></td>
                <td><?= h($userContacts->user_id) ?></td>
                <td><?= h($userContacts->type) ?></td>
                <td><?= h($userContacts->name) ?></td>
                <td><?= h($userContacts->contact) ?></td>
                <td><?= h($userContacts->veriried) ?></td>
                <td><?= h($userContacts->created) ?></td>
                <td><?= h($userContacts->modified) ?></td>
                <td><?= h($userContacts->created_by) ?></td>
                <td><?= h($userContacts->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'UserContacts', 'action' => 'view', $userContacts->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'UserContacts', 'action' => 'edit', $userContacts->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'UserContacts', 'action' => 'delete', $userContacts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userContacts->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Addresses') ?></h4>
        <?php if (!empty($user->addresses)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Country Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Address 1') ?></th>
                <th><?= __('Address 2') ?></th>
                <th><?= __('Address 3') ?></th>
                <th><?= __('Town') ?></th>
                <th><?= __('State') ?></th>
                <th><?= __('Postcode') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Created By') ?></th>
                <th><?= __('Modified By') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->addresses as $addresses): ?>
            <tr>
                <td><?= h($addresses->id) ?></td>
                <td><?= h($addresses->country_id) ?></td>
                <td><?= h($addresses->name) ?></td>
                <td><?= h($addresses->address_1) ?></td>
                <td><?= h($addresses->address_2) ?></td>
                <td><?= h($addresses->address_3) ?></td>
                <td><?= h($addresses->town) ?></td>
                <td><?= h($addresses->state) ?></td>
                <td><?= h($addresses->postcode) ?></td>
                <td><?= h($addresses->created) ?></td>
                <td><?= h($addresses->modified) ?></td>
                <td><?= h($addresses->created_by) ?></td>
                <td><?= h($addresses->modified_by) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $addresses->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $addresses->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $addresses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addresses->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
