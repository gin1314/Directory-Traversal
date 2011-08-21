<?php

   class Dir
   {
   	    private $dirlist;

   		function __construct()
   		{
   		}

        public function traverse($path = '.')
        {
    
            $path_list = glob($path.'/*', GLOB_ONLYDIR);
            
            $this->dirlist[$path] = glob($path.'/*');          
            
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
        	return $this->dirlist;
        }
   }

   $dir = new Dir;
   $dir->traverse('.');
   var_dump($dir->getDirlist())

?>