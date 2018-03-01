<?php
/**
 * This is just a sample model file. You can (and should) delete this once you start developing your app.
 * @package Model
 * @subpackage Example
 */


/**
 * Documentation of cached fields and the data object.
 * @property string $name
 * @property string $description
 * @property stdClass $data You should document this in a separate doc.php file.
 */
class Sample extends zajModel {
	
	/**
	 * __model function. creates the database fields available for objects of this class.
	 * @param bool|stdClass $f The field's object generated by the child class.
 	 * @return stdClass Returns an object containing the field settings as parameters.
	 */
	public static function __model($f = false){
		/////////////////////////////////////////
		// begin custom fields definition:
        if($f === false) $f = new stdClass();

		$f->name = zajDb::name();
		$f->description = zajDb::text();
		$f->photos = zajDb::photos();
		// end of custom fields definition
		/////////////////////////////////////////		

		// do not modify the line below!
        return parent::__model($f);
	}

	/**
	 * This method is called after the object is fetched from the database. You will want to use this for caching.
	 **/
	public function __afterFetch(){
		
		// The following code will cache the description of this object
		$this->description = $this->data->description;
		
		// name and id are cached automatically, so they are available as $this->name and $this->id

		// Fields you do not cache can be accessed via the $this->data->fieldname property.

	}
	
	// For additional available methods, see documentation on model methods: https://framework.outlast.hu/models-and-data/zajmodel/

}