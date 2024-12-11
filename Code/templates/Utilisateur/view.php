<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Users $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
<<<<<<< HEAD
            <?= $this->Html->link(__('Edit Users'), ['action' => 'edit', $users->IdUsers], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Users'), ['action' => 'delete', $users->IdUsers], ['confirm' => __('Are you sure you want to delete # {0}?', $users->IdUsers), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Users'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($users->nomUtilisateur) ?></h3>
            <table>
                <tr>
                    <th><?= __('NomUtilisateur') ?></th>
                    <td><?= h($users->nomUtilisateur) ?></td>
                </tr>
                <tr>
                    <th><?= __('PrenomUtilisateur') ?></th>
                    <td><?= h($users->prenomUtilisateur) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($users->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Sel') ?></th>
                    <td><?= h($users->sel) ?></td>
                </tr>
                <tr>
                    <th><?= __('IdUsers') ?></th>
                    <td><?= $this->Number->format($users->IdUsers) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>