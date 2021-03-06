<header id="header">
	<div class="row-fluid">
		<div class="span8">
    		<h1><?php echo $this->Html->link($this->Html->image($mushraiderTheme->logo, array('alt' => $mushraiderTagline.' - MushRaider')), '/', array('escape' => false));?></h1>
    	</div>
    	<div class="span4">
    		<ul class="pull-right inline">
    			<?php if($user):?>
    				<li>
    					<div class="dropdown">
    						<i class="fa fa-user"></i> <?php echo $this->Html->link($user['User']['username'].' <b class="caret"></b>', '/account', array('class' => 'dropdown-toggle', 'id' => 'userMenu', 'data-toggle' => 'dropdown', ' data-target' => '#', 'escape' => false));?>
	    					<ul class="dropdown-menu" role="menu" aria-labelledby="userMenu">
	    						<li><?php echo $this->Html->link('<i class="fa fa-unlock-alt"></i> '.__('Profile'), '/account', array('escape' => false));?></li>
                                <li><?php echo $this->Html->link('<i class="fa fa-shield"></i> '.__('Characters'), '/account/characters', array('escape' => false));?></li>
	    						<li><?php echo $this->Html->link('<i class="fa fa-bullhorn"></i> '.__('Notifications'), '/account/notifications', array('escape' => false));?></li>
	    						<li class="divider"></li>
	    						<li><?php echo $this->Html->link('<i class="fa fa-sign-out"></i> '.__('Logout'), '/auth/logout', array('escape' => false));?></li>
	    					</ul>
	    				</div>
    				</li>

    				<?php if($user['User']['can']['full_permissions'] || $user['User']['can']['limited_admin']):?>
    					<li id="tourAdmin"><i class="fa fa-wrench"></i> <?php echo $this->Html->link(__('Admin'), '/admin');?></li>
    				<?php endif;?>
    			<?php else:?>
    				<li><i class="fa fa-sign-in"></i> <?php echo $this->Html->link(__('LOGIN / REGISTER'), '/auth/login');?></li>
    			<?php endif;?>

                <?php if(!empty($appLocales)):?>
                    <li>
                        <div class="dropdown">
                            <?php echo $this->Html->link('<i class="fa fa-flag"></i> '.$appLocales[Configure::read('Config.language')].' <b class="caret"></b>', '/', array('class' => 'dropdown-toggle', 'id' => 'langMenu', 'data-toggle' => 'dropdown', ' data-target' => '#', 'escape' => false));?>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="langMenu">
                                <?php foreach($appLocales as $lang => $langTitle):?>
                                    <?php $checked = Configure::read('Config.language') == $lang?'<i class="fa fa-check"></i>':'';?>
                                    <li><?php echo $this->Html->link(ucwords(strtolower($langTitle)).' '.$checked, '/l/'.$lang, array('escape' => false));?></li>
                                <?php endforeach;?>
                            </ul>
                        </div>
                    </li>
                <?php endif;?>
    		</ul>
    	</div>
	</div>
    <div class="row-fluid">
        <div class="span12">
            <div class="navbar">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="fa fa-bars"></span> <?php echo __('Menu');?>
                </a>

                <div class="nav-collapse collapse">
                    <ul class="nav pull-right">
                        <li class="<?php echo strtolower($this->name) == 'events'?'active':'';?>">
                            <?php echo $this->Html->link(__('Events'), '/events', array('escape' => false));?>
                        </li>
                        <li class="<?php echo strtolower($this->name) == 'account'?'active':'';?>" id="tourAccount">
                            <?php echo $this->Html->link(__('My Account'), '/account', array('escape' => false));?>
                        </li>
                        <?php if(!empty($mushraiderLinks)):;?>
                            <?php foreach($mushraiderLinks as $customLink):?>
                                <li class="<?php echo !empty($currentCustomPageUrl) && strpos($customLink->url, $currentCustomPageUrl) !== false?'active':'';?>">
                                    <?php echo $this->Html->link($customLink->title, $customLink->url, array('escape' => false));?>
                                </li>
                            <?php endforeach;?>
                        <?php endif;?>                    
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>