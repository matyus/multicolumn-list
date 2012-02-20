<!doctype html>  
<?php
  function buildList($data){
/*    
 *    This list is built using the Multi-column list concept devised by 
 *    Paul Novitski (http://www.alistapart.com/articles/multicolumnlists/)
 */       
    array_unshift($data, "");
    //in order to count the stack properly 
    //we need to shove an empty item into the front of the array
    
    $listLength = count($data,$marginTop);
    //count the number of items
    
    $actualLength = ($listLength-1);
    //store the actually number of items
      
    $itemPerCol = ceil($actualLength/3);
    //divide and round the actual number of items by the number of columns, 3
      
    $marginTop = ($itemPerCol*1);
    //the marginTop is the height of the reset: 
    //number of items per column * the height of each item in ems

    echo '<ul class="list clearfix">'.PHP_EOL;
    //start the list
    
    for($i = 1, $j = 0, $class = 'column-one'; $i < $listLength; $i++){
      
      //j++, each time there's a new column,
      //each each item in each column gets its own class name
      if($j == 0){
        $class = 'column-one';
      }else if($j == 1){
        $class = 'column-two';
      }else if($j == 2){
        $class = 'column-three';
      }

      //tag the first item of each column with the "reset" class
      //while excluding the first column,
      //also, take the $marginTop sum and apply it to these "reset" items
      if($i == $itemPerCol+1 || $i == ($itemPerCol*2)+1){
        $reset = ' reset';
        $marginReset = ' style="margin-top:-'.$marginTop.'em;"';
      }else{
        $reset = '';
        $marginReset = '';
      }
      
      //make sure you only add the reset class and margin to the right items
      if($i%$itemPerCol == 0){
        echo '      <li class="'.$class.$reset.'">'.$data[$i].'</li>'.PHP_EOL;
        $j++;
      }else{
        echo '      <li class="'.$class.$reset.'"'.$marginReset.'>'.$data[$i].'</li>'.PHP_EOL;
      }
    
    }
    echo '    </ul>'.PHP_EOL;
    //close the list
  }
  
?>

<html lang="en">
<head>
  <title>buildList</title>
  <style type="text/css">
  	body{font-size:100%;line-height:1em;}

	.list{margin:1em;}
	
	.list li{line-height:1em;}
		
	.list li.reset{margin-top:0;}
	
	.list li.column-one{margin-left:0;}
	.list li.column-two{margin-left:33%;}
	.list li.column-three{margin-left:66%;}
		
	@media only screen and (max-width: 480px) {
	
		.list li.reset{margin-top:0 !important;}
		.list li.column-one,
		.list li.column-two,
		.list li.column-three{margin-left:0;}
	}
		
	.clearfix:before, .clearfix:after { content: "\0020"; display: block; height: 0; overflow: hidden; }
	.clearfix:after { clear: both; }
	.clearfix { zoom: 1; }
	
  </style>
</head>

<body>

  <div id="container">
<?php
  $myList = array(
  	
  		'Argentina',
        'Australia',
        'Austria',
        'Brazil',
        'Canada',
        'Chile',
        'China',
        'France',
        'Germany',
        'Israel',
        'Italy',
        'Japan',
        'Mexico',
        'Russia',
        'Saudi Arabia',
        'South Korea',
        'Switzerland',
        'Spain',
        'Taiwan',
        'Thailand',
        'Turkey',
        'United Kingdom',
        'United States',
        'Venezuela'
  	
  );
  
  buildList($myList);
?>

  </div> <!-- end of #container -->

</body>
</html>