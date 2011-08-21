<?php
echo '<pre>';

    /**
     * 
     * 
     */

    define( 'DIR', dirname(__FILE__) );

    $n = 0;
    $dirlist = array();

    function traverse($path = '.')
    {
    	global 
    		$n,
    	 	$dirlist;

    	$n++;

        $path_list = glob($path.'/*', GLOB_ONLYDIR);
        
        $dirlist[$path] = glob($path.'/*');
        
        
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
        			traverse($path.'/'. substr($value, strlen($path)+1 ) );
        		} 
        		else 
        		{
        			traverse($value);
        		}
        	}    	
        }    	
    }

    traverse('dir1');
    print_r($dirlist);


   //echo DIR.'\\';
   // $str = './dir1';
   // foreach (glob($str.'/*', GLOB_ONLYDIR) as $key => $value) {
   // 	   echo substr($value, strlen($str)+1 )."<br/>";
   // }

   /**
   * 
   */
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