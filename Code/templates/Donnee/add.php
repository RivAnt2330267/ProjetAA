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
            <?= $this->Html->link(__('List Donnee'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="donnee form content">
            <?= $this->Form->create($donnee) ?>
            <fieldset>
                <legend><?= __('Add Donnee') ?></legend>
                <?php
                    echo $this->Form->control('temperature');
                    echo $this->Form->control('time');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
