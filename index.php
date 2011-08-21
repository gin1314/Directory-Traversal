<?php

   /**
    * @author Eugene Santos
    * @email eugene.santos13@gmail.com
    */
   class Dir
   {
        private $_dirlist = array();

        function __construct()
        {
        }

        public function traverse($path = '.')
        {
            // just list all the directories in a directory :)
            $path_list = glob($path.'/*', GLOB_ONLYDIR);
            
            $this->_dirlist[$path] = glob($path.'/*');          
            
            if ( empty ($path_list) )
            {
 	        	return;	
            }
            else
            {
            	foreach ( $path_list as $key => $value ) 
            	{
            		if ($path !== '.') 
            		{
            			//just the child dirs
            			$this->traverse($path.'/'. substr($value, strlen($path)+1 ) );
            		} 
            		else 
            		{
            			$this->traverse($value);
            		}
            	}    	
            }    	
        }

        public function getDirlist()
        {
        	return $this->_dirlist;
        }
   }

   echo '<pre>';
   $dir = new Dir;
   $dir->traverse('.');
   print_r($dir->getDirlist());

?>