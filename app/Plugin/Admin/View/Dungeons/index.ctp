<div class="box dark">
    <header>
        <div class="icons"><i class="icon-list icon-white"></i></div>
        <h5><?php echo __('Dungeons list');?></h5>
        <div class="toolbar">
            <ul class="nav">
                <li><?php echo $this->Html->link('<i class="icon-plus"></i> '.__('Add dungeon'), '/admin/dungeons/add', array('escape' => false));?></li>
            </ul>
        </div>
    </header>
    <div class="accordion-body body in collapse">
        <?php if(!empty($dungeons)):?>
            <?php $currentGame = null;?>
            <?php $tableOpen = false;?>
            <?php foreach($dungeons as $dungeon):?>
                <?php $gameId = $dungeon['Dungeon']['game_id'];?>
                <?php if($gameId != $currentGame || !$currentGame):?>
                    <?php if($tableOpen):?>
                            </tbody>
                        </table>
                    <?php endif;?>
                    <?php if(!$currentGame && !$gameId):?>
                        <h4><?php echo __('Dungeons without game');?></h4>
                    <?php else:?>
                        <h4><?php echo $dungeon['Game']['title'];?></h4>
                    <?php endif;?>
                    <table class="table table-bordered table-striped responsive">
                        <thead>
                            <tr>
                                <th><?php echo __('Title');?></th>                    
                                <th><?php echo __('Players Size');?></th>
                                <th class="actions"><?php echo __('Actions');?></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php $currentGame = $gameId;?>
                    <?php $tableOpen = true;?>
                <?php endif;?>
                            <tr>
                                <td><?php echo $dungeon['Dungeon']['title'];?></td>
                                <td><?php echo $dungeon['RaidsSize']['size'];?></td>
                                <td class="actions">
                                    <?php echo $this->Html->link('<i class="icon-edit"></i>', '/admin/dungeons/edit/'.$dungeon['Dungeon']['id'], array('class' => 'btn btn-info btn-mini tt', 'title' => __('Edit'), 'escape' => false))?>
                                    <?php if(!$gameId):?>
                                        <?php echo $this->Html->link('<i class="icon-trash"></i>', '/admin/dungeons/delete/'.$dungeon['Dungeon']['id'], array('class' => 'btn btn-danger btn-mini tt delete', 'title' => __('Delete'), 'data-confirm' => __('Are you sure you want to completely delete the dungeon %s ?', $dungeon['Dungeon']['title']), 'escape' => false))?>
                                    <?php else:?>
                                        <?php echo $this->Html->link('<i class="icon-collapse-alt"></i>', '/admin/dungeons/disable/'.$dungeon['Dungeon']['id'], array('class' => 'btn btn-warning btn-mini tt delete', 'title' => __('Disable'), 'data-confirm' => __('Are you sure you want to disable the dungeon %s ?', $dungeon['Dungeon']['title']), 'escape' => false))?>
                                    <?php endif;?>
                                </td>
                            </tr>                
            <?php endforeach;?>
                    <?php if($tableOpen):?>
                            </tbody>
                        </table>
                    <?php endif;?>
            <?php echo $this->Tools->pagination('Dungeon');?>
        <?php else:?>
            <h3 class="muted"><?php echo __('You don\'t have any dungeon yet');?></h3>
        <?php endif;?>
    </div>
</div>