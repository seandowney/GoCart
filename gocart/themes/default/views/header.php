	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">

				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
			
				<a class="brand" href="<?php echo site_url();?>"><?php echo $this->config->item('company_name');?></a>
				
				<div class="nav-collapse">
					<ul class="nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Catalog <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<?php foreach($categories as $cat_menu):?>
								<li><a href="<?php echo site_url($cat_menu['category']->slug);?>"><?php echo $cat_menu['category']->name;?></a></li>
								<?php endforeach;?>
							</ul>
							
							<?php foreach($pages as $menu_page):?>

								<li>
								<?php if(empty($menu_page->content)):?>
									<a href="<?php echo $menu_page->url;?>" <?php if($menu_page->new_window ==1){echo 'target="_blank"';} ?>><?php echo $menu_page->menu_title;?></a>
								<?php else:?>
									<a href="<?php echo site_url($menu_page->slug);?>"><?php echo $menu_page->menu_title;?></a>
								<?php endif;?>
								</li>
								
							<?php endforeach;?>
					</ul>
					
					<ul class="nav pull-right">
						
						<?php if($this->Customer_model->is_logged_in(false, false)):?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo  site_url('secure/my_account');?>"><?php echo lang('my_account')?></a></li>
									<li><a href="<?php echo  site_url('secure/my_downloads');?>"><?php echo lang('my_downloads')?></a></li>
									<li class="divider"></li>
									<li><a href="<?php echo site_url('secure/logout');?>"><?php echo lang('logout');?></a></li>
								</ul>
							</li>
						<?php else: ?>
							<li><a href="<?php echo site_url('secure/login');?>"><?php echo lang('login');?></a></li>
						<?php endif; ?>
							<li>
								<a href="<?php echo site_url('cart/view_cart');?>">
								<?php
								if ($this->go_cart->total_items()==0)
								{
									echo lang('empty_cart');
								}
								else
								{
									if($this->go_cart->total_items() > 1)
									{
										echo sprintf (lang('multiple_items'), $this->go_cart->total_items());
									}
									else
									{
										echo sprintf (lang('single_item'), $this->go_cart->total_items());
									}
								}
								?>
								</a>
							</li>
					</ul>
					
					<?php echo form_open('cart/search', 'class="navbar-search pull-right"');?>
						<input type="text" name="term" class="search-query span2" placeholder="Search"/>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<?php if(!empty($base_url) && is_array($base_url)):?>
			<div class="row">
				<div class="span12">
					<ul class="breadcrumb">
						<?php
						$url_path	= '';
						$count	 	= 1;
						foreach($base_url as $bc):
							$url_path .= '/'.$bc;
							if($count == count($base_url)):?>
								<li class="active"><?php echo $bc;?></li>
							<?php else:?>
								<li><a href="<?php echo site_url($url_path);?>"><?php echo $bc;?></a></li> <span class="divider">/</span>
							<?php endif;
							$count++;
						endforeach;?>
 					</ul>
				</div>
			</div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('message')):?>
			<div class="alert alert-info">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php endif;?>
		
		<?php if ($this->session->flashdata('error')):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $this->session->flashdata('error');?>
			</div>
		<?php endif;?>
		
		<?php if (!empty($error)):?>
			<div class="alert alert-error">
				<a class="close" data-dismiss="alert">×</a>
				<?php echo $error;?>
			</div>
		<?php endif;?>
		
		

<?php
/*
End header.php file
*/