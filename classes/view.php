<?php defined('SYSPATH') or die('No direct script access.');

class View extends Kohana_View {
	private $skin_base_dir = 'skins';

	public function __construct($file = null, array $data = null)
	{
		parent::__construct($file, $data);

		$this->skin_base_dir = Kohana::Config('skins.skin_path');
	}

	/**
	 * Gets the view directory name representing the current skin.
	 */
	public function get_skindir($skin_dir)
	{
			// TODO: Make directory separators system independant.
		return $this->skin_base_dir . '/' . $skin_dir;
	}

	/**
	 * Override set_filename in order to search our view directories for the view
	 * instead of just the 'views' directory.
	 */
	public function set_filename($file)
	{
		$preferred_skin = Session::instance()->get('preferred_skin', false);

			// Attempt to find the path to our skin if we prefer a specific one
		if ($preferred_skin !== false)
		{
			$path = Kohana::find_file($this->get_skindir($preferred_skin), $file);
		}

			// In the event that we didn't find a prefered file, use the default.
		if ($preferred_skin === false || $path === false)
		{
			$path = Kohana::find_file($this->get_skindir(Kohana::Config('skins.default_skin')), $file);

				// Otherwise, revert to the "standard" Kohana method.
			if ($path === false)
				return parent::set_filename($file);
		}

		$this->_file = $path;
		return $path;
	}
}
