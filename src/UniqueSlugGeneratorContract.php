<?php
/**
 * @author <Rendy rendy.ananta66@gmail.com>
 * Date: 06/08/17
 * Time: 6:03
 */

namespace McHavens\LaravelUniqueSlugGenerator;


interface UniqueSlugGeneratorContract
{
	public function getSluggableValue () :string ;
}