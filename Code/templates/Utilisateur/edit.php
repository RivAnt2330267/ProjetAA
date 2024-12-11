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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $users->IdUsers],
                ['confirm' => __('Are you sure you want to delete # {0}?', $users->IdUsers), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($users) ?>
            <fieldset>
                <legend><?= __('Edit Users') ?></legend>
                <?php
                    echo $this->Form->control('nomUtilisateur');
                    echo $this->Form->control('prenomUtilisateur');
                    echo $this->Form->control('email');
                    echo $this->Form->control('sel');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
