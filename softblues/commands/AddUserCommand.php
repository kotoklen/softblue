<?php

class AddUserCommand extends BaseUserCommand
{
	public function  execute()
	{
		$this->log->log('User added '. $this->user_data->logSerialize());
		$this->dao->insertUser($this->user_data->name, $this->user_data->email, $this->user_data->country_id);
	}
}
?>
