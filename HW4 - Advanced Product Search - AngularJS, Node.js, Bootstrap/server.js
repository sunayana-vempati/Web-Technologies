var express = require('express');
var app = express();
var http=require('http');
var https= require('https');
var url= require('url');
var request = require('request');
var port = process.env.PORT ||8081;


app.get('/auto', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;
   //http://api.geonames.org/postalCodeSearchJSON?postalcode_startsWith=900&username=sunayana&country=US&maxRows=5
   var url_query='http://api.geonames.org/postalCodeSearchJSON?postalcode_startsWith='+temp.zip+'&username=sunayana&country=US&maxRows=5';
		//console.log(url_query);
	    http.get(url_query,function(req2,res2)
		{
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
			return res.send(res_text);
        });

        });
   

});


app.get('/find_results_now', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;
 
   if(temp.free==undefined && temp.local==undefined)
   {
	   temp.free=true;
	   temp.local=true;
   }
   else
   {
	   temp.free= (temp.free==undefined)?false:true;
	   temp.local= (temp.local==undefined)?false:true;
   }
	
if(temp.new1!=undefined && temp.used==undefined && temp.unspecified== undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
}	
else if(temp.new1==undefined && temp.used!=undefined && temp.unspecified== undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
}	
else if(temp.new1==undefined && temp.used==undefined && temp.unspecified!= undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';

}	
else if(temp.new1!=undefined && temp.used!=undefined && temp.unspecified== undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';

}	
else if(temp.new1==undefined && temp.used!=undefined && temp.unspecified!= undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&itemFilter(4).value(1)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	 var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=Used&itemFilter(4).value(1)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  
}	
else if(temp.new1!=undefined && temp.used==undefined && temp.unspecified!= undefined )
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	 var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';

}	
else
{
  if(temp.category=="all")
	var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&buyerPostalCode='+temp.loc+'&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
  else
	 var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords='+temp.keyword+'&categoryId='+temp.category+'&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value='+temp.distance+'&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value='+temp.free+'&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value='+temp.local+'&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';

//http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=50&keywords=iphone&categoryId=58058&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value=10&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=true&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=true&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';

}	

console.log(url_query);

 http.get(url_query,function(req2,res2)
		{
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
            return res.send(res_text);
        });

		});

});


app.get('/search_product_details', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;	
   //http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=Sunayana-hw6-PRD-216e08212-6b05c9c0&siteid=0&version=967&ItemID=132961484706&IncludeSelector=Description,Details,ItemSpecifics
   var url_query='http://open.api.ebay.com/shopping?callname=GetSingleItem&responseencoding=JSON&appid=Sunayana-hw6-PRD-216e08212-6b05c9c0&siteid=0&version=967&ItemID='+temp.itemid+'&IncludeSelector=Description,Details,ItemSpecifics';
   http.get(url_query,function(req2,res2)
		{
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
            return res.send(res_text);
        });

		});

});

app.get('/find_delay', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;
   var url_query='http://svcs.ebay.com/services/search/FindingService/v1?OPERATION-NAME=findItemsAdvanced&SERVICE-VERSION=1.0.0&SECURITY-APPNAME=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&paginationInput.entriesPerPage=20&keywords=iphone&buyerPostalCode=90007&itemFilter(0).name=MaxDistance&itemFilter(0).value=10&itemFilter(1).name=FreeShippingOnly&itemFilter(1).value=true&itemFilter(2).name=LocalPickupOnly&itemFilter(2).value=true&itemFilter(3).name=HideDuplicateItems&itemFilter(3).value=true&itemFilter(4).name=Condition&itemFilter(4).value(0)=New&itemFilter(4).value(1)=Used&itemFilter(4).value(2)=Unspecified&outputSelector(0)=SellerInfo&outputSelector(1)=StoreInfo';
http.get(url_query,function(req2,res2)
		{
			console.log(url_query);
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
            return res.send(res_text);
        });

		});

});
 

app.get('/search_google_photos', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;
  //https://www.googleapis.com/customsearch/v1?q=iphone&cx=017678907703477388590:rxzbeat4-zu&imgSize=huge&imgType=news&num=8&searchType=image&key=AIzaSyDTEO2rDCqE4evBhZ2lRqYt0J-hMq9znPw

   var url_query='https://www.googleapis.com/customsearch/v1?q='+temp.title+'&cx=017678907703477388590:rxzbeat4-zu&imgSize=huge&imgType=news&num=8&searchType=image&key=AIzaSyDTEO2rDCqE4evBhZ2lRqYt0J-hMq9znPw';
	    https.get(url_query,function(req2,res2)
		{
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
			return res.send(res_text);
        });

        });
   

});

app.get('/search_similar_items', function (req, res) 
{
   res.setHeader("Content-Type","text/plain");
   res.setHeader("Access-Control-Allow-Origin","*");
   var temp = url.parse(req.url, true).query;
   //http://svcs.ebay.com/MerchandisingService?OPERATION-NAME=getSimilarItems&SERVICE-NAME=MerchandisingService&SERVICE-VERSION=1.1.0&CONSUMER-ID=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&itemId=183383595311&maxResults=20

   var url_query='http://svcs.ebay.com/MerchandisingService?OPERATION-NAME=getSimilarItems&SERVICE-NAME=MerchandisingService&SERVICE-VERSION=1.1.0&CONSUMER-ID=Sunayana-hw6-PRD-216e08212-6b05c9c0&RESPONSE-DATA-FORMAT=JSON&REST-PAYLOAD&itemId='+temp.itemid+'&maxResults=20';
		//console.log(url_query);
	    http.get(url_query,function(req2,res2)
		{
        var res_text = "";
        req2.on('data',function(data)
		{
            res_text+=data;
			
        });
        req2.on('end',function()
		{
			return res.send(res_text);
        });

        });
   

});


var server = app.listen(8081, function () {
   var host = server.address().address
   var port = server.address().port
   
   console.log("Example app listening at http://%s:%s", host, port)
});
