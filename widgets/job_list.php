<?php
class Elementor_Job_List extends \Elementor\Widget_Base {

  public function get_name() {
    return 'job_list_table';
  }

	public function get_title() {
    return esc_html__('Job List Table', 'job_list_table');
  }

	public function get_icon() {
    return 'eicon-code';
  }


	public function get_categories() {
    return [ 'general' ];
  }

	protected function register_controls() {
    $this->start_controls_section(
      'section_content',
      [
        'label'=> esc_html__( 'Content', 'job_list_table' ),
        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
      ]
    );
    

    $this->add_control(
      'header_image',
      [
        'label' => esc_html__('Choose Header Image', 'job_list_table'),
        'type' => \Elementor\Controls_Manager::MEDIA,
        'default' => [
          'url' => \Elementor\Utils::get_placeholder_image_src(),
        ]
      ]
    );

    $this->add_control(
      'header_title',
      [
        'label' => esc_html__('Header Title', 'job_list_table'),
        'type' => \Elementor\Controls_Manager::TEXT,
        'placeholder' => esc_html__('Enter your title', 'job_list_table'),
        'default' => esc_html__('Daily Dose: IT Jobs', 'job_list_table')
      ]
    );

    $this->add_control(
			'student_img_list',
			[
				'label' => esc_html__( 'Side Images', 'job_list_table' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'Student Images',
						'label' => esc_html__( 'Image', 'job_list_table' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
              'url' => \Elementor\Utils::get_placeholder_image_src(),
            ]
					],
				]
			]
		);

    $this->add_control(
      'student_info_list',
      [
        'label' => esc_html__('Student Information List'),
        'type'=>\Elementor\Controls_Manager::REPEATER,
        'fields' => [
          [
            'name' => 'title',
            'label' => esc_html__('Job Title', 'job_list_table'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Job Title', 'job_list_table')
          ],
          [
            'name' => 'location',
            'label' => esc_html__('Job Location', 'job_list_table'),
            'type' => \Elementor\Controls_Manager::TEXT,
            'placeholder' => esc_html__('Job Location', 'job_list_table')
          ],
          [
            'name' => 'link',
            'label' => esc_html__('Link', 'job_list_table'),
            'type' => \Elementor\Controls_Manager::URL,
            'placeholder' => esc_html__( 'https://your-link.com', 'job_list_table'),
          ],
        ]
      ]
    );
    
    $this->add_control(
     'footer_text',
     [
      'label' => esc_html__( 'Foother Text', 'job_list_table' ),
      'type' => \Elementor\Controls_Manager::TEXT,
      'placeholder' => esc_html__( 'Enter your content', 'job_list_table' ),
     ]
    );


    $this->end_controls_section();
  }

	protected function render() {
    $settings = $this->get_settings_for_display();
    ?>
    <section id="job_listing">
      <div class="job_listing_header">
        <div class="job_listing_wrapper display_flex">
          <div class="header_image">
            <?php 
            echo '<img width="250px" src="' . esc_url( $settings['header_image']['url'] ) . '" alt="logo">';?>
          </div>
          <div class="header_title">
            <h2 class="job_ready_program">JOB READY PROGRAM</h2>
            <ul class="info_list">
              <li><a href="https://www.techskills.institute" target="_blank">www.techskills.institute</a></li>
              <span>|</span>
              <li><a href="mailto:info@techskills.institute">info@techskills.institute</a></li>
              <span>|</span>
              <li><a href="tel:+61283198440">+61 2 8319 8440</a></li>
            </ul>  
          </div>
        </div>  
        <?php echo '<h2 class="it_job_header">'. $settings['header_title'] .'</h2>'?>  
      </div>

      <div class="job_lisitng_body display_flex">
        <div class="listing_left">
          <?php 
          
          foreach ($settings['student_img_list'] as $index => $item) :
           ?>
          <div class="student_img_wrapper">
            <?php
            if($item['Student Images']['url']){
            ?>
            <img class="profile_img" src="<?php echo($item['Student Images']['url']);?>">
            <?php
            }
            ?>
          </div>  
          <?php
          endforeach;
          ?>
        </div>
        <div class="listing_right">
          <div class="table">
            <div class="table-header">
              <div class="header__item sn">SN</div>
              <div class="header__item job">Job Title</div>
              <div class="header__item location">Location</div>
              <div class="header__item link">Link</div>
            </div>
            <div class="table-content">	
              <?php foreach ( $settings['student_info_list'] as $index => $item ) : ?>
                <div class="table-row">		
                  <div class="table-data sn"><?php echo ++$index;?></div>
                  <div class="table-data job"><?php echo $item[title];?></div>
                  <div class="table-data location"><?php echo $item[location];?></div>
                  <div class="table-data link">
                    <a class="link-data" target="_blank" href="<?php echo $item[link][url];?>">
                      <?php echo $item[link][url];?>
                    </a>  
                    <a class="link-btn" target="_blank" href="<?php echo $item[link][url];?>">
                      More Info
                    </a>  
                  </div>
                </div>
              <?php endforeach; ?>
            </div>	
          </div>
        </div>
        </div>
        <div class="job_listing_footer">
          <h3>DISCLAMER</h3>
          <p><?php echo $settings['footer_text'];?></p>
        </div>      
      </div>
    </section> 
    <style>
      #job_listing {
      border: 1px solid #e3e3e3;
      padding: 35px 0px;
    }
 h2.it_job_header {
    font-size: 42px;
    text-align: center;
    background-color: #e3e3e3;
    margin: 30px 0;
    padding: 20px 0 15px;
    line-height: 42px;
}
    ul.info_list a {
      color: #fff;
      text-decoration: underline;
      font-weight: 500;
      font-size: 16px;
	}
  .header_title {
    background-color: #165EA1;
    color: #fff;
    padding: 25px 20px 13px;
    border-radius: 5px;
}  
    .job_listing_wrapper.display_flex {
      justify-content: space-around;
      align-items: center;
    }
    ul.info_list {
      display: flex;
      padding: 0;
    }
    ul.info_list li {
      list-style: none;
      margin: 0 5px;
    }
    h2.job_ready_program {
      text-align: center;
      font-size: 36px;
      color:#fff;
      line-height:40px;
    }
    .display_flex {
      display: flex;
    }
    .job_listing_header {
      justify-content: space-around;
    }
    .job_lisitng_body.display_flex {
      flex-direction: row;
    }
    .listing_left {
      width: 13%;
      margin-right: 30px;
    }
    .listing_right {
      width: 87%;
    }
    .table-data {
      padding-top: 7px;
      padding-bottom: 5px;
    }
    .table {
      width:100%;
      border:1px solid #EEEEEE;
    }
    .table-header {
      display:flex;
      width:100%;
      background:#000;
    }
    .link-btn{
      display:none;
    }
    .table-row {
      display:flex;
      width:100%;
      &:nth-of-type(odd) {
        background:#EEEEEE;
      }
      align-items: center;
    }

