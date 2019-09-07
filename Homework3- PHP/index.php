<?php

error_reporting(E_PARSE | E_ERROR);

// sunayanaebay.us-east-2.elasticbeanstalk.com


$keyword_temp= $_POST['keyword']; 
$keyword= str_replace(" ","+",$keyword_temp);
//$keyword=urlencode($keyword_temp);
$category= $_POST['category']; 
$new="New";
$used="Used";
$unspecified="Unspecified";
$free=$local='true';
$zip= $_POST['zip'];
$distance="10";
$zip_new="";



if(isset($_POST['distance']))
$distance = $_POST['distance'];


if(isset($_POST['local']) && !isset($_POST['free']) ){
$local= 'true'; 
$free='false';
}
elseif(isset($_POST['free']) && !isset($_POST['local'])){
$free= 'true'; 
$local='false';
}
else
{
	$free=$local='true';
}

if(isset($_POST['location'])&& $_POST['location']!="here"){
	$zip= $_POST['location'];
}

if(isset($_POST['location'])&& $_POST['location']=="here"){
	$zip= $_POST['zip'];
}
if(isset($_POST['distance']))
$distance = $_POST['distance'];
else if(empty($distance))
$distance="10";

//echo $keyword.",,".$category.",,".$new,$used,$unspecified.",,".$free,$local.",,".$distance.",,".$zip;


if(isset($_POST['new']) &&  !isset($_POST['used']) && !isset($_POST['unspecified'])  )
{
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New';

		else
			$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New';

}
elseif(isset($_POST['used'])&& !isset($_POST['new'])&& !isset($_POST['unspecified']) )
{	
if($category!='all')
	$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used';
else
$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used';

}

elseif(isset($_POST['unspecified']) && !isset($_POST['new']) && !isset($_POST['used'])  )
{
	
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Unspecified';

	else
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Unspecified';

}
elseif(isset($_POST['new']) &&  isset($_POST['used']) && !isset($_POST['unspecified'])  )
{
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used';

	else
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used';

}
elseif(!isset($_POST['new']) &&  isset($_POST['used']) && isset($_POST['unspecified'])  )
{
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&itemFilter(4).value(1)=Unspecified';

	else
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&itemFilter(4).value(1)=Unspecified';

}
elseif(isset($_POST['new']) &&  !isset($_POST['used']) && isset($_POST['unspecified'])  )
{
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Unspecified';

	else
	$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Unspecified';

}
else
{
	if($category!='all')
		$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&categoryId='.$category.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='.$free.'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='.$local.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified';

	else
	$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords='.$keyword.'&buyerPostalCode='.$zip.'&itemFilter(0).name=MaxDistance&itemFilter(0).value='.$distance.'&itemFilter(1).name=LocalPickupOnly&itemFilter(1).value='.$local.'&itemFilter(2).name=FreeShippingOnly&itemFilter(2).value='.$free.'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified';

}
//echo $api_request;
//$api_request='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=iphone&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value=10&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=true&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=true&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified';


$temp = file_get_contents($api_request);
$results_table_json_obj = json_decode($temp,true);

    file_put_contents('result_table.json',$temp);
	
$keyword1=$_GET['keyword'];
$distance1= $_GET['distance'];

$id_item= $_GET['id'];
$item_api_request='http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=Sunayana-hw6-PRD-216e08212-6b05c9c0&siteid=0&version=967&ItemID='.$id_item.'&IncludeSelector=Description,Details,ItemSpecifics';
$item_temp=file_get_contents($item_api_request);
$items_table_json_obj= json_decode($item_temp,true);


$similar_item_api_request='http://svcs.ebay.com/MerchandisingService?OPERATION-NAME=getSimilarItems&SERVICE-NAME=MerchandisingService&SERVICE-VERSION=1.1.0&CONSUMER-ID=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&itemId='.$id_item.'&maxResults=8';
$sitem_temp=file_get_contents($similar_item_api_request);
$similar_items_table_json_obj= json_decode($sitem_temp,true);


