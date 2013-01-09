<?php
if (!class_exists('SamManagerEditor'))
{
	class SamManagerEditor
	{
		public function __construct($settings)
		{
			$this -> settings = $settings;
		}

		public function page()
		{
			?>
<div class="wrap">
  <form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>">
    <div class="icon32" style="background: url('<?php echo SAM_IMG_URL . 'sam-editor.png'; ?>') no-repeat transparent; "><br/></div>
    <h2><?php echo __('Ads Manager', SAM_DOMAIN); ?></h2>
    <?php
	include_once ('errors.class.php');
	$errors = new samErrors();
	if (!empty($errors -> errorString))
		echo $errors -> errorString;
    ?>
    <div class="metabox-holder" id="poststuff">
    <div id="post-body">
        <div id="post-body-content">
  
  		   <div id="normal-sortables" class="widefat fixed">
            <div id="descdiv" class="postbox ">
              <div class="handlediv" title="<?php _e('Click to toggle', SAM_DOMAIN); ?>"><br/></div>
              <h3 class="hndle"><span><?php _e('Advertisement Description', SAM_DOMAIN);?></span></h3>
              <div class="inside">
                <p>
                  <label for="item_description"><strong><?php echo __('Description', SAM_DOMAIN).':' ?></strong></label>
                  <textarea rows='3' id="item_description" class="code" tabindex="2" name="item_description" style="width:100%" >put data from databse</textarea>
                </p>
                <p>
                  <?php _e('This description is not used anywhere and is added solely for the convenience of managing advertisements.', SAM_DOMAIN); ?>
                </p>
              </div>
            </div>
          </div>


        </div>	
    </div>
    </div>
  </form>
</div>          
			<?php
			}

			}

			}
		?>