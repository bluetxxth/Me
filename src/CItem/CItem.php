<?php


class CItem{

private $db;
	

   /**
   * Constructor
   *
   */
   public function __construct($db) {
   	$this->db=$db;
    }
     
	 
	/**
	 * Use the current querystring as base, modify it according to $options and return the modified query string.
	 *
	 * @param array $options to set/change.
	 * @param string $prepend this to the resulting query string
	 * @return string with an updated query string.
	 */
	function getQueryString($options=array(), $prepend='?') {
	  // parse query string into array
	  $query = array();
	  parse_str($_SERVER['QUERY_STRING'], $query);

	  // Modify the existing query string with new options
	  $query = array_merge($query, $options);

	  // Return the modified querystring
	  return $prepend . htmlentities(http_build_query($query));
	}

	
	/**
	 * Create links for hits per page.
	 *
	 * @param array $hits a list of hits-options to display.
	 * @param array $current value.
	 * @return string as a link to this page.
	 */
	function getHitsPerPage($hits, $current=null) {
	  $nav = "Hits per page: ";
	  foreach($hits AS $val) {
		if($current == $val) {
		  $nav .= "$val ";
		}
		else {
		  $nav .= "<a href='" . $this->getQueryString(array('hits' => $val)) . "'>$val</a> ";
		}
	  }  
	  return $nav;
	}
	

	/**
	 * Create navigation among pages.
	 *
	 * @param integer $hits per page.
	 * @param integer $page current page.
	 * @param integer $max number of pages. 
	 * @param integer $min is the first page number, usually 0 or 1. 
	 * @return string as a link to this page.
	 */
	function getPageNavigation($hits, $page, $max, $min=1) {
	  $nav  = ($page != $min) ? "<a href='" . $this->getQueryString(array('page' => $min)) . "'>&lt;&lt;</a> " : '&lt;&lt; ';
	  $nav .= ($page > $min) ? "<a href='" . $this->getQueryString(array('page' => ($page > $min ? $page - 1 : $min) )) . "'>&lt;</a> " : '&lt; ';

	  for($i=$min; $i<=$max; $i++) {
		if($page == $i) {
		  $nav .= "$i ";
		}
		else {
		  $nav .= "<a href='" . $this->getQueryString(array('page' => $i)) . "'>$i</a> ";
		}
	  }

	  $nav .= ($page < $max) ? "<a href='" . $this->getQueryString(array('page' => ($page < $max ? $page + 1 : $max) )) . "'>&gt;</a> " : '&gt; ';
	  $nav .= ($page != $max) ? "<a href='" . $this->getQueryString(array('page' => $max)) . "'>&gt;&gt;</a> " : '&gt;&gt; ';
	  return $nav;
	}
	
	/**
	 *Restore database to original state
	 */
	 public function resetDBToOriginal(){
		// Restore the database to its original settings
		$sql      = 'gabriel_db.sql';
		$mysql    = '/usr/local/bin/mysql';
		$host     = 'localhost';
		$login    = '';
		$password = '';
		$output = null;
		
		if(isset($_POST['restore']) || isset($_GET['restore'])) {
		  $cmd = "$mysql -h{$host} -u{$login} -p{$password} < $sql";
		  exec($cmd);
		  $output = "<p>Database has been reset via command<br/><code>{$cmd}</code></p>";
		}
	}
	

	/**
	 * Edits movie
	 */
	public function editItem($title, $author, $image, $year,  $description, $url, $status, $language, $production, $test, $servertype, $apptype, $id){
	   
	   echo "title " . $title . " ";
	   echo "author " . $author. " ";
	   echo "image " . $image. " ";
	   echo "year " . $year. " ";
	   echo "description  " . $description. " ";
	   echo "url " . $url. " ";
	   echo "status " . $status. " ";
	   echo "id " . $id. " ";
		
		$output = null;

		
		
		$sql = '
      UPDATE aItem SET
      title = ?,
	  author = ?,
      image = ?,      
	  YEAR = ?,
      description = ?,
	  url = ?,
	  status = ?,
	  language = ?,
      production = ?,
	  test = ?,
	  servertype = ?,
	  apptype = ?,
      updated = NOW()
    WHERE
      id = ?
;
  ';
		
		$params = array (
		        $title,
		        $author,
		        $image,
// 				$name,
				$year,
		        $description,
				$url,
				$status,
// 		        $created,
		        $language,
		        $test,
		        $servertype,
		        $apptype,
		        $production,
		        $id
// 				$img_name,
		
		);
		
		$isExecuted = $this->db->ExecuteQuery ( $sql, $params );
		
		if ($isExecuted) {
		
			$output = 'Item was updated successfully.';
		
			//header ( 'Location: showcase.php' );
			
		} else {
		
			$output = 'Error updating Item!' . print_r($this->db->ErrorInfo(), 1);
		}
		
		return $output;
	}
	
	
	public function deleteItem(){
		
		
	}
	
	
	/**
	 * Function to create links for sorting
	 *
	 * @param string $column the name of the database column to sort by
	 * @return string with links to order by column.
	 */
	function orderby($column) {
	  $nav  = "<a href='" . $this->getQueryString(array('orderby'=>$column, 'order'=>'asc')) . "'>&darr;</a>";
	  $nav .= "<a href='" . $this->getQueryString(array('orderby'=>$column, 'order'=>'desc')) . "'>&uarr;</a>";
	  return "<span class='orderby'>" . $nav . "</span>";
	}
	
	
	/**
	 * 
	 * @return unknown
	 */
	function selectLatestItems()
	{
		$sql='SELECT * FROM aItem
     ORDER BY title DESC
    LIMIT 20';
		
		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array());
		
		return $res;
	}
	
	/**
	 *
	 * @return unknown
	 */
	function selectLatestItemsIndex()
	{
	   $sql='SELECT * FROM aItem
     ORDER BY title DESC
    LIMIT 6';
	
	   $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array());
	
	   return $res;
	}
	
	
	/**
	 * Select item by id
	 * @param unknown $id
	 * @return unknown|NULL
	 */
	function selectItemId($id){
	   
	  // echo  "id from CItem is : " . $id;
		
	   //query
		$sql = 'SELECT * FROM aItem WHERE id = ?';
		$params = array($id);
		
		//execute query
		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql, $params);
		        
	        if(isset($res[0])) {
	           $c = $res[0];
	           return $c;
	        }
	        else {
	           die('Error: no  content with id '.$id);
	           return null;
	        }
	}
	
	
	/**
	 *
	 * @param unknown $id
	 * @return unknown|NULL
	 */
	function selectCategory($name){
	
		$sql = 'SELECT * FROM aItem WHERE type LIKE ? ORDER BY ASC';
	
		$res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($name));
	
	
		if(isset($res[0])) {
			$c = $res[0];
			return $c;
		}
		else {
			die('Error: no  content with that category '.$name);
			return null;
		}	
	}
}