if(isset($_POST['clear']))
{
	if(isset($_POST['location'])&& $_POST['location']!="here")
	$_POST['location']="here";
}

?>

<html>
<head>
<title>hw6</title>
<style>
form
{
	text-align: left;
    margin-left: 20px;        
    margin-top: -10px;        
	line-height: 150%;
}
#form1 h1 
{
	text-align: center;
	padding-bottom:10px;
    border-bottom: 3px solid lightgrey;
	font-weight: lighter;
}
#form1 #not_here_button{
padding-left:1010px;
}
#table, td, th 
{
   border:1px solid lightgray;
}       
        
th
{
  text-align: center;
          
}
#table1 td
{
   text-align: left;
   height: 50px;
   padding-left: 5px;
   
}	
#table2 td
{
   text-align: left;
   
   padding-left: 15px;
   
}	
#table2 table td th
{
	text-align:left;
	
}
#table1 table tr td img 
{
   width: 70px;
}

#table1 table tr td a 
{
  text-decoration:none;
  color:black;
}
#table1 table tr td a:hover 
{ 
   color: grey; 
}
#table1 table, td, th 
{
   border:1px solid lightgray;
}       
 
#table2 {
	text-align: center;
	}

#table2 table tr td img 
{
	height: 250px;
	width:300px;
}
 iframe { overflow: hidden;  width:1000px; margin-left: auto; margin-right:auto; border: none; }
#similar_table table 
   {
	   width:900px; 
	   border: 1px solid black;
	   overflow-x: scroll; 
	   padding-left:40px; 
	   display: block; 
	 }
#similar_table table tr, #similar_table table tr td 
{
	padding:10px;
	padding-right:70px;
	text-align: center; 
	border: none;
	outline: none; 
	border-collapse: collapse; 
	
}
#similar_table table tr td img { width: auto; height: 180px; }
#similar_table table tr td a { text-decoration: none; color: black; }
#similar_table table tr td a:hover { color: grey; }
	
		
#table3
{
	border: 2px solid lightgrey;
	display:none;
	width: 850px;
	margin-left:auto;
	margin-right:auto;
}

#not_here_button{
	margin-left:425px;
}

</style>
</head>
<body>
<br/>
<br/>
<div style="text-align:center; background-color: #FAFAFA; border: 4px solid lightgrey; height:300px;width:690px; margin-left:auto; margin-right:auto;">
<form method="POST" action="<?php $_SERVER['PHP_SELF'];  ?>" id="form1">
<h1> <i>Product Search</i> </h1>

<b> Keyword </b><input type="text" name ="keyword" id="keyword" value="<?php if(empty($keyword1)) echo $keyword_temp; else echo $keyword1;?>" required> <br/>

<b> Category </b>
<select name="category" id="category" > 

				<option  value="all" <?php  if(isset($_POST['category']) && $_POST['category'] == 'all') echo 'selected="selected"'; else if($_GET['category']=='all') echo 'selected="selected"'; else echo '';?>   >All Categories</option>
				<option  value="550" <?php  if(isset($_POST['category']) && $_POST['category'] == '550') echo 'selected="selected"'; else if($_GET['category']=='550') echo 'selected="selected"'; else echo '';?> >Art</option>
				<option  value="2984" <?php  if(isset($_POST['category']) && $_POST['category'] == '2984') echo 'selected="selected"';else if($_GET['category']=='2984') echo 'selected="selected"'; else echo '';?> >Baby</option>
				<option  value="267" <?php  if(isset($_POST['category']) && $_POST['category'] == '267') echo 'selected="selected"'; else if($_GET['category']=='267') echo 'selected="selected"'; else echo '';?> >Books</option>
				<option  value="11450" <?php  if(isset($_POST['category']) && $_POST['category'] == '11450') echo 'selected="selected"'; else if($_GET['category']=='11450') echo 'selected="selected"'; else echo '';?> >Clothing, Shoes & Accessories</option>
				<option  value="58058" <?php  if(isset($_POST['category']) && $_POST['category'] == '58058') echo 'selected="selected"'; else if($_GET['category']=="58058") echo 'selected="selected"'; else echo '';?> >Computers/Tablets & Networking</option>
				<option  value="26395" <?php  if(isset($_POST['category']) && $_POST['category'] == '26395') echo 'selected="selected"'; else if($_GET['category']=='26395') echo 'selected="selected"'; else echo '';?> >Health & Beauty</option>
				<option  value="11233" <?php  if(isset($_POST['category']) && $_POST['category'] == '11233') echo 'selected="selected"'; else if($_GET['category']=='11233') echo 'selected="selected"'; else echo '';?> >Music</option>
				<option  value="1249" <?php  if(isset($_POST['category']) && $_POST['category'] == '1249') echo 'selected="selected"'; else if($_GET['category']=='1249') echo 'selected="selected"'; else echo '';?> >Video Games & Consoles</option>       