    .sn {
      min-width: 8%;
      padding-left: 2%;
    }
    .job {
     width: 25%;
    }
    .location {
     width: 22%;
    }
    .link {
      width: 45%;
    }
    .header__item {
    text-transform: uppercase;
    color: #fff;
    padding-top: 7px;
    padding-bottom: 7px;
    margin-top: 5px;
    font-weight: bold;
}
    .job_listing_footer {
      background-color: #165EA1;
      text-align: center;
      color: #fff;
      padding: 25px 60px;
      width: 80%;
      margin: auto;
      border-radius: 10px;
      margin-top: 30px;
    }
    .table-data.link a {
      color: #165ea1;
      text-decoration: underline;
    }
    .job_listing_footer h3 {
      font-size: 30px;
      color: #fff;
	}
    
    @media only screen and (max-width: 1024px) {
      h2.job_ready_program {
        font-size: 20px;
        margin-bottom: 5px;
      }
      ul.info_list a {
        color: #fff;
        text-decoration: underline;
        font-weight: 400;
        font-size: 14px;
      }
      .header_image img {
        max-width: 200px;
      }
      .display_flex {
        display: flex;
      }
      .listing_right {
        width: 100%;
     }
    .job_lisitng_body.display_flex {
      flex-direction: column-reverse;
    }
    .job {
      width: 20%;
      font-size: 14px !important;
    }
    .location {
        width: 15%;
        font-size: 14px;
    }
    .listing_left {
      width: 100%;
      margin-right: 0;
      margin-top: 25px;
    }
    .job_listing_footer {
    background-color: #165EA1;
    text-align: center;
    color: #fff;
    padding: 24px 40px;
    width: 94%;
    margin: auto;
    border-radius: 10px;
    margin-top: 30px;
}
.job_listing_footer {
    padding: 23px 24px;
    width: 94%;
}
    }

    @media only screen and (max-width: 750px) {
      a.link-data {
        display: none;
      }
      .link {
        width: 26%;
      }
      .location {
        width: 30%;
      }  
      .job {
        width: 34%;
      }
      .sn {
        min-width: 10%;
        padding-left: 2%;
      }
      .link-btn {
        display: block;
        font-size:14px;
      }
      .link-btn {
        display: block;
        font-size: 13px;
        background-color: #000;
        width: 84px;
        text-align: center;
        color: #fff;
        border: 0;
        padding: 5px;
        border-radius: 5px;
      }
      .job_listing_wrapper.display_flex {
        flex-direction: column;
      }
      ul.info_list span {
        display: none;
      }
      ul.info_list {
        flex-direction: column;
      }
      ul.info_list li {
        list-style: none;
        margin: 0 5px;
        text-align: center;
      }
      .header_title {
        width: 94%;
        margin: auto;
    }
    h2.it_job_header {
      font-size: 34px;
    }
    .table-data.link a {
    color: #fff;
    text-decoration: underline;
}
.job_listing_footer p {
    font-size: 14px;
    line-height: 24px;
}
    }
    </style> 
    <?php
  }

	protected function content_template() {
    ?>
    <img src="{{{ settings.header_image.url }}}">

		<h3 class="{{ settings.class }}">{{{ settings.header_title }}}</h3>
		<?php
  }

}