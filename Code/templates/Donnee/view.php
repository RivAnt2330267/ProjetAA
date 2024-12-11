<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Donnee $donnee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Donnee'), ['action' => 'edit', $donnee->donneeId], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Donnee'), ['action' => 'delete', $donnee->donneeId], ['confirm' => __('Are you sure you want to delete # {0}?', $donnee->donneeId), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Donnee'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Donnee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="donnee view content">
            <h3><?= h($donnee->donneeId) ?></h3>
            <table>
                <tr>
                    <th><?= __('donneeId') ?></th>
                    <td><?= $this->Number->format($donnee->donneeId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Donnee') ?></th>
                    <td><?= $this->Number->format($donnee->donneeId) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>