</select>
<br/>
<b> Condition </b>  &nbsp;&nbsp;&nbsp

 <input type=checkbox name=new id="new"  <?php if(isset($_POST['new'])) echo "checked='checked'"; else if($_GET['new']=='true') echo "checked='checked'";  ?> > New &nbsp;&nbsp;
<input type=checkbox name=used id="used"  <?php if(isset($_POST['used'])) echo "checked='checked'"; else if($_GET['used']=='true') echo "checked='checked'"; ?> >Used  &nbsp;&nbsp;
<input type=checkbox name=unspecified id="unspecified" <?php if(isset($_POST['unspecified'])) echo "checked='checked'"; else if($_GET['unspecified']=='true') echo "checked='checked'";  ?> >Unspecified<br/>

<b> Shipping Options </b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <input type=checkbox name=local id="local" <?php if(isset($_POST['local'])) echo "checked='checked'";else if($_GET['local']=='true') echo "checked='checked'"; ?> >Local pickup &nbsp;&nbsp;
<input type=checkbox name=free id="free" <?php if(isset($_POST['free'])) echo "checked='checked'"; else if($_GET['free']=='true') echo "checked='checked'"; ?>>Free Shipping &nbsp;&nbsp; <br/>

<input type=checkbox name=nearby id="nearby" onclick="check()" <?php if(isset($_POST['nearby'])) echo "checked='checked'";else if($_GET['nearby']=='true') echo "checked='checked'"; ?> ><b> Enable Nearby Search</b>

<input type="text" name="distance" placeholder="10"  id="distance" value="<?php if(empty($distance1)) echo $distance; else echo $distance1;?>" <?php if($_GET['nearby']=='true') echo '' ; else echo 'disabled'; ?> ><b>&nbsp;miles from</b>
<input type="radio" name="location" value="here"  onclick="here()" id="here_button"  <?php if(isset($_POST['location']) && $_POST['location']=="here") echo "checked='checked'"; else if($_GET['zip']!='') echo""; else if(! isset($_POST['location'])) echo "checked='checked'"; ?> <?php if($_GET['nearby']=='true') echo '' ; else echo 'disabled'; ?> >Here 
<br/>
<input type="radio"  name="location" value="not_here" <?php if(isset($_POST['location']) && $_POST['location']!="here") echo "checked='checked'"; else if($_GET['zip']!='') echo "checked='checked'";?> onclick="not_here()" id="not_here_button" <?php if($_GET['nearby']=='true') echo '' ; else echo 'disabled';?>>
<input type="text" name="location" name="znew" placeholder="zip code" id="location_text"  value="<?php if(isset($_POST['location']) && $_POST['location']!="here") echo $zip;else if($_GET['zip']!='zero') echo $_GET['zip']; else if(isset($_POST['location']) && $_POST['location']=="here") echo '';?>" required="required" <?php if(isset($_POST['location']) && $_POST['location']!='here') echo '';else if($_GET['zip']!='') echo ''; else echo 'disabled'; ?> >

