const submitbtn = document.getElementById('submit-btn');

function usernameCheck(id) {
	let timer;
	const input = document.getElementById(id);
	const field = id;

	input.addEventListener('input', () => {

		const value = input.value.trim();

		if (value.length < 1) {
			return;
		}

		if (field === 'email') {
			if (emailCheck(value)) {

			}
			else return;
		}
		clearTimeout(timer);

		timer = setTimeout(() => {
			fetch('../check_username.php', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				body: `field=${encodeURIComponent(field)}&value=${encodeURIComponent(value)}`
			})
				.then(res => res.json())
				.then(data => {
					if (data.available) {
						input.classList.add('is-valid');
						input.classList.remove('is-invalid');
					} else {
						input.classList.remove('is-valid');
						input.classList.add('is-invalid');
					}
				})
				.catch(error => {
					console.log(error);
				});
		}, 500);
	});

}

function emailCheck(email) {
	const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	return emailRegex.test(email);
}

function formValidity() {
	const inputs = document.querySelectorAll('.form-control');
	document.querySelector('.needs-validation').addEventListener('input', () => {
		const allValid = Array.from(inputs).every(input => input.classList.contains('is-valid'));
		submitbtn.disabled = !allValid;
	});
}



function passwordCheck() {
	const password = document.getElementById('password');
	const confirmPassword = document.getElementById('confirmPassword');
	const feedback = document.querySelector('.password-feedback');

	function validatePasswords() {
		const pwd = password.value;
		const confirmPwd = confirmPassword.value;

		if (pwd.length < 8) {
			feedback.innerHTML = "Password must be at least 8 characters long.";
			setValidity(password, false);
			setValidity(confirmPassword, false);
			return;
		}

		if (pwd !== confirmPwd) {
			feedback.innerHTML = "Passwords do not match.";
			setValidity(password, false);
			setValidity(confirmPassword, false);
			return;
		}

		feedback.innerHTML = "";
		setValidity(password, true);
		setValidity(confirmPassword, true);
	}

	password.addEventListener('input', validatePasswords);
	confirmPassword.addEventListener('input', validatePasswords);
}

function setValidity(element, validity) {
	if (validity) {
		element.classList.remove('is-invalid');
		element.classList.add('is-valid');
	} else {
		element.classList.remove('is-valid');
		element.classList.add('is-invalid');
	}
}

const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
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


	const form = document.querySelector('.needs-validation');
	form.reset();
	const inputs = document.querySelectorAll('.form-control');
	Array.from(inputs).forEach(input => input.classList.remove('is-valid', 'is-invalid'));
}

function register() {
	document.querySelector('.needs-validation').addEventListener("submit", (e) => {
		e.preventDefault();

		const formData = new FormData(e.target);

		const data = Object.fromEntries(formData.entries());

		fetch('../register.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(data)
		})
			.then(async res => {
				const body = await res.json();
				if (!res.ok) {
					console.log(res.json());
					throw new Error('Network response was not ok');
				}
				return body;
			}).then(data => {
				if (data.success) {
					appendAlert("registration successful", 'success', 5000);
				} else {
					appendAlert("registration failed", 'danger', 5000);
				}
			})
			.catch(error => {
				console.error(error);
			});
	})
}

document.getElementById('name').addEventListener('input', () => {
	document.getElementById('name').classList.add('is-valid');
});



formValidity();
passwordCheck();
usernameCheck("email");
register();

