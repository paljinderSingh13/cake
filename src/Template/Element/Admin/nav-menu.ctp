<?php //print_r($this->request->params);?>
<a href="#" class="mobile-menu"></a>
    	<div class="nav">
            	<li class="dashboard">				
				<?php if(($this->request->params['controller']=='Dashboards' && $this->request->params['action']=='index')){?>
					<a href="<?= $this->Url->build('/admin/dashboards/index', true);?>" class="active"><span></span> Dashboard</a>
				<?php }else{?>
					<a href="<?= $this->Url->build('/admin/dashboards/index', true);?>"><span></span> Dashboard</a>
				<?php }?>
				</li>
				
				
                <li class="products">
				<?php if(
				($this->request->params['controller']=='Products' && $this->request->params['action']=='index')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='view')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='add')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='edit')||
				
				($this->request->params['controller']=='Promotions' && $this->request->params['action']=='index')||
				($this->request->params['controller']=='Promotions' && $this->request->params['action']=='view')||
				($this->request->params['controller']=='Promotions' && $this->request->params['action']=='add')||
				($this->request->params['controller']=='Promotions' && $this->request->params['action']=='edit')||
				
				($this->request->params['controller']=='Gifts' && $this->request->params['action']=='index')||
				($this->request->params['controller']=='Gifts' && $this->request->params['action']=='view')||
				($this->request->params['controller']=='Gifts' && $this->request->params['action']=='add')||
				($this->request->params['controller']=='Gifts' && $this->request->params['action']=='edit')				
				
				){?>
				<a href="<?= $this->Url->build('/admin/products/index', true);?>" class="active"><span></span> Products <i></i></a>
				<?php }else{?>
				<a href="<?= $this->Url->build('/admin/products/index', true);?>" ><span></span> Products <i></i></a>
				<?php }?>
                    <ul>
                    <li class="sub-products">
				<?php if(
				($this->request->params['controller']=='Products' && $this->request->params['action']=='index')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='view')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='add')||
				($this->request->params['controller']=='Products' && $this->request->params['action']=='edit')
				){?>
                        <a href="<?= $this->Url->build('/admin/products/index', true);?>" class="active" ><span></span> Products</a>
						<?php }else{?>
				<a href="<?= $this->Url->build('/admin/products/index', true);?>" ><span></span> Products</a>
				<?php }?>
                        </li>
						
						
                         <li class="sub-promotions">
						 <?php if(
						($this->request->params['controller']=='Promotions' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Promotions' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Promotions' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Promotions' && $this->request->params['action']=='edit')
						){?>
						 
                        <a href="<?= $this->Url->build('/admin/promotions', true);?>" class="active"><span></span> Promotions</a>
						<?php }else{?>
						<a href="<?= $this->Url->build('/admin/promotions', true);?>" ><span></span> Promotions</a>
						<?php }?>
						
                        </li>
						
						
                        <li class="sub-gifts">
						
						 <?php if(
						($this->request->params['controller']=='Gifts' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Gifts' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Gifts' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Gifts' && $this->request->params['action']=='edit')
						){?>
                        <a href="<?= $this->Url->build('/admin/gifts', true);?>" class="active"><span></span> Gifts</a>
						
						<?php }else{?>
						<a href="<?= $this->Url->build('/admin/gifts', true);?>" ><span></span> Gifts</a>
						<?php }?>
                        </li>
                        
                        <li class="sub-delivery">
						
                        <a href="<?= $this->Url->build('/admin/orders/deliverysetting', true);?>"><span></span> Delivery Settings</a>
						
						
                        </li>
                    </ul>
                </li>

                <li class="orders">
				<?php if(
						($this->request->params['controller']=='Orders' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Orders' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Orders' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Orders' && $this->request->params['action']=='edit')
						){?>
				<a href="<?= $this->Url->build('/admin/orders/index', true);?>" class="active"><span></span> Orders</a>
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/orders/index', true);?>"><span></span> Orders</a>
						<?php }?>
				
				</li>
				
				
                <li class="sales">
				<?php if(
						($this->request->params['controller']=='Sales' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Sales' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Sales' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Sales' && $this->request->params['action']=='edit')
						){?>
				<a href="<?= $this->Url->build('/admin/sales/index', true);?>" class="active"><span></span> Sales</a>
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/sales/index', true);?>"><span></span> Sales</a>
						<?php }?>
				</li>
				
				
                <li class="users">
				<?php if(
						($this->request->params['controller']=='Users' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='edit')
						){?>
				<a href="<?= $this->Url->build('/admin/users/index', true);?>" class="active"><span></span> Users</a>
				
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/users/index', true);?>"><span></span> Users</a>
						<?php }?>
				 </li>
				
				
                <li class="sub-admin">
				<?php if(
						($this->request->params['controller']=='Users' && $this->request->params['action']=='subAdmin')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='viewsubadmin')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='subAdminAdd')||
						($this->request->params['controller']=='Users' && $this->request->params['action']=='editsubadmin')
						){?>
				<a href="<?= $this->Url->build('/admin/users/subAdmin', true);?>" class="active"><span></span> Sub-Admin</a>
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/users/subAdmin', true);?>"><span></span> Sub-Admin</a>
						<?php }?>
				</li>
				
				
                <li class="promo-code">
					<?php if(
						($this->request->params['controller']=='Promocodes' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Promocodes' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Promocodes' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Promocodes' && $this->request->params['action']=='edit')
						){?>
              			  <a href="<?= $this->Url->build('/admin/promocodes/index', true);?>" class="active"><span></span> Promo Codes</a>
						<?php }else{?>
						<a href="<?= $this->Url->build('/admin/promocodes/index', true);?>"><span></span> Promo Codes</a>
						<?php }?>
                </li>
				
				
                <li class="pages">
				<?php if(
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='edit')||
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='editbanner')||
						($this->request->params['controller']=='Pages' && $this->request->params['action']=='viewbanner')
						){?>
				<a href="<?= $this->Url->build('/admin/pages/index', true);?>" class="active"><span></span> Pages</a>
				
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/pages/index', true);?>"><span></span> Pages</a>
						<?php }?>
				</li>
                <li class="notification">
				<?php if(
						($this->request->params['controller']=='Notifications' && $this->request->params['action']=='index')||
						($this->request->params['controller']=='Notifications' && $this->request->params['action']=='view')||
						($this->request->params['controller']=='Notifications' && $this->request->params['action']=='add')||
						($this->request->params['controller']=='Notifications' && $this->request->params['action']=='edit')
						){?>
				<a href="<?= $this->Url->build('/admin/notifications/index', true);?>" class="active"><span></span> Notifications</a>
				<?php }else{?>
						<a href="<?= $this->Url->build('/admin/notifications/index', true);?>"><span></span> Notifications</a>
						<?php }?>
				</li>
				
				
            </ul>
        </div>
