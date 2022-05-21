let k = 2;
function validateT1(element) {
	let errorBlock = document.getElementById('t1-error');
	if (element.value.length < 5) {
		element.className = 'error-border';
		errorBlock.innerHTML = 'Логин должен быть длинне 5 символов!';
		var b = document.querySelector("button");
		b.setAttribute("disabled", "disabled");
		k = k - 1;
	} else {
		element.className = 'success-border';
		errorBlock.innerHTML = '';
		k = k+1;
		if (k == 2){
			var b = document.querySelector("button");
			b.removeAttribute("disabled", "disabled"); 
		}
	}
}
function validateT2(element) {
	let errorBlock = document.getElementById('t2-error');
	if (element.value.length < 5) {
		element.className = 'error-border';
		errorBlock.innerHTML = 'Пароль должен быть длинне 5 символов!';
		var b = document.querySelector("button");
		b.setAttribute("disabled", "disabled");
		k = k - 1;

	} else {
		element.className = 'success-border';
		errorBlock.innerHTML = '';
		k = k+1;
		if (k == 2){
			var b = document.querySelector("button");
			b.removeAttribute("disabled", "disabled"); 
		}
	}
}