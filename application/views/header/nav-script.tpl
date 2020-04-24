<script>
	/*=== Report Function ===*/
	$("a[data-report]").click(function(){
		var ba = ["Chrome","Firefox","Safari","Opera","MSIE","Trident","Edge"];
		var b, ua = navigator.userAgent;

		var report_info = "<?php echo $lang['report_info'] ?>";
		var report_send = "<?php echo $lang['report_send'] ?>";

		for(var i=0; i < ba.length; i++){if( ua.indexOf(ba[i]) > -1 ){b = ba[i];break;}}
		if(b == "MSIE" || b == "Trident" || b == "Edge"){b = "Internet Explorer";}
		swal({
			text: report_info,
			icon: "info",
			buttons: report_send,
			content: { 
				element: "textarea",attributes: {id: "report"},
			}
		})
		.then((text) => {
			if ($("#report").val() != '') {
				$.post("/report", {
					url: location.href,
					description: $("#report").val(),
					width: $( window ).width(),
					browser: b
				}, function(data,status){
					json = jQuery.parseJSON(data);
					if (json.url) {
						window.location.href = '/' + json.url;
					} else {
						swal('',json.message,json.status);
					}
				});
			}
		});
	});
</script>