var UcphelloworldC = UCPMC.extend({
	init: function(){
    console.log("UCP HELLO WORLD");
	},
	settingsDisplay: function() {
    $("#hello").click(function(){
      alert("Hello");
    });
	},
	settingsHide: function() {
	},
	poll: function(data){
		$("#ucphelloworld-badge").text(data.total);
		$("#nav-btn-ucphelloworld .badge").text(data.total);

	}

});
