<div id="mainview">
    <h1 style="text-align:center">Ратуша</h1>

	<?php
	$this->load->helper('form');
	echo form_open('actions/rename');
	?>
	<div id="renameCity" class="contentBox01h">
			<h3 class="header">Переименовать город</h3>
            <div class="content">
				<div class="oldCityName"><span class="textLabel">Прежнее название города: </span><?=$this->Player_Model->now_town->name?></div>
                <div class="newCityName"><label for="newCityName">Новое имя города: </label>
				<?php $data = array(
							  'name'        => 'name',
							  'id'          => 'newCityName',
							  'maxlength'   => '15',
							  'size'        => '30',
							);
				echo form_input($data);
				
				$data = array(
						'class'        => 'button',
						'value'        => 'Принять название',
					);
				echo form_submit($data); ?>
                </div>
            </div>
            <div class="footer"></div>
        </div>
	</form>
</div>