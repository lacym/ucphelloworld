var TicTacToe = require('react-tic-tac-toe');


//https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-post-body.widget-added
$(document).on("post-body.widget-added", function(event, widget_id, dashboard_id) {
	console.log(widget_id);
	if($(".grid-stack-item[data-id="+widget_id+"]").data('widget_type_id') == 'tictactoe' && $(".grid-stack-item[data-id="+widget_id+"]").data('rawname') == 'ucphelloworld') {
		console.log("TRUE");
		ReactDOM.render(<TicTacToe width={ 3 } singlePlayer/>, $(".grid-stack-item[data-id="+widget_id+"] .widget-content")[0]);
	}
});

//https://wiki.freepbx.org/pages/viewpage.action?pageId=71271742#DevelopingforUCP14+-post-body.widget-removed
$(document).on("post-body.widget-removed", function(event, widget, dashboard_id) {
	if(widget.data('widget_type_id') == 'tictactoe' && widget.data('rawname') == 'ucphelloworld') {
		ReactDOM.unmountComponentAtNode(widget.find(".widget-content")[0]);
	}
});
