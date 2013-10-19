<div class="comment-form container-fluid" >
	<div class="row-fluid">
		<div class="span4">
			<textarea name="description" cols="40" rows="2" ng-model="comment_body"></textarea>
		</div>
		<div class="span2">
			<input type="button" value="Submit" ng-click="submit_comment()">
		</div>
	</div>
</div>
<div class="old-comments">
	<div ng-repeat="comment in oldcomments | orderBy:'cid':true">
		<div class="well">
			<div class="subject">{{comment.subject}} <span class="label label-info"> by {{comment.name}} on {{comment.created_date}}</span></div>
			<div class="comment-body">{{comment.comment}}</div>
		</div>
	</div>
</div>
