<?php

class DeleteUserCommand extends BaseUserCommand
{
	public function  execute()
	{
		$this->log->log('User deleted id = '. $this->user_data->id );
		$this->dao->deleteUser($this->user_data->id);
	}
}
?>