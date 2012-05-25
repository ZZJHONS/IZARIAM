<div id="passwordLost">
    <h2><?=$this->lang->line('error')?></h2>
    <br/>
    <div class="message">
    	<a href="<?=$this->config->item('base_url')?>">
    		<?if ($this->session->flashdata('error') != '') {
                if (sizeof($this->session->flashdata('error')) > 1) {
                    foreach ($this->session->flashdata('error') as $errors) {
                        echo $errors.'<br />';
                    };
                } else {
                    echo $this->session->flashdata('error');
                }
    		} elseif ($this->session->flashdata('errors') != '') {
    			foreach ($this->session->flashdata('errors') as $errors) {
    			 	echo $errors.'<br />';
    			};
    		} elseif (isset($errors)) {
                    echo $errors;
            }?>
    	</a>
    </div>
    <br><br><br>
</div>