var app = angular.module('myApp', ['angular-svg-round-progressbar','ngAnimate']);

app.filter('myFormat', function() {
  return function(x) {
    var i, c;
	var temp=35;
	var l= x.length;
	if(l<35)
	{
		return x;
	}
	if(x[temp]==" ")
	{
    return x.substring(0,temp);
	}
	else
		{
    for (i = temp; i>0; i--) {
      c = x[i];
      if (c==" ") {
       return x.substring(0,i);
				}  
			}
		} 
  }
});

app.filter('myFilter', function() {
  return function(x) {
	return parseFloat(x);
  }
});

app.controller('myCtrl', function($scope,$http,$animate) {
	$scope.progress=false;
	$scope.details=false;
	$scope.product_details=false;
	$scope.results_table_content=false;
	$scope.auto_hide=true;
	$scope.show_wish_list=false;
	$scope.empty=false;
	$scope.google_empty=false;
	$scope.google_not_empty=true;
	$scope.show_wish_list=false;
	$scope.similar_empty=false;
	$scope.similar_not_empty=true;
	  $scope.regex = '\\d+';
	$scope.regex1 = '[A-Za-z0-9 ]+';
	$scope.zip="current_location";
	$scope.enableDetails=true;
	$scope.asc_desc_disable=true;
	$scope.results_table=false;
	$scope.count=0;
	$scope.details1=true;
	$scope.sort_by = "";

   
 
  $scope.default_values = {keyword:" ", category:"all", distance:"10", zip:"current_location", local:"", free:"", new1:"", used:"", unspecified:""};
  $scope.reset = function() {
	  $scope.auto_hide=true;
	  $scope.show_wish_list=false;
        $scope.user = angular.copy($scope.default_values);
		$scope.empty=false;
		$scope.google_empty=false;
	$scope.google_not_empty=true;
	$scope.similar_empty=false;
	$scope.similar_not_empty=true;
	$scope.enableDetails=true;
	$scope.asc_desc_disable=true;
	$scope.count=0;
	$scope.progress=false;
	$scope.details=false;
	$scope.product_details=false;
	$scope.results_table_content=false;
	$scope.results_table=false;
	$scope.details1=true;
    };
    $scope.reset();
	
	
$scope.auto_complete=function()
	{
		$scope.auto_hide=false;
		$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/auto?zip="+$scope.other_location_tb)
		.then(function (response)
		{
			if(response.data!=undefined && response.data.postalCodes[0]!=undefined)
				$scope.auto_list=response.data.postalCodes;
			
		}
	);
	}
	
	$scope.auto_click = function(x)
	{  
           $scope.other_location_tb= x;  
           $scope.auto_hide = true;  
      } 

$scope.current_loc = function()
	{  
         
           $scope.auto_hide = true;
			$scope.zip="current_location";
			$scope.other_location_tb=""
			$scope.form1.other_location_tb.$touched=false;
			
      }

$scope.other_loc = function()
	{  
			$scope.zip="other_location";
		
      }	  

	
		
	$scope.find_results = function () 
	{
	$scope.results_table_content=true;
    $scope.progress = true;
	$scope.details=true;
	var temp="";
	temp={};
	temp.keyword=$scope.user.keyword;
	temp.category=$scope.user.category;
	temp.distance=$scope.user.distance;
	temp.free=$scope.user.free;
	temp.local=$scope.user.local;
	temp.new1= $scope.user.new1;
	temp.used= $scope.user.used;
	temp.unspecified= $scope.user.unspecified;
	
	if($scope.zip=="current_location")
		{	
		$http.get("http://ip-api.com/json")
        .then(function(res) {
			
			$scope.t= res.data.zip;
			$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/find_results_now?keyword="+temp.keyword+"&category="+temp.category+"&loc="+$scope.t+"&distance="+temp.distance+"&free="+temp.free+"&local="+temp.local+"&new1="+temp.new1+"&used="+temp.used+"&unspecified="+temp.unspecified)
		.then(function (response)
		{
			 $scope.progress = false;
	
			console.log(response);
			$scope.resdata=response.data.findItemsAdvancedResponse[0];
		if($scope.resdata.ack[0]=="Success" && $scope.resdata.searchResult[0].item!=undefined)
		{
			$scope.results_table=response.data.findItemsAdvancedResponse[0].searchResult[0].item;
			$scope.empty=false;
			$scope.details=true;
		}
		else 
		{
			$scope.empty=true;
			$scope.details=false;
		}
		
		
		if($scope.empty==false){
				var array_item=response.data.findItemsAdvancedResponse[0].searchResult[0].item;
				$scope.currentpage=0;
				$scope.array_pageitem=[];
				$scope.array_pageitem.push([]);
				counter=0;
				for(i=0;i<array_item.length;i++){
					$scope.array_pageitem[counter].push(array_item[i])
					if(i<49 && (i+1)%10==0){
						$scope.array_pageitem.push([]);
						counter++;
					}

				}
				
				$scope.page_count=$scope.array_pageitem.length;
			}
		});
		
		
		
		
		
			
        });
		}
	
	if($scope.zip=="other_location")
		{
			temp.zip1=$scope.other_location_tb;
			$scope.t=($scope.other_location_tb);

	$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/find_results_now?keyword="+temp.keyword+"&category="+temp.category+"&loc="+$scope.t+"&distance="+temp.distance+"&free="+temp.free+"&local="+temp.local+"&new1="+temp.new1+"&used="+temp.used+"&unspecified="+temp.unspecified)
		.then(function (response)
		{
			 $scope.progress = false;
	
			//console.log(response);
			$scope.resdata=response.data.findItemsAdvancedResponse[0];
		if($scope.resdata.ack[0]=="Success" && $scope.resdata.searchResult[0].item!=undefined)
		{
			$scope.results_table=response.data.findItemsAdvancedResponse[0].searchResult[0].item;
				$scope.empty=false;
		}
		else 
		{
			$scope.empty=true;
		}
		
		if($scope.empty==false){
				var array_item=response.data.findItemsAdvancedResponse[0].searchResult[0].item;
				$scope.currentpage=0;
				$scope.array_pageitem=[];
				$scope.array_pageitem.push([]);
				counter=0;
				for(i=0;i<array_item.length;i++){
					$scope.array_pageitem[counter].push(array_item[i])
					if(i<49 && (i+1)%10==0){
						$scope.array_pageitem.push([]);
						counter++;
					}

				}
				
				$scope.page_count=$scope.array_pageitem.length;
			}
		});
		}
	}
	
	$scope.moveto=function(pno){
		console.log($scope.page_count);
		$scope.currentpage=pno;
	}
	

	
	var index = 0;
    $scope.wish = {};
	l = localStorage.length;
	if(l>0)
	{
	$scope.wish_empty=false;
	$scope.wish_not_empty=true;
	}
	else
	{
		$scope.wish_empty=true;
	$scope.wish_not_empty=false;
	}
for(i in localStorage)
	{
		
			if(index < l){
				$scope.wish[i]= JSON.parse(localStorage.getItem(i));
				$scope.count+=parseFloat($scope.wish[i].sellingStatus[0].currentPrice[0].__value__);
			}
			
			index ++;
			
    }
	

$scope.list_click = function () 
	{
		$scope.enableDetails=false;
		$scope.progress=true;
		$scope.results_table_content=true;
		//not required - delay -progressbar
		$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/find_delay?keyword=iphone&category=all&loc=90007&distance=10&free=true&local=true&new1=true&used=true&unspecified=true")
		.then(function (response)
		{
	
			$scope.resdata=response.data.findItemsAdvancedResponse[0];
		if($scope.resdata.ack[0]=="Success" && $scope.resdata.searchResult[0].item!=undefined)
		{
			$scope.delay_temp=response.data.findItemsAdvancedResponse[0].searchResult[0].item;
		 $scope.progress = false;
		 	
		}
			

		});
		
		$scope.product_details=false;
		$scope.show_wish_list=false;
	}
$scope.detail_click = function () 
	{
        $scope.product_details = true;
		$scope.results_table_content=false;
		
	}
$scope.add_wish = function (row) 
	{
		
		   localStorage.setItem(row.itemId,JSON.stringify(row));
		   $scope.wish[row.itemId]=row;
		   $scope.count+=parseFloat($scope.wish[row.itemId].sellingStatus[0].currentPrice[0].__value__);
		  
	}
	
$scope.wish_fun = function () 
	{
		$scope.show_wish_list=true;
		$scope.results_table_content=false;
		$scope.product_details=false;
		$scope.details=false;
		
	}
	
$scope.results_fun = function () 
	{
		$scope.show_wish_list=false;
		$scope.results_table_content=true;
		$scope.details=true;
		$scope.product_details=false;
		
	}
 $scope.remove_wish = function (i) 
	{
		$scope.count= $scope.count - parseFloat($scope.wish[i.itemId].sellingStatus[0].currentPrice[0].__value__);
		   localStorage.removeItem(i.itemId);
			delete $scope.wish[i.itemId];
		
    }
	
$scope.detail_change = function (y,i) 
	{
		$scope.show_wish_list=false;
		$scope.enableDetails= false;
		$scope.itemid=y;
		$scope.indice=i;
		$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/search_product_details?itemid="+y)
		.then(function (response)
		{
			 $scope.progress = false;
	
			//console.log(response);
			$scope.resdata=response.data;
		if( $scope.resdata.Item!=undefined)
		{
			$scope.product_details_table=response.data.Item;
	//$scope.facebook_link="https://www.facebook.com/dialog/share?app_id=2394460660784135&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df2b6ab35266bc9%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener&display=popup&e2e=%7B%7D&href="+ $scope.product_details_table.ViewItemURLForNaturalSearch+"&locale=en_US&next=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df119c951e77464%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener%26frame%3Df3402567c6b7e8%26result%3D%2522xxRESULTTOKENxx%2522&quote=Buy "+$scope.product_details_table.Title+" at $"+$scope.product_details_table.CurrentPrice.Value+" from link below ";
		$scope.facebook_link="https://www.facebook.com/dialog/share?app_id=184484190795&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df2b6ab35266bc9%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener&display=popup&e2e=%7B%7D&fallback_redirect_uri=http%3A%2F%2Fwww.fbrell.com%2Fsaved%2F2779dc018c325d85d650a3b723239650&href="+ $scope.product_details_table.ViewItemURLForNaturalSearch+"&locale=en_US&next=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df119c951e77464%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener%26frame%3Df3402567c6b7e8%26result%3D%2522xxRESULTTOKENxx%2522&quote=Buy "+$scope.product_details_table.Title+" at $"+$scope.product_details_table.CurrentPrice.Value+" from link below ";
	

			$scope.current1= $scope.product_details_table.Seller.PositiveFeedbackPercent;
			if($scope.current1=='0')
			{
				$scope.pdg=14;
			}
			else
			{
				$scope.pdg=7;
			}
		}
		});
		
	}
		
$scope.call_prod_details = function (y, i) 
	{
		$scope.enableDetails= false;
		$scope.itemid=y;
		$scope.indice=i;
		$scope.results_table_content=false;
		$scope.product_details=true;
		
		$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/search_product_details?itemid="+y)
		.then(function (response)
		{
			 $scope.progress = false;
	
			//console.log(response);
			$scope.resdata=response.data;
		if( $scope.resdata.Item!=undefined)
		{
			$scope.product_details_table=response.data.Item;
		$scope.facebook_link="https://www.facebook.com/dialog/share?app_id=184484190795&channel_url=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df2b6ab35266bc9%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener&display=popup&e2e=%7B%7D&fallback_redirect_uri=http%3A%2F%2Fwww.fbrell.com%2Fsaved%2F2779dc018c325d85d650a3b723239650&href="+ $scope.product_details_table.ViewItemURLForNaturalSearch+"&locale=en_US&next=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fd_vbiawPdxB.js%3Fversion%3D44%23cb%3Df119c951e77464%26domain%3Dwww.fbrell.com%26origin%3Dhttp%253A%252F%252Fwww.fbrell.com%252Ff323e9ef22763b%26relation%3Dopener%26frame%3Df3402567c6b7e8%26result%3D%2522xxRESULTTOKENxx%2522&quote=Buy "+$scope.product_details_table.Title+" at $"+$scope.product_details_table.CurrentPrice.Value+" from link below ";
	

			$scope.current1= $scope.product_details_table.Seller.PositiveFeedbackPercent;
			if($scope.current1=='0')
			{
				$scope.pdg=14;
			}
			else
			{
				$scope.pdg=7;
			}
		}
		});
		
		
			
	}
	
	
	
$scope.shipping = function (x) {
  if (x.shippingInfo != undefined) {
	  if(x.shippingInfo[0].shippingServiceCost[0].__value__== 0){
		  return "Free Shipping";
	  }
	  else{
		  return "$"+ i.shippingInfo[0].shippingServiceCost[0].__value__;
	  }
    
  } else {
    return 'N/A';
  }
}



$scope.range = function(min, max, step){
    step = step || 1;
    var input = [];
    for (var i = min; i <= max; i += step) input.push(i);
    return input;
  };
	
	
$scope.google_photos=function(y)
	{
	
		$http.get ("http://sunayanahw8.us-east-2.elasticbeanstalk.com/search_google_photos?title="+y)
		.then(function (response)
		{
			 $scope.progress = false;
	
			//console.log(response);
			$scope.resdata=response.data;
		if( $scope.resdata.items!=undefined)
		{
			$scope.google_photos_results=response.data.items;
			$scope.google_empty=false;
	$scope.google_not_empty=true;
		}
		else
		{
			$scope.google_empty=true;
	$scope.google_not_empty=false;
		}
		});
		
	}
	
$scope.similar_items=function(y)
	{
		$http.get("http://sunayanahw8.us-east-2.elasticbeanstalk.com/search_similar_items?itemid="+y)
		.then(function (response)
		{
			 $scope.progress = false;
			//console.log(response);
			$scope.resdata=response.data;
		if( $scope.resdata.getSimilarItemsResponse.ack=="Success" )
		{
		
			
			$scope.similar_empty=false;
			$scope.similar_not_empty=true;
		
			$scope.similar_item_results=response.data.getSimilarItemsResponse.itemRecommendations.item;
					for(var i=0;i<$scope.similar_item_results.length;i++){
						$scope.similar_item_results[i].buyItNowPrice.__value__=parseFloat($scope.similar_item_results[i].buyItNowPrice.__value__);
						$scope.similar_item_results[i].shippingCost.__value__=parseFloat($scope.similar_item_results[i].shippingCost.__value__);

						days=$scope.similar_item_results[i].timeLeft;
						daysLeft=Number(days.substring(days.indexOf('P')+1,days.indexOf('D')));
						$scope.similar_item_results[i].timeLeft=daysLeft;
						
						
					}
						
		}
		else
		{
			$scope.similar_empty=true;
			$scope.similar_not_empty=false;
		}
		});
		
	}
	
	$scope.rev=false;
$scope.sort_fun = function (sort)
	{
			
        $scope.sort_by= sort;
		
			
		if(sort=='')
		{
		$scope.asc_desc_disable=true;
		}
		else
		{
			$scope.asc_desc_disable=false;
		}
    }
	$scope.ascending=function()
	{
		$scope.rev = false;
	}
	$scope.descending=function()
	{
		$scope.rev = true;
	}
	
	$scope.limit=5;
	 $scope.showMore=function()
	 {
		 $scope.limit=$scope.similar_item_results.length;
	 }
	 $scope.showLess = function() 
	 {
     $scope.limit = 5;
	};
	
$scope.share = function ()
{
FB.ui({
		method: 'share',
		display: 'popup',
		href: 'https://developers.facebook.com/docs/',
	},
	function (response) {
	// Action after response
	});
	
	return false;
}

$scope.getStyle = function(){
        var transform = ($scope.isSemi ? '' : 'translateY(-50%) ') + 'translateX(-50%)';

        return {
            'top': $scope.isSemi ? 'auto' : '50%',
            'bottom': $scope.isSemi ? '5%' : 'auto',
            'left': '50%',
            'transform': transform,
            '-moz-transform': transform,
            '-webkit-transform': transform,
            'font-size': 16/3.5 + 'px'
        };
    };

});
