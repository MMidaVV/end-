let k = 0;
function validateT1(element) {
	let errorBlock = document.getElementById('t1-error');
	if (element.value.length < 5) {
		element.className = 'error-border';
		errorBlock.innerHTML = 'Логин должен быть длинне 5 символов!';
	} else {
		element.className = 'success-border';
		errorBlock.innerHTML = '';
		k = k+1;
		if (k == 3){
			element = document.getElementById('button-error');
			element.removeAttribute("disabled"); 
		}
	}
}
function validateT2(element) {
	let errorBlock = document.getElementById('t2-error');
	if (element.value.length < 5) {
		element.className = 'error-border';
		errorBlock.innerHTML = 'Пароль должен быть длинне 5 символов!';

	} else {
		element.className = 'success-border';
		errorBlock.innerHTML = '';
		k = k+1;
		if (k == 3){
			element = document.getElementById('button-error');
			element.removeAttribute("disabled"); 
		}
	}
}
function validateT3(element) {
	let errorBlock = document.getElementById('t3-error');
	if (element.value.length < 5) {
		element.className = 'error-border';
		errorBlock.innerHTML = 'Пароль должен быть длинне 5 символов!';

	} else {
		element.className = 'success-border';
		errorBlock.innerHTML = '';
		k = k+1;
		if (k == 3){
			element = document.getElementById('button-error');
			element.removeAttribute("disabled"); 
		}
	}
}