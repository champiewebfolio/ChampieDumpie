var viewAnalyticsModel = {
       
        url: ko.observable(""),
       
        details: ko.observable(""),
       
        getSiteURL: ko.observable("http://www.clearlym.com/"),
       
        imgVisibility: ko.observable("none"),
       
        resultsVisibility: ko.observable("none"),
       
        progressStatusVisibility: ko.observable("none"),
       
        numberOfShares: ko.observable(0),

        entriesDataBox: ko.observable(),

        linkShares: ko.observable(0),

        resetField: function(){  var btn = $('#startAnalyze'); btn.button('Start'); btn.button("reset");},

        drillDown: ko.observable(0),
       
        sitePages:ko.observable([
        	{
        		pageTitle:"",
        		pageDescription:"",
        		singlePageNumberOfShares:"",
        		pageScreenshotURL: ""
        	}
        ]),

        startAnalytics: function() {
        	console.log("Started..");
        	

        	var self = this;
        	
        	var qURL = this.getSiteURL();
           
            self.url("http://immediatenet.com/t/l?Size=1024x768&URL="+qURL+"");
           
           	console.log("Fetching screenshot..");

            self.getSiteURL("");
           
            self.getSiteURL(qURL);
           
            self.imgVisibility("inline");
            
            self.resultsVisibility("inline");
           
            self.progressStatusVisibility("inline");

           	self.sitePages(self.sitePages());

           	
         
						 	var AnalyzedPages = [];
						 	

           $.ajax({
				    url: document.location.protocol + '//ajax.googleapis.com/ajax/services/feed/load?v=1.0&num=1000&callback=?&q=' + qURL+"/feed",
				    dataType: 'json',
				    success: function(data) {
				           console.log("Analyzing..");
							$.getJSON("https://graph.facebook.com/?ids="+qURL, function(d) { 

												domainShares = d[qURL]["shares"];
												self.numberOfShares(formatShares(domainShares));
										
							});
							console.log("Pages Found: "+data.responseData.feed.entries.length);
                            var l_share =0 ,n_share = 0;
                             $('.percentage').easyPieChart({
										                     animate: 1000
										                });
															
							$.each(data.responseData.feed.entries, function (i, e) {
								 
								if(e.link!="" && e.title!=""){
                                             
                                              var l = e.link;
                                             
                                              var errorCaught=false;	
											 
											   $.getJSON("https://graph.facebook.com/?ids="+l, function(d) { 
									 					
									 					console.log("Requesting number of link shares..");
														//TryCatch error if Shares <= 0
														try{ 

															d[l]["shares"];

														}
														catch (e)	{
																n_share++; errorCaught = true;
																self.drillDown(n_share);
																console.log("link shares: 0");
														}

														if(errorCaught==false){
															 
															 if(d[l]["shares"]!='undefined' && !isNaN(d[l]["shares"])){   
															 	var currentShares = ""+self.numberOfShares();

															 	//currentShares.replace("K","");
															 	//currentShares.replace("M","");
															 	self.numberOfShares(parseInt(currentShares)+parseInt(d[l]["shares"]));
															 	AnalyzedPages.push({
													        		pageTitle: e.title,
													        		pageDescription: e.description,
													        		singlePageNumberOfShares: d[l]["shares"],
													        		pageScreenshotURL: "http://immediatenet.com/t/l?Size=1024x768&URL="+e.link
													        	}); 
																self.sitePages(AnalyzedPages);	
																console.log("rendering results");
																
        														l_share++;
        														self.linkShares(l_share);
																//self.numberOfShares(formatShares(self.numberOfShares()));	   
															}
														}
									 					
									 			}); // end getJSON
													 
													 $('#linkShares').each(function() {
										                    var newValue = $('span', this).html();
										                    $(this).data('easyPieChart').update((100*newValue));
 															console.log("chart stats LinkShares: "+newValue);
										               });	
										            $('#drillDown').each(function() {
										                    var newValue = $('span', this).html();
										                    $(this).data('easyPieChart').update((100*newValue));
 															console.log("chart stats DrillDown: "+newValue);
										               });	   					
											 
       
								   }//endif
								    

							});// endForEach
									
							console.log("Finished...");	
							$('#startAnalyze').text("Finished!"); 						
						 } // endfn::Success

				 }); //endAjax
			   console.log("Done...");

 		}// endfn::StartAnalytics
        
    }; // endModel

 $('#startAnalyze') .click(function () { var btn = $(this); btn.button('loading');});

function formatShares(sharesCount){
	if(sharesCount>=1000 && sharesCount <=999999){
		return parseInt(sharesCount/1000)+"K";
	}else if(sharesCount>=1000000){
		return parseInt(sharesCount/1000)+"M";
	}
	else{
		return sharesCount;
	}

}

 
ko.applyBindings( viewAnalyticsModel );
