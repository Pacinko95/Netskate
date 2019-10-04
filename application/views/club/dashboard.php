<div class="row">
    <div class="col-md-3">
        <!-- START WIDGET SLIDER -->
        <div class="widget widget-default widget-item-icon" >
            <div class="widget-item-left">
				<img src="<?=  base_url().'assets/img/icon/beginner.png'; ?>" style="width:50px; height:50px;color:red;" />
                <!--<span class="fa fa-file-text" style="color:red;"></span>-->
            </div>                             
            <div class="widget-data">
                <div class="widget-int num-count"><?= $beginner?></div>
                <div class="widget-title">BEGINNER</div>
                <div class="widget-subtitle">Total Athlete Beginner</div>
            </div>      
        </div>          
        <!-- END WIDGET SLIDER -->
    </div>
    <div class="col-md-3">
    <!-- START WIDGET MESSAGES -->
    <div class="widget widget-default widget-item-icon" >
        <div class="widget-item-left">
            <img src="<?=  base_url().'assets/img/icon/standard.png'; ?>" style="width:50px; height:50px;color:red;" />
            <!--<span class="fa fa-envelope" style="color:yellow;"></span>-->
        </div>                             
        <div class="widget-data">
            <div class="widget-int num-count"><?= $standard?></div>
            <div class="widget-title">STANDARD</div>
                                    <div class="widget-subtitle">Total Athlete Standard</div>
                                </div>      
                                
                            </div>                            
                            <!-- END WIDGET MESSAGES -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET REGISTRED -->
                            <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
                                    <img src="<?=  base_url().'assets/img/icon/speed.png'; ?>" style="width:50px; height:50px;color:red;" />
									<!--<span class="fa fa-search-plus" style="color:green;"></span>-->
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $speed?></div>
                                    <div class="widget-title">SPEED</div>
                                    <div class="widget-subtitle">Total Athlete Speed</div>
                                </div>
                                                           
                            </div>                            
                            <!-- END WIDGET REGISTRED -->
                            
                        </div>
                        <div class="col-md-3">
                            
                            <!-- START WIDGET CLOCK -->
                                 <div class="widget widget-default widget-item-icon">
                                <div class="widget-item-left">
									<img src="<?= base_url().'assets/img/icon/skatecross.png'; ?>" style="width:50px; height:50px;color:red;" />
                                    <!--<span class="fa fa-tasks" style="color:blue;"></span>-->
                                </div>
                                <div class="widget-data">
                                    <div class="widget-int num-count"><?= $skatecross?></div>
                                    <div class="widget-title">SKATECROSS</div>
                                    <div class="widget-subtitle">Total Athlete Skatecross</div>
                                </div>
                                                           
                            </div>                  
                            <!-- END WIDGET CLOCK -->
                            
                        </div>
                    </div>
                    <!-- END WIDGETS -->                    
                   
<!--nunu comment				   -->
                   <div class="row">
                        <div class="col-md-6">
                            
                          
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Sex</h3>
                                        <span>Athlete By Sex</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                                                              
                                    </ul>                                    
                                </div>                                
                                <div class="panel-body padding-0">
                                

                                <div id="by-sex-chart" style="width: 100%; height: 400px; margin: 0 auto"></div>
                                
                                </div>                                    
                            </div>
                   
                            
                        </div>
                        <div class="col-md-6">
                       
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Group Age</h3>
                                        <span>Athlete By Group Age</span>
                                    </div>
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                                                         
                                    </ul>
                                </div>
                                <div class="panel-body padding-0">
                                <div id="bar-chart" style="width: 100%; height: 400px; margin: 0 auto"></div>
                                </div>
                            </div>
                      
                        </div>

						
                    </div>

                    