$(document).ready(function () {
	$("#submitMessage").click(function (event) {
		event.preventDefault();
		$.ajax({
			url: 'postPosts.php',
			method: 'get',
			data: $("#messageForm").serialize(),
			dataType: "json"
		})
			.done(function (data) {
				console.log(data);
				$("#message").show();;
				$("#message").css({"height":"26px","font-size":"18px","background-color": "#EC7063","width":"500px"});
				$("#message").html(data.successMessage);
				$("#message").html(data.emptyMessage);
				$("#messageForm")[0].reset();
				setTimeout(function () {
					$("#message").hide();
					loadPosts();
				}, 1000);
			})
			.fail(function (err) {
				console.log(err);
			});
		}
	);

	function loadPosts() {
		$.ajax({
			url: 'loadPosts.php',
			dataType: 'html'
		})
			.done(function (Result) {
				$("#allPosts").html(Result);
			})
			.fail(function (err) {
				console.log(err);
			});
	}

	loadPosts();

	$("#transferMoneyButton").click(function (event) {
		event.preventDefault();
		console.log('transferMoneyButton just Clicked');
		$.ajax({
			url: 'transfer.php',
			method: 'get',
			data: $("#transferForm").serialize(),
			dataType: "json"
		}).success(function (data, textStatus) {
			console.log(data);
			console.log(textStatus);
			$("#transferLogMessage").show();
			$("#transferLogMessage").css({"height":"26px","font-size":"18px","background-color": "#EC7063","width":"500px"});
			$("#transferLogMessage").html("<p>SUCCESSFUL TRANSFER OF AMOUNT: <b>" + data.transferAmount + "</b> TO: <b>" + data.receiverUserName + "</b>");
			$("#transferLogMessage").html(data.emptyMessage);
			setTimeout(function () {
				$("#transferLogMessage").hide();
				$("#transferForm")[0].reset();
				if(!data.emptyMessage){
					setTimeout(function () {
					$("#displayBalance").html("<h4>Your net balance is: " + data.newUserBalance + "</h4>");
					}, 500);
				}
			}, 2000);
		}).error(function (error) {
			console.log(error);
		});

	});
});