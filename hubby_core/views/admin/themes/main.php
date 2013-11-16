<?php echo $lmenu;?>
<section id="content">
    <section class="vbox">
        <?php echo $inner_head;?>
        <section class="scrollable" id="pjax-container">
            <header>
                <div class="row b-b m-l-none m-r-none">
                    <div class="col-sm-4">
                        <h4 class="m-t m-b-none"><?php echo $this->core->hubby->getTitle();?></h4>
                        <p class="block text-muted">Liste des th&egrave;mes install&eacute;s</p>
                    </div>
                </div>
            </header>
            <section class="vbox">
                <section class="scrollable wrapper w-f"> <?php echo $this->core->notice->parse_notice();?> <?php echo $success;?>
                    <header class="header bg-white b-b clearfix">
                        <div class="row m-t-sm">
                            <div class="col-sm-6 m-b-xs"> 
                            	<a href="<?php echo $this->core->url->site_url(array('admin','menu'));?>" data-toggle="class:hide" class="btn btn-sm btn-info active"><i class="icon-caret-right text icon-large"></i><i class="icon-caret-left text-active icon-large"></i></a> 
                                <a href="#" class="btn btn-sm btn-success"><i class="icon-plus"></i> Retour</a> 								<a href="#" class="btn btn-sm btn-danger"><i class="icon-plus"></i> Supprimer</a>
							</div>
                            <div class="col-sm-6 m-b-xs">
                                <div class="input-group">
                                    <input type="text" class="input-sm form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                    <button class="btn btn-sm btn-white" type="button">Go!</button>
                                    </span> </div>
                            </div>
                        </div>
                    </header>
                    <section class="panel">
                        <div class="table-responsive">
                            <table class="table table-striped m-b-none">
                                <thead>
                                    <tr>
                                        <th width="20"><input type="checkbox"></th>
                                        <th width="20">Nom</th>
                                        <th class="th-sortable active" data-toggle="class">Auteur <span class="th-sort"> <i class="icon-sort-down text"></i> <i class="icon-sort-up text-active"></i> <i class="icon-sort"></i> </span> </th>
                                        <th>Description</th>
                                        <th>Etat</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php 
								if(isset($Themes))
								{
									if(count($Themes) > 0)
									{
										foreach($Themes as $t)
										{
											if($t['ACTIVATED']== '')
											{
												$t['ACTIVATED']	= 'Inactif';
											}
											else if($t['ACTIVATED']	==	 'TRUE')
											{
												$t['ACTIVATED']	=	'Activ&eacute;';
											}
										?>
									<tr>
										<td ><a class="view" href="<?php echo $this->core->url->site_url(array('admin','themes','config',$t['ID']));?>"><?php echo $t['NAMESPACE'];?></a></td>
										<td ><?php echo $t['AUTHOR'];?></td>
										<td ><?php echo $t['DESCRIPTION'];?></td>
										<td ><?php echo $t['ACTIVATED'];?></td>
										<td ><a class="view" href="<?php echo $this->core->url->site_url(array('admin','themes','manage',$t['ID']));?>">Param&ecirc;tre avanc&eacute;</a></td>
									</tr>
										<?php
										}
									}
									else
									{
										?>
									<tr>
										<td colspan="5">Aucun th&egrave;me n'est install&eacute;.</td>
									</tr>
										<?php
									}
								}
 			                     ?>
                                </tbody>                                
                            </table>
                        </div>
                    </section>
                </section>
            </section>
        </section>
        <footer class="footer bg-white b-t">
            <div class="row m-t-sm text-center-xs">
                <div class="col-sm-4">
                    <select class="input-sm form-control input-s-sm inline">
                        <option value="0">Bulk action</option>
                        <option value="1">Delete selected</option>
                        <option value="2">Bulk edit</option>
                        <option value="3">Export</option>
                    </select>
                    <button class="btn btn-sm btn-white">Apply</button>
                </div>
                <div class="col-sm-4 text-center"> <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> </div>
                <div class="col-sm-4 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                     <?php 
					if(is_array($paginate[4]))
					{
						foreach($paginate[4] as $p)
						{
							?>
                            <li class="<?php echo $p['state'];?>"><a href="<?php echo $p['link'];?>"><?php echo $p['text'];?></a></li>
							<?php
						}
					}
				?>
                    </ul>
                </div>
            </div>
        </footer>
    </section>