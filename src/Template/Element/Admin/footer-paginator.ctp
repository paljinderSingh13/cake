 <div class="table-footer clearfix paginator">
            	<p class="pull-left"> <?= $this->Paginator->counter('Showing {{current}} out of {{count}} users'); ?> </p>
                <div class="paginator">
        <ul class="pagination">
            <?php  echo $this->Paginator->prev('< ' . __('previous')); ?>
            <?php
			echo $this->Paginator->numbers();
			?>
            <?php  echo $this->Paginator->next(__('next') . ' >'); ?>
        </ul>
    </div>
  </div>