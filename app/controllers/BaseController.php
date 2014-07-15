<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$data = [
				'title' => (isset($this->layout->title)) ? $this->layout->title : ' '
			];
			$this->layout = View::make($this->layout, $data);
		}
	}

}
