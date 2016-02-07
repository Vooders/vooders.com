<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Membership Plans'), ['controller' => 'MembershipPlans', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Membership Plan'), ['controller' => 'MembershipPlans', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Themes'), ['controller' => 'Themes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Theme'), ['controller' => 'Themes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Languages'), ['controller' => 'Languages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Language'), ['controller' => 'Languages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Visibilities'), ['controller' => 'Visibilities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Visibility'), ['controller' => 'Visibilities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List User Contacts'), ['controller' => 'UserContacts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User Contact'), ['controller' => 'UserContacts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addresses'), ['controller' => 'Addresses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Address'), ['controller' => 'Addresses', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->input('company_id', ['options' => $companies]);
            echo $this->Form->input('membership_plan_id', ['options' => $membershipPlans]);
            echo $this->Form->input('theme_id', ['options' => $themes]);
            echo $this->Form->input('language_id', ['options' => $languages]);
            echo $this->Form->input('visibility_id', ['options' => $visibilities]);
            echo $this->Form->input('preferred_contact');
            echo $this->Form->input('title');
            echo $this->Form->input('name_first');
            echo $this->Form->input('name_middle');
            echo $this->Form->input('name_last');
            echo $this->Form->input('job_title');
            echo $this->Form->input('department');
            echo $this->Form->input('membership_level');
            echo $this->Form->input('membership_number');
            echo $this->Form->input('date_joined', ['empty' => true]);
            echo $this->Form->input('account_status');
            echo $this->Form->input('username');
            echo $this->Form->input('password');
            echo $this->Form->input('pin');
            echo $this->Form->input('last_access');
            echo $this->Form->input('sec_question');
            echo $this->Form->input('sec_question_answer');
            echo $this->Form->input('corporate_user');
            echo $this->Form->input('spoken_languages');
            echo $this->Form->input('biography');
            echo $this->Form->input('reset_hash');
            echo $this->Form->input('reset_time');
            echo $this->Form->input('created_by');
            echo $this->Form->input('modified_by');
            echo $this->Form->input('addresses._ids', ['options' => $addresses]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
