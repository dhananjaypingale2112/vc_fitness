<?php 
  $data['page'] = "packagespage";
  $this->load->view('templates/header',$data);
 $customer_id = $this->session->userdata('customer_id');
?>

<div id="main">
                <!-- main-content starts here -->
                <div id="main-content">
                    <section id="primary" class="content-full-width">
                        <div class="dt-sc-hr-invisible-small"></div>
                        <div class="dt-sc-hr-invisible-normal"></div>
                        <!-- Pricintable type3 starts here -->
                        <div class="fullwidth-section">
                            <div class="container">
                            	<h3 class="border-title"> <span> Subscription Prices </span> </h3>
                                <?php 
                                    foreach ($packages as $key => $value):
                                ?>
                                <div class="dt-sc-one-third column first">
                                	<div class="dt-sc-pr-tb-col type3 darkpink">
                                    	<div class="dt-sc-pr-tb-col-wrapper">
	                                    	<div class="dt-sc-tb-header">
                                                <div class="dt-sc-tb-title">
                                                    <h3><?php echo $value['package_name'] ?></h3>
                                                    <span>Gain Without a Personal Trainer</span>
                                                    <p><span>Best Plan</span></p>
                                                </div>
                                                 <div class="dt-sc-one-half column no-space">
                                                    <div class="dt-sc-price">
                                                        <span><?php echo round($value['package_3m_amount'])?></span><br>3 Months
                                                    </div>
                                                </div>
                                                <div class="dt-sc-one-half column no-space">
                                                    <div class="dt-sc-price last">
                                                        <span><?php echo round($value['package_6m_amount'])?></span><br>6 Months
                                                    </div>
                                                </div>
                                                <div class="dt-sc-price">
                                                    <span><?php echo round($value['package_1y_amount'])?></span><br>Full year Subscription
                                                </div>
                                            </div>
                                            <ul class="dt-sc-tb-content">
                                            <?php 
                                            $trainingName = explode("," , $value['package_training_type_name']);
                                                 foreach ($trainingName as $key1 => $value1 ):
                                                    if(!empty($value1)):
                                             ?>
                                                <li> <?php echo $value1; ?></li>
                                        <?php endif; endforeach; ?>
                                        </ul>
                                        </div>
                                        <div class="dt-sc-buy-now" onclick="insertPackage('<?php echo $value['package_id']?>','<?php echo $customer_id ?>')">
                                        	<a class="dt-sc-button medium" target="_blank" data-hover="Enroll Now">Enroll Now</a>
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    endforeach;
                                ?>
                            </div>
						</div>

						<!-- support starts here -->
                     <div class="dt-sc-hr-invisible"></div>
                        <div class="fullwidth-section">
                            <div class="container">
                            	<h3 class="border-title"><span> Our Other Programs </span></h3>
                                <div class="dt-sc-clear"></div>
                            	<div class="carousel_items">
                                	<div class="dt_carousel">
	                                    <div class="dt-sc-one-third column">
                                            <div class="dt-sc-programs">
                                                <div class="dt-sc-pro-thumb">
                                                    <a href="#"><img src="<?php echo base_url();?>public/images/event1.jpg" alt="" title=""></a>
                                                </div>
                                                <div class="dt-sc-pro-detail">
                                                    <div class="dt-sc-pro-content">
                                                        <div class="dt-sc-pro-title">
                                                            <h3>Muscle Build Pro</h3>
                                                            <span>1 yr training program</span>
                                                        </div>
                                                        <ul class="dt-sc-fancy-list circle-o">
                                                            <li>3 days a week program</li>
                                                            <li>Diet program Included</li>
                                                            <li>Professional Trainers</li>
                                                        </ul>
                                                    </div>
                                                    <div class="dt-sc-pro-price">
                                                        <p class="pro-price-content">
                                                            <sup>$</sup> 89.99/<span>6 Months</span>
                                                        </p>
                                                        <a class="dt-sc-button small" href="#" data-hover="Enroll Now">Enroll Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-sc-one-third column">
                                            <div class="dt-sc-programs">
                                                <div class="dt-sc-pro-thumb">
                                                    <a href="#"><img src="<?php echo base_url();?>public/images/event2.jpg" alt="" title=""></a>
                                                </div>
                                                <div class="dt-sc-pro-detail">
                                                    <div class="dt-sc-pro-content">
                                                        <div class="dt-sc-pro-title">
                                                            <h3>Women Strength Training</h3>
                                                            <span>1 yr training program</span>
                                                        </div>
                                                        <ul class="dt-sc-fancy-list circle-o">
                                                            <li>3 days a week program</li>
                                                            <li>Diet program Included</li>
                                                            <li>Professional Trainers</li>
                                                        </ul>
                                                    </div>
                                                    <div class="dt-sc-pro-price">
                                                        <p class="pro-price-content">

                                                            <sup>$</sup> 89.99/<span>6 Months</span>
                                                        </p>
                                                        <a class="dt-sc-button small" href="#" data-hover="Enroll Now">Enroll Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-sc-one-third column">
                                            <div class="dt-sc-programs">
                                                <div class="dt-sc-pro-thumb">
                                                    <a href="#"><img src="<?php echo base_url();?>public/images/event3.jpg" alt="" title=""></a>
                                                </div>
                                                <div class="dt-sc-pro-detail">
                                                    <div class="dt-sc-pro-content">
                                                        <div class="dt-sc-pro-title">
                                                            <h3>Fat Burning Pro</h3>
                                                            <span>6 months</span>
                                                        </div>
                                                        <ul class="dt-sc-fancy-list circle-o">
                                                            <li>3 days a week program</li>
                                                            <li>Diet program Included</li>
                                                            <li>Professional Trainers</li>
                                                        </ul>
                                                    </div>
                                                    <div class="dt-sc-pro-price">
                                                        <p class="pro-price-content">
                                                            <sup>$</sup> 89.99/<span>6 Months</span>
                                                        </p>
                                                        <a class="dt-sc-button small" href="#" data-hover="Enroll Now">Enroll Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dt-sc-one-third column">
                                            <div class="dt-sc-programs">
                                                <div class="dt-sc-pro-thumb">
                                                    <a href="#"><img src="<?php echo base_url();?>public/images/event4.jpg" alt="" title=""></a>
                                                </div>
                                                <div class="dt-sc-pro-detail">
                                                    <div class="dt-sc-pro-content">
                                                        <div class="dt-sc-pro-title">
                                                            <h3>Muscle Build Pro</h3>
                                                            <span>1 yr training program</span>
                                                        </div>
                                                        <ul class="dt-sc-fancy-list circle-o">
                                                            <li>3 days a week program</li>
                                                            <li>Diet program Included</li>
                                                            <li>Professional Trainers</li>
                                                        </ul>
                                                    </div>
                                                    <div class="dt-sc-pro-price">
                                                        <p class="pro-price-content">
                                                            <sup>$</sup> 89.99/<span>6 Months</span>
                                                        </p>
                                                        <a class="dt-sc-button small" href="#" data-hover="Enroll Now">Enroll Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                	<div class="carousel-arrows">
                                    	<a href="#" class="prev-arrow"><i class="fa fa-angle-left"></i></a>
                                        <a href="#" class="next-arrow"><i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
						</div>
						<div class="dt-sc-hr-invisible-medium"></div>
                    </section>
				</div>
                <!-- main-content ends here -->
            </div>
<?php 
  $this->load->view('templates/footer')
?>
