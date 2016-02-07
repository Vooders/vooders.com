<?php
/**
 * Application: Markets Meet
 *
 * Version: 0.1.1
 *
 * Framework: CakePHP
 * Version: 3.0.*
 *
 * Template / Users / Index
 *
**/
$session = $this->request->session();

?>
<section style="padding: 20px 80px; max-width: 1800px;">
  <div class="search-form" style="max-width: 600px;">
    <h3><?= __('Member Directory') ?></h3>
    <p><?= __('Search for a member by name or by company') ?></p>
    <?= $this->Form->create(null, [
      'url' => [
        'controller' => 'Users',
        'action' => 'index'
      ]
    ]) ?>
    <?= $this->Form->input('name_first', [
      'placeholder' => 'First Name',
      'label' => ''
    ]) ?>
     <?= $this->Form->input('name_last', [
      'placeholder' => 'Last Name',
      'label' => ''
    ]) ?>
    <?= $this->Form->submit('Search') ?>
    <?= $this->Form->end() ?>
    <hr/>
  </div>
  <div class="users index ">
    <table cellpadding="0" cellspacing="0">
      <thead>
        <tr>
					<th><?= $this->Paginator->sort('username') ?></th>
          <th><?= $this->Paginator->sort('name') ?></th>
          <th><?= $this->Paginator->sort('date_joined', ['label' => 'Member Since']) ?></th>
          <th><?= $this->Paginator->sort('last_access') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
					<td><?= $user->username ?></td>
          <td><?= $user->name_first.' '.$user->name_last ?></td>
          <td><?= $user->created ?></td>
          <td><?= $user->last_access ?></td>
          <td class="actions">
            <?= $this->Html->link(__('View Profile'), ['action' => 'profile', $user->id]) ?>
            <br/>
            
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
      </ul>
      <p><?= $this->Paginator->counter() ?></p>
    </div>
  </div>
</section>