<br/><br/>

<input type="submit" value="Search" id="submit" name="submit" onclick="submitted()" style="margin-left:250px;" >&nbsp;
<input type="button" value="Clear" id="clear" name="clear" onclick="clearnow()" >
<input type="text" name="zip" id="zip" style="display:none">
<input type="text" name="ids" id="ids" style="display:none">
</form>
</div>

<p id="table1">
</p>

<p id="table2">
</p>

<p id="table3">
</p>


<script type="text/javascript">


var xmlhttp;
document.getElementById("submit").disabled = true;

   xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET", "http://ip-api.com/json", false);
    xmlhttp.send();
	
if (xmlhttp.readyState == 4 && xmlhttp.status==200 )
{
    var jsonObj = JSON.parse(xmlhttp.responseText);
    document.getElementById("submit").disabled = false;
}



function submitted()
		{
			document.getElementById("zip").value = jsonObj.zip;
		document.getElementById("keyword").required= true;
		
		}

	
json=<?php echo json_encode($results_table_json_obj) ?>;	
ijson=<?php echo json_encode($items_table_json_obj) ?>;		
sijson=<?php echo json_encode($similar_items_table_json_obj) ?>;		


function check()
{
	if(document.getElementById("nearby").checked==true){
	document.getElementById("here_button").checked=true;
	document.getElementById("here_button").disabled=false;	
	document.getElementById("distance").disabled=false;
	document.getElementById("not_here_button").disabled = false;
	 }
	else
	{
	document.getElementById("distance").value="10";
	document.getElementById("distance").disabled=true;
	document.getElementById("here_button").checked=true;
	document.getElementById("here_button").disabled=true;	
	document.getElementById("not_here_button").disabled = true;
	document.getElementById("location_text").value = "";
	document.getElementById("location_text").disabled = true;
	}
}


if(document.getElementById("here_button").checked)
{
   document.getElementById("location_text").disabled = true;
}
if(document.getElementById("not_here_button").checked)
{
   document.getElementById("location_text").disabled = false;
}
function here() 
{
   document.getElementById("location_text").disabled = true;
   document.getElementById("not_here_button").checked = false;
    document.getElementById("location_text").value="";
   
}
function not_here()
{
	
   document.getElementById("location_text").disabled = false;
   document.getElementById("here_button").checked = false;
   
}
function clearnow()
{
	document.getElementById("keyword").required= false;
	document.getElementById("keyword").value = "";
	document.getElementById("category").selectedIndex = "all";
	document.getElementById("new").checked = false;
	document.getElementById("used").checked = false;
	document.getElementById("unspecified").checked = false;
	document.getElementById("local").checked = false;
	document.getElementById("free").checked = false;
	document.getElementById("nearby").checked = false;
	document.getElementById("distance").disabled=true;
	document.getElementById("here_button").checked = true;
	document.getElementById("not_here_button").checked = false;
	document.getElementById("here_button").disabled=true;
	document.getElementById("location_text").value="";			
	document.getElementById("location_text").disabled = true;
	document.getElementById("not_here_button").disabled = true;
	document.getElementById("table1").style.display= "none";
	document.getElementById("table2").style.display= "none";
	document.getElementById("table3").style.display= "none";
}


