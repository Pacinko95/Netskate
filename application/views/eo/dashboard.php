
<div class="row">
                        <div class="col-md-3">
                            
                            <!-- START WIDGET SLIDER -->
                             <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-file-text"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $event?></div>
                                    <div class="widget-title">Event</div>
                                    <div class="widget-subtitle"><a href="<?= base_url('eo/event')?>">Total Event</a></div>
                                </div>      
                                
                            </div>          
                            <!-- END WIDGET SLIDER -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET MESSAGES -->
                            <div class="widget widget-default widget-item-icon" >
                                <div class="widget-item-left">
                                    <span class="fa fa-envelope"></span>
                                </div>                             
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= @$invoice_approve->approvelinvoice?></div>
                                    <div class="widget-title">Invoice Approved</div>
                                    <div class="widget-subtitle">Total Invoice Approve
</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-search-plus"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= @$invoice_approve_not->approvelinvoice?></div>
                                    <div class="widget-title">Invoice Not Approved</div>
                                    <div class="widget-subtitle">Total Invoice Not Approve</div>
                                </div>
                                                           
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                                 <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <span class="fa fa-tasks"></span>
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= @$club->club?></div>
                                    <div class="widget-title">Unpaid</div>
                                    <div class="widget-subtitle">Total invoice Unpaid</div>
                                </div>
                                                           
                            </div>                  
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                    
                 <!--    <div class="row">
                        <div class="col-md-6">
                            
                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>x</h3>
                                        <span>xx</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                                </div>                                    
                            </div>
                          
                            
                        </div>
                        <div class="col-md-6">
                            
                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>x</h3>
                                        <span>xx</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                    <div class="chart-holder" id="dashboard-donut-1" style="height: 200px;"></div>
            </div>
        </div>
    </div>
</div>
              -->
                    
              