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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $donnee->donneeId],
                ['confirm' => __('Are you sure you want to delete # {0}?', $donnee->donneeId), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Donnee'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="donnee form content">
            <?= $this->Form->create($donnee) ?>
            <fieldset>
                <legend><?= __('Edit Donnee') ?></legend>
                <?php
                    echo $this->Form->control('time');
                    echo $this->Form->control('temperature');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