function table1_result()
{
	document.getElementById("table2").style.display= "none";
	document.getElementById("table1").style.display= "block";
	if(document.getElementById("nearby").checked)
	{
		document.getElementById("distance").disabled=false;
		document.getElementById("here_button").disabled=false;	
		document.getElementById("not_here_button").disabled=false;	
		if(document.getElementById("not_here_button").checked)
		{
			document.getElementById("here_button").checked=false;
		document.getElementById("location_text").disabled = false;
	
		}
	
	}
	

 if (json.findItemsAdvancedResponse[0].ack[0] == "Failure" && json.findItemsAdvancedResponse[0].errorMessage[0].error[0].errorId[0] == "18")
			{
				document.getElementById("table3").style.display= "block";
				var txt= "<html ><table style='width:850px;margin-left:auto;margin-right:auto;background-color:#e1e1e1;border-collapse:collapse;'> <tr><td style='text-align:center;'>  Zipcode is invalid</td></tr></table></html>";
				document.getElementById("table3").innerHTML=txt;
				return;
			}
				
			
if (json.findItemsAdvancedResponse[0].ack[0] == "Success")
	{
		if ("item" in json.findItemsAdvancedResponse[0].searchResult[0])
			{
		
			var results_text="<table border='1' style='border-collapse:collapse;width:1200px;margin-left:auto;margin-right:auto; '> <tr> ";
			results_text += "<th><b>Index</b></th>";
			results_text += "<th><b>Photo</b></th>";
			results_text += "<th><b>Name</b></th>";
			results_text += "<th><b>Price</b></th>";
			results_text += "<th><b>Zip code</b></th>";
			results_text += "<th><b>Condition</b></th>";
			results_text += "<th><b>Shipping option</b></th>";
			results_text += "</tr>";
			
			var items = json.findItemsAdvancedResponse[0].searchResult[0].item;

			for (var i = 0; i < items.length; i++)
			{
				results_text += "<tr>";
				results_text += "<td>" + (i+1) + "</td>";
				if("galleryURL" in items[i])
					results_text+= "<td><img src='" +items[i].galleryURL[0]+"'> </td>";
				else
					results_text+="<td> N/A </td>";
			
			
				results_text+="<td> <a style='cursor:pointer;' onclick='table2_item("+i+")'> "; 
				if("title" in items[i])
					results_text+= items[i].title[0]+"</a></td>";
				else
					result_text+="N/A"+"</a></td>";
				
				
				results_text += "<td>$" + ((("sellingStatus") in items[i]) ? items[i].sellingStatus[0].currentPrice[0].__value__ : "N/A") +"</td>";
				results_text += "<td>" + ((("postalCode") in items[i]) ? items[i].postalCode[0] : "N/A") +"</td>";
				results_text += "<td>" + ((("condition") in items[i]) ? items[i].condition[0].conditionDisplayName : "N/A") + "</td>";
				
				/*result_text+="<td>";
				if("shippingInfo" in items[i])
				{
					if(Number(items[i].shippingInfo[0].shippingServiceCost[0].__value__) == 0)
						results_text += "Free Shipping" +" </td>";
					else
						result_text+="$" + Number(items[i].shippingInfo[0].shippingServiceCost[0].__value__) + "</td>";
				}
				else
				{
					results_text+="N/A "+"</td>";
				} */
				results_text += "<td>" + ((("shippingInfo") in items[i]) ? ((Number(items[i].shippingInfo[0].shippingServiceCost[0].__value__) == 0) ? "Free Shipping" : ("$" + Number(items[i].shippingInfo[0].shippingServiceCost[0].__value__))) : "N/A") +"</td>";
				
				
				results_text += "</tr>";
			}
			results_text += "</table>";
			document.getElementById("table1").innerHTML = results_text;
			
		}
		else{
				document.getElementById("table3").style.display= "block";
				var txt= "<html ><table style='width:850px;margin-left:auto;margin-right:auto;background-color:#e1e1e1;border-collapse:collapse;'> <tr><td style='text-align:center;'> No Records has been found</td></tr></table></html>";
				document.getElementById("table3").innerHTML=txt;
				return;
		}
	}
	else
	{
		document.getElementById("table3").style.display= "block";
				var txt= "<html ><table style='width:850px;margin-left:auto;margin-right:auto;background-color:#e1e1e1;border-collapse:collapse;'> <tr><td style='text-align:center;'>  No Records has been found</td></tr></table></html>";
				document.getElementById("table3").innerHTML=txt;
				return;
	}
}


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"):
?>
    
	table1_result();
	
