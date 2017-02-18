$(function() {
	$("#datepicker").datepicker({
		altFormat: "yy-mm-dd"
	});

	$("#public-only").hide();

	$("#kind").on('change', function(){
		if($("#kind").val() !== 'interna'){
			$("#public-only").show();
		}else{
			$("#public-only").hide();
		}
	});

	let $chair = $("#chair");
	let $table = $("#table");
	let $tablecloths = $("#tablecloths");
	let $kitchen = $("#kitchen");

	$chair.val(0);
	$table.val(0);
	$tablecloths.val(0);

	$chair.on('change', function(){
		calculateTotal($kitchen.prop("checked"), $chair.val(), $table.val(), $tablecloths.val());
	});

	$table.on('change', function(){
		calculateTotal($kitchen.prop("checked"), $chair.val(), $table.val(), $tablecloths.val());
	});

	$tablecloths.on('change', function(){
		calculateTotal($kitchen.prop("checked"), $chair.val(), $table.val(), $tablecloths.val());
	});

	$kitchen.on('change', function(){
		calculateTotal($kitchen.prop("checked"), $chair.val(), $table.val(), $tablecloths.val());
	});
});

function calculateTotal(kitchen, chairs, tables, tablecloths){
	let total = 0;

	total += chairs*1500;
	total += tables*3000;
	total += tablecloths*750;

	if(kitchen){
		total += 8500;
	}

	let totalMoney = document.getElementById("total");
	totalMoney.innerHTML = total;

}
