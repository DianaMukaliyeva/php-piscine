<?php
class NightsWatch
{
	private $_crew = [];

	public function recruit($person)
	{
		$this->_crew[] = $person;	
	}

	public function fight()
	{
		foreach ($this->_crew as $new)
		{
			if (method_exists($new, 'fight'))
				$new->fight();
		}
    }
}
?>