<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>

</div>
<div class="users form large-10 medium-9 columns">
    <?php $this->Form->create($user); ?>
    <fieldset>
        <legend><?= __('login User') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