<?php
endif;

?>

<?php
if($_GET['id']!=null):
?>
    
	table2_content();
	
<?php
endif;

?>

	var keyword= document.getElementById("keyword").value;
	var category= document.getElementById("category").value;
	var new1= document.getElementById("new").checked;
	var used= document.getElementById("used").checked ;
	var unspecified= document.getElementById("unspecified").checked ;
	var local= document.getElementById("local").checked;
	var free= document.getElementById("free").checked ;
	var nearby= document.getElementById("nearby").checked ;
	var distance= document.getElementById("distance").value;
	var zip= document.getElementById("location_text").value;
	
 function setheight(iframe)
        {
            if (iframe == null) 
			{
				return;
			}

            var height = Math.max(iframe.contentWindow.document.body.scrollHeight, iframe.contentWindow.document.body.offsetHeight);
            
            iframe.style.height = (height) +20+ "px";
        }

function change(l)
{
	if(l==0 && document.getElementById("arrow0").alt=="down")
	{
		document.getElementById("arrow0").alt="up";
		document.getElementById("arrow0").src="http://csci571.com/hw/hw6/images/arrow_up.png";
		document.getElementById("seller_text").innerHTML="click to hide seller message";
		document.getElementById("content").style.display = "block";
		 setheight(document.getElementById("frame"));
		
		document.getElementById("arrow1").alt="down";
		document.getElementById("arrow1").src="http://csci571.com/hw/hw6/images/arrow_down.png";
		document.getElementById("similar_text").innerHTML="click to show similar items";
		document.getElementById("similar_content").style.display = "none";
		
	}
	else if(l==0 && document.getElementById("arrow0").alt=="up")
	{
		document.getElementById("arrow0").alt="down";
		document.getElementById("arrow0").src="http://csci571.com/hw/hw6/images/arrow_down.png";
		document.getElementById("seller_text").innerHTML="click to show seller message";
		document.getElementById("content").style.display = "none";
		
	}
	else if(l==1 && document.getElementById("arrow1").alt=="down")
	{
		document.getElementById("arrow1").alt="up";
		document.getElementById("arrow1").src="http://csci571.com/hw/hw6/images/arrow_up.png";
		document.getElementById("similar_text").innerHTML="click to hide similar items";
		document.getElementById("similar_content").style.display = "block";
		
		document.getElementById("arrow0").alt="down";
		document.getElementById("arrow0").src="http://csci571.com/hw/hw6/images/arrow_down.png";
		document.getElementById("seller_text").innerHTML="click to show seller message";
		document.getElementById("content").style.display = "none";
	}
	else
	{
		document.getElementById("arrow1").alt="down";
		document.getElementById("arrow1").src="http://csci571.com/hw/hw6/images/arrow_down.png";
		document.getElementById("similar_text").innerHTML="click to show similar items";
		document.getElementById("similar_content").style.display = "none";
		
	}
	
}

		
function similar_click(index)
{
//window.location.href = "http://localhost/index.php/?id="+index+"&keyword="+keyword+"&category="+category+"&new="+new1+"&used="+used+"&unspecified="+unspecified+"&local="+local+"&free="+free+"&nearby="+nearby+"&distance="+distance+"&zip="+zip;
window.location.href = "http://sunayanaebay.us-east-2.elasticbeanstalk.com/?id="+index+"&keyword="+keyword+"&category="+category+"&new="+new1+"&used="+used+"&unspecified="+unspecified+"&local="+local+"&free="+free+"&nearby="+nearby+"&distance="+distance+"&zip="+zip;

}
function getsimilaritems()
		{
			
			var similarItems = sijson.getSimilarItemsResponse.itemRecommendations.item;

			if (similarItems.length == 0)
			{
				//document.getElementById("table3").style.display= "block";
				//var txt= "<table style='border-spacing:10px;text-align:center;'><tr><td><h3 align='center' style=\" margin:auto; text-align:center; width: 830px; \">No Similar Item found. </h3></td></tr></table>";
				//document.getElementById("table3").innerHTML=txt;
//return "<table><tr><td><h2 style=\"border: 1px solid black; width: 600px; margin: auto;\">No similar items found</h2></td></tr></table>";
	return "";					
				}

			var html_text = "<table><tr>";
			for (var i=0; i < similarItems.length; i++)
			{
				html_text += "<td><img src='" + similarItems[i].imageURL + "'></td>";
			}
			html_text += "</tr><tr>";

			for (var i=0; i < similarItems.length; i++)
			{
				html_text += "<td> <a href=''  onclick=\"similar_click(" + similarItems[i].itemId + ")\">" + similarItems[i].title + "</a></td>";
			}
			html_text += "</tr><tr>";
			
			for (var i=0; i < similarItems.length; i++)
			{
				html_text += "<td><b>$" + similarItems[i].buyItNowPrice.__value__ + "<b></td>";
			}
			html_text += "</tr></table>";

			return html_text;
		}
