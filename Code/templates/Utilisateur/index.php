<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Users> $users
 */
?>
<div class="users index content">
    <?= $this->Html->link(__('New Users'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('IdUsers') ?></th>
                    <th><?= $this->Paginator->sort('nomUtilisateur') ?></th>
                    <th><?= $this->Paginator->sort('prenomUtilisateur') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('sel') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $users): ?>
                <tr>
                    <td><?= $this->Number->format($users->IdUsers) ?></td>
                    <td><?= h($users->nomUtilisateur) ?></td>
                    <td><?= h($users->prenomUtilisateur) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->sel) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $users->Idusers]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $users->IdUsers]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $users->IdUsers], ['confirm' => __('Are you sure you want to delete # {0}?', $utilisateur->noUtilisateur)]) ?>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>