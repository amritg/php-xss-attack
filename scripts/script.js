jQuery(document).ready(function ($) {
	tab = $('.tabs h3 a');

	tab.on('click', function (event) {
		event.preventDefault();
		tab.removeClass('active');
		$(this).addClass('active');

		tab_content = $(this).attr('href');
		$('div[id$="tab-content"]').removeClass('active');
		$(tab_content).addClass('active');
	});

	$("#submitMessage").click(function (event) {
		event.preventDefault();
		$.ajax({
			url: 'postMessage.php',
			method: 'get',
			data: $("#messageForm").serialize(),
			dataType: "json"
		})
			.done(function (data) {
				console.log(data);
				$("#message").show();
				$("#message").html(data.successMessage);
				$("#messageForm")[0].reset();
				setTimeout(function () {
					$("#message").hide(2200);
					loadPosts();
				}, 500);


			})
			.fail(function (err) {
				console.log(err);
			});
	});

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
			$("#transferLogMessage").html("<p>SUCCESSFUL TRANSFER OF AMOUNT:" + data.transferAmount + "TO: " + data.receiverUserName);
			setTimeout(function () {
				$("#transferLogMessage").hide(300);
				$("#transferForm")[0].reset();
				setTimeout(function () {
					$("#displayBalance").html("<h4>Your net balance is: " + data.newUserBalance + "</h4>");
				}, 500);
			}, 1000);
		}).error(function (error) {
			console.log(error);
		});

	});
});