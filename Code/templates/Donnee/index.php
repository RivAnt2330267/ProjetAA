<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Donnee> $donnee
 */
?>
<div class="donnee index content">
    <?= $this->Html->link(__('New Donnee'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Donnee') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('donneeId') ?></th>
                    <th><?= $this->Paginator->sort('time') ?></th>
                    <th><?= $this->Paginator->sort('temperature') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donnee as $donnee): ?>
                <tr>
                    <td><?= $this->Number->format($donnee->donneeId) ?></td>
                    <td><?= $this->Number->format($donnee->time) ?></td>
                    <td><?= $this->Number->format($donnee->temperature) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $donnee->donneeId]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $donnee->donneeId]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $donnee->donneeId], ['confirm' => __('Are you sure you want to delete # {0}?', $orientationmoteur->noPosition)]) ?>
                    </td>
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