function table2_item(index)
{
	document.getElementById("table2").style.display= "block";
	//var id_temp=232215113932;
	document.getElementById("ids").value=json.findItemsAdvancedResponse[0].searchResult[0].item[index].itemId;
	var id_temp= json.findItemsAdvancedResponse[0].searchResult[0].item[index].itemId;
	//window.location.href = "http://localhost/index.php/?id="+id_temp+"&keyword="+keyword+"&category="+category+"&new="+new1+"&used="+used+"&unspecified="+unspecified+"&local="+local+"&free="+free+"&nearby="+nearby+"&distance="+distance+"&zip="+zip;
window.location.href = "http://sunayanaebay.us-east-2.elasticbeanstalk.com/?id="+id_temp+"&keyword="+keyword+"&category="+category+"&new="+new1+"&used="+used+"&unspecified="+unspecified+"&local="+local+"&free="+free+"&nearby="+nearby+"&distance="+distance+"&zip="+zip;

}
 
function table2_content()
{
	//document.getElementById("table1").style.display= "none";
			
			if ("Item" in ijson)
			{
			var html_text = "<span style='font-size:35px;'><b>Item Details</b></span>";
			html_text+="<table  style=' border-collapse:collapse;width:750px;margin-left:auto;margin-right:auto; '> ";

            if ("PictureURL" in ijson.Item)
				{ 
					html_text += "<tr><td><b>Photo</b></td><td style='padding-top:10px;padding-bottom:10px;'>";
					html_text+= "<img src=\"" + ijson.Item.PictureURL[0] + "\"></td></tr>"; 
				}
            
            if ("Title" in ijson.Item)
				{ 
					html_text += "<tr><td><b>Title</b></td><td>" + ijson.Item.Title + "</td></tr>";
				}
            
            if ("Subtitle" in ijson.Item)
				{
					html_text += "<tr><td><b>Subtitle</b></td><td>" + ijson.Item.Subtitle + "</td></tr>"; 
				}
            
            if ("CurrentPrice" in ijson.Item)
				{
					html_text += "<tr><td><b>Price</b></td><td>" + Number(ijson.Item.CurrentPrice.Value) + " " + ijson.Item.CurrentPrice.CurrencyID + "</td></tr>"; 
				}
            
            if ("Location" in ijson.Item)
				{
					html_text += "<tr><td><b>Location</b></td><td>" + ijson.Item.Location;
					if ("PostalCode" in ijson.Item) 
					{
						html_text += ", " + ijson.Item.PostalCode;
					}
					html_text += "</td></tr>"; 
				}
            
            if ("Seller" in ijson.Item && "UserID" in ijson.Item.Seller)
				{ 
					html_text += "<tr><td><b>Seller</b></td><td>" + ijson.Item.Seller.UserID + "</td></tr>";
				}
            
            if ("ReturnPolicy" in ijson.Item && "ReturnsAccepted" in ijson.Item.ReturnPolicy) 
            { 
                html_text += "<tr><td><b>Return Policy (US)</b></td><td>" +  ((ijson.Item.ReturnPolicy.ReturnsAccepted == "ReturnsNotAccepted") ? "Returns not accepted" : "Returns accepted" + ("ReturnsWithin" in ijson.Item.ReturnPolicy ? " within " + ijson.Item.ReturnPolicy.ReturnsWithin.toLowerCase() : ""));
                
                html_text += "</td></tr>";
            }

			if ("ItemSpecifics" in ijson.Item)
			{
				for(var i = 0; i < ijson.Item.ItemSpecifics.NameValueList.length; i++)
				{
					html_text += "<tr><td><b>" + ijson.Item.ItemSpecifics.NameValueList[i].Name + "</b></td><td>" + ijson.Item.ItemSpecifics.NameValueList[i].Value[0] + "</td></tr>";
				}
			}
            
            html_text += "</table>";
	
			}
			else
			{
				document.getElementById("table3").style.display= "block";
				var txt= "<html ><table style='width:850px;margin-left:auto;margin-right:auto;background-color:#e1e1e1;border-collapse:collapse;'> <tr><td style='text-align:center;'> Requested Item is no longer available</td></tr></table></html>";
				document.getElementById("table3").innerHTML=txt;
				return;
				
			}
			
	
			html_text+="<br/><div id='seller_text' style='color:grey;' > click to show seller message </div> <br/><div> <img id='arrow0' src=\"http://csci571.com/hw/hw6/images/arrow_down.png\" alt=\"down\" style=\" width:55px; height:25px;\" onclick= \" change(0) \" > </div>";
	
			html_text += "<div id=\"content\" style=\"display:none;\">"; 
			
			  if ("Description" in ijson.Item && ijson.Item.Description.length > 0)
            {
				
                html_text += "<br/><iframe id='frame' style='width:1000px;'  scrolling='no' srcdoc='" + ijson.Item.Description.replace(/'/g, "\"") + "'></iframe>";
				
			}
            else
            {
				
                html_text += "<iframe  style='height:50px;' scrolling='no' srcdoc='<div style=\"margin: auto; margin: 2px solid grey; text-align: center; padding:5px;width: 900px; background-color: #DDDDDD;\"><b>No seller message found</b></div>'></iframe>";
            }
			html_text+="</div>";
			var sim_items = getsimilaritems();
		
			html_text+="<br/><div id='similar_text' style='color:grey;' > click to show similar items </div> <br/><div> <img id=\"arrow1\" src=\"http://csci571.com/hw/hw6/images/arrow_down.png\" alt=\"down\" style=\" width:55px; height:25px;\" onclick= \" change(1) \" > </div>";
			
			html_text += "<div id=\"similar_content\" style=\"display:none;\">"; 
			if(sim_items=="")
				html_text+= "<br/><div  style=\" width:830px; margin:auto;\"><table> <tr> <td><table style='border-spacing:8px;text-align:center;'><tr><td><h3 align='center' style=\" margin:auto; margin-left:0px; text-align:center; width: 780px; \">No Similar Item found. </h3></td></tr></table></td></tr></table></div>";
			else
			html_text += "<br/><div id=\"similar_table\" style=\" padding-left:225px;\">" + sim_items + "</div>";
			html_text+="</div>";
			document.getElementById("table2").innerHTML = html_text;

}

		window.onload = function() {
				  
			var xmlhttp;
			document.getElementById("submit").disabled = true;

   xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET", "http://ip-api.com/json", false);
    xmlhttp.send();
	
   var jsonObj = JSON.parse(xmlhttp.responseText);
    document.getElementById("submit").disabled = false;

			
}
</script>

</body>