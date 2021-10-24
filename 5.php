<?Php
require_once 'phpquery.Php';

$num=[];
$number=[];
$logo_url=[];
$name=[];
$classes = [];
$status1=[];
$status2=[];
$details_page_url=[];


for($m=0;$m<9;$m++){

$link="https://search.ipaustralia.gov.au/trademarks/search/result?s=397def87-66e5-4514-b0e9-a816c1deea44&p=".$m;

echo $link."<Br>";

$html = file_get_contents($link);
$doc = phpquery::newdocument($html);


$text=[];

$tbody = $doc->find('tbody');

foreach ($tbody as $id) {

		$pqid = pq($id); //pq делает объект phpquery

		$text[] = $pqid->attr("id");
		
	}




	
	for($i=0;$i<count($text);$i++){
	
	$val='#'.$text[$i];
	
	$tbody = $doc->find($val);
	
	
	
	$td1 = $tbody->find('td.col.c-5.table-index');


	
	$img1 =  $td1->find("span" );
	
	
		$pqimg1 = pq($img1); //pq делает объект phpquery

		$num[] = $pqimg1->html();


        $td2 = $tbody->find('td.number');


	
	$img2 =  $td2->find("a" );
	
	
		$pqimg2 = pq($img2); //pq делает объект phpquery

		$number[] = $pqimg2->html();




         

         $details_page_url[] =  "https://search.Ipaustralia.Gov.Au".$pqimg2->attr("href");;



       $td3 = $tbody->find('td.trademark.image');


	
	$img3 =  $td3->find("img");
	
	
		$pqimg3 = pq($img3); //pq делает объект phpquery

		$logo_url[] = $pqimg3->attr("src");


       $td4 = $tbody->find('td.trademark.words');


	
	
		
	      $name[] = $td4->html();





	$td5 = $tbody->find('td.classes');


	
	
		

		
	      $classes[] = $td5->html();


      
       $td6 = $tbody->find('td.status');


	
	$img6 =  $td6->find("i");

	
		$pqimg6 = pq($img6); //pq делает объект phpquery

		$status1[] = $pqimg6->attr("class");


            //$td7 = $tbody->find('td.Status');
          
              $img7 =  $td6->find("span");

                // $img7 = $td6;
        
	
	
		$pqimg7 = pq($img7); //pq делает объект phpquery

		$status2[] = $pqimg7->html();


		
	}
	
}	



$i=0;
 $arr=[];
 foreach($number as $item){
	 $arr[$i]["number"]=$item;
	 $arr[$i]["logo_url"]=$logo_url[$i];
	  $arr[$i]["name"]=$name[$i];
	  $arr[$i]["classes"]=$classes[$i];
	  $arr[$i]["status1"]=$status1[$i];
	  $arr[$i]["status2"]=$status2[$i];
	  $arr[$i]["details_page_url"]=$details_page_url[$i];
	  $i++;
	  
 }


print_r($arr);



/*





print_r($num);	

echo "<br><br><br>";

print_r($number);	

echo "<br><br><br>";

print_r($logo_url);

echo "<br><br><br>";

print_r($name);
echo "<br><br><br>";

print_r($classes);
	

echo "<br><br><br>";

print_r($status1);
	

echo "<br><br><br>";


print_r($status2);

echo "<br><br><br>";

print_r($details_page_url);

echo "<br><br><br>";

echo "<br>++++++++++++++++++++++++++++++++";

*/

?>

