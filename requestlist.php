<!DOCTYPE html>
<html lang="en">
  <?php include 'include/head.html';?>
 <body>
  <?php include 'include/adminmenu.html';?>
  <div class="container" ng-app="apprequests" ng-controller="requestscontroller">
   <span id="spinner" name="spinner" us-spinner="{radius:15, width:6, length: 10}"></span>
   <h2>Request List</h2>
       <div class="container col-xs-12 col-md-12 col-sm-12">
	       <div class="row">
			   <div class="form-group col-xs-12 col-md-12 col-sm-12">
					<input type="text" ng-model="search" class="form-control" placeholder="Search Here">
				</div>
			</div>
		</div>
		<div class="container col-xs-12 col-md-12 col-sm-12" >
		<div class="row grd-header">
			<div class="col-xs-8 col-sm-4 col-md-4">Enterprise ID</div>
			<div class="hidden-xs col-sm-4 col-md-4">Location</div>
			<div class="hidden-xs col-sm-2 col-md-2">Prob Sesc</div>
			<div class="col-xs-4 col-sm-2 col-md-2">Received On</div>
		</div>
		
		
		<div ng-init="get_requests()">
			<div class="row" dir-paginate="res in allRequestsList | filter: search| orderBy:sortKey:reverse|itemsPerPage:10" ng-class-odd="'odd'" ng-class-even="'even'">
				<div class="col-xs-8 col-sm-4 col-md-4 inside-block"><span><a href="#">{{res.enterpriseid}}</a></span></div><!-- branchdetail.php#?iduser={{res.userid}} -->
				<div class="hidden-xs col-sm-4 col-md-4 inside-block"><span>{{res.location}}</span></div>
				<div class="hidden-xs col-sm-2 col-md-2 inside-block"><span>{{res.probdesc}}</span></div>
				<div class="col-xs-4 col-sm-2 col-md-2 inside-block"><span>{{res.receivedon}}</span></div> 	
		     </div>
		     <div ng-show="nodata">
			 	<b>No data available.<b>
			 </div>
			 <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"> </dir-pagination-controls>
		</div>
	</div>
  </div>
  </body>
  </html>
