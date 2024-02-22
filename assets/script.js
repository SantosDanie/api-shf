window.addEventListener('load', () => {
	let copyTokens = document.querySelectorAll('.shf-token');
	if(copyTokens != null) {
		copyTokens.forEach(item => {
			let valueInput	= item.querySelector('.shf-input');
			let btn			= item.querySelector('.shf-btn');
			if(valueInput != null && btn != null) {
				btn.addEventListener('click', () => {
					valueInput.focus();
					valueInput.select();
					document.execCommand("copy");
				});
			}

			if(valueInput != null) {
				valueInput.addEventListener('keydown',	e => e.preventDefault());
				valueInput.addEventListener('keyup',	e => e.preventDefault());
			}
		});
	}

	// let new_domain = document.querySelector('#shf_domain');
	// const isValidUrl = urlString=> {
	// 	var urlPattern = new RegExp('^(http(s)?:\\/\\/)?'+
	// 	'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+
	// 	'((\\d{1,3}\\.){3}\\d{1,3}))'+
	// 	'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+
	// 	'(\\?[;&a-z\\d%_.~+=-]*)?'+
	// 	'(\\#[-a-z\\d_]*)?$','i');
	// 	return !!urlPattern.test(urlString);
	// }

	// if(new_domain != null) {
	// 	new_domain.addEventListener('keydown', () => {
	// 		if(new_domain.value != '' && isValidUrl(new_domain.value)) {
	// 			let url = new_domain.value;
	// 			let lastChar = url.substr(url.length - 1);
	// 			if(lastChar == '/') {
	// 				let newValue = new_domain.value.slice(0, -1);
	// 				new_domain.value = newValue; 
	// 			}
	// 		} else {
	// 			new_domain.classList.add('input-error');
	// 			setTimeout(() => { new_domain.classList.remove('input-error'); }, 2000);
	// 		}
	// 	});
	// }
});