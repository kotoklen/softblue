<?php

class EditUserCommand extends BaseUserCommand
{
	public function  execute()
	{
		$this->log->log('User updated '. $this->user_data->logSerialize());
		$this->dao->updateUser($this->user_data->name, $this->user_data->email, $this->user_data->country_id, $this->user_data->id);
	}
}
?>