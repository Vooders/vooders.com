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
<div style="row">
  <div class="small-12 large-4 columns">
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
</div>

<div class="row">
  <div class="small-12 columns">
  <h3>All users on system</h3>
    <table>
      <thead>
        <tr>
					<th><?= $this->Paginator->sort('username') ?></th>
          <th><?= $this->Paginator->sort('date_joined', ['label' => 'Member Since']) ?></th>
          <th><?= $this->Paginator->sort('last_access') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
					<td><?= $user->username ?></td>
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
  </div>
</div>

<div class="row">
  <ul class="pagination">
    <?= $this->Paginator->prev('< ' . __('previous')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__('next') . ' >') ?>
  </ul>
  <p><?= $this->Paginator->counter() ?></p>
</div>


