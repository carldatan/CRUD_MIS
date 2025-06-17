let alertPlaceholder;
let form;

document.addEventListener('DOMContentLoaded', () => {
	alertPlaceholder = document.getElementById('liveAlertPlaceholder');
	form = document.querySelector('.needs-validation');
	form.addEventListener('submit', (e) => {
		e.preventDefault();
		const formData = new FormData(e.target);
		const data = Object.fromEntries(formData.entries());

		fetch('../endpoint/verify.php', {
			method: 'POST',
			headers: { 'Content-type': 'application/json' },
			body: JSON.stringify(data),
		}).then(async res => {
			let json;
			try {
				json = await res.json();
			} catch (e) {
				console.error('Failed to parse JSON:', e);
				appendAlert('Unexpected server response.', 'danger', 5000);
				return;
			}
			if (json['error'] !== undefined) {
				appendAlert(json['error'], 'danger', 5000);
			} else if (json['success'] && json.redirect) {
				window.location.href = json.redirect;
			}
		}).catch(error => { console.error(error) });
	});
});

const appendAlert = (message, type, timeout) => {
	const wrapper = document.createElement('div')
	const alertId = 'alert-' + Date.now();

	wrapper.innerHTML = [
		`<div id="${alertId}" class="alert alert-${type} alert-dismissible fade show" role="alert">`,
		`   <div>${message}</div>`,
		'   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
		'</div>'
	].join('')

	if (alertPlaceholder.innerHTML.trim() !== '') {
		alertPlaceholder.querySelector('.btn-close').click();
	}

	alertPlaceholder.append(wrapper);

	setTimeout(() => {
		const alertEl = document.getElementById(alertId);
		if (alertEl) {
			const bsAlert = bootstrap.Alert.getOrCreateInstance(alertEl);
			bsAlert.close();
		}
	}, timeout);
}


