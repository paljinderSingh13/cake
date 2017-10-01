    	<div class="nav">
            	<li class="dashboard"><a href="<?= $this->Url->build('/admin/dashboards/index', true);?>"><span></span> Dashboard</a></li>
                <li class="products"><a href="<?= $this->Url->build('/admin/products/index', true);?>" ><span></span> Products <i></i></a>

                    <ul>
                    <li class="sub-products">
                        <a href="<?= $this->Url->build('/admin/products/index', true);?>" ><span></span> Products</a>
                        </li>
                         <li class="sub-products">
                        <a href="<?= $this->Url->build('/admin/promotions', true);?>" ><span></span> Promotions</a>
                        </li>
                        <li class="sub-promotions">
                        <a href="<?= $this->Url->build('/admin/gifts', true);?>" ><span></span> gifts</a>
                        </li>
                    </ul>
                </li>

                <li class="orders"><a href="<?= $this->Url->build('/admin/orders/index', true);?>"><span></span> Orders</a></li>
                <li class="sales"><a href="<?= $this->Url->build('/admin/sales/index', true);?>"><span></span> Sales</a></li>
                <li class="users"><a href="<?= $this->Url->build('/admin/users/index', true);?>"><span></span> Users</a> </li>
                <li class="sub-admin"><a href="<?= $this->Url->build('/admin/users/subAdmin', true);?>"><span></span> Sub-Admin</a></li>
                <li class="promo-code">
                <a href="<?= $this->Url->build('/admin/promocodes/index', true);?>"><span></span> Promo Codes</a>

                </li>
                <li class="pages"><a href="<?= $this->Url->build('/admin/pages/index', true);?>"><span></span> Pages</a></li>
                <li class="notification"><a href="<?= $this->Url->build('/admin/notifications/index', true);?>"><span></span> Notifications</a></li>
            </ul>
        </div>
        
        <!--
        class="active"
        